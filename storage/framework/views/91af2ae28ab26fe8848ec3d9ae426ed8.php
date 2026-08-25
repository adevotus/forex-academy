<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => $course->title.' — EMMIOXFOREX ACADEMY']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($course->title.' — EMMIOXFOREX ACADEMY')]); ?>

    
    <section class="border-b border-slate-200 bg-slate-50 px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl">
            <span class="badge badge-level-<?php echo e($course->level); ?>"><?php echo e($course->levelLabel()); ?></span>
            <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl"><?php echo e($course->title); ?></h1>
            <p class="mt-4 max-w-2xl text-base leading-relaxed text-slate-600"><?php echo e($course->description); ?></p>

            <div class="mt-8 flex flex-wrap items-center gap-4">
                <span class="text-3xl font-extrabold text-slate-900"><?php echo e($course->priceFormatted()); ?></span>
                <span class="rounded-full bg-slate-200 px-3 py-1 text-sm font-medium text-slate-600"><?php echo e($course->lessons->count()); ?> lessons</span>
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('member.courses.show', $course)); ?>" class="btn-primary px-6 py-2.5">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Go to Course
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('register')); ?>" class="btn-primary px-6 py-2.5">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        Register to Unlock
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    
    <section class="px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl">
            <h2 class="mb-6 text-lg font-extrabold text-slate-900">Course Lessons</h2>

            <div class="card overflow-hidden divide-y divide-slate-100">
                <?php $__empty_1 = true; $__currentLoopData = $course->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex items-center justify-between px-6 py-4 hover:bg-slate-50 transition">
                        <div class="flex items-center gap-4">
                            <span class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-brand-50 text-xs font-bold text-brand-600">
                                <?php echo e($loop->iteration); ?>

                            </span>
                            <div>
                                <p class="text-sm font-semibold text-slate-900"><?php echo e($lesson->title); ?></p>
                                <?php if($lesson->duration_minutes): ?>
                                    <p class="text-xs text-slate-500"><?php echo e($lesson->duration_minutes); ?> min</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if($lesson->is_preview): ?>
                            <span class="inline-flex items-center gap-1 rounded-full border border-emerald-200 bg-emerald-50 px-2.5 py-0.5 text-xs font-medium text-emerald-700">
                                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                Free Preview
                            </span>
                        <?php else: ?>
                            <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="px-6 py-10 text-center text-sm text-slate-500">
                        No lessons have been added to this course yet.
                    </div>
                <?php endif; ?>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views\public\course-show.blade.php ENDPATH**/ ?>