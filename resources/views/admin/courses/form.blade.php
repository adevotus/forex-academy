<x-layouts.admin :title="$course->exists ? 'Edit Course' : 'New Course'">
    <x-slot name="header">
        <div>
            <a href="{{ route('admin.courses.index') }}"
               class="inline-flex items-center gap-1 text-xs font-semibold text-brand-600 hover:text-brand-700">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                All Courses
            </a>
            <h1 class="mt-2 text-2xl font-extrabold text-slate-900">
                {{ $course->exists ? 'Edit Course' : 'Create New Course' }}
            </h1>
        </div>
        @if($course->exists)
            <a href="{{ route('admin.courses.lessons.create', $course) }}" class="btn-primary !py-2 text-sm">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Add Lesson
            </a>
        @endif
    </x-slot>

    <form method="POST"
          action="{{ $course->exists ? route('admin.courses.update', $course) : route('admin.courses.store') }}"
          enctype="multipart/form-data">
        @csrf
        @if($course->exists) @method('PUT') @endif

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- ── Main details (left 2/3) ── --}}
            <div class="space-y-6 lg:col-span-2">

                {{-- Basic Info --}}
                <div class="card overflow-hidden">
                    <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Course Details</h2>
                    </div>
                    <div class="p-6 space-y-5">
                        <div>
                            <label class="label" for="title">Course Title <span class="text-rose-500">*</span></label>
                            <input id="title" type="text" name="title"
                                   value="{{ old('title', $course->title) }}"
                                   class="input" placeholder="e.g. Forex Fundamentals for Beginners" required>
                            @error('title')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="label" for="description">Description</label>
                            <textarea id="description" name="description" rows="4"
                                      class="input" placeholder="What will students learn in this course?">{{ old('description', $course->description) }}</textarea>
                            @error('description')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="grid grid-cols-2 gap-5">
                            <div>
                                <label class="label" for="level">Level</label>
                                <select id="level" name="level" class="input">
                                    @foreach (['starter','intermediate','advanced','pro'] as $lvl)
                                        <option value="{{ $lvl }}" @selected(old('level', $course->level)===$lvl)>{{ ucfirst($lvl) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="label" for="price">Price (USD)</label>
                                <div class="relative">
                                    <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400 text-sm">$</span>
                                    <input id="price" type="number" step="0.01" min="0" name="price"
                                           value="{{ old('price', $course->price / 100) }}"
                                           class="input pl-7" placeholder="0.00">
                                </div>
                                @error('price')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-5">
                            <div>
                                <label class="label" for="order">Display Order</label>
                                <input id="order" type="number" name="order"
                                       value="{{ old('order', $course->order ?? 0) }}"
                                       class="input" min="0">
                            </div>
                            <div class="flex flex-col justify-end gap-3 pb-1">
                                <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 px-4 py-2.5 hover:bg-slate-50">
                                    <input type="checkbox" name="is_free" value="1"
                                           @checked(old('is_free', $course->is_free))
                                           class="h-4 w-4 rounded border-slate-300 text-brand-500">
                                    <span class="text-sm font-medium text-slate-700">Free course</span>
                                </label>
                                <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 px-4 py-2.5 hover:bg-slate-50">
                                    <input type="checkbox" name="published" value="1"
                                           @checked(old('published', $course->published ?? true))
                                           class="h-4 w-4 rounded border-slate-300 text-brand-500">
                                    <span class="text-sm font-medium text-slate-700">Published (visible to members)</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Cover Image --}}
                <div class="card overflow-hidden">
                    <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Cover Image</h2>
                        <p class="mt-0.5 text-xs text-slate-500">Displayed on course cards. Recommended: 1280×720px (16:9).</p>
                    </div>
                    <div class="p-6">
                        @if($course->exists && $course->cover_image)
                            <div class="mb-4">
                                <img src="{{ asset('storage/'.$course->cover_image) }}"
                                     class="h-40 w-full rounded-xl object-cover ring-1 ring-slate-200" alt="Current cover">
                                <p class="mt-1 text-xs text-slate-400">Current cover image</p>
                            </div>
                        @endif
                        <label class="flex cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-10 text-center transition hover:border-brand-400 hover:bg-brand-50"
                               id="cover-drop-zone">
                            <svg class="h-10 w-10 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <div>
                                <p class="text-sm font-semibold text-slate-700">Click to upload or drag &amp; drop</p>
                                <p class="mt-1 text-xs text-slate-400">PNG, JPG, WEBP — max 4MB</p>
                            </div>
                            <input type="file" name="cover_image" accept="image/*" class="sr-only" id="cover-input">
                        </label>
                        <p id="cover-filename" class="mt-2 hidden text-xs font-medium text-brand-600"></p>
                        @error('cover_image')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                {{-- Promo Video Upload --}}
                <div class="card overflow-hidden">
                    <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Intro / Promo Video</h2>
                        <p class="mt-0.5 text-xs text-slate-500">Optional short MP4 video shown on the course page before purchase. <strong class="text-rose-500">Max 10 MB.</strong></p>
                    </div>
                    <div class="p-6 space-y-4">

                        {{-- Hidden field populated by the uploader --}}
                        <input type="hidden" name="promo_video_path" id="hidden-promo-path"
                               value="{{ old('promo_video_path', $course->promo_video_path ?? '') }}">

                        {{-- Size error banner --}}
                        <div id="promo-size-error" class="hidden items-start gap-3 rounded-xl border border-rose-200 bg-rose-50 p-4">
                            <svg class="mt-0.5 h-5 w-5 flex-shrink-0 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            <div>
                                <p class="text-sm font-semibold text-rose-700">File too large</p>
                                <p class="text-xs text-rose-600 mt-0.5">The selected video exceeds the 10 MB limit. Please compress the video or choose a shorter clip.</p>
                            </div>
                        </div>

                        {{-- Existing uploaded video --}}
                        @php $hasPromo = $course->exists && ($course->promo_video_path ?? false); @endphp
                        @if($hasPromo)
                            <div class="flex items-center gap-3 rounded-xl border border-emerald-100 bg-emerald-50 p-3">
                                <svg class="h-5 w-5 flex-shrink-0 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs font-semibold text-emerald-700">Current promo video</p>
                                    <a href="{{ asset('storage/'.$course->promo_video_path) }}" target="_blank"
                                       class="block truncate text-xs text-emerald-600 hover:underline">{{ basename($course->promo_video_path) }}</a>
                                </div>
                                <a href="{{ asset('storage/'.$course->promo_video_path) }}" target="_blank"
                                   class="flex-shrink-0 rounded-lg border border-emerald-200 px-3 py-1.5 text-[11px] font-bold text-emerald-700 hover:bg-emerald-100 transition">Preview ↗</a>
                            </div>
                        @endif

                        {{-- Drop zone --}}
                        <label id="promo-drop-zone"
                               class="flex cursor-pointer flex-col items-center gap-3 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 p-10 text-center transition hover:border-brand-400 hover:bg-brand-50">

                            <div id="pdz-idle" class="flex flex-col items-center gap-3">
                                <div class="flex h-16 w-16 items-center justify-center rounded-2xl border border-slate-200 bg-white shadow-sm">
                                    <svg class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-700">{{ $hasPromo ? 'Replace promo video' : 'Click to upload promo video' }}</p>
                                    <p class="mt-0.5 text-xs text-slate-400">MP4, MOV, WEBM — <strong class="text-rose-500">max 10 MB</strong></p>
                                </div>
                            </div>

                            <div id="pdz-uploading" class="hidden w-full flex-col items-center gap-3">
                                <p id="pdz-filename" class="truncate max-w-xs text-sm font-semibold text-slate-700"></p>
                                <div class="w-full max-w-sm">
                                    <div class="flex justify-between text-xs text-slate-500 mb-1">
                                        <span id="pdz-progress-text">Uploading…</span>
                                        <span id="pdz-percent">0%</span>
                                    </div>
                                    <div class="h-2 w-full overflow-hidden rounded-full bg-slate-200">
                                        <div id="pdz-bar" class="h-2 rounded-full bg-brand-500 transition-all duration-200" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>

                            <div id="pdz-done" class="hidden flex-col items-center gap-2">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50">
                                    <svg class="h-7 w-7 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <p id="pdz-done-name" class="truncate max-w-xs text-sm font-semibold text-emerald-700"></p>
                                <p class="text-xs text-slate-400">Upload complete — click to replace</p>
                            </div>

                            <input type="file" id="promo-file-input" accept="video/mp4,video/mov,video/webm,video/avi,video/mkv" class="hidden">
                        </label>

                    </div>
                </div>

            </div>

            {{-- ── Right sidebar ── --}}
            <div class="space-y-6">

                {{-- Save panel --}}
                <div class="card p-6 space-y-4">
                    <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Publish</h2>
                    <div id="upload-warning" class="hidden rounded-xl border border-amber-100 bg-amber-50 p-3 text-xs text-amber-700">
                        <strong>Please wait</strong> — video upload in progress.
                    </div>
                    <button type="submit" id="save-btn" class="btn-primary w-full py-2.5">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        {{ $course->exists ? 'Save Changes' : 'Create Course' }}
                    </button>
                    <a href="{{ route('admin.courses.index') }}"
                       class="btn-outline w-full py-2.5 text-center text-sm">Cancel</a>

                    @if($course->exists)
                        <div class="border-t border-slate-100 pt-4">
                            <button type="button"
                                    onclick="if(confirm('Delete this course and all its lessons? This cannot be undone.')) document.getElementById('delete-course-form').submit();"
                                    class="w-full rounded-lg border border-rose-200 bg-rose-50 px-4 py-2 text-xs font-semibold text-rose-700 hover:bg-rose-100 transition">
                                Delete Course
                            </button>
                        </div>
                    @endif
                </div>

                {{-- Lessons list (edit only) --}}
                @if($course->exists)
                    <div class="card overflow-hidden">
                        <div class="border-b border-slate-100 bg-slate-50 px-5 py-4">
                            <div class="flex items-center justify-between">
                                <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Lessons</h2>
                                <a href="{{ route('admin.courses.lessons.create', $course) }}"
                                   class="text-xs font-semibold text-brand-600 hover:text-brand-700">+ Add</a>
                            </div>
                        </div>
                        <div class="divide-y divide-slate-100">
                            @forelse($course->lessons->sortBy('order') as $idx => $lesson)
                                <a href="{{ route('admin.courses.lessons.edit', [$course, $lesson]) }}"
                                   class="flex items-center gap-3 px-5 py-3 hover:bg-slate-50 transition">
                                    <span class="flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-brand-50 text-[10px] font-bold text-brand-600">
                                        {{ $idx + 1 }}
                                    </span>
                                    <span class="flex-1 truncate text-sm text-slate-700">{{ $lesson->title }}</span>
                                    @if($lesson->is_preview)
                                        <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[10px] font-semibold text-emerald-700">Preview</span>
                                    @endif
                                    <svg class="h-3.5 w-3.5 flex-shrink-0 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            @empty
                                <p class="px-5 py-6 text-center text-xs text-slate-400">No lessons yet. Add your first one.</p>
                            @endforelse
                        </div>
                    </div>
                @endif

                {{-- Tips --}}
                <div class="rounded-xl border border-brand-100 bg-brand-50 p-5">
                    <h3 class="text-xs font-extrabold uppercase tracking-wide text-brand-700">Tips</h3>
                    <ul class="mt-3 space-y-2 text-xs text-brand-700">
                        <li class="flex gap-2"><span class="mt-0.5 text-brand-400">•</span> Use a clear 16:9 cover image to attract students.</li>
                        <li class="flex gap-2"><span class="mt-0.5 text-brand-400">•</span> Mark your first lesson as "Free Preview" to boost signups.</li>
                        <li class="flex gap-2"><span class="mt-0.5 text-brand-400">•</span> Add a short promo video to explain what the course covers.</li>
                        <li class="flex gap-2"><span class="mt-0.5 text-brand-400">•</span> Set order numbers to control how courses are listed.</li>
                    </ul>
                </div>

            </div>
        </div>
    </form>

    @if($course->exists)
        <form id="delete-course-form" method="POST" action="{{ route('admin.courses.destroy', $course) }}" class="hidden">
            @csrf @method('DELETE')
        </form>
    @endif

    <script>
    (function () {
        // ── Cover image preview ────────────────────────────────────────────────
        const coverInput    = document.getElementById('cover-input');
        const coverFilename = document.getElementById('cover-filename');
        const coverZone     = document.getElementById('cover-drop-zone');

        if (coverInput) {
            coverInput.addEventListener('change', function () {
                if (this.files[0]) {
                    coverFilename.textContent = '✓ ' + this.files[0].name;
                    coverFilename.classList.remove('hidden');
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        coverZone.style.backgroundImage    = 'url(' + e.target.result + ')';
                        coverZone.style.backgroundSize     = 'cover';
                        coverZone.style.backgroundPosition = 'center';
                        coverZone.querySelector('svg').style.opacity = '0';
                        coverZone.querySelector('div').style.opacity = '0';
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        }

        // ── Promo video chunked uploader ───────────────────────────────────────
        const MAX_BYTES   = 10 * 1024 * 1024;  // 10 MB
        const CHUNK_SIZE  =  5 * 1024 * 1024;  // 5 MB per chunk
        const UPLOAD_URL  = '{{ route('admin.lessons.video.chunk') }}';
        const CSRF        = '{{ csrf_token() }}';

        const fileInput   = document.getElementById('promo-file-input');
        const dropZone    = document.getElementById('promo-drop-zone');
        const idle        = document.getElementById('pdz-idle');
        const uploading   = document.getElementById('pdz-uploading');
        const done        = document.getElementById('pdz-done');
        const sizeError   = document.getElementById('promo-size-error');
        const bar         = document.getElementById('pdz-bar');
        const pctEl       = document.getElementById('pdz-percent');
        const progText    = document.getElementById('pdz-progress-text');
        const fileLabel   = document.getElementById('pdz-filename');
        const doneLabel   = document.getElementById('pdz-done-name');
        const hiddenPath  = document.getElementById('hidden-promo-path');
        const saveBtn     = document.getElementById('save-btn');
        const warnBox     = document.getElementById('upload-warning');

        function setState(s, name) {
            [idle, uploading, done].forEach(el => { el.classList.add('hidden'); el.classList.remove('flex'); });
            if (s === 'idle')      { idle.classList.remove('hidden'); }
            if (s === 'uploading') { uploading.classList.remove('hidden'); uploading.classList.add('flex'); fileLabel.textContent = name || ''; }
            if (s === 'done')      { done.classList.remove('hidden');      done.classList.add('flex');      doneLabel.textContent  = name || ''; }
        }

        function showErr(v) { sizeError.classList.toggle('hidden', !v); sizeError.classList.toggle('flex', v); }

        function lockSave(v) {
            saveBtn.disabled = v;
            saveBtn.classList.toggle('opacity-50', v);
            saveBtn.classList.toggle('cursor-not-allowed', v);
            warnBox.classList.toggle('hidden', !v);
        }

        function uid() { return 'xxxx-xxxx-xxxx'.replace(/x/g, () => (Math.random()*16|0).toString(16)); }

        async function uploadFile(file) {
            if (file.size > MAX_BYTES) { showErr(true); setState('idle'); return; }
            showErr(false);

            const total = Math.ceil(file.size / CHUNK_SIZE);
            const uuid  = uid() + '-' + Date.now();
            setState('uploading', file.name);
            lockSave(true);

            for (let i = 0; i < total; i++) {
                const fd = new FormData();
                fd.append('_token',       CSRF);
                fd.append('file',         file.slice(i * CHUNK_SIZE, (i+1) * CHUNK_SIZE), 'chunk');
                fd.append('uuid',         uuid);
                fd.append('index',        i);
                fd.append('total_chunks', total);
                fd.append('filename',     file.name);
                fd.append('filesize',     file.size);

                let resp, json;
                try   { resp = await fetch(UPLOAD_URL, {method:'POST', body:fd}); json = await resp.json(); }
                catch (e) { alert('Upload error: ' + e.message); setState('idle'); lockSave(false); return; }

                if (!resp.ok) { alert(json.error || json.message || 'Server error'); setState('idle'); lockSave(false); return; }

                const p = Math.round(((i+1)/total)*100);
                bar.style.width = p + '%'; pctEl.textContent = p + '%';
                progText.textContent = 'Uploading ' + (i+1) + ' of ' + total + '…';

                if (json.status === 'complete') { hiddenPath.value = json.video_path; setState('done', file.name); lockSave(false); }
            }
        }

        fileInput.addEventListener('change', e => { if (e.target.files[0]) uploadFile(e.target.files[0]); });
        dropZone.addEventListener('dragover',  e => { e.preventDefault(); dropZone.classList.add('border-brand-400','bg-brand-50'); });
        dropZone.addEventListener('dragleave', () => dropZone.classList.remove('border-brand-400','bg-brand-50'));
        dropZone.addEventListener('drop', e => {
            e.preventDefault(); dropZone.classList.remove('border-brand-400','bg-brand-50');
            const f = e.dataTransfer.files[0];
            if (f && f.type.startsWith('video/')) uploadFile(f);
            else alert('Please drop a video file (MP4, MOV, WEBM).');
        });
    })();
    </script>
</x-layouts.admin>
