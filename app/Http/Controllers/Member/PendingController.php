<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
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

        $currency       = Setting::get('currency', 'USD');
        $regFee         = Setting::get('registration_fee', 50);
        $currencySymbol = $currency === 'TZS' ? 'TZS ' : '$';

        // Check if proof already submitted (pending or approved payment)
        $existingProof = $user->payments()
            ->where('type', 'registration')
            ->whereIn('status', ['pending', 'approved'])
            ->latest()
            ->first();

        return view('member.pending', compact(
            'user', 'currency', 'regFee', 'currencySymbol', 'existingProof'
        ));
    }

    public function submitProof(Request $request): RedirectResponse
    {
        $user = Auth::user();

        if ($user->isApproved()) {
            return redirect()->route('member.dashboard');
        }

        $request->validate([
            'proof'     => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
            'reference' => ['nullable', 'string', 'max:100'],
        ]);

        $path = $request->file('proof')->store('proofs', 'public');

        $user->payments()->create([
            'type'        => 'registration',
            'amount'      => Setting::get('registration_fee', 50),
            'status'      => 'pending',
            'proof_path'  => $path,
            'description' => 'Registration fee' . ($request->filled('reference') ? ' — Ref: ' . $request->reference : ''),
        ]);

        return back()->with('proof_submitted', true);
    }
}
