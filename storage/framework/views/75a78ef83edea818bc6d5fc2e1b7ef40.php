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
<?php
    $currency       = \App\Models\Setting::get('currency', 'USD');
    $currencySymbol = $currency === 'TZS' ? 'TZS ' : '$';
    $totalShown     = $payments->sum('amount');
?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Payments</h1>
            <p class="mt-1 text-sm text-slate-500">Approve a payment to instantly grant member access.</p>
        </div>
        
        <form method="GET" class="flex gap-2">
            <select name="status" class="input !py-2 !text-sm !w-auto" onchange="this.form.submit()">
                <option value="pending"  <?php if(request('status','pending')==='pending'): echo 'selected'; endif; ?>>⏳ Pending</option>
                <option value="approved" <?php if(request('status')==='approved'): echo 'selected'; endif; ?>>✓ Approved</option>
                <option value="rejected" <?php if(request('status')==='rejected'): echo 'selected'; endif; ?>>✕ Rejected</option>
                <option value=""         <?php if(request('status')===''): echo 'selected'; endif; ?>>All</option>
            </select>
        </form>
     <?php $__env->endSlot(); ?>

    <?php if(session('status')): ?>
        <div class="mb-4 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
            <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    
    <div class="mb-5 grid grid-cols-3 gap-4">
        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-medium text-slate-500">Showing</p>
            <p class="mt-1 text-xl font-extrabold text-slate-900"><?php echo e($payments->total()); ?></p>
            <p class="text-xs text-slate-400"><?php echo e(ucfirst(request('status', 'pending'))); ?> payments</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-medium text-slate-500">Total (this page)</p>
            <p class="mt-1 text-xl font-extrabold text-slate-900"><?php echo e($currencySymbol); ?><?php echo e(number_format($totalShown, 0)); ?></p>
            <p class="text-xs text-slate-400"><?php echo e($payments->count()); ?> records</p>
        </div>
        <div class="rounded-2xl border border-emerald-100 bg-emerald-50 p-4 shadow-sm">
            <p class="text-xs font-medium text-emerald-600">All-time Revenue</p>
            <p class="mt-1 text-xl font-extrabold text-emerald-800">
                <?php echo e($currencySymbol); ?><?php echo e(number_format(\App\Models\Payment::where('status','approved')->sum('amount'), 0)); ?>

            </p>
            <p class="text-xs text-emerald-500">approved payments</p>
        </div>
    </div>

    
    <div class="space-y-3">
        <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">

                
                <div class="flex flex-wrap items-center justify-between gap-4 p-5">

                    
                    <div class="flex items-center gap-4">
                        <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 font-bold text-sm">
                            <?php echo e(strtoupper(substr($payment->user->name, 0, 1))); ?>

                        </div>
                        <div>
                            <p class="font-semibold text-slate-900"><?php echo e($payment->user->name); ?></p>
                            <p class="text-xs text-slate-500"><?php echo e($payment->user->email); ?></p>
                        </div>
                    </div>

                    
                    <div class="min-w-[140px]">
                        <p class="text-sm font-semibold text-slate-700"><?php echo e($payment->typeLabel()); ?></p>
                        <p class="text-xs text-slate-400 mt-0.5"><?php echo e($payment->created_at->format('d M Y, H:i')); ?></p>
                        <?php if($payment->description): ?>
                            <p class="text-xs text-slate-400 mt-0.5 italic"><?php echo e(Str::limit($payment->description, 50)); ?></p>
                        <?php endif; ?>
                    </div>

                    
                    <div class="text-right">
                        <p class="text-xl font-extrabold text-slate-900"><?php echo e($payment->amountFormatted()); ?></p>
                        <p class="text-xs text-slate-400 mt-0.5"><?php echo e($payment->created_at->diffForHumans()); ?></p>
                    </div>

                    
                    <span class="badge text-xs <?php echo e(match($payment->status) {
                        'approved' => 'border-emerald-200 bg-emerald-50 text-emerald-700',
                        'rejected' => 'border-rose-200 bg-rose-50 text-rose-700',
                        default    => 'border-gold-200 bg-gold-50 text-gold-700',
                    }); ?>"><?php echo e(ucfirst($payment->status)); ?></span>

                    
                    <?php if($payment->status === 'pending'): ?>
                        <div class="flex gap-2">
                            <form method="POST" action="<?php echo e(route('admin.payments.approve', $payment)); ?>">
                                <?php echo csrf_field(); ?>
                                <button class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-2 text-xs font-bold text-emerald-700 transition hover:bg-emerald-100 active:scale-95">
                                    ✓ Approve
                                </button>
                            </form>
                            <form method="POST" action="<?php echo e(route('admin.payments.reject', $payment)); ?>">
                                <?php echo csrf_field(); ?>
                                <button class="rounded-xl border border-rose-200 bg-rose-50 px-4 py-2 text-xs font-bold text-rose-700 transition hover:bg-rose-100 active:scale-95">
                                    ✕ Reject
                                </button>
                            </form>
                        </div>
                    <?php elseif($payment->status === 'approved'): ?>
                        <div class="flex items-center gap-1.5 text-xs text-emerald-600">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Approved <?php echo e($payment->approved_at?->diffForHumans()); ?>

                        </div>
                    <?php endif; ?>
                </div>

                
                <?php if($payment->proof_path ?? false): ?>
                    <div class="flex items-center gap-3 border-t border-slate-100 bg-slate-50 px-5 py-2.5">
                        <svg class="h-3.5 w-3.5 flex-shrink-0 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                        </svg>
                        <a href="<?php echo e(asset('storage/'.$payment->proof_path)); ?>" target="_blank"
                           class="text-xs font-semibold text-brand-600 hover:underline">
                            View payment proof ↗
                        </a>
                        <span class="ml-auto text-xs text-slate-400">Uploaded <?php echo e($payment->created_at->diffForHumans()); ?></span>
                    </div>
                <?php endif; ?>

                
                <?php if($payment->admin_note): ?>
                    <div class="border-t border-slate-100 bg-slate-50 px-5 py-2.5">
                        <p class="text-xs text-slate-500"><span class="font-semibold">Admin note:</span> <?php echo e($payment->admin_note); ?></p>
                    </div>
                <?php endif; ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="flex flex-col items-center gap-3 rounded-2xl border border-slate-200 bg-white py-16 text-center shadow-sm">
                <svg class="h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/>
                </svg>
                <p class="text-sm font-semibold text-slate-500">Nothing to review right now.</p>
                <p class="text-xs text-slate-400">Pending payments will appear here when members submit proof.</p>
            </div>
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