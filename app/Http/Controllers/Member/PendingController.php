<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PendingController extends Controller
{
    public function show(): View|RedirectResponse
    {
        $user = Auth::user();

        if ($user->isApproved()) {
            return redirect()->route('member.dashboard');
        }

        $paymentMethods = PaymentMethod::active()->get();

        $pendingPayment = Payment::where('user_id', $user->id)
            ->where('type', 'registration')
            ->whereIn('status', ['pending', 'approved'])
            ->latest()
            ->first();

        $registrationFee = Setting::get('registration_fee', '300');
        $currency        = Setting::get('currency', 'USD');

        return view('member.pending', compact('user', 'paymentMethods', 'pendingPayment', 'registrationFee', 'currency'));
    }

    public function submitProof(Request $request): RedirectResponse
    {
        $request->validate([
            'proof' => ['required', 'file', 'mimes:png,jpg,jpeg,webp,pdf', 'max:5120'],
        ]);

        $user = Auth::user();

        $path = $request->file('proof')->store('payment-proofs', 'public');

        // Update existing pending payment or create a new one
        $payment = Payment::where('user_id', $user->id)
            ->where('type', 'registration')
            ->where('status', 'pending')
            ->latest()
            ->first();

        if ($payment) {
            $payment->update(['proof_path' => $path]);
        } else {
            Payment::create([
                'user_id'    => $user->id,
                'type'       => 'registration',
                'amount'     => Setting::get('registration_fee', 300),
                'currency'   => Setting::get('currency', 'USD'),
                'status'     => 'pending',
                'proof_path' => $path,
            ]);
        }

        return redirect()->route('member.pending')
            ->with('success', 'Payment proof submitted! Our team will review and approve your account shortly.');
    }
}
