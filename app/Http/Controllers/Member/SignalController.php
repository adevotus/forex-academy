<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Signal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SignalController extends Controller
{
    const PRICE = 15000; // $150 for the 3-month package

    public function index(): View
    {
        $user = Auth::user();
        $hasSignals = $user->hasActiveSignalSubscription();
        $signals = $hasSignals
            ? Signal::orderByDesc('published_at')->get()
            : collect();

        $subscription = $user->signalSubscription()->where('status', 'active')->latest()->first();

        return view('member.signals.index', compact('hasSignals', 'signals', 'subscription'));
    }

    public function requestUnlock(): RedirectResponse
    {
        $existing = Payment::where('user_id', Auth::id())
            ->where('type', 'signal_subscription')
            ->where('status', 'pending')
            ->exists();

        if (! $existing) {
            Payment::create([
                'user_id' => Auth::id(),
                'type' => 'signal_subscription',
                'amount' => self::PRICE,
                'status' => 'pending',
            ]);
        }

        return back()->with('status', 'Signal subscription request sent for admin approval.');
    }
}
