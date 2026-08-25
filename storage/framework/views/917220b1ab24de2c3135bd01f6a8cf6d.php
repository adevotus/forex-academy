<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => $lesson->exists ? 'Edit Lesson' : 'New Lesson']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($lesson->exists ? 'Edit Lesson' : 'New Lesson')]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <a href="<?php echo e(route('admin.courses.edit', $course)); ?>"
               class="inline-flex items-center gap-1 text-xs font-semibold text-brand-600 hover:text-brand-700">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                <?php echo e($course->title); ?>

            </a>
            <h1 class="mt-2 text-2xl font-extrabold text-slate-900">
                <?php echo e($lesson->exists ? 'Edit Lesson' : 'Add New Lesson'); ?>

            </h1>
        </div>
        <?php if($lesson->exists): ?>
            <form method="POST" action="<?php echo e(route('admin.courses.lessons.destroy', [$course, $lesson])); ?>"
                  onsubmit="return confirm('Delete this lesson? This cannot be undone.')">
                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button class="rounded-lg border border-rose-200 bg-rose-50 px-4 py-2 text-xs font-semibold text-rose-700 hover:bg-rose-100 transition">
                    Delete Lesson
                </button>
            </form>
        <?php endif; ?>
     <?php $__env->endSlot(); ?>

    <form method="POST"
          id="lesson-form"
          action="<?php echo e($lesson->exists
              ? route('admin.courses.lessons.update', [$course, $lesson])
              : route('admin.courses.lessons.store', $course)); ?>"
          enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php if($lesson->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

        
        <input type="hidden" name="video_path" id="hidden-video-path" value="<?php echo e(old('video_path', $lesson->video_path ?? '')); ?>">

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            
            <div class="space-y-6 lg:col-span-2">

                
                <div class="card overflow-hidden">
                    <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Lesson Details</h2>
                    </div>
                    <div class="p-6 space-y-5">
                        <div>
                            <label class="label" for="title">Lesson Title <span class="text-rose-500">*</span></label>
                            <input id="title" type="text" name="title"
                                   value="<?php echo e(old('title', $lesson->title)); ?>"
                                   class="input" placeholder="e.g. Understanding Candlestick Patterns" required>
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-rose-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label class="label" for="description">Description / Summary</label>
                            <textarea id="description" name="description" rows="3"
                                      class="input" placeholder="Brief summary of what this lesson covers…"><?php echo e(old('description', $lesson->description)); ?></textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-5">
                            <div>
                                <label class="label" for="duration_minutes">Duration (minutes)</label>
                                <input id="duration_minutes" type="number" name="duration_minutes"
                                       value="<?php echo e(old('duration_minutes', $lesson->duration_minutes)); ?>"
                                       class="input" min="0" placeholder="30">
                            </div>
                            <div>
                                <label class="label" for="order">Lesson Order</label>
                                <input id="order" type="number" name="order"
                                       value="<?php echo e(old('order', $lesson->order ?? 0)); ?>"
                                       class="input" min="0">
                            </div>
                        </div>

                        <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 px-4 py-3 hover:bg-slate-50">
                            <input type="checkbox" name="is_preview" value="1"
                                   <?php if(old('is_preview', $lesson->is_preview)): echo 'checked'; endif; ?>
                                   class="h-4 w-4 rounded border-slate-300 text-brand-500">
                            <div>
                                <p class="text-sm font-semibold text-slate-700">Free Preview</p>
                                <p class="text-xs text-slate-400">Watchable before course unlock</p>
                            </div>
                        </label>
                    </div>
                </div>

                
                <div class="card overflow-hidden">
                    <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Lesson Video</h2>
                        <p class="mt-0.5 text-xs text-slate-500">Upload a video file directly, or paste a YouTube / Vimeo link.</p>
                    </div>
                    <div class="p-6 space-y-5">

                        
                        <div class="flex gap-1 rounded-xl bg-slate-100 p-1">
                            <button type="button" id="tab-upload"
                                    class="video-tab flex-1 rounded-lg py-2 text-xs font-bold transition">
                                ⬆ Upload File
                            </button>
                            <button type="button" id="tab-url"
                                    class="video-tab flex-1 rounded-lg py-2 text-xs font-bold transition">
                                🔗 Paste URL
                            </button>
                        </div>

                        
                        <div id="panel-upload">

                            
                            <?php $hasVideo = $lesson->exists && ($lesson->video_path ?? false); ?>
                            <?php if($hasVideo): ?>
                                <div class="mb-4 flex items-center gap-3 rounded-xl border border-emerald-100 bg-emerald-50 p-3">
                                    <svg class="h-5 w-5 flex-shrink-0 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs font-semibold text-emerald-700">Current video</p>
                                        <a href="<?php echo e(asset('storage/'.$lesson->video_path)); ?>" target="_blank"
                                           class="block truncate text-xs text-emerald-600 hover:underline">
                                            <?php echo e(basename($lesson->video_path)); ?>

                                        </a>
                                    </div>
                                    <a href="<?php echo e(asset('storage/'.$lesson->video_path)); ?>" target="_blank"
                                       class="flex-shrink-0 rounded-lg border border-emerald-200 px-3 py-1.5 text-[11px] font-bold text-emerald-700 hover:bg-emerald-100 transition">
                                        Preview ↗
                                    </a>
                                </div>
                            <?php endif; ?>

                            
                            <label id="video-drop-zone"
                                   class="flex cursor-pointer flex-col items-center gap-3 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 p-10 text-center transition hover:border-brand-400 hover:bg-brand-50">

                                <div id="vdz-idle" class="flex flex-col items-center gap-3">
                                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl border border-slate-200 bg-white shadow-sm">
                                        <svg class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-700"><?php echo e($hasVideo ? 'Replace video' : 'Click to upload video'); ?></p>
                                        <p class="mt-0.5 text-xs text-slate-400">MP4, MOV, AVI, WEBM, MKV — no size limit</p>
                                    </div>
                                </div>

                                
                                <div id="vdz-uploading" class="hidden w-full flex-col items-center gap-3">
                                    <p id="vdz-filename" class="text-sm font-semibold text-slate-700 truncate max-w-xs"></p>
                                    <div class="w-full max-w-sm">
                                        <div class="flex justify-between text-xs text-slate-500 mb-1">
                                            <span id="vdz-progress-text">Uploading…</span>
                                            <span id="vdz-percent">0%</span>
                                        </div>
                                        <div class="h-2 w-full overflow-hidden rounded-full bg-slate-200">
                                            <div id="vdz-bar" class="h-2 rounded-full bg-brand-500 transition-all duration-200" style="width:0%"></div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div id="vdz-done" class="hidden flex-col items-center gap-2">
                                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50">
                                        <svg class="h-7 w-7 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>
                                    <p id="vdz-done-name" class="text-sm font-semibold text-emerald-700 truncate max-w-xs"></p>
                                    <p class="text-xs text-slate-400">Upload complete — click to replace</p>
                                </div>

                                <input type="file" id="video-file-input" accept="video/*" class="hidden">
                            </label>
                        </div>

                        
                        <div id="panel-url" class="hidden">
                            <label class="label" for="video_url">Video URL</label>
                            <div class="relative">
                                <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
                                </span>
                                <input id="video_url" type="url" name="video_url"
                                       value="<?php echo e(old('video_url', $lesson->video_url ?? '')); ?>"
                                       class="input pl-10" placeholder="https://youtube.com/watch?v=...">
                            </div>
                            <?php if($lesson->exists && ($lesson->video_url ?? false)): ?>
                                <div class="mt-3 flex items-center gap-3 rounded-xl border border-brand-100 bg-brand-50 p-3">
                                    <svg class="h-4 w-4 flex-shrink-0 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
                                    <a href="<?php echo e($lesson->video_url); ?>" target="_blank"
                                       class="truncate text-xs font-medium text-brand-600 hover:underline"><?php echo e($lesson->video_url); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                
                <div class="card overflow-hidden">
                    <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Lesson Thumbnail</h2>
                        <p class="mt-0.5 text-xs text-slate-500">Optional. Shown in the lesson list. Recommended 16:9.</p>
                    </div>
                    <div class="p-6">
                        <?php if($lesson->exists && ($lesson->thumbnail ?? false)): ?>
                            <div class="mb-4">
                                <img src="<?php echo e(asset('storage/'.$lesson->thumbnail)); ?>"
                                     class="h-32 w-full rounded-xl object-cover ring-1 ring-slate-200" alt="">
                                <p class="mt-1 text-xs text-slate-400">Current thumbnail</p>
                            </div>
                        <?php endif; ?>
                        <label class="flex cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-8 text-center transition hover:border-brand-400 hover:bg-brand-50">
                            <svg class="h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <div>
                                <p class="text-sm font-semibold text-slate-700">Click to upload thumbnail</p>
                                <p class="mt-0.5 text-xs text-slate-400">PNG, JPG — max 2MB</p>
                            </div>
                            <input type="file" name="thumbnail" accept="image/*" class="sr-only" id="thumb-input">
                        </label>
                        <p id="thumb-filename" class="mt-2 hidden text-xs font-medium text-brand-600"></p>
                        <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-rose-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                
                <div class="card overflow-hidden">
                    <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Lesson Notes</h2>
                        <p class="mt-0.5 text-xs text-slate-500">Additional text shown below the video (supports basic markdown).</p>
                    </div>
                    <div class="p-6">
                        <textarea name="content" rows="6"
                                  class="input font-mono text-sm"
                                  placeholder="## Key Takeaways&#10;&#10;- Point one&#10;- Point two"><?php echo e(old('content', $lesson->content ?? '')); ?></textarea>
                    </div>
                </div>

            </div>

            
            <div class="space-y-6">

                
                <div class="card p-6 space-y-3">
                    <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Save</h2>
                    <button type="submit" id="save-btn" class="btn-primary w-full py-2.5">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        <?php echo e($lesson->exists ? 'Save Changes' : 'Add Lesson'); ?>

                    </button>
                    <a href="<?php echo e(route('admin.courses.edit', $course)); ?>"
                       class="btn-outline w-full py-2.5 text-center text-sm">Cancel</a>

                    
                    <div id="upload-warning" class="hidden rounded-xl border border-amber-100 bg-amber-50 p-3 text-xs text-amber-700">
                        <strong>Please wait</strong> — video upload in progress. The save button will re-enable when complete.
                    </div>
                </div>

                
                <div class="card p-5">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500 mb-3">Course</p>
                    <div class="flex items-start gap-3">
                        <?php if($course->cover_image): ?>
                            <img src="<?php echo e(asset('storage/'.$course->cover_image)); ?>"
                                 class="h-12 w-16 flex-shrink-0 rounded-lg object-cover" alt="">
                        <?php else: ?>
                            <div class="flex h-12 w-16 flex-shrink-0 items-center justify-center rounded-lg bg-brand-50 text-brand-300">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            </div>
                        <?php endif; ?>
                        <div>
                            <p class="text-sm font-semibold text-slate-900"><?php echo e($course->title); ?></p>
                            <span class="badge badge-level-<?php echo e($course->level); ?> mt-1 py-0 text-[10px]"><?php echo e(ucfirst($course->level)); ?></span>
                        </div>
                    </div>
                    <div class="mt-3 border-t border-slate-100 pt-3">
                        <p class="text-xs text-slate-500"><?php echo e($course->lessons->count()); ?> lesson(s) in this course</p>
                    </div>
                </div>

                
                <div class="rounded-xl border border-gold-100 bg-gold-50 p-5">
                    <h3 class="text-xs font-extrabold uppercase tracking-wide text-gold-700">Tips</h3>
                    <ul class="mt-3 space-y-2 text-xs text-gold-700">
                        <li class="flex gap-2"><span class="mt-0.5 text-gold-400">•</span> Mark lesson 1 as "Free Preview" to attract students.</li>
                        <li class="flex gap-2"><span class="mt-0.5 text-gold-400">•</span> Keep videos under 20 minutes for better completion rates.</li>
                        <li class="flex gap-2"><span class="mt-0.5 text-gold-400">•</span> Add notes with key takeaways below each video.</li>
                        <li class="flex gap-2"><span class="mt-0.5 text-gold-400">•</span> Large videos upload in chunks — stay on the page until done.</li>
                    </ul>
                </div>

            </div>
        </div>
    </form>

    <script>
    (function () {
        // ── Tab switcher ─────────────────────────────────────────────────────
        const tabUpload  = document.getElementById('tab-upload');
        const tabUrl     = document.getElementById('tab-url');
        const panelUp    = document.getElementById('panel-upload');
        const panelUrl   = document.getElementById('panel-url');

        // Decide initial active tab
        const hasVideoPath = '<?php echo e($lesson->video_path ?? ''); ?>' !== '';
        const hasVideoUrl  = '<?php echo e($lesson->video_url  ?? ''); ?>' !== '';
        let activeTab = hasVideoUrl && !hasVideoPath ? 'url' : 'upload';

        function setTab(t) {
            activeTab = t;
            tabUpload.classList.toggle('bg-white', t === 'upload');
            tabUpload.classList.toggle('shadow-sm', t === 'upload');
            tabUpload.classList.toggle('text-slate-900', t === 'upload');
            tabUpload.classList.toggle('text-slate-500', t !== 'upload');

            tabUrl.classList.toggle('bg-white', t === 'url');
            tabUrl.classList.toggle('shadow-sm', t === 'url');
            tabUrl.classList.toggle('text-slate-900', t === 'url');
            tabUrl.classList.toggle('text-slate-500', t !== 'url');

            panelUp.classList.toggle('hidden', t !== 'upload');
            panelUrl.classList.toggle('hidden', t !== 'url');
        }
        tabUpload.addEventListener('click', () => setTab('upload'));
        tabUrl.addEventListener('click',    () => setTab('url'));
        setTab(activeTab);

        // ── Thumbnail preview ─────────────────────────────────────────────────
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

        // ── Chunked video uploader ────────────────────────────────────────────
        const CHUNK_SIZE    = 5 * 1024 * 1024; // 5 MB per chunk
        const UPLOAD_URL    = '<?php echo e(route('admin.lessons.video.chunk')); ?>';
        const CSRF_TOKEN    = '<?php echo e(csrf_token()); ?>';

        const fileInput     = document.getElementById('video-file-input');
        const dropZone      = document.getElementById('video-drop-zone');
        const idle          = document.getElementById('vdz-idle');
        const uploading     = document.getElementById('vdz-uploading');
        const done          = document.getElementById('vdz-done');
        const bar           = document.getElementById('vdz-bar');
        const percent       = document.getElementById('vdz-percent');
        const progressText  = document.getElementById('vdz-progress-text');
        const vdzFilename   = document.getElementById('vdz-filename');
        const doneName      = document.getElementById('vdz-done-name');
        const hiddenPath    = document.getElementById('hidden-video-path');
        const saveBtn       = document.getElementById('save-btn');
        const uploadWarning = document.getElementById('upload-warning');

        function setState(state, name) {
            idle.classList.add('hidden');
            uploading.classList.add('hidden');
            done.classList.add('hidden');
            uploading.classList.remove('flex');
            done.classList.remove('flex');

            if (state === 'idle')      { idle.classList.remove('hidden'); }
            if (state === 'uploading') { uploading.classList.remove('hidden'); uploading.classList.add('flex'); vdzFilename.textContent = name || ''; }
            if (state === 'done')      { done.classList.remove('hidden'); done.classList.add('flex'); doneName.textContent = name || ''; }
        }

        function lockSave(locked) {
            saveBtn.disabled = locked;
            saveBtn.classList.toggle('opacity-50', locked);
            saveBtn.classList.toggle('cursor-not-allowed', locked);
            uploadWarning.classList.toggle('hidden', !locked);
        }

        // Generate a UUID-like string
        function uid() {
            return 'xxxx-xxxx-xxxx'.replace(/x/g, () => (Math.random() * 16 | 0).toString(16));
        }

        async function uploadFile(file) {
            const totalChunks = Math.ceil(file.size / CHUNK_SIZE);
            const uuid = uid() + '-' + Date.now();
            let uploaded = 0;

            setState('uploading', file.name);
            lockSave(true);

            for (let i = 0; i < totalChunks; i++) {
                const chunk = file.slice(i * CHUNK_SIZE, (i + 1) * CHUNK_SIZE);
                const fd = new FormData();
                fd.append('_token',       CSRF_TOKEN);
                fd.append('file',         chunk, 'chunk');
                fd.append('uuid',         uuid);
                fd.append('index',        i);
                fd.append('total_chunks', totalChunks);
                fd.append('filename',     file.name);

                let resp, json;
                try {
                    resp = await fetch(UPLOAD_URL, { method: 'POST', body: fd });
                    json = await resp.json();
                } catch (e) {
                    alert('Upload error on chunk ' + i + ': ' + e.message);
                    setState('idle');
                    lockSave(false);
                    return;
                }

                if (!resp.ok) {
                    alert('Server error: ' + (json.message || resp.statusText));
                    setState('idle');
                    lockSave(false);
                    return;
                }

                uploaded++;
                const pct = Math.round((uploaded / totalChunks) * 100);
                bar.style.width = pct + '%';
                percent.textContent = pct + '%';
                progressText.textContent = 'Uploading chunk ' + uploaded + ' of ' + totalChunks + '…';

                if (json.status === 'complete') {
                    hiddenPath.value = json.video_path;
                    setState('done', file.name);
                    lockSave(false);
                }
            }
        }

        fileInput.addEventListener('change', function () {
            if (this.files[0]) uploadFile(this.files[0]);
        });

        // Drag & drop
        dropZone.addEventListener('dragover',  e => { e.preventDefault(); dropZone.classList.add('border-brand-400','bg-brand-50'); });
        dropZone.addEventListener('dragleave', e => { dropZone.classList.remove('border-brand-400','bg-brand-50'); });
        dropZone.addEventListener('drop',      e => {
            e.preventDefault();
            dropZone.classList.remove('border-brand-400','bg-brand-50');
            const f = e.dataTransfer.files[0];
            if (f && f.type.startsWith('video/')) uploadFile(f);
            else alert('Please drop a video file.');
        });

    })();
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $attributes = $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $component = $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views\admin\lessons\form.blade.php ENDPATH**/ ?>