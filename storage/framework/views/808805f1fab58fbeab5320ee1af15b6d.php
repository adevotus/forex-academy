<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => $member->name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($member->name)]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <a href="<?php echo e(route('admin.members.index')); ?>" class="text-xs font-medium text-brand-300 hover:text-brand-200">&larr; Members</a>
            <h1 class="mt-2 text-2xl font-bold text-white"><?php echo e($member->name); ?></h1>
            <p class="mt-1 text-sm text-slate-400"><?php echo e($member->email); ?> <?php if($member->phone): ?> · <?php echo e($member->phone); ?> <?php endif; ?></p>
        </div>
        <div class="flex gap-2">
            <?php if($member->status !== 'approved'): ?>
                <form method="POST" action="<?php echo e(route('admin.members.approve', $member)); ?>">
                    <?php echo csrf_field(); ?>
                    <button class="rounded-lg border border-emerald-400/30 bg-emerald-400/10 px-4 py-2 text-sm font-medium text-emerald-300 hover:bg-emerald-400/20">Approve Member</button>
                </form>
            <?php endif; ?>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="card p-6 lg:col-span-2">
            <h2 class="font-semibold text-white">Payment History</h2>
            <div class="mt-4 divide-y divide-white/5">
                <?php $__empty_1 = true; $__currentLoopData = $member->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex items-center justify-between py-3 text-sm">
                        <div>
                            <p class="text-slate-200"><?php echo e($payment->typeLabel()); ?></p>
                            <p class="text-xs text-slate-500"><?php echo e($payment->created_at->format('M d, Y')); ?></p>
                        </div>
                        <div class="text-right">
                            <p class="font-medium text-white"><?php echo e($payment->amountFormatted()); ?></p>
                            <span class="badge <?php echo e(match($payment->status) {
                                'approved' => 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300',
                                'rejected' => 'border-rose-400/30 bg-rose-400/10 text-rose-300',
                                default => 'border-gold-400/30 bg-gold-400/10 text-gold-300',
                            }); ?>"><?php echo e(ucfirst($payment->status)); ?></span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="py-3 text-sm text-slate-500">No payments yet.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="space-y-6">
            <div class="card p-6">
                <h2 class="font-semibold text-white">Robot Subscriptions</h2>
                <div class="mt-3 space-y-2">
                    <?php $__empty_1 = true; $__currentLoopData = $member->robotSubscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="rounded-lg border border-white/10 bg-white/5 px-3 py-2 text-sm">
                            <p class="text-slate-200"><?php echo e($sub->robot->name); ?></p>
                            <p class="text-xs text-slate-500">Status: <?php echo e(ucfirst($sub->status)); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-sm text-slate-500">None yet.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card p-6">
                <h2 class="font-semibold text-white">Lesson Progress</h2>
                <p class="mt-2 text-sm text-slate-400"><?php echo e($member->lessonProgress->where('completed', true)->count()); ?> lessons completed</p>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/admin/members/show.blade.php ENDPATH**/ ?>