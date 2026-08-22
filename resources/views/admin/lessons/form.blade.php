<x-layouts.admin :title="$lesson->exists ? 'Edit Lesson' : 'New Lesson'">
    <x-slot name="header">
        <div>
            <a href="{{ route('admin.courses.edit', $course) }}"
               class="inline-flex items-center gap-1 text-xs font-semibold text-brand-600 hover:text-brand-700">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                {{ $course->title }}
            </a>
            <h1 class="mt-2 text-2xl font-extrabold text-slate-900">
                {{ $lesson->exists ? 'Edit Lesson' : 'Add New Lesson' }}
            </h1>
        </div>
        @if($lesson->exists)
            <form method="POST" action="{{ route('admin.courses.lessons.destroy', [$course, $lesson]) }}"
                  onsubmit="return confirm('Delete this lesson? This cannot be undone.')">
                @csrf @method('DELETE')
                <button class="rounded-lg border border-rose-200 bg-rose-50 px-4 py-2 text-xs font-semibold text-rose-700 hover:bg-rose-100 transition">
                    Delete Lesson
                </button>
            </form>
        @endif
    </x-slot>

    <form method="POST"
          action="{{ $lesson->exists
              ? route('admin.courses.lessons.update', [$course, $lesson])
              : route('admin.courses.lessons.store', $course) }}"
          enctype="multipart/form-data">
        @csrf
        @if($lesson->exists) @method('PUT') @endif

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- ── Main content (left 2/3) ── --}}
            <div class="space-y-6 lg:col-span-2">

                {{-- Lesson Info --}}
                <div class="card overflow-hidden">
                    <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Lesson Details</h2>
                    </div>
                    <div class="p-6 space-y-5">
                        <div>
                            <label class="label" for="title">Lesson Title <span class="text-rose-500">*</span></label>
                            <input id="title" type="text" name="title"
                                   value="{{ old('title', $lesson->title) }}"
                                   class="input" placeholder="e.g. Understanding Candlestick Patterns" required>
                            @error('title')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="label" for="description">Description / Summary</label>
                            <textarea id="description" name="description" rows="3"
                                      class="input" placeholder="Brief summary of what this lesson covers…">{{ old('description', $lesson->description) }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-5">
                            <div>
                                <label class="label" for="duration_minutes">Duration (minutes)</label>
                                <input id="duration_minutes" type="number" name="duration_minutes"
                                       value="{{ old('duration_minutes', $lesson->duration_minutes) }}"
                                       class="input" min="0" placeholder="30">
                            </div>
                            <div>
                                <label class="label" for="order">Lesson Order</label>
                                <input id="order" type="number" name="order"
                                       value="{{ old('order', $lesson->order ?? 0) }}"
                                       class="input" min="0">
                            </div>
                        </div>

                        <div class="flex flex-col gap-3 sm:flex-row sm:gap-6">
                            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 px-4 py-3 hover:bg-slate-50 flex-1">
                                <input type="checkbox" name="is_preview" value="1"
                                       @checked(old('is_preview', $lesson->is_preview))
                                       class="h-4 w-4 rounded border-slate-300 text-brand-500">
                                <div>
                                    <p class="text-sm font-semibold text-slate-700">Free Preview</p>
                                    <p class="text-xs text-slate-400">Watchable before course unlock</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Video --}}
                <div class="card overflow-hidden">
                    <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Lesson Video</h2>
                        <p class="mt-0.5 text-xs text-slate-500">Paste a YouTube / Vimeo URL, or a direct MP4 link.</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <label class="label" for="video_url">Video URL</label>
                            <div class="relative">
                                <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
                                </span>
                                <input id="video_url" type="url" name="video_url"
                                       value="{{ old('video_url', $lesson->video_url) }}"
                                       class="input pl-10" placeholder="https://youtube.com/watch?v=...">
                            </div>
                            @error('video_url')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                        </div>

                        @if($lesson->exists && $lesson->video_url)
                            <div class="flex items-center gap-3 rounded-xl border border-brand-100 bg-brand-50 p-3">
                                <svg class="h-5 w-5 flex-shrink-0 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs font-medium text-brand-700">Current video</p>
                                    <a href="{{ $lesson->video_url }}" target="_blank"
                                       class="truncate block text-xs text-brand-600 hover:underline">{{ $lesson->video_url }}</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Thumbnail --}}
                <div class="card overflow-hidden">
                    <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Lesson Thumbnail</h2>
                        <p class="mt-0.5 text-xs text-slate-500">Optional. Shown in the lesson list. Recommended 16:9.</p>
                    </div>
                    <div class="p-6">
                        @if($lesson->exists && ($lesson->thumbnail ?? false))
                            <div class="mb-4">
                                <img src="{{ asset('storage/'.$lesson->thumbnail) }}"
                                     class="h-32 w-full rounded-xl object-cover ring-1 ring-slate-200" alt="">
                                <p class="mt-1 text-xs text-slate-400">Current thumbnail</p>
                            </div>
                        @endif
                        <label class="flex cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-8 text-center transition hover:border-brand-400 hover:bg-brand-50">
                            <svg class="h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <div>
                                <p class="text-sm font-semibold text-slate-700">Click to upload thumbnail</p>
                                <p class="mt-0.5 text-xs text-slate-400">PNG, JPG — max 2MB</p>
                            </div>
                            <input type="file" name="thumbnail" accept="image/*" class="sr-only" id="thumb-input">
                        </label>
                        <p id="thumb-filename" class="mt-2 hidden text-xs font-medium text-brand-600"></p>
                    </div>
                </div>

                {{-- Quiz / Content Notes --}}
                <div class="card overflow-hidden">
                    <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Lesson Notes</h2>
                        <p class="mt-0.5 text-xs text-slate-500">Additional text shown below the video (supports basic markdown).</p>
                    </div>
                    <div class="p-6">
                        <textarea name="content" rows="6"
                                  class="input font-mono text-sm"
                                  placeholder="## Key Takeaways&#10;&#10;- Point one&#10;- Point two">{{ old('content', $lesson->content ?? '') }}</textarea>
                    </div>
                </div>

            </div>

            {{-- ── Right sidebar ── --}}
            <div class="space-y-6">

                {{-- Save panel --}}
                <div class="card p-6 space-y-3">
                    <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Save</h2>
                    <button type="submit" class="btn-primary w-full py-2.5">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        {{ $lesson->exists ? 'Save Changes' : 'Add Lesson' }}
                    </button>
                    <a href="{{ route('admin.courses.edit', $course) }}"
                       class="btn-outline w-full py-2.5 text-center text-sm">Cancel</a>
                </div>

                {{-- Course context --}}
                <div class="card p-5">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500 mb-3">Course</p>
                    <div class="flex items-start gap-3">
                        @if($course->cover_image)
                            <img src="{{ asset('storage/'.$course->cover_image) }}"
                                 class="h-12 w-16 flex-shrink-0 rounded-lg object-cover" alt="">
                        @else
                            <div class="flex h-12 w-16 flex-shrink-0 items-center justify-center rounded-lg bg-brand-50 text-brand-300">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            </div>
                        @endif
                        <div>
                            <p class="text-sm font-semibold text-slate-900">{{ $course->title }}</p>
                            <span class="badge badge-level-{{ $course->level }} mt-1 py-0 text-[10px]">{{ ucfirst($course->level) }}</span>
                        </div>
                    </div>
                    <div class="mt-3 border-t border-slate-100 pt-3">
                        <p class="text-xs text-slate-500">{{ $course->lessons->count() }} lesson(s) in this course</p>
                    </div>
                </div>

                {{-- Tips --}}
                <div class="rounded-xl border border-gold-100 bg-gold-50 p-5">
                    <h3 class="text-xs font-extrabold uppercase tracking-wide text-gold-700">Tips</h3>
                    <ul class="mt-3 space-y-2 text-xs text-gold-700">
                        <li class="flex gap-2"><span class="mt-0.5 text-gold-400">•</span> Mark lesson 1 as "Free Preview" to attract students.</li>
                        <li class="flex gap-2"><span class="mt-0.5 text-gold-400">•</span> Keep videos under 20 minutes for better completion rates.</li>
                        <li class="flex gap-2"><span class="mt-0.5 text-gold-400">•</span> Add notes with key takeaways below each video.</li>
                    </ul>
                </div>

            </div>
        </div>
    </form>

    <script>
        // Thumbnail preview
        const thumbInput    = document.getElementById('thumb-input');
        const thumbFilename = document.getElementById('thumb-filename');
        if (thumbInput) {
            thumbInput.addEventListener('change', function () {
                if (this.files[0]) {
                    thumbFilename.textContent = '✓ ' + this.files[0].name;
                    thumbFilename.classList.remove('hidden');
                }
            });
        }
    </script>
</x-layouts.admin>
