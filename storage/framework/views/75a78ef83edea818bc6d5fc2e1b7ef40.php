<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'Payments']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Payments']); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <h1 class="text-2xl font-bold text-white">Payments</h1>
            <p class="mt-1 text-sm text-slate-400">Approve a payment to instantly grant the member access.</p>
        </div>
        <form method="GET" class="flex gap-2">
            <select name="status" class="input !py-2 !text-sm !w-auto" onchange="this.form.submit()">
                <option value="pending" <?php if(request('status', 'pending')==='pending'): echo 'selected'; endif; ?>>Pending</option>
                <option value="approved" <?php if(request('status')==='approved'): echo 'selected'; endif; ?>>Approved</option>
                <option value="rejected" <?php if(request('status')==='rejected'): echo 'selected'; endif; ?>>Rejected</option>
            </select>
        </form>
     <?php $__env->endSlot(); ?>

    <div class="space-y-4">
        <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card flex flex-wrap items-center justify-between gap-4 p-5">
                <div class="flex items-center gap-4">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-500/15 text-brand-300">
                        <?php if (isset($component)) { $__componentOriginald88937ee957874c050ccbc67a5e19575 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald88937ee957874c050ccbc67a5e19575 = $attributes; } ?>
<?php $component = App\View\Components\Icon::resolve(['name' => 'card','class' => 'h-5 w-5'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php endif; ?>
                    </div>
                    <div>
                        <p class="font-medium text-white"><?php echo e($payment->user->name); ?></p>
                        <p class="text-xs text-slate-500"><?php echo e($payment->user->email); ?></p>
                    </div>
                </div>

                <div>
                    <p class="text-sm text-slate-300"><?php echo e($payment->typeLabel()); ?></p>
                    <?php if($payment->payable): ?>
                        <p class="text-xs text-slate-500"><?php echo e($payment->payable->name ?? $payment->payable->title ?? ''); ?></p>
                    <?php endif; ?>
                </div>

                <div class="text-right">
                    <p class="font-semibold text-white"><?php echo e($payment->amountFormatted()); ?></p>
                    <p class="text-xs text-slate-500"><?php echo e($payment->created_at->diffForHumans()); ?></p>
                </div>

                <span class="badge <?php echo e(match($payment->status) {
                    'approved' => 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300',
                    'rejected' => 'border-rose-400/30 bg-rose-400/10 text-rose-300',
                    default => 'border-gold-400/30 bg-gold-400/10 text-gold-300',
                }); ?>"><?php echo e(ucfirst($payment->status)); ?></span>

                <?php if($payment->status === 'pending'): ?>
                    <div class="flex gap-2">
                        <form method="POST" action="<?php echo e(route('admin.payments.approve', $payment)); ?>">
                            <?php echo csrf_field(); ?>
                            <button class="rounded-lg border border-emerald-400/30 bg-emerald-400/10 px-4 py-2 text-xs font-semibold text-emerald-300 hover:bg-emerald-400/20">Approve</button>
                        </form>
                        <form method="POST" action="<?php echo e(route('admin.payments.reject', $payment)); ?>">
                            <?php echo csrf_field(); ?>
                            <button class="rounded-lg border border-rose-400/30 bg-rose-400/10 px-4 py-2 text-xs font-semibold text-rose-300 hover:bg-rose-400/20">Reject</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="card p-10 text-center text-slate-500">Nothing to review right now.</div>
        <?php endif; ?>
    </div>

    <div class="mt-6"><?php echo e($payments->links()); ?></div>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/admin/payments/index.blade.php ENDPATH**/ ?>