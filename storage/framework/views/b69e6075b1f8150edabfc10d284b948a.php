<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Member Stories — EMMIOXFOREX ACADEMY']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Member Stories — EMMIOXFOREX ACADEMY']); ?>

    <section class="border-b border-slate-200 bg-slate-50 px-4 py-20 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="badge mx-auto">Member Stories </span>
            <h1 class="mt-5 text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">
                What our traders say
            </h1>
            <p class="mt-5 text-lg text-slate-600">
                Real results and genuine feedback from members of EMMIOXFOREX ACADEMY. No scripts  just their own words.
            </p>
        </div>
    </section>

    
    <section class="bg-slate-50 px-4 py-20 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">

            <?php if($testimonials->isEmpty()): ?>
                <div class="flex flex-col items-center gap-3 py-24 text-center">
                    <svg class="h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                    <p class="text-sm font-semibold text-slate-500">No testimonials yet — check back soon.</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md hover:-translate-y-0.5">

                            
                            <?php if($t->media_path): ?>
                                <div class="relative w-full overflow-hidden bg-slate-100" style="aspect-ratio:16/9">
                                    <?php if($t->isVideo()): ?>
                                        <video src="<?php echo e($t->mediaUrl()); ?>"
                                               controls preload="metadata"
                                               class="absolute inset-0 h-full w-full object-contain bg-slate-900"></video>
                                    <?php else: ?>
                                        <img src="<?php echo e($t->mediaUrl()); ?>" alt="<?php echo e($t->name); ?>"
                                             class="absolute inset-0 h-full w-full object-cover transition duration-300 hover:scale-105">
                                    <?php endif; ?>
                                </div>
                            <?php else: ?>
                                <div class="flex items-center justify-center bg-gradient-to-br from-brand-50 to-slate-100" style="aspect-ratio:16/9">
                                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-brand-100 text-2xl font-extrabold text-brand-600 ring-4 ring-white shadow">
                                        <?php echo e($t->initial()); ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                            
                            <div class="flex flex-1 flex-col p-6">

                                
                                <?php if($t->rating): ?>
                                    <div class="flex gap-0.5 mb-4">
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <svg class="h-4 w-4 <?php echo e($i <= $t->rating ? 'text-gold-400' : 'text-slate-200'); ?>"
                                                 fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                            </svg>
                                        <?php endfor; ?>
                                    </div>
                                <?php endif; ?>

                                
                                <svg class="h-6 w-6 text-brand-200 mb-2 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>

                                
                                <blockquote class="flex-1 text-sm leading-relaxed text-slate-600">
                                    <?php echo e($t->content); ?>

                                </blockquote>

                                
                                <div class="mt-5 flex items-center gap-3 border-t border-slate-100 pt-4">
                                    <?php if($t->isImage() && $t->media_path): ?>
                                        <img src="<?php echo e($t->mediaUrl()); ?>" alt="<?php echo e($t->name); ?>"
                                             class="h-10 w-10 flex-shrink-0 rounded-full object-cover ring-2 ring-brand-100">
                                    <?php else: ?>
                                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-brand-50 text-sm font-bold text-brand-600 ring-2 ring-brand-100">
                                            <?php echo e($t->initial()); ?>

                                        </div>
                                    <?php endif; ?>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900"><?php echo e($t->name); ?></p>
                                        <?php if($t->role): ?>
                                            <p class="text-xs text-slate-400"><?php echo e($t->role); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            
            <div class="mt-14 text-center">
                <a href="<?php echo e(route('home')); ?>"
                   class="inline-flex items-center gap-2 text-sm font-semibold text-brand-600 hover:text-brand-700 transition">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Back to home
                </a>
            </div>

        </div>
    </section>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd)): ?>
<?php $attributes = $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd; ?>
<?php unset($__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd)): ?>
<?php $component = $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd; ?>
<?php unset($__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd); ?>
<?php endif; ?>
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/public/testimonials.blade.php ENDPATH**/ ?>