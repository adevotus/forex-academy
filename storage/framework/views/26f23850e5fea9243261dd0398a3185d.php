<?php if (isset($component)) { $__componentOriginal131d2de898a1503a92a84eccccfb5c3d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal131d2de898a1503a92a84eccccfb5c3d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.member','data' => ['title' => 'Billing']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.member'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Billing']); ?>
     <?php $__env->slot('header', null, []); ?> Billing <?php $__env->endSlot(); ?>

    
    <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Billing & Payment History</h1>
            <p class="mt-1 text-sm text-slate-500">Every payment request you've made and its approval status.</p>
        </div>
    </div>

    
    <?php
        $approved = $payments->where('status', 'approved');
        $pending  = $payments->where('status', 'pending');
    ?>
    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-medium text-slate-500">Total Payments</p>
            <p class="mt-1 text-2xl font-extrabold text-slate-900"><?php echo e($payments->count()); ?></p>
            <p class="mt-0.5 text-xs text-slate-400">all time</p>
        </div>
        <div class="rounded-2xl border border-emerald-100 bg-emerald-50 p-5 shadow-sm">
            <p class="text-xs font-medium text-emerald-600">Approved</p>
            <p class="mt-1 text-2xl font-extrabold text-emerald-800"><?php echo e($approved->count()); ?></p>
            <p class="mt-0.5 text-xs text-emerald-500">payments approved</p>
        </div>
        <div class="rounded-2xl border border-amber-100 bg-amber-50 p-5 shadow-sm">
            <p class="text-xs font-medium text-amber-600">Pending Review</p>
            <p class="mt-1 text-2xl font-extrabold text-amber-800"><?php echo e($pending->count()); ?></p>
            <p class="mt-0.5 text-xs text-amber-500">awaiting approval</p>
        </div>
    </div>

    
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50">
                        <th class="px-6 py-3.5 text-xs font-bold uppercase tracking-wider text-slate-500">Item</th>
                        <th class="px-6 py-3.5 text-xs font-bold uppercase tracking-wider text-slate-500">Amount</th>
                        <th class="px-6 py-3.5 text-xs font-bold uppercase tracking-wider text-slate-500">Status</th>
                        <th class="px-6 py-3.5 text-xs font-bold uppercase tracking-wider text-slate-500">Date</th>
                        <th class="px-6 py-3.5 text-xs font-bold uppercase tracking-wider text-slate-500">Proof</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4">
                                <p class="font-semibold text-slate-900"><?php echo e($payment->typeLabel()); ?></p>
                                <?php if($payment->description): ?>
                                    <p class="text-xs text-slate-500 mt-0.5"><?php echo e(Str::limit($payment->description, 40)); ?></p>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-slate-900"><?php echo e($payment->amountFormatted()); ?></span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 rounded-full border px-2.5 py-1 text-xs font-semibold <?php echo e(match($payment->status) {
                                    'approved' => 'border-emerald-200 bg-emerald-50 text-emerald-700',
                                    'rejected' => 'border-rose-200 bg-rose-50 text-rose-700',
                                    default    => 'border-amber-200 bg-amber-50 text-amber-700',
                                }); ?>">
                                    <?php if($payment->status === 'approved'): ?>
                                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                    <?php elseif($payment->status === 'rejected'): ?>
                                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                    <?php else: ?>
                                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    <?php endif; ?>
                                    <?php echo e(ucfirst($payment->status)); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-600">
                                <?php echo e($payment->created_at->format('M d, Y')); ?>

                                <p class="text-xs text-slate-400"><?php echo e($payment->created_at->diffForHumans()); ?></p>
                            </td>
                            <td class="px-6 py-4">
                                <?php if($payment->proof_path): ?>
                                    <a href="<?php echo e(asset('storage/'.$payment->proof_path)); ?>" target="_blank"
                                       class="inline-flex items-center gap-1 text-xs font-semibold text-brand-600 hover:text-brand-700 hover:underline">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                                        View proof ↗
                                    </a>
                                <?php else: ?>
                                    <span class="text-xs text-slate-400">—</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <svg class="mx-auto h-10 w-10 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                                <p class="mt-3 text-sm font-semibold text-slate-500">No payment activity yet.</p>
                                <p class="mt-1 text-xs text-slate-400">Your course and subscription payments will appear here.</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <?php $lastRejected = $payments->where('status','rejected')->first(); ?>
    <?php if($lastRejected?->admin_note): ?>
        <div class="mt-4 flex items-start gap-3 rounded-xl border border-rose-200 bg-rose-50 p-4">
            <svg class="mt-0.5 h-4 w-4 flex-shrink-0 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <div>
                <p class="text-sm font-semibold text-rose-800">Admin note on last rejected payment</p>
                <p class="mt-0.5 text-sm text-rose-700"><?php echo e($lastRejected->admin_note); ?></p>
            </div>
        </div>
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal131d2de898a1503a92a84eccccfb5c3d)): ?>
<?php $attributes = $__attributesOriginal131d2de898a1503a92a84eccccfb5c3d; ?>
<?php unset($__attributesOriginal131d2de898a1503a92a84eccccfb5c3d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal131d2de898a1503a92a84eccccfb5c3d)): ?>
<?php $component = $__componentOriginal131d2de898a1503a92a84eccccfb5c3d; ?>
<?php unset($__componentOriginal131d2de898a1503a92a84eccccfb5c3d); ?>
<?php endif; ?>
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/member/billing/index.blade.php ENDPATH**/ ?>