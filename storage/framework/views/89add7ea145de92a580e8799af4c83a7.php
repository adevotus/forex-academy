<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'Pricing']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Pricing']); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h1 class="text-2xl font-extrabold text-slate-900">Pricing Management</h1>
     <?php $__env->endSlot(); ?>

    <?php
        $currency = $settings['currency'];
        $rate     = (float) $settings['usd_to_tzs'];
        $fmt = fn($usd) => $currency === 'TZS'
            ? 'TZS ' . number_format((float)$usd * $rate, 0, '.', ',')
            : '$' . number_format((float)$usd, 2);
    ?>

    
    <div class="mb-8 flex items-center justify-between rounded-xl border border-slate-200 bg-white px-5 py-3 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand-50 text-brand-600">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-sm text-slate-600">Display currency:</span>
                <span class="rounded-full bg-brand-50 px-3 py-0.5 text-sm font-bold text-brand-700"><?php echo e($currency); ?></span>
                <?php if($currency === 'TZS'): ?>
                    <span class="text-xs text-slate-400">· 1 USD = TZS <?php echo e(number_format($rate, 0)); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <a href="<?php echo e(route('admin.preferences')); ?>" class="btn-outline !py-1.5 text-xs">
            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
            Change Currency
        </a>
    </div>

    <div class="space-y-8">

        
        <div class="card overflow-hidden">
            <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Global Settings</h2>
                <p class="mt-0.5 text-xs text-slate-500">Registration fee, signal subscription price, and exchange rate.</p>
            </div>
            <form method="POST" action="<?php echo e(route('admin.pricing.settings')); ?>" class="p-6">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                        <label class="label text-xs" for="registration_fee">Registration Fee</label>
                        <div class="relative mt-1">
                            <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400 text-sm">$</span>
                            <input id="registration_fee" type="number" name="registration_fee" step="0.01" min="0"
                                   value="<?php echo e($settings['registration_fee']); ?>" class="input pl-7">
                        </div>
                        <?php if($currency === 'TZS'): ?>
                            <p class="mt-1.5 text-xs font-medium text-brand-600">≈ <?php echo e($fmt($settings['registration_fee'])); ?></p>
                        <?php endif; ?>
                        <?php $__errorArgs = ['registration_fee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-rose-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                        <label class="label text-xs" for="signal_price">Signal Subscription</label>
                        <div class="relative mt-1">
                            <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400 text-sm">$</span>
                            <input id="signal_price" type="number" name="signal_price" step="0.01" min="0"
                                   value="<?php echo e($settings['signal_price']); ?>" class="input pl-7">
                        </div>
                        <?php if($currency === 'TZS'): ?>
                            <p class="mt-1.5 text-xs font-medium text-brand-600">≈ <?php echo e($fmt($settings['signal_price'])); ?></p>
                        <?php endif; ?>
                        <?php $__errorArgs = ['signal_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-rose-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                        <label class="label text-xs" for="usd_to_tzs">USD → TZS Rate</label>
                        <input id="usd_to_tzs" type="number" name="usd_to_tzs" step="1" min="1"
                               value="<?php echo e($settings['usd_to_tzs']); ?>" class="input mt-1">
                        <p class="mt-1.5 text-xs text-slate-400">Rate per $1 USD</p>
                        <?php $__errorArgs = ['usd_to_tzs'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-rose-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                        <label class="label text-xs" for="currency">Active Currency</label>
                        <select id="currency" name="currency" class="input mt-1">
                            <option value="USD" <?php echo e($settings['currency'] === 'USD' ? 'selected' : ''); ?>>USD — US Dollar</option>
                            <option value="TZS" <?php echo e($settings['currency'] === 'TZS' ? 'selected' : ''); ?>>TZS — Shilling</option>
                        </select>
                        <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-rose-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                </div>
                <div class="mt-5 flex justify-end">
                    <button type="submit" class="btn-primary px-6 py-2">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Save Settings
                    </button>
                </div>
            </form>
        </div>

        
        <div class="card overflow-hidden">
            <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand-50 text-brand-600">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Course Prices</h2>
                        <p class="text-xs text-slate-500">Stored in USD<?php echo e($currency === 'TZS' ? ' · TZS equivalent shown' : ''); ?></p>
                    </div>
                </div>
            </div>

            <?php if($courses->isEmpty()): ?>
                <p class="px-6 py-8 text-sm text-slate-500">No courses found.</p>
            <?php else: ?>
                <form method="POST" action="<?php echo e(route('admin.pricing.courses')); ?>" class="p-6">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                                <div class="mb-3">
                                    <p class="truncate font-semibold text-slate-900 text-sm"><?php echo e($course->title); ?></p>
                                    <span class="badge badge-level-<?php echo e($course->level); ?> mt-1 py-0 text-[10px]"><?php echo e(ucfirst($course->level)); ?></span>
                                </div>
                                <div class="relative">
                                    <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400 text-sm">$</span>
                                    <input type="number" name="prices[<?php echo e($course->id); ?>]"
                                           value="<?php echo e(number_format((float)$course->price, 2, '.', '')); ?>"
                                           step="0.01" min="0" class="input pl-7 py-2 text-sm">
                                </div>
                                <?php if($currency === 'TZS'): ?>
                                    <p class="mt-1.5 text-xs font-medium text-brand-600">≈ <?php echo e($fmt($course->price)); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="mt-5 flex justify-end">
                        <button type="submit" class="btn-primary px-6 py-2">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            Save Course Prices
                        </button>
                    </div>
                </form>
            <?php endif; ?>
        </div>

        
        <div class="card overflow-hidden">
            <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gold-50 text-gold-600">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><path d="M8 21h8m-4-4v4"/></svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Robot / EA Prices</h2>
                        <p class="text-xs text-slate-500">Stored in USD</p>
                    </div>
                </div>
            </div>

            <?php if($robots->isEmpty()): ?>
                <p class="px-6 py-8 text-sm text-slate-500">No robots found.</p>
            <?php else: ?>
                <form method="POST" action="<?php echo e(route('admin.pricing.robots')); ?>" class="p-6">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <?php $__currentLoopData = $robots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $robot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                                <div class="mb-3">
                                    <p class="truncate font-semibold text-slate-900 text-sm"><?php echo e($robot->name); ?></p>
                                    <p class="text-xs text-slate-500 mt-0.5">v<?php echo e($robot->version); ?> · <?php echo e($robot->duration_days); ?> days</p>
                                </div>
                                <div class="relative">
                                    <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400 text-sm">$</span>
                                    <input type="number" name="prices[<?php echo e($robot->id); ?>]"
                                           value="<?php echo e(number_format((float)$robot->price, 2, '.', '')); ?>"
                                           step="0.01" min="0" class="input pl-7 py-2 text-sm">
                                </div>
                                <?php if($currency === 'TZS'): ?>
                                    <p class="mt-1.5 text-xs font-medium text-brand-600">≈ <?php echo e($fmt($robot->price)); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="mt-5 flex justify-end">
                        <button type="submit" class="btn-primary px-6 py-2">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            Save Robot Prices
                        </button>
                    </div>
                </form>
            <?php endif; ?>
        </div>

        
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

            
            <div class="card overflow-hidden">
                <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        </div>
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Signals</h2>
                    </div>
                </div>
                <div class="p-6">
                    <div class="rounded-xl border border-emerald-100 bg-emerald-50 p-5">
                        <p class="text-sm font-semibold text-slate-900">3-Month Signal Subscription</p>
                        <p class="mt-1 text-3xl font-extrabold text-emerald-700">$<?php echo e(number_format((float)$settings['signal_price'], 2)); ?></p>
                        <?php if($currency === 'TZS'): ?>
                            <p class="mt-1 text-xs font-medium text-slate-600">≈ <?php echo e($fmt($settings['signal_price'])); ?></p>
                        <?php endif; ?>
                        <p class="mt-3 text-xs text-slate-500">Managed in Global Settings above.</p>
                    </div>
                </div>
            </div>

            
            <div class="card overflow-hidden">
                <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-purple-50 text-purple-600">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                        </div>
                        <h2 class="text-sm font-extrabold uppercase tracking-wide text-slate-700">Mentorship Sessions</h2>
                    </div>
                </div>
                <?php if($mentorships->isEmpty()): ?>
                    <p class="px-6 py-8 text-sm text-slate-500">No sessions found.</p>
                <?php else: ?>
                    <form method="POST" action="<?php echo e(route('admin.pricing.mentorship')); ?>" class="p-6">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="space-y-3">
                            <?php $__currentLoopData = $mentorships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-center gap-3 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3">
                                    <div class="flex-1 min-w-0">
                                        <p class="truncate text-sm font-semibold text-slate-900"><?php echo e($m->title); ?></p>
                                        <?php if($currency === 'TZS'): ?>
                                            <p class="text-xs font-medium text-brand-600 mt-0.5">≈ <?php echo e($fmt($m->price)); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="relative w-32 flex-shrink-0">
                                        <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400 text-sm">$</span>
                                        <input type="number" name="prices[<?php echo e($m->id); ?>]"
                                               value="<?php echo e(number_format((float)$m->price, 2, '.', '')); ?>"
                                               step="0.01" min="0" class="input pl-7 py-2 text-sm">
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="mt-5 flex justify-end">
                            <button type="submit" class="btn-primary px-5 py-2 text-sm">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                Save Mentorship Prices
                            </button>
                        </div>
                    </form>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/admin/pricing.blade.php ENDPATH**/ ?>