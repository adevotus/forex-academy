<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Pricing — EMMIOXFOREX ACADEMY']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Pricing — EMMIOXFOREX ACADEMY']); ?>

    
    <section class="border-b border-slate-200 bg-slate-50 px-4 py-20 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="badge mx-auto">Pricing</span>
            <h1 class="mt-5 text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">
                Simple, transparent pricing
            </h1>
            <p class="mt-5 text-lg text-slate-600">Register, get approved, then unlock exactly what you need.</p>
        </div>
    </section>

    <section class="px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-5xl space-y-16">

            



















            
            <div>
                <div class="flex items-center gap-4 mb-6">
                    <h2 class="text-xl font-extrabold text-slate-900">Courses</h2>
                    <div class="h-px flex-1 bg-slate-200"></div>
                </div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card p-5">
                            <span class="badge badge-level-<?php echo e($course->level); ?>"><?php echo e($course->levelLabel()); ?></span>
                            <h3 class="mt-3 text-sm font-semibold text-slate-900"><?php echo e($course->title); ?></h3>
                            <p class="mt-3 text-2xl font-extrabold text-slate-900"><?php echo e($course->priceFormatted()); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div>
                <div class="flex items-center gap-4 mb-6">
                    <h2 class="text-xl font-extrabold text-slate-900">Robots / EAs</h2>
                    <div class="h-px flex-1 bg-slate-200"></div>
                </div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <?php $__currentLoopData = $robots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $robot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card p-5">
                            <div class="flex items-center gap-3">
                                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-gold-50 ring-1 ring-gold-200">
                                    <svg class="h-4 w-4 text-gold-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8m-4-4v4"/>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-slate-900"><?php echo e($robot->name); ?></h3>
                            </div>
                            <div class="mt-4 flex items-end justify-between">
                                <p class="text-2xl font-extrabold text-slate-900"><?php echo e($robot->priceFormatted()); ?></p>
                                <span class="text-xs text-slate-500">/ <?php echo e($robot->duration_days); ?> days</span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div>
                <div class="flex items-center gap-4 mb-6">
                    <h2 class="text-xl font-extrabold text-slate-900">Signals &amp; Mentorship</h2>
                    <div class="h-px flex-1 bg-slate-200"></div>
                </div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="card p-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-50 ring-1 ring-emerald-200">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-slate-900">3-Month Signal Subscription</h3>
                        </div>
                        <p class="mt-4 text-2xl font-extrabold text-slate-900"><?php echo e($currency); ?> <?php echo e($signalPrice); ?></p>
                    </div>
                    <?php $__currentLoopData = $mentorships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card p-5">
                            <div class="flex items-center gap-3">
                                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-violet-50 ring-1 ring-violet-200">
                                    <svg class="h-4 w-4 text-violet-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 0 0-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 0 1 5.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 0 1 9.288 0M15 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-slate-900"><?php echo e($m->title); ?></h3>
                            </div>
                            <p class="mt-4 text-2xl font-extrabold text-slate-900"><?php echo e($m->priceFormatted()); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="rounded-xl border border-slate-200 bg-slate-50 p-5 text-xs leading-relaxed text-slate-500">
                <strong class="font-semibold text-slate-700">Risk Disclosure:</strong> Forex and leveraged trading involve substantial risk and may result in partial or complete loss of capital. Past, demo, or backtested results are not indicative of future performance.
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/public/pricing.blade.php ENDPATH**/ ?>