<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'Overview']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Overview']); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <h1 class="text-2xl font-bold text-white">Admin Overview</h1>
            <p class="mt-1 text-sm text-slate-400">EMMIOXFOREX ACADEMY platform snapshot.</p>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <?php $__currentLoopData = [
            ['users', 'Total Members', $stats['total_members'], 'bg-brand-400/10 text-brand-300'],
            ['clock', 'Pending Approval', $stats['pending_members'], 'bg-gold-400/10 text-gold-300'],
            ['card', 'Pending Payments', $stats['pending_payments'], 'bg-rose-400/10 text-rose-300'],
            ['sparkles', 'Total Revenue', '$'.number_format($stats['total_revenue']/100, 2), 'bg-emerald-400/10 text-emerald-300'],
        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$icon, $label, $value, $colorClasses]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card p-5">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg <?php echo e($colorClasses); ?>"><?php if (isset($component)) { $__componentOriginald88937ee957874c050ccbc67a5e19575 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald88937ee957874c050ccbc67a5e19575 = $attributes; } ?>
<?php $component = App\View\Components\Icon::resolve(['name' => $icon,'class' => 'h-5 w-5'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald88937ee957874c050ccbc67a5e19575)): ?>
<?php $attributes = $__attributesOriginald88937ee957874c050ccbc67a5e19575; ?>
<?php unset($__attributesOriginald88937ee957874c050ccbc67a5e19575); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald88937ee957874c050ccbc67a5e19575)): ?>
<?php $component = $__componentOriginald88937ee957874c050ccbc67a5e19575; ?>
<?php unset($__componentOriginald88937ee957874c050ccbc67a5e19575); ?>
<?php endif; ?></div>
                    <div>
                        <p class="text-xs text-slate-500"><?php echo e($label); ?></p>
                        <p class="text-xl font-bold text-white"><?php echo e($value); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-3">
        <a href="<?php echo e(route('admin.courses.index')); ?>" class="card p-5 hover:border-brand-400/30">
            <p class="text-xs text-slate-500">Courses</p>
            <p class="text-2xl font-bold text-white"><?php echo e($stats['courses']); ?></p>
        </a>
        <a href="<?php echo e(route('admin.robots.index')); ?>" class="card p-5 hover:border-brand-400/30">
            <p class="text-xs text-slate-500">Robots / EAs</p>
            <p class="text-2xl font-bold text-white"><?php echo e($stats['robots']); ?></p>
        </a>
        <a href="<?php echo e(route('admin.signals.index')); ?>" class="card p-5 hover:border-brand-400/30">
            <p class="text-xs text-slate-500">Signals Published</p>
            <p class="text-2xl font-bold text-white"><?php echo e($stats['signals']); ?></p>
        </a>
    </div>

    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">
        <div class="card p-6">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-white">Recent Payments</h2>
                <a href="<?php echo e(route('admin.payments.index')); ?>" class="text-xs font-medium text-brand-300 hover:text-brand-200">View all &rarr;</a>
            </div>
            <div class="mt-4 space-y-3">
                <?php $__empty_1 = true; $__currentLoopData = $recentPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex items-center justify-between rounded-lg border border-white/10 bg-white/5 px-4 py-3 text-sm">
                        <div>
                            <p class="text-slate-200"><?php echo e($payment->user->name); ?></p>
                            <p class="text-xs text-slate-500"><?php echo e($payment->typeLabel()); ?></p>
                        </div>
                        <span class="badge <?php echo e(match($payment->status) {
                            'approved' => 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300',
                            'rejected' => 'border-rose-400/30 bg-rose-400/10 text-rose-300',
                            default => 'border-gold-400/30 bg-gold-400/10 text-gold-300',
                        }); ?>"><?php echo e(ucfirst($payment->status)); ?></span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-sm text-slate-500">No payments yet.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="card p-6">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-white">Recent Members</h2>
                <a href="<?php echo e(route('admin.members.index')); ?>" class="text-xs font-medium text-brand-300 hover:text-brand-200">View all &rarr;</a>
            </div>
            <div class="mt-4 space-y-3">
                <?php $__empty_1 = true; $__currentLoopData = $recentMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex items-center justify-between rounded-lg border border-white/10 bg-white/5 px-4 py-3 text-sm">
                        <div>
                            <p class="text-slate-200"><?php echo e($member->name); ?></p>
                            <p class="text-xs text-slate-500"><?php echo e($member->email); ?></p>
                        </div>
                        <span class="badge <?php echo e($member->status === 'approved' ? 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300' : 'border-gold-400/30 bg-gold-400/10 text-gold-300'); ?>">
                            <?php echo e(ucfirst($member->status)); ?>

                        </span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-sm text-slate-500">No members yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>