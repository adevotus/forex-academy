<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\LessonProgress;
use App\Models\Signal;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $courses = Course::where('published', true)
            ->with('lessons')
            ->orderBy('order')
            ->get();

        $unlockedCourseIds = $user->unlocks()
            ->where('unlockable_type', Course::class)
            ->pluck('unlockable_id');

        $completedLessons = LessonProgress::where('user_id', $user->id)
            ->where('completed', true)
            ->count();

        // Per-course progress for dashboard
        $allLessonIds = $courses->flatMap(fn($c) => $c->lessons->pluck('id'));
        $completedLessonIds = LessonProgress::where('user_id', $user->id)
            ->where('completed', true)
            ->whereIn('lesson_id', $allLessonIds)
            ->pluck('lesson_id')
            ->flip();

        $courseProgress = $courses->mapWithKeys(function ($course) use ($completedLessonIds, $unlockedCourseIds) {
            $total     = $course->lessons->count();
            $completed = $course->lessons->filter(fn($l) => $completedLessonIds->has($l->id))->count();
            $pct       = $total > 0 ? round(($completed / $total) * 100) : 0;
            return [$course->id => compact('completed', 'total', 'pct')];
        });

        $lastProgress = LessonProgress::where('user_id', $user->id)
            ->latest('updated_at')
            ->with('lesson.course')
            ->first();

        $activeRobots = $user->robotSubscriptions()->where('status', 'active')->count();
        $hasSignals = $user->hasActiveSignalSubscription();
        $latestSignal = $hasSignals ? Signal::latest('published_at')->first() : null;
        $badges = $user->badges()->get();
        $testimonials = Testimonial::active()->ordered()->take(3)->get();

        return view('member.dashboard', compact(
            'user', 'courses', 'unlockedCourseIds', 'completedLessons',
            'lastProgress', 'activeRobots', 'hasSignals', 'latestSignal',
            'badges', 'testimonials', 'courseProgress'
        ));
    }
}
