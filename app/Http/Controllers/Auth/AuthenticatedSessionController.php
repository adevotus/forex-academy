<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserLoginSession;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email'    => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'These credentials do not match our records.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        $user      = Auth::user();
        $clientIp  = $request->ip();
        $userAgent = $request->userAgent();

        // ── IP / device session enforcement (members only) ──────
        if (! $user->isAdmin()) {
            $sessions = $user->loginSessions()->get();

            $knownIps = $sessions->pluck('ip_address')->toArray();
            $isKnown  = in_array($clientIp, $knownIps, true);

            if (! $isKnown && count($knownIps) >= 1) {
                // Different IP — block login (only 1 device allowed)
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'email' => 'Login blocked: your account is registered to a different device. '
                             . 'Please use your original device or contact admin .',
                ])->onlyInput('email');
            }

            // Upsert the session record (insert or update last_seen_at)
            $deviceName = UserLoginSession::parseDevice($userAgent);

            UserLoginSession::updateOrCreate(
                ['user_id' => $user->id, 'ip_address' => $clientIp],
                [
                    'user_agent'   => $userAgent,
                    'device_name'  => $deviceName,
                    'last_seen_at' => now(),
                ]
            );
        }
        // ────────────────────────────────────────────────────────

        if ($user->isAdmin()) {
            return redirect()->intended(route('admin.dashboard'));
        }

        if (! $user->isApproved()) {
            return redirect()->route('member.pending');
        }

        return redirect()->intended(route('member.dashboard'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
