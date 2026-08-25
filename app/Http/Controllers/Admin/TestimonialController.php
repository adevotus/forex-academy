<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::ordered()->paginate(20);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('admin.testimonials.form', ['testimonial' => new Testimonial]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data = $this->handleMedia($request, $data, null);

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial added.');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $data = $this->validated($request);
        $data = $this->handleMedia($request, $data, $testimonial);

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        if ($testimonial->media_path) {
            Storage::disk('public')->delete($testimonial->media_path);
        }
        $testimonial->delete();

        return back()->with('status', 'Testimonial deleted.');
    }

    /** Quick toggle active/inactive via PATCH */
    public function toggle(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update(['is_active' => ! $testimonial->is_active]);

        return back()->with('status', $testimonial->is_active ? 'Testimonial activated.' : 'Testimonial hidden.');
    }

    // ── Helpers ───────────────────────────────────────────────────────────────

    protected function validated(Request $request): array
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'role'     => ['nullable', 'string', 'max:255'],
            'content'  => ['required', 'string'],
            'rating'   => ['nullable', 'integer', 'min:1', 'max:5'],
            'is_active'=> ['nullable', 'boolean'],
            'order'    => ['nullable', 'integer', 'min:0'],
            'media'    => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,mp4,webm,mov', 'max:5120'],
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['order']     = $data['order'] ?? 0;

        // file handled separately
        unset($data['media']);

        return $data;
    }

    protected function handleMedia(Request $request, array $data, ?Testimonial $testimonial): array
    {
        if (! $request->hasFile('media')) {
            return $data;
        }

        // Delete old file
        if ($testimonial?->media_path) {
            Storage::disk('public')->delete($testimonial->media_path);
        }

        $file    = $request->file('media');
        $mime    = $file->getMimeType();
        $isVideo = str_starts_with($mime, 'video/');

        $data['media_path'] = $file->store('testimonials/media', 'public');
        $data['media_type'] = $isVideo ? 'video' : 'image';

        return $data;
    }
}
