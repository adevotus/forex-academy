<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Robot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RobotController extends Controller
{
    public function index(): View
    {
        $robots = Robot::where('published', true)->get();
        $activeSubscriptions = Auth::user()->robotSubscriptions()
            ->where('status', 'active')
            ->get()
            ->keyBy('robot_id');

        $paymentMethods = PaymentMethod::active()->get();

        return view('member.robots.index', compact('robots', 'activeSubscriptions', 'paymentMethods'));
    }

    public function show(Robot $robot): View
    {
        $unlocked = $robot->isUnlockedFor(Auth::user());
        $subscription = Auth::user()->robotSubscriptions()
            ->where('robot_id', $robot->id)
            ->where('status', 'active')
            ->latest()
            ->first();

        $paymentMethods = PaymentMethod::active()->get();

        return view('member.robots.show', compact('robot', 'unlocked', 'subscription', 'paymentMethods'));
    }

    public function requestUnlock(Request $request, Robot $robot): RedirectResponse
    {
        $request->validate([
            'proof' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
        ]);

        $existing = Payment::where('user_id', Auth::id())
            ->where('type', 'robot')
            ->where('payable_type', Robot::class)
            ->where('payable_id', $robot->id)
            ->whereIn('status', ['pending', 'approved'])
            ->first();

        if ($existing) {
            return back()->with('status', 'You already have a pending or approved payment for this robot.');
        }

        $proofPath = null;
        if ($request->hasFile('proof')) {
            $proofPath = $request->file('proof')->store('proofs', 'public');
        }

        Payment::create([
            'user_id'      => Auth::id(),
            'type'         => 'robot',
            'payable_type' => Robot::class,
            'payable_id'   => $robot->id,
            'amount'       => $robot->price,
            'status'       => 'pending',
            'proof_path'   => $proofPath,
            'description'  => 'Unlock: ' . $robot->name,
        ]);

        return back()->with('status', '✓ Payment proof submitted! The admin will review and unlock your robot shortly.');
    }
}
