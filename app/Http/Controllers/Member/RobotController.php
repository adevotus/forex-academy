<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Robot;
use Illuminate\Http\RedirectResponse;
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

        return view('member.robots.index', compact('robots', 'activeSubscriptions'));
    }

    public function show(Robot $robot): View
    {
        $unlocked = $robot->isUnlockedFor(Auth::user());
        $subscription = Auth::user()->robotSubscriptions()
            ->where('robot_id', $robot->id)
            ->where('status', 'active')
            ->latest()
            ->first();

        return view('member.robots.show', compact('robot', 'unlocked', 'subscription'));
    }

    public function requestUnlock(Robot $robot): RedirectResponse
    {
        $existing = Payment::where('user_id', Auth::id())
            ->where('type', 'robot')
            ->where('payable_type', Robot::class)
            ->where('payable_id', $robot->id)
            ->where('status', 'pending')
            ->exists();

        if (! $existing) {
            Payment::create([
                'user_id' => Auth::id(),
                'type' => 'robot',
                'payable_type' => Robot::class,
                'payable_id' => $robot->id,
                'amount' => $robot->price,
                'status' => 'pending',
            ]);
        }

        return back()->with('status', 'Robot subscription request sent for admin approval.');
    }
}
