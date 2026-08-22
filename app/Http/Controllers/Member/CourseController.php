<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonProgress;
use App\Models\Payment;
use App\Models\QuizAttempt;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::where('published', true)->orderBy('order')->get()->groupBy('level');

        return view('member.courses.index', compact('courses'));
    }

    public function show(Course $course): View
    {
        $user = Auth::user();
        $course->load(['lessons' => fn ($q) => $q->orderBy('order'), 'cheatSheets']);

        $progress = LessonProgress::where('user_id', $user->id)
            ->whereIn('lesson_id', $course->lessons->pluck('id'))
            ->where('completed', true)
            ->pluck('lesson_id');

        $unlocked = $course->isUnlockedFor($user);

        return view('member.courses.show', compact('course', 'progress', 'unlocked'));
    }

    public function lesson(Course $course, Lesson $lesson): View|RedirectResponse
    {
        $user = Auth::user();

        if (! $lesson->isUnlockedFor($user)) {
            return redirect()->route('member.courses.show', $course)
                ->with('info', 'Unlock this course to watch this lesson.');
        }

        $lesson->load('quiz.questions.options');
        $course->load(['lessons' => fn ($q) => $q->orderBy('order')]);

        $completedLessonIds = LessonProgress::where('user_id', $user->id)
            ->where('completed', true)
            ->pluck('lesson_id');

        return view('member.courses.lesson', compact('course', 'lesson', 'completedLessonIds'));
    }

    public function complete(Course $course, Lesson $lesson): RedirectResponse
    {
        $user = Auth::user();

        LessonProgress::updateOrCreate(
            ['user_id' => $user->id, 'lesson_id' => $lesson->id],
            ['completed' => true, 'completed_at' => now()]
        );

        return back()->with('status', 'Lesson marked as complete. Nice work!');
    }

    public function submitQuiz(Request $request, Course $course, Lesson $lesson): RedirectResponse
    {
        $lesson->load('quiz.questions.options');
        $quiz = $lesson->quiz;

        if (! $quiz) {
            return back();
        }

        $answers = $request->input('answers', []); // [question_id => option_id]
        $total = $quiz->questions->count();
        $score = 0;

        foreach ($quiz->questions as $question) {
            $selected = $answers[$question->id] ?? null;
            $correct = $question->options->firstWhere('is_correct', true);

            if ($selected && $correct && (int) $selected === $correct->id) {
                $score++;
            }
        }

        $passed = $total > 0 && $score / $total >= 0.6;

        QuizAttempt::create([
            'user_id' => Auth::id(),
            'quiz_id' => $quiz->id,
            'score' => $score,
            'total' => $total,
            'passed' => $passed,
        ]);

        return back()->with('quiz_result', ['score' => $score, 'total' => $total, 'passed' => $passed]);
    }

    public function requestUnlock(Course $course): RedirectResponse
    {
        $existing = Payment::where('user_id', Auth::id())
            ->where('type', 'course')
            ->where('payable_type', Course::class)
            ->where('payable_id', $course->id)
            ->where('status', 'pending')
            ->exists();

        if (! $existing) {
            Payment::create([
                'user_id' => Auth::id(),
                'type' => 'course',
                'payable_type' => Course::class,
                'payable_id' => $course->id,
                'amount' => $course->price,
                'status' => 'pending',
            ]);
        }

        return back()->with('status', 'Unlock request sent! The Academy admin will confirm your payment shortly.');
    }
}
