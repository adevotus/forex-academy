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
    $activeStatus   = request('status', '');
    $activeType     = request('type', '');
?>

     <?php $__env->slot('header', null, []); ?> 
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Payments</h1>
            <p class="mt-1 text-sm text-slate-500">Manage and review all member payments.</p>
        </div>

        
        <a href="<?php echo e(route('admin.payments.export', request()->query())); ?>"
           class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50 transition">
            <svg class="h-4 w-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
            Export CSV
        </a>
     <?php $__env->endSlot(); ?>

    <?php if(session('status')): ?>
        <div class="mb-4 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
            <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    
    <div class="mb-5 grid grid-cols-2 gap-3 sm:grid-cols-4">
        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-medium text-slate-500">All Payments</p>
            <p class="mt-1 text-2xl font-extrabold text-slate-900"><?php echo e(number_format($stats['all'])); ?></p>
        </div>
        <div class="rounded-2xl border border-amber-100 bg-amber-50 p-4 shadow-sm">
            <p class="text-xs font-medium text-amber-600">Pending</p>
            <p class="mt-1 text-2xl font-extrabold text-amber-800"><?php echo e(number_format($stats['pending'])); ?></p>
        </div>
        <div class="rounded-2xl border border-emerald-100 bg-emerald-50 p-4 shadow-sm">
            <p class="text-xs font-medium text-emerald-600">Approved</p>
            <p class="mt-1 text-2xl font-extrabold text-emerald-800"><?php echo e(number_format($stats['approved'])); ?></p>
        </div>
        <div class="rounded-2xl border border-emerald-100 bg-emerald-50 p-4 shadow-sm">
            <p class="text-xs font-medium text-emerald-600">All-time Revenue</p>
            <p class="mt-1 text-2xl font-extrabold text-emerald-800"><?php echo e($currencySymbol); ?><?php echo e(number_format($stats['revenue'], 0)); ?></p>
        </div>
    </div>

    
    <form method="GET" class="mb-5 flex flex-wrap items-center gap-3">

        
        <div class="relative flex-1 min-w-[180px]">
            <svg class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
            <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search name or email…"
                   class="input pl-9 !py-2 !text-sm w-full">
        </div>

        
        <select name="status" class="input !py-2 !text-sm !w-auto" onchange="this.form.submit()">
            <option value=""         <?php if($activeStatus === ''): echo 'selected'; endif; ?>>All Statuses</option>
            <option value="pending"  <?php if($activeStatus === 'pending'): echo 'selected'; endif; ?>>⏳ Pending</option>
            <option value="approved" <?php if($activeStatus === 'approved'): echo 'selected'; endif; ?>>✓ Approved</option>
            <option value="rejected" <?php if($activeStatus === 'rejected'): echo 'selected'; endif; ?>>✕ Rejected</option>
        </select>

        
        <select name="type" class="input !py-2 !text-sm !w-auto" onchange="this.form.submit()">
            <option value=""                   <?php if($activeType === ''): echo 'selected'; endif; ?>>All Types</option>
            <option value="registration"       <?php if($activeType === 'registration'): echo 'selected'; endif; ?>>Registration Fee</option>
            <option value="course"             <?php if($activeType === 'course'): echo 'selected'; endif; ?>>Course Unlock</option>
            <option value="robot"              <?php if($activeType === 'robot'): echo 'selected'; endif; ?>>Robot / EA</option>
            <option value="signal_subscription"<?php if($activeType === 'signal_subscription'): echo 'selected'; endif; ?>>Signal Subscription</option>
            <option value="mentorship"         <?php if($activeType === 'mentorship'): echo 'selected'; endif; ?>>Mentorship</option>
        </select>

        <button type="submit" class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition shadow-sm">Search</button>

        <?php if(request()->hasAny(['search','status','type'])): ?>
            <a href="<?php echo e(route('admin.payments.index')); ?>" class="text-xs font-medium text-slate-400 hover:text-slate-600 transition">✕ Clear</a>
        <?php endif; ?>
    </form>

    
    <p class="mb-3 text-xs text-slate-400">
        Showing <?php echo e($payments->firstItem()); ?>–<?php echo e($payments->lastItem()); ?> of <?php echo e($payments->total()); ?> payments
        &nbsp;·&nbsp; Page total: <span class="font-semibold text-slate-700"><?php echo e($currencySymbol); ?><?php echo e(number_format($totalShown, 0)); ?></span>
    </p>

    
    <div class="space-y-3">
        <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">

                
                <div class="flex flex-wrap items-center justify-between gap-4 p-5">

                    
                    <div class="flex items-center gap-4 min-w-[180px]">
                        <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 font-bold text-sm">
                            <?php echo e(strtoupper(substr($payment->user->name ?? '?', 0, 1))); ?>

                        </div>
                        <div>
                            <p class="font-semibold text-slate-900"><?php echo e($payment->user->name); ?></p>
                            <p class="text-xs text-slate-500"><?php echo e($payment->user->email); ?></p>
                        </div>
                    </div>

                    
                    <div class="min-w-[160px]">
                        <span class="inline-block rounded-full px-2.5 py-0.5 text-[11px] font-semibold
                            <?php echo e(match($payment->type) {
                                'registration' => 'bg-blue-50 text-blue-700 border border-blue-200',
                                'course'       => 'bg-purple-50 text-purple-700 border border-purple-200',
                                'robot'        => 'bg-indigo-50 text-indigo-700 border border-indigo-200',
                                'mentorship'   => 'bg-pink-50 text-pink-700 border border-pink-200',
                                default        => 'bg-slate-50 text-slate-700 border border-slate-200',
                            }); ?>">
                            <?php echo e($payment->typeLabel()); ?>

                        </span>
                        <p class="text-xs text-slate-400 mt-1"><?php echo e($payment->created_at->format('d M Y, H:i')); ?></p>
                    </div>

                    
                    <div class="text-right">
                        <p class="text-xl font-extrabold text-slate-900"><?php echo e($payment->amountFormatted()); ?></p>
                        <p class="text-xs text-slate-400 mt-0.5"><?php echo e($payment->created_at->diffForHumans()); ?></p>
                        <?php if($payment->status === 'pending'): ?>
                            <button type="button"
                                onclick="toggleEditAmount('edit-<?php echo e($payment->id); ?>')"
                                class="mt-1 text-[10px] font-semibold text-blue-500 hover:text-blue-700 underline underline-offset-2">
                                Edit amount
                            </button>
                        <?php endif; ?>
                    </div>

                    
                    <span class="rounded-full border px-3 py-1 text-xs font-semibold <?php echo e(match($payment->status) {
                        'approved' => 'border-emerald-200 bg-emerald-50 text-emerald-700',
                        'rejected' => 'border-rose-200 bg-rose-50 text-rose-700',
                        default    => 'border-amber-200 bg-amber-50 text-amber-700',
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
                    <?php elseif($payment->status === 'rejected'): ?>
                        <div class="flex items-center gap-1.5 text-xs text-rose-500">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Rejected
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

                
                <?php if($payment->status === 'pending'): ?>
                    <div id="edit-<?php echo e($payment->id); ?>" class="hidden border-t border-blue-100 bg-blue-50 px-5 py-3">
                        <form method="POST" action="<?php echo e(route('admin.payments.amount', $payment)); ?>" class="flex items-center gap-3">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <label class="text-xs font-semibold text-blue-800">Correct Amount:</label>
                            <div class="flex items-center gap-1.5 rounded-lg border border-blue-200 bg-white px-3 py-1.5">
                                <span class="text-xs font-semibold text-slate-400"><?php echo e($payment->currencySymbol()); ?></span>
                                <input type="number" name="amount" step="0.01" min="1"
                                    value="<?php echo e($payment->amount); ?>"
                                    class="w-28 text-sm font-bold text-slate-900 outline-none">
                            </div>
                            <button type="submit" class="rounded-lg bg-blue-600 px-4 py-1.5 text-xs font-bold text-white hover:bg-blue-700 transition">
                                Save
                            </button>
                            <button type="button" onclick="toggleEditAmount('edit-<?php echo e($payment->id); ?>')"
                                class="text-xs font-medium text-slate-500 hover:text-slate-700">
                                Cancel
                            </button>
                        </form>
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
                <svg class="h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
                <p class="text-sm font-semibold text-slate-500">No payments found.</p>
                <p class="text-xs text-slate-400">Try adjusting the filters above.</p>
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

<script>
function toggleEditAmount(id) {
    const el = document.getElementById(id);
    if (el) el.classList.toggle('hidden');
}
</script>
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/admin/payments/index.blade.php ENDPATH**/ ?>