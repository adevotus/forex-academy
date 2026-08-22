<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\MentorshipSession;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MentorshipController extends Controller
{
    public function index(): View
    {
        $sessions = MentorshipSession::where('published', true)->get();
        $bookings = Auth::user()->mentorshipBookings()->with('session')->latest()->get();

        return view('member.mentorship.index', compact('sessions', 'bookings'));
    }

    public function book(Request $request, MentorshipSession $session): RedirectResponse
    {
        $request->validate(['preferred_at' => ['nullable', 'date']]);

        $booking = Auth::user()->mentorshipBookings()->create([
            'mentorship_session_id' => $session->id,
            'preferred_at' => $request->preferred_at,
            'status' => 'pending',
        ]);

        Payment::create([
            'user_id' => Auth::id(),
            'type' => 'mentorship',
            'payable_type' => MentorshipSession::class,
            'payable_id' => $session->id,
            'amount' => $session->price,
            'status' => 'pending',
        ]);

        return back()->with('status', 'Booking request sent! We will confirm once payment is verified.');
    }
}
