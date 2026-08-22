<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Courses — EMMIOXFOREX ACADEMY']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Courses — EMMIOXFOREX ACADEMY']); ?>
    <section class="px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="mx-auto max-w-2xl text-center">
                <span class="badge mx-auto">Online Forex Classes</span>
                <h1 class="mt-4 text-4xl font-extrabold text-white">A leveled learning path built to make progress simple</h1>
                <p class="mt-4 text-slate-400">Starter &rarr; Intermediate &rarr; Advanced &rarr; Pro. Each level unlocks the next.</p>
            </div>

            <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="mt-14">
                    <div class="flex items-center gap-3">
                        <span class="badge badge-level-<?php echo e($level); ?>"><?php echo e(ucfirst($level)); ?></span>
                        <div class="h-px flex-1 bg-white/10"></div>
                    </div>
                    <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('courses.show', $course)); ?>" class="card group block overflow-hidden p-6 transition hover:border-brand-400/30">
                                <h3 class="font-semibold text-white group-hover:text-brand-300"><?php echo e($course->title); ?></h3>
                                <p class="mt-2 line-clamp-3 text-sm text-slate-400"><?php echo e($course->description); ?></p>
                                <div class="mt-5 flex items-center justify-between text-sm">
                                    <span class="font-semibold text-white"><?php echo e($course->priceFormatted()); ?></span>
                                    <span class="text-slate-500"><?php echo e($course->lessons()->count()); ?> lessons</span>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="mt-14 text-center text-slate-500">Courses are being prepared — check back soon.</p>
            <?php endif; ?>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/public/courses.blade.php ENDPATH**/ ?>