<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Setting;
use App\Models\Signal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SignalController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $hasSignals = $user->hasActiveSignalSubscription();
        $signals = $hasSignals
            ? Signal::orderByDesc('published_at')->get()
            : collect();

        $subscription   = $user->signalSubscription()->where('status', 'active')->latest()->first();
        $paymentMethods = PaymentMethod::active()->get();

        $signalPrice    = Setting::get('signal_price', '150.00');
        $currency       = Setting::get('currency', 'USD');

        return view('member.signals.index', compact(
            'hasSignals', 'signals', 'subscription', 'paymentMethods',
            'signalPrice', 'currency'
        ));
    }

    public function requestUnlock(Request $request): RedirectResponse
    {
        $request->validate([
            'proof' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
        ]);

        $existing = Payment::where('user_id', Auth::id())
            ->where('type', 'signal_subscription')
            ->whereIn('status', ['pending', 'approved'])
            ->exists();

        if ($existing) {
            return back()->with('status', 'You already have a pending or approved payment for the signal subscription.');
        }

        $proofPath = null;
        if ($request->hasFile('proof')) {
            $proofPath = $request->file('proof')->store('proofs', 'public');
        }

        // Convert dollar amount from settings to cents for storage
        $priceInCents = (int) round((float) Setting::get('signal_price', '150.00') * 100);

        Payment::create([
            'user_id'     => Auth::id(),
            'type'        => 'signal_subscription',
            'amount'      => $priceInCents,
            'status'      => 'pending',
            'proof_path'  => $proofPath,
            'description' => 'Signal Subscription (3 months)',
        ]);

        return back()->with('status', '✓ Payment proof submitted! The admin will review and activate your subscription shortly.');
    }
}
