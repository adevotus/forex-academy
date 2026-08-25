<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Trading Robots — EMMIOXFOREX ACADEMY']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Trading Robots — EMMIOXFOREX ACADEMY']); ?>

    
    <section class="border-b border-slate-200 bg-slate-50 px-4 py-20 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="badge mx-auto">Automated Trading</span>
            <h1 class="mt-5 text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">
                Robot / EA Subscriptions
            </h1>
            <p class="mt-5 text-lg text-slate-600">
                Systematic trade execution, paired with setup guidance and a performance log.
            </p>
        </div>
    </section>

    
    <section class="px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-5xl">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <?php $__currentLoopData = $robots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $robot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card flex flex-col p-8">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gold-50 ring-1 ring-gold-200">
                            <svg class="h-6 w-6 text-gold-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
                                <path d="M8 21h8m-4-4v4"/>
                            </svg>
                        </div>

                        <h3 class="mt-5 text-xl font-extrabold text-slate-900"><?php echo e($robot->name); ?></h3>
                        <p class="mt-1 text-xs font-medium text-slate-400">Version <?php echo e($robot->version); ?></p>
                        <p class="mt-3 flex-1 text-sm leading-relaxed text-slate-600"><?php echo e($robot->description); ?></p>

                        <div class="mt-6 flex items-end justify-between">
                            <div>
                                <span class="text-3xl font-extrabold text-slate-900"><?php echo e($robot->priceFormatted()); ?></span>
                            </div>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-600"><?php echo e($robot->duration_days); ?> days access</span>
                        </div>

                        <a href="<?php echo e(route('register')); ?>" class="btn-gold mt-6 w-full py-3 text-sm">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            Get Access
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <div class="mt-12 rounded-xl border border-brand-200 bg-brand-50 p-6">
                <div class="flex items-start gap-4">
                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-lg bg-brand-100">
                        <svg class="h-5 w-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-slate-900">How robot access works</p>
                        <p class="mt-1 text-sm leading-relaxed text-slate-600">
                            Register an academy account, pay the registration fee and submit your robot subscription payment.
                            Once an admin approves it, the robot files and setup guide become available in your member dashboard.
                        </p>
                    </div>
                </div>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views\public\robots.blade.php ENDPATH**/ ?>