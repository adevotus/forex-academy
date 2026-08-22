<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Robot;
use App\Models\Signal;
use App\Models\User;
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
        $recentMembers = User::where('role', 'member')->latest()->take(6)->get();

        return view('admin.dashboard', compact('stats', 'recentPayments', 'recentMembers'));
    }
}
