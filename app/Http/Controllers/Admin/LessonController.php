<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LessonController extends Controller
{
    public function create(Course $course): View
    {
        return view('admin.lessons.form', ['course' => $course, 'lesson' => new Lesson]);
    }

    public function store(Request $request, Course $course): RedirectResponse
    {
        $course->lessons()->create($this->validated($request));

        return redirect()->route('admin.courses.edit', $course)->with('status', 'Lesson added.');
    }

    public function edit(Course $course, Lesson $lesson): View
    {
        $lesson->load('quiz.questions.options');

        return view('admin.lessons.form', compact('course', 'lesson'));
    }

    public function update(Request $request, Course $course, Lesson $lesson): RedirectResponse
    {
        $lesson->update($this->validated($request));

        return redirect()->route('admin.courses.edit', $course)->with('status', 'Lesson updated.');
    }

    public function destroy(Course $course, Lesson $lesson): RedirectResponse
    {
        $lesson->delete();

        return back()->with('status', 'Lesson removed.');
    }

    protected function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'video_url' => ['nullable', 'string', 'max:500'],
            'duration_minutes' => ['nullable', 'integer', 'min:1'],
            'order' => ['nullable', 'integer'],
            'is_preview' => ['nullable', 'boolean'],
        ]);

        $data['is_preview'] = $request->boolean('is_preview');
        $data['duration_minutes'] = $data['duration_minutes'] ?? 10;
        $data['order'] = $data['order'] ?? 0;

        return $data;
    }
}
