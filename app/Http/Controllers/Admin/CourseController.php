<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::withCount('lessons')->orderBy('order')->get();

        return view('admin.courses.index', compact('courses'));
    }

    public function create(): View
    {
        return view('admin.courses.form', ['course' => new Course]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(5);

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')
                ->store('courses/covers', 'public');
        }

        Course::create($data);

        return redirect()->route('admin.courses.index')->with('status', 'Course created.');
    }

    public function edit(Course $course): View
    {
        return view('admin.courses.form', compact('course'));
    }

    public function update(Request $request, Course $course): RedirectResponse
    {
        $data = $this->validated($request);

        // Handle cover image upload — delete old one if replaced
        if ($request->hasFile('cover_image')) {
            if ($course->cover_image) {
                Storage::disk('public')->delete($course->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')
                ->store('courses/covers', 'public');
        }

        $course->update($data);

        return redirect()->route('admin.courses.index')->with('status', 'Course updated.');
    }

    public function destroy(Course $course): RedirectResponse
    {
        if ($course->cover_image) {
            Storage::disk('public')->delete($course->cover_image);
        }
        $course->delete();

        return back()->with('status', 'Course deleted.');
    }

    protected function validated(Request $request): array
    {
        $data = $request->validate([
            'title'           => ['required', 'string', 'max:255'],
            'description'     => ['nullable', 'string'],
            'level'           => ['required', 'in:starter,intermediate,advanced,pro'],
            'price'           => ['required', 'numeric', 'min:0'],
            'is_free'         => ['nullable', 'boolean'],
            'published'       => ['nullable', 'boolean'],
            'order'           => ['nullable', 'integer'],
            'cover_image'     => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'promo_video_url' => ['nullable', 'url', 'max:500'],
        ]);

        $data['price']           = (int) round(($data['price'] ?? 0) * 100);
        $data['is_free']         = $request->boolean('is_free');
        $data['published']       = $request->boolean('published');
        $data['order']           = $data['order'] ?? 0;
        $data['promo_video_url'] = $request->input('promo_video_url') ?: null;

        // Remove file from $data — handled separately in store/update
        unset($data['cover_image']);

        return $data;
    }
}
