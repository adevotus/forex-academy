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
<?php
    $currency       = \App\Models\Setting::get('currency', 'USD');
    $currencySymbol = $currency === 'TZS' ? 'TZS ' : '$';
?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Admin Overview</h1>
            <p class="mt-1 text-sm text-slate-500">EMMIOXFOREX ACADEMY platform snapshot.</p>
        </div>
     <?php $__env->endSlot(); ?>

    
    <?php if($notifications->isNotEmpty()): ?>
        <div class="mb-6 overflow-hidden rounded-2xl border border-gold-200 bg-gold-50">
            <div class="flex items-center justify-between border-b border-gold-100 px-5 py-3.5">
                <div class="flex items-center gap-2">
                    <svg class="h-4 w-4 text-gold-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="text-sm font-bold text-gold-800"><?php echo e($notifications->count()); ?> action<?php echo e($notifications->count() !== 1 ? 's' : ''); ?> need your attention</span>
                </div>
                <a href="<?php echo e(route('admin.payments.index')); ?>" class="text-xs font-semibold text-gold-700 hover:text-gold-900">View payments →</a>
            </div>
            <div class="divide-y divide-gold-100">
                <?php $__currentLoopData = $notifications->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($note['link']); ?>" class="flex items-center gap-4 px-5 py-3 transition hover:bg-gold-100">
                        <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-xl
                            <?php echo e($note['color'] === 'gold' ? 'bg-gold-100 text-gold-700' : 'bg-brand-100 text-brand-700'); ?>">
                            <?php if($note['icon'] === 'receipt'): ?>
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            <?php else: ?>
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <?php endif; ?>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="truncate text-sm font-semibold text-slate-800"><?php echo e($note['title']); ?></p>
                            <p class="truncate text-xs text-slate-500"><?php echo e($note['sub']); ?></p>
                        </div>
                        <span class="flex-shrink-0 text-xs text-slate-400"><?php echo e($note['time']->diffForHumans()); ?></span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($notifications->count() > 5): ?>
                    <div class="px-5 py-2.5 text-center">
                        <span class="text-xs text-gold-600">+ <?php echo e($notifications->count() - 5); ?> more pending items</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-2 lg:grid-cols-4">

        <div class="card p-5">
            <div class="flex items-center gap-4">
                <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-brand-50 ring-1 ring-brand-100 text-brand-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500">Total Members</p>
                    <p class="text-2xl font-extrabold text-slate-900"><?php echo e($stats['total_members']); ?></p>
                    <p class="mt-0.5 text-xs text-slate-400"><?php echo e($stats['approved_members']); ?> approved</p>
                </div>
            </div>
        </div>

        <div class="card p-5">
            <div class="flex items-center gap-4">
                <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-gold-50 ring-1 ring-gold-100 text-gold-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500">Pending Approval</p>
                    <p class="text-2xl font-extrabold text-slate-900"><?php echo e($stats['pending_members']); ?></p>
                    <p class="mt-0.5 text-xs text-slate-400">members waiting</p>
                </div>
            </div>
        </div>

        <div class="card p-5">
            <div class="flex items-center gap-4">
                <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-rose-50 ring-1 ring-rose-100 text-rose-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500">Pending Payments</p>
                    <p class="text-2xl font-extrabold text-slate-900"><?php echo e($stats['pending_payments']); ?></p>
                    <p class="mt-0.5 text-xs text-slate-400">awaiting review</p>
                </div>
            </div>
        </div>

        <div class="card p-5">
            <div class="flex items-center gap-4">
                <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-emerald-50 ring-1 ring-emerald-100 text-emerald-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500">Total Revenue</p>
                    <p class="text-2xl font-extrabold text-slate-900"><?php echo e($currencySymbol); ?><?php echo e(number_format($stats['total_revenue'], 0)); ?></p>
                    <p class="mt-0.5 text-xs text-slate-400">approved payments</p>
                </div>
            </div>
        </div>

    </div>

    
    <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3">

        <a href="<?php echo e(route('admin.courses.index')); ?>"
           class="card group flex items-center gap-4 p-5 transition hover:border-brand-300 hover:shadow-md">
            <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition group-hover:bg-brand-600 group-hover:text-white group-hover:ring-brand-600">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500">Courses</p>
                <p class="text-2xl font-extrabold text-slate-900"><?php echo e($stats['courses']); ?></p>
            </div>
        </a>

        <a href="<?php echo e(route('admin.robots.index')); ?>"
           class="card group flex items-center gap-4 p-5 transition hover:border-gold-300 hover:shadow-md">
            <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-gold-50 text-gold-600 ring-1 ring-gold-100 transition group-hover:bg-gold-500 group-hover:text-white group-hover:ring-gold-500">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><path d="M8 21h8m-4-4v4"/></svg>
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500">Robots / EAs</p>
                <p class="text-2xl font-extrabold text-slate-900"><?php echo e($stats['robots']); ?></p>
            </div>
        </a>

        <a href="<?php echo e(route('admin.signals.index')); ?>"
           class="card group flex items-center gap-4 p-5 transition hover:border-emerald-300 hover:shadow-md">
            <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 ring-1 ring-emerald-100 transition group-hover:bg-emerald-600 group-hover:text-white group-hover:ring-emerald-600">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500">Signals Published</p>
                <p class="text-2xl font-extrabold text-slate-900"><?php echo e($stats['signals']); ?></p>
            </div>
        </a>

    </div>

    
    <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">

        
        <div class="card overflow-hidden">
            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                <h2 class="font-extrabold text-slate-900">Recent Payments</h2>
                <a href="<?php echo e(route('admin.payments.index')); ?>"
                   class="text-xs font-semibold text-brand-600 hover:text-brand-700">View all →</a>
            </div>
            <div class="divide-y divide-slate-100">
                <?php $__empty_1 = true; $__currentLoopData = $recentPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex items-center justify-between gap-3 px-6 py-3.5">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">
                                <?php echo e(strtoupper(substr($payment->user->name, 0, 1))); ?>

                            </div>
                            <div class="min-w-0">
                                <p class="truncate text-sm font-semibold text-slate-900"><?php echo e($payment->user->name); ?></p>
                                <p class="truncate text-xs text-slate-500"><?php echo e($payment->typeLabel()); ?></p>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 items-center gap-3">
                            <span class="text-sm font-bold text-slate-800"><?php echo e($payment->amountFormatted()); ?></span>
                            <span class="badge <?php echo e(match($payment->status) {
                                'approved' => 'border-emerald-200 bg-emerald-50 text-emerald-700',
                                'rejected' => 'border-rose-200 bg-rose-50 text-rose-700',
                                default    => 'border-gold-200 bg-gold-50 text-gold-700',
                            }); ?>"><?php echo e(ucfirst($payment->status)); ?></span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="px-6 py-8 text-center text-sm text-slate-400">No payments yet.</p>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="card overflow-hidden">
            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                <h2 class="font-extrabold text-slate-900">Recent Members</h2>
                <a href="<?php echo e(route('admin.members.index')); ?>"
                   class="text-xs font-semibold text-brand-600 hover:text-brand-700">View all →</a>
            </div>
            <div class="divide-y divide-slate-100">
                <?php $__empty_1 = true; $__currentLoopData = $recentMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="<?php echo e(route('admin.members.show', $member)); ?>"
                       class="flex items-center gap-3 px-6 py-3.5 transition hover:bg-slate-50">
                        <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-slate-100 text-sm font-bold text-slate-600">
                            <?php echo e(strtoupper(substr($member->name, 0, 1))); ?>

                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="truncate text-sm font-semibold text-slate-900"><?php echo e($member->name); ?></p>
                            <p class="truncate text-xs text-slate-500"><?php echo e($member->email); ?></p>
                        </div>
                        <span class="badge <?php echo e($member->status === 'approved'
                            ? 'border-emerald-200 bg-emerald-50 text-emerald-700'
                            : 'border-gold-200 bg-gold-50 text-gold-700'); ?>">
                            <?php echo e(ucfirst($member->status)); ?>

                        </span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="px-6 py-8 text-center text-sm text-slate-400">No members yet.</p>
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