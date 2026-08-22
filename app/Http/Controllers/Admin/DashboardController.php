<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Robot;
use App\Models\Signal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_members' => User::where('role', 'member')->count(),
            'pending_members' => User::where('role', 'member')->where('status', 'pending')->count(),
            'approved_members' => User::where('role', 'member')->where('status', 'approved')->count(),
            'pending_payments' => Payment::where('status', 'pending')->count(),
            'total_revenue' => Payment::where('status', 'approved')->sum('amount'),
            'courses' => Course::count(),
            'robots' => Robot::count(),
            'signals' => Signal::count(),
        ];

        $recentPayments = Payment::with('user')->latest()->take(8)->get();
        $recentMembers  = User::where('role', 'member')->latest()->take(6)->get();

        // Notifications = pending payment proofs + pending member approvals
        $notifications = collect();

        Payment::with('user')
            ->where('status', 'pending')
            ->whereNotNull('proof_path')
            ->latest()
            ->get()
            ->each(function ($p) use (&$notifications) {
                $notifications->push([
                    'type'    => 'payment',
                    'icon'    => 'receipt',
                    'color'   => 'gold',
                    'title'   => $p->user->name . ' submitted payment proof',
                    'sub'     => $p->typeLabel() . ' · ' . $p->amountFormatted(),
                    'time'    => $p->created_at,
                    'link'    => route('admin.payments.index'),
                ]);
            });

        User::where('role', 'member')
            ->where('status', 'pending')
            ->latest()
            ->get()
            ->each(function ($u) use (&$notifications) {
                $notifications->push([
                    'type'  => 'member',
                    'icon'  => 'user',
                    'color' => 'brand',
                    'title' => $u->name . ' registered — awaiting approval',
                    'sub'   => $u->email,
                    'time'  => $u->created_at,
                    'link'  => route('admin.members.show', $u),
                ]);
            });

        $notifications = $notifications->sortByDesc('time')->values();

        return view('admin.dashboard', compact('stats', 'recentPayments', 'recentMembers', 'notifications'));
    }

    public function notifications(Request $request): View
    {
        $notifications = collect();

        Payment::with('user')
            ->where('status', 'pending')
            ->whereNotNull('proof_path')
            ->latest()
            ->get()
            ->each(function ($p) use (&$notifications) {
                $notifications->push([
                    'type'  => 'payment',
                    'title' => $p->user->name . ' submitted payment proof',
                    'sub'   => $p->typeLabel() . ' · ' . $p->amountFormatted(),
                    'time'  => $p->created_at,
                    'link'  => route('admin.payments.index'),
                ]);
            });

        User::where('role', 'member')
            ->where('status', 'pending')
            ->latest()
            ->get()
            ->each(function ($u) use (&$notifications) {
                $notifications->push([
                    'type'  => 'member',
                    'title' => $u->name . ' registered — awaiting approval',
                    'sub'   => $u->email,
                    'time'  => $u->created_at,
                    'link'  => route('admin.members.show', $u),
                ]);
            });

        $notifications = $notifications->sortByDesc('time')->values();

        // Filter by type if requested
        if ($request->filled('type') && $request->get('type') !== 'all') {
            $notifications = $notifications->where('type', $request->get('type'))->values();
        }

        return view('admin.notifications.index', compact('notifications'));
    }
}
