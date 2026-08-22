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
    <section class="px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-6xl">
            <div class="mx-auto max-w-2xl text-center">
                <span class="badge mx-auto">Pricing</span>
                <h1 class="mt-4 text-4xl font-extrabold text-white">Simple, transparent pricing</h1>
                <p class="mt-4 text-slate-400">Register, get approved, then unlock exactly what you need.</p>
            </div>

            <div class="mt-14 rounded-2xl border border-brand-400/20 bg-brand-500/5 p-8 text-center">
                <h2 class="text-lg font-semibold text-white">Registration Fee</h2>
                <p class="mt-2 text-4xl font-extrabold text-white">$50.00</p>
                <p class="mt-2 text-sm text-slate-400">One-time — unlocks your Academy account after admin approval, including free Starter-level content.</p>
                <a href="<?php echo e(route('register')); ?>" class="btn-primary mt-6">Register Now</a>
            </div>

            <h2 class="mt-16 text-2xl font-bold text-white">Courses</h2>
            <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card p-5">
                        <span class="badge badge-level-<?php echo e($course->level); ?>"><?php echo e($course->levelLabel()); ?></span>
                        <h3 class="mt-3 text-sm font-semibold text-white"><?php echo e($course->title); ?></h3>
                        <p class="mt-2 text-lg font-bold text-white"><?php echo e($course->priceFormatted()); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <h2 class="mt-14 text-2xl font-bold text-white">Robots / EAs</h2>
            <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
                <?php $__currentLoopData = $robots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $robot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card p-5">
                        <h3 class="text-sm font-semibold text-white"><?php echo e($robot->name); ?></h3>
                        <p class="mt-2 text-lg font-bold text-white"><?php echo e($robot->priceFormatted()); ?> <span class="text-xs font-normal text-slate-500">/ <?php echo e($robot->duration_days); ?> days</span></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <h2 class="mt-14 text-2xl font-bold text-white">Signals & Mentorship</h2>
            <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="card p-5">
                    <h3 class="text-sm font-semibold text-white">3-Month Signal Subscription</h3>
                    <p class="mt-2 text-lg font-bold text-white">$150.00</p>
                </div>
                <?php $__currentLoopData = $mentorships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card p-5">
                        <h3 class="text-sm font-semibold text-white"><?php echo e($m->title); ?></h3>
                        <p class="mt-2 text-lg font-bold text-white"><?php echo e($m->priceFormatted()); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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