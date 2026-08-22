<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\LessonProgress;
use App\Models\Signal;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $courses = Course::where('published', true)->orderBy('order')->get();

        $unlockedCourseIds = $user->unlocks()
            ->where('unlockable_type', Course::class)
            ->pluck('unlockable_id');

        $completedLessons = LessonProgress::where('user_id', $user->id)
            ->where('completed', true)
            ->count();

        $lastProgress = LessonProgress::where('user_id', $user->id)
            ->latest('updated_at')
            ->with('lesson.course')
            ->first();

        $activeRobots = $user->robotSubscriptions()->where('status', 'active')->count();
        $hasSignals = $user->hasActiveSignalSubscription();
        $latestSignal = $hasSignals ? Signal::latest('published_at')->first() : null;
        $badges = $user->badges()->get();

        return view('member.dashboard', compact(
            'user', 'courses', 'unlockedCourseIds', 'completedLessons',
            'lastProgress', 'activeRobots', 'hasSignals', 'latestSignal', 'badges'
        ));
    }
}
