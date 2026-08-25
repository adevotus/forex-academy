<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => $course->exists ? 'Edit Course' : 'New Course']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($course->exists ? 'Edit Course' : 'New Course')]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <a href="<?php echo e(route('admin.courses.index')); ?>"
               class="inline-flex items-center gap-1 text-xs font-semibold text-brand-600 hover:text-brand-700">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                All Courses
            </a>
            <h1 class="mt-2 text-2xl font-extrabold text-slate-900">
                <?php echo e($course->exists ? 'Edit Course' : 'Create New Course'); ?>

            </h1>
        </div>
        <?php if($course->exists): ?>
            <a href="<?php echo e(route('admin.courses.lessons.create', $course)); ?>" class="btn-primary !py-2 text-sm">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Add Lesson
            </a>
        <?php endif; ?>
     <?php $__env->endSlot(); ?>

    <form method="POST"
          action="<?php echo e($course->exists ? route('admin.courses.update', $course) : route('admin.courses.store')); ?>"
          enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php if($course->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            
            <div class="space-y-6 lg:col-span-2">

                
                <div class="card overflow-hidden">
                    <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Course Details</h2>
                    </div>
                    <div class="p-6 space-y-5">
                        <div>
                            <label class="label" for="title">Course Title <span class="text-rose-500">*</span></label>
                            <input id="title" type="text" name="title"
                                   value="<?php echo e(old('title', $course->title)); ?>"
                                   class="input" placeholder="e.g. Forex Fundamentals for Beginners" required>
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
                            <label class="label" for="description">Description</label>
                            <textarea id="description" name="description" rows="4"
                                      class="input" placeholder="What will students learn in this course?"><?php echo e(old('description', $course->description)); ?></textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-rose-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="grid grid-cols-2 gap-5">
                            <div>
                                <label class="label" for="level">Level</label>
                                <select id="level" name="level" class="input">
                                    <?php $__currentLoopData = ['starter','intermediate','advanced','pro']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lvl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lvl); ?>" <?php if(old('level', $course->level)===$lvl): echo 'selected'; endif; ?>><?php echo e(ucfirst($lvl)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div>
                                <label class="label" for="price">Price (USD)</label>
                                <div class="relative">
                                    <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400 text-sm">$</span>
                                    <input id="price" type="number" step="0.01" min="0" name="price"
                                           value="<?php echo e(old('price', $course->price / 100)); ?>"
                                           class="input pl-7" placeholder="0.00">
                                </div>
                                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-rose-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-5">
                            <div>
                                <label class="label" for="order">Display Order</label>
                                <input id="order" type="number" name="order"
                                       value="<?php echo e(old('order', $course->order ?? 0)); ?>"
                                       class="input" min="0">
                            </div>
                            <div class="flex flex-col justify-end gap-3 pb-1">
                                <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 px-4 py-2.5 hover:bg-slate-50">
                                    <input type="checkbox" name="is_free" value="1"
                                           <?php if(old('is_free', $course->is_free)): echo 'checked'; endif; ?>
                                           class="h-4 w-4 rounded border-slate-300 text-brand-500">
                                    <span class="text-sm font-medium text-slate-700">Free course</span>
                                </label>
                                <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 px-4 py-2.5 hover:bg-slate-50">
                                    <input type="checkbox" name="published" value="1"
                                           <?php if(old('published', $course->published ?? true)): echo 'checked'; endif; ?>
                                           class="h-4 w-4 rounded border-slate-300 text-brand-500">
                                    <span class="text-sm font-medium text-slate-700">Published (visible to members)</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="card overflow-hidden">
                    <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Cover Image</h2>
                        <p class="mt-0.5 text-xs text-slate-500">Displayed on course cards. Recommended: 1280×720px (16:9).</p>
                    </div>
                    <div class="p-6">
                        <?php if($course->exists && $course->cover_image): ?>
                            <div class="mb-4">
                                <img src="<?php echo e(asset('storage/'.$course->cover_image)); ?>"
                                     class="h-40 w-full rounded-xl object-cover ring-1 ring-slate-200" alt="Current cover">
                                <p class="mt-1 text-xs text-slate-400">Current cover image</p>
                            </div>
                        <?php endif; ?>
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
                        <?php $__errorArgs = ['cover_image'];
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
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Intro / Promo Video</h2>
                        <p class="mt-0.5 text-xs text-slate-500">Optional short video shown on the course page before purchase.</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <label class="label" for="promo_video_url">Video URL</label>
                            <input id="promo_video_url" type="url" name="promo_video_url"
                                   value="<?php echo e(old('promo_video_url', $course->promo_video_url ?? '')); ?>"
                                   class="input" placeholder="https://youtube.com/watch?v=... or Vimeo link">
                            <p class="mt-1 text-xs text-slate-400">Paste a YouTube, Vimeo, or direct MP4 URL.</p>
                        </div>
                        <?php if(($course->promo_video_url ?? false)): ?>
                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 flex items-center gap-3">
                                <svg class="h-5 w-5 flex-shrink-0 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
                                <a href="<?php echo e($course->promo_video_url); ?>" target="_blank"
                                   class="truncate text-xs font-medium text-brand-600 hover:underline"><?php echo e($course->promo_video_url); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            
            <div class="space-y-6">

                
                <div class="card p-6 space-y-4">
                    <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Publish</h2>
                    <button type="submit" class="btn-primary w-full py-2.5">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        <?php echo e($course->exists ? 'Save Changes' : 'Create Course'); ?>

                    </button>
                    <a href="<?php echo e(route('admin.courses.index')); ?>"
                       class="btn-outline w-full py-2.5 text-center text-sm">Cancel</a>

                    <?php if($course->exists): ?>
                        <div class="border-t border-slate-100 pt-4">
                            <form method="POST" action="<?php echo e(route('admin.courses.destroy', $course)); ?>"
                                  onsubmit="return confirm('Delete this course and all its lessons? This cannot be undone.')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit"
                                        class="w-full rounded-lg border border-rose-200 bg-rose-50 px-4 py-2 text-xs font-semibold text-rose-700 hover:bg-rose-100 transition">
                                    Delete Course
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>

                
                <?php if($course->exists): ?>
                    <div class="card overflow-hidden">
                        <div class="border-b border-slate-100 bg-slate-50 px-5 py-4">
                            <div class="flex items-center justify-between">
                                <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Lessons</h2>
                                <a href="<?php echo e(route('admin.courses.lessons.create', $course)); ?>"
                                   class="text-xs font-semibold text-brand-600 hover:text-brand-700">+ Add</a>
                            </div>
                        </div>
                        <div class="divide-y divide-slate-100">
                            <?php $__empty_1 = true; $__currentLoopData = $course->lessons->sortBy('order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <a href="<?php echo e(route('admin.courses.lessons.edit', [$course, $lesson])); ?>"
                                   class="flex items-center gap-3 px-5 py-3 hover:bg-slate-50 transition">
                                    <span class="flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-brand-50 text-[10px] font-bold text-brand-600">
                                        <?php echo e($idx + 1); ?>

                                    </span>
                                    <span class="flex-1 truncate text-sm text-slate-700"><?php echo e($lesson->title); ?></span>
                                    <?php if($lesson->is_preview): ?>
                                        <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[10px] font-semibold text-emerald-700">Preview</span>
                                    <?php endif; ?>
                                    <svg class="h-3.5 w-3.5 flex-shrink-0 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="px-5 py-6 text-center text-xs text-slate-400">No lessons yet. Add your first one.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                
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

    <script>
        // Cover image preview
        const coverInput    = document.getElementById('cover-input');
        const coverFilename = document.getElementById('cover-filename');
        const coverZone     = document.getElementById('cover-drop-zone');

        if (coverInput) {
            coverInput.addEventListener('change', function () {
                if (this.files[0]) {
                    coverFilename.textContent = '✓ ' + this.files[0].name;
                    coverFilename.classList.remove('hidden');
                    // Show image preview
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        coverZone.style.backgroundImage = 'url(' + e.target.result + ')';
                        coverZone.style.backgroundSize = 'cover';
                        coverZone.style.backgroundPosition = 'center';
                        coverZone.querySelector('svg').style.opacity = '0';
                        coverZone.querySelector('div').style.opacity = '0';
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        }
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views\admin\courses\form.blade.php ENDPATH**/ ?>