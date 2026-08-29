<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ForgotPasswordController extends Controller
{
    /**
     * Show the email verification form.
     */
    public function showEmailForm(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Verify the email exists and store it in session, then redirect to reset form.
     */
    public function verifyEmail(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return back()->withErrors([
                'email' => 'No account found with that email address.',
            ])->withInput();
        }

        // Store the verified email in session — gating the reset form
        $request->session()->put('password_reset_email', $request->email);

        return redirect()->route('password.reset.form')
            ->with('status', 'Email verified! Please set your new password below.');
    }

    /**
     * Show the new password form (requires session gate).
     */
    public function showResetForm(Request $request): View|RedirectResponse
    {
        if (! $request->session()->has('password_reset_email')) {
            return redirect()->route('password.request')
                ->with('error', 'Please verify your email first.');
        }

        return view('auth.reset-password', [
            'email' => $request->session()->get('password_reset_email'),
        ]);
    }

    /**
     * Update the password, clear the session gate, redirect to login.
     */
    public function resetPassword(Request $request): RedirectResponse
    {
        if (! $request->session()->has('password_reset_email')) {
            return redirect()->route('password.request');
        }

        $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $email = $request->session()->get('password_reset_email');

        $user = User::where('email', $email)->first();

        if (! $user) {
            $request->session()->forget('password_reset_email');
            return redirect()->route('password.request')
                ->with('error', 'Something went wrong. Please try again.');
        }

        $user->update(['password' => Hash::make($request->password)]);

        $request->session()->forget('password_reset_email');

        return redirect()->route('login')
            ->with('status', 'Password reset successfully! You can now log in with your new password.');
    }
}
