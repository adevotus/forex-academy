<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use App\Models\UserLoginSession;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberController extends Controller
{
    public function index(Request $request): View
    {
        $query = User::where('role', 'member')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->q}%")
                  ->orWhere('email', 'like', "%{$request->q}%");
            });
        }

        $members = $query->paginate(15)->withQueryString();

        return view('admin.members.index', compact('members'));
    }

    public function show(User $member): View
    {
        $member->load([
            'payments',
            'unlocks',
            'robotSubscriptions.robot',
            'lessonProgress.lesson.course',
            'mentorshipBookings',
            'loginSessions',
        ]);

        // Courses this member has unlocked (via UserUnlock pivot)
        $unlockedCourseIds = $member->unlocks
            ->where('unlockable_type', Course::class)
            ->pluck('unlockable_id');

        $unlockedCourses = Course::whereIn('id', $unlockedCourseIds)->get()
            ->map(function ($course) use ($member) {
                $unlock = $member->unlocks
                    ->where('unlockable_type', Course::class)
                    ->where('unlockable_id', $course->id)
                    ->first();
                $payment = $member->payments
                    ->where('payable_type', Course::class)
                    ->where('payable_id', $course->id)
                    ->where('status', 'approved')
                    ->first();
                return [
                    'course'  => $course,
                    'unlocked_at' => $unlock?->created_at,
                    'amount'  => $payment?->amountFormatted() ?? $course->priceFormatted(),
                ];
            });

        // Group lesson progress by course
        $courseProgress = $member->lessonProgress
            ->where('completed', true)
            ->groupBy(fn($p) => $p->lesson?->course?->title ?? 'Unknown')
            ->map(fn($group) => $group->count());

        $stats = [
            'total_payments'    => $member->payments->count(),
            'approved_payments' => $member->payments->where('status', 'approved')->count(),
            'total_spent'       => $member->payments->where('status', 'approved')->sum('amount'),
            'lessons_completed' => $member->lessonProgress->where('completed', true)->count(),
            'robots_active'     => $member->robotSubscriptions->where('status', 'active')->count(),
            'sessions_count'    => $member->loginSessions->count(),
        ];

        // Fix total_spent: stored in cents, divide by 100
        $stats['total_spent'] = $stats['total_spent'] / 100;

        return view('admin.members.show', compact('member', 'stats', 'courseProgress', 'unlockedCourses'));
    }

    public function update(Request $request, User $member): RedirectResponse
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'unique:users,email,' . $member->id],
            'phone'   => ['nullable', 'string', 'max:30'],
            'country' => ['nullable', 'string', 'max:100'],
            'status'  => ['required', 'in:pending,approved,suspended'],
        ]);

        if ($validated['status'] === 'approved' && $member->status !== 'approved') {
            $validated['approved_at'] = now();
        }

        $member->update($validated);

        return back()->with('status', "{$member->name}'s profile has been updated.");
    }

    public function approve(User $member): RedirectResponse
    {
        $member->update(['status' => 'approved', 'approved_at' => now()]);

        return back()->with('status', "{$member->name} has been approved.");
    }

    public function suspend(User $member): RedirectResponse
    {
        $member->update(['status' => 'suspended']);

        return back()->with('status', "{$member->name} has been suspended.");
    }

    public function revokeSession(User $member, UserLoginSession $session): RedirectResponse
    {
        abort_if($session->user_id !== $member->id, 403);

        $session->delete();

        return back()->with('status', "Session for IP {$session->ip_address} has been revoked.");
    }

    public function clearSessions(User $member): RedirectResponse
    {
        $member->loginSessions()->delete();

        return back()->with('status', "All login sessions for {$member->name} have been cleared.");
    }
}
