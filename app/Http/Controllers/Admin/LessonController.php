<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class LessonController extends Controller
{
    public function create(Course $course): View
    {
        return view('admin.lessons.form', ['course' => $course, 'lesson' => new Lesson]);
    }

    public function store(Request $request, Course $course): RedirectResponse
    {
        $data = $this->validated($request);
        $data = $this->handleUploads($request, $data, null);

        $course->lessons()->create($data);

        return redirect()->route('admin.courses.edit', $course)->with('status', 'Lesson added.');
    }

    public function edit(Course $course, Lesson $lesson): View
    {
        $lesson->load('quiz.questions.options');

        return view('admin.lessons.form', compact('course', 'lesson'));
    }

    public function update(Request $request, Course $course, Lesson $lesson): RedirectResponse
    {
        $data = $this->validated($request);
        $data = $this->handleUploads($request, $data, $lesson);

        $lesson->update($data);

        return redirect()->route('admin.courses.edit', $course)->with('status', 'Lesson updated.');
    }

    public function destroy(Course $course, Lesson $lesson): RedirectResponse
    {
        // Clean up stored files
        if ($lesson->thumbnail) Storage::disk('public')->delete($lesson->thumbnail);
        if ($lesson->video_path) Storage::disk('public')->delete($lesson->video_path);

        $lesson->delete();

        return back()->with('status', 'Lesson removed.');
    }

    // ─── Video chunk upload endpoint ───────────────────────────────────────────

    /**
     * Receive one chunk of a video upload.
     *
     * Expects multipart fields:
     *   file        – the chunk blob
     *   uuid        – a unique ID for this upload session (generated client-side)
     *   index       – 0-based chunk number
     *   total_chunks – total number of chunks
     *   filename    – original filename
     */
    public function uploadVideoChunk(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'file'         => ['required', 'file'],
            'uuid'         => ['required', 'string', 'max:64'],
            'index'        => ['required', 'integer', 'min:0'],
            'total_chunks' => ['required', 'integer', 'min:1'],
            'filename'     => ['required', 'string', 'max:255'],
        ]);

        $uuid        = preg_replace('/[^a-zA-Z0-9\-]/', '', $request->input('uuid'));
        $index       = (int) $request->input('index');
        $totalChunks = (int) $request->input('total_chunks');
        $chunkDir    = storage_path("app/video_chunks/{$uuid}");

        if (! is_dir($chunkDir)) {
            mkdir($chunkDir, 0755, true);
        }

        // Save this chunk
        $request->file('file')->move($chunkDir, "chunk_{$index}");

        // Check if all chunks arrived
        $arrived = count(glob("{$chunkDir}/chunk_*"));

        if ($arrived < $totalChunks) {
            return response()->json(['status' => 'chunk_saved', 'received' => $arrived, 'total' => $totalChunks]);
        }

        // ── All chunks received — merge into final file ──
        $ext      = strtolower(pathinfo($request->input('filename'), PATHINFO_EXTENSION));
        $allowed  = ['mp4', 'mov', 'avi', 'webm', 'mkv'];
        if (! in_array($ext, $allowed)) {
            return response()->json(['error' => 'File type not allowed.'], 422);
        }

        $finalDir  = storage_path('app/public/videos');
        if (! is_dir($finalDir)) mkdir($finalDir, 0755, true);

        $finalName = $uuid . '.' . $ext;
        $finalPath = $finalDir . '/' . $finalName;
        $out       = fopen($finalPath, 'wb');

        for ($i = 0; $i < $totalChunks; $i++) {
            $chunk = fopen("{$chunkDir}/chunk_{$i}", 'rb');
            stream_copy_to_stream($chunk, $out);
            fclose($chunk);
        }
        fclose($out);

        // Clean up chunks
        array_map('unlink', glob("{$chunkDir}/chunk_*"));
        rmdir($chunkDir);

        return response()->json([
            'status'     => 'complete',
            'video_path' => 'videos/' . $finalName,           // relative to storage/public
            'video_url'  => asset('storage/videos/' . $finalName),
        ]);
    }

    // ─── Helpers ───────────────────────────────────────────────────────────────

    protected function handleUploads(Request $request, array $data, ?Lesson $lesson): array
    {
        // Thumbnail image
        if ($request->hasFile('thumbnail')) {
            if ($lesson?->thumbnail) Storage::disk('public')->delete($lesson->thumbnail);
            $data['thumbnail'] = $request->file('thumbnail')->store('lessons/thumbnails', 'public');
        }

        // video_path populated by the chunk uploader (stored as hidden field after upload)
        if ($request->filled('video_path')) {
            // Verify the file exists in our storage
            if (Storage::disk('public')->exists($request->input('video_path'))) {
                if ($lesson?->video_path && $lesson->video_path !== $request->input('video_path')) {
                    Storage::disk('public')->delete($lesson->video_path);
                }
                $data['video_path'] = $request->input('video_path');
                $data['video_url']  = null; // clear the URL if uploading a file
            }
        }

        // If a URL was typed, clear any uploaded video_path
        if ($request->filled('video_url')) {
            $data['video_url']  = $request->input('video_url');
            $data['video_path'] = null;
        }

        return $data;
    }

    protected function validated(Request $request): array
    {
        $data = $request->validate([
            'title'            => ['required', 'string', 'max:255'],
            'description'      => ['nullable', 'string'],
            'content'          => ['nullable', 'string'],
            'video_url'        => ['nullable', 'url', 'max:500'],
            'video_path'       => ['nullable', 'string', 'max:500'],
            'thumbnail'        => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'duration_minutes' => ['nullable', 'integer', 'min:1'],
            'order'            => ['nullable', 'integer'],
            'is_preview'       => ['nullable', 'boolean'],
        ]);

        $data['is_preview']       = $request->boolean('is_preview');
        $data['duration_minutes'] = $data['duration_minutes'] ?? 10;
        $data['order']            = $data['order'] ?? 0;

        // Remove file from data — handled in handleUploads()
        unset($data['thumbnail']);

        return $data;
    }
}
