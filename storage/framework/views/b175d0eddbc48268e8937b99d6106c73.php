<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => $testimonial->exists ? 'Edit Testimonial' : 'New Testimonial']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($testimonial->exists ? 'Edit Testimonial' : 'New Testimonial')]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <a href="<?php echo e(route('admin.testimonials.index')); ?>"
               class="inline-flex items-center gap-1 text-xs font-semibold text-brand-600 hover:text-brand-700">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                Testimonials
            </a>
            <h1 class="mt-2 text-2xl font-extrabold text-slate-900">
                <?php echo e($testimonial->exists ? 'Edit Testimonial' : 'Add Testimonial'); ?>

            </h1>
        </div>
        <?php if($testimonial->exists): ?>
            <form method="POST" action="<?php echo e(route('admin.testimonials.destroy', $testimonial)); ?>"
                  onsubmit="return confirm('Delete this testimonial? This cannot be undone.')">
                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button class="rounded-lg border border-rose-200 bg-rose-50 px-4 py-2 text-xs font-semibold text-rose-700 hover:bg-rose-100 transition">
                    Delete
                </button>
            </form>
        <?php endif; ?>
     <?php $__env->endSlot(); ?>

    <form method="POST"
          action="<?php echo e($testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store')); ?>"
          enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php if($testimonial->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            
            <div class="space-y-6 lg:col-span-2">

                
                <div class="card overflow-hidden">
                    <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Person</h2>
                    </div>
                    <div class="p-6 space-y-5">
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <label class="label" for="name">Name <span class="text-rose-500">*</span></label>
                                <input id="name" type="text" name="name"
                                       value="<?php echo e(old('name', $testimonial->name)); ?>"
                                       class="input" placeholder="e.g. James Okonkwo" required>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-rose-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div>
                                <label class="label" for="role">Title / Role</label>
                                <input id="role" type="text" name="role"
                                       value="<?php echo e(old('role', $testimonial->role)); ?>"
                                       class="input" placeholder="e.g. Forex Trader, Student">
                            </div>
                        </div>

                        
                        <div>
                            <label class="label">Star Rating</label>
                            <div class="flex gap-2" id="star-picker">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="rating" value="<?php echo e($i); ?>"
                                               class="sr-only"
                                               <?php if(old('rating', $testimonial->rating) == $i): echo 'checked'; endif; ?>>
                                        <svg id="star-<?php echo e($i); ?>"
                                             class="h-8 w-8 transition <?php echo e(old('rating', $testimonial->rating) >= $i ? 'text-gold-400' : 'text-slate-200'); ?>"
                                             fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                        </svg>
                                    </label>
                                <?php endfor; ?>
                            </div>
                        </div>

                        
                        <div>
                            <label class="label" for="content">Testimonial Quote <span class="text-rose-500">*</span></label>
                            <textarea id="content" name="content" rows="5"
                                      class="input" placeholder="Write what the member said about us…" required><?php echo e(old('content', $testimonial->content)); ?></textarea>
                            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-rose-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                
                <div class="card overflow-hidden">
                    <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Photo or Short Video</h2>
                        <p class="mt-0.5 text-xs text-slate-500">Optional. Image (JPG/PNG/WebP) or video (MP4/WebM/MOV). Max 5 MB.</p>
                    </div>
                    <div class="p-6">

                        
                        <?php if($testimonial->exists && $testimonial->media_path): ?>
                            <div class="mb-4 overflow-hidden rounded-xl border border-slate-200">
                                <?php if($testimonial->isVideo()): ?>
                                    <video src="<?php echo e($testimonial->mediaUrl()); ?>"
                                           controls class="max-h-48 w-full bg-slate-900 object-contain"></video>
                                <?php else: ?>
                                    <img src="<?php echo e($testimonial->mediaUrl()); ?>"
                                         class="h-40 w-full object-cover" alt="">
                                <?php endif; ?>
                                <p class="px-3 py-1.5 text-xs text-slate-400 bg-slate-50">Current media</p>
                            </div>
                        <?php endif; ?>

                        <label id="media-label"
                               class="flex cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-8 text-center transition hover:border-brand-400 hover:bg-brand-50">
                            <svg class="h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <div>
                                <p class="text-sm font-semibold text-slate-700">Click to upload</p>
                                <p class="mt-0.5 text-xs text-slate-400">Photo or short video — max 5 MB</p>
                            </div>
                            <input type="file" name="media" id="media-input"
                                   accept="image/jpeg,image/png,image/webp,video/mp4,video/webm,video/quicktime"
                                   class="sr-only">
                        </label>
                        <p id="media-filename" class="mt-2 hidden text-xs font-medium text-brand-600"></p>
                        <?php $__errorArgs = ['media'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-rose-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

            </div>

            
            <div class="space-y-6">

                
                <div class="card p-6 space-y-3">
                    <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Save</h2>
                    <button type="submit" class="btn-primary w-full py-2.5">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        <?php echo e($testimonial->exists ? 'Save Changes' : 'Add Testimonial'); ?>

                    </button>
                    <a href="<?php echo e(route('admin.testimonials.index')); ?>"
                       class="btn-outline w-full py-2.5 text-center text-sm">Cancel</a>
                </div>

                
                <div class="card p-6 space-y-4">
                    <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Visibility</h2>
                    <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 px-4 py-3 hover:bg-slate-50">
                        <input type="checkbox" name="is_active" value="1"
                               <?php if(old('is_active', $testimonial->exists ? $testimonial->is_active : true)): echo 'checked'; endif; ?>
                               class="h-4 w-4 rounded border-slate-300 text-brand-500">
                        <div>
                            <p class="text-sm font-semibold text-slate-700">Show publicly</p>
                            <p class="text-xs text-slate-400">Visible on website and member area</p>
                        </div>
                    </label>

                    <div>
                        <label class="label" for="order">Display Order</label>
                        <input id="order" type="number" name="order"
                               value="<?php echo e(old('order', $testimonial->order ?? 0)); ?>"
                               class="input" min="0" placeholder="0">
                        <p class="mt-1 text-xs text-slate-400">Lower numbers appear first.</p>
                    </div>
                </div>

                
                <div class="rounded-xl border border-gold-100 bg-gold-50 p-5">
                    <h3 class="text-xs font-extrabold uppercase tracking-wide text-gold-700">Tips</h3>
                    <ul class="mt-3 space-y-2 text-xs text-gold-700">
                        <li class="flex gap-2"><span class="mt-0.5 text-gold-400">•</span> Use real quotes — authenticity builds trust.</li>
                        <li class="flex gap-2"><span class="mt-0.5 text-gold-400">•</span> A face photo increases credibility significantly.</li>
                        <li class="flex gap-2"><span class="mt-0.5 text-gold-400">•</span> Videos ≤ 30 seconds work best as social proof.</li>
                        <li class="flex gap-2"><span class="mt-0.5 text-gold-400">•</span> Aim for 6–9 testimonials to fill the section nicely.</li>
                    </ul>
                </div>

            </div>
        </div>
    </form>

<script>
    // ── Star rating picker ──────────────────────────────
    const radios = document.querySelectorAll('#star-picker input[type=radio]');
    const stars  = document.querySelectorAll('#star-picker svg');
    function paintStars(val) {
        stars.forEach((s, i) => {
            s.classList.toggle('text-gold-400', i < val);
            s.classList.toggle('text-slate-200', i >= val);
        });
    }
    radios.forEach((r, idx) => {
        r.addEventListener('change', () => paintStars(idx + 1));
    });

    // ── File name display ───────────────────────────────
    const mediaInput    = document.getElementById('media-input');
    const mediaFilename = document.getElementById('media-filename');
    if (mediaInput) {
        mediaInput.addEventListener('change', function () {
            if (this.files[0]) {
                mediaFilename.textContent = '✓ ' + this.files[0].name;
                mediaFilename.classList.remove('hidden');
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/admin/testimonials/form.blade.php ENDPATH**/ ?>