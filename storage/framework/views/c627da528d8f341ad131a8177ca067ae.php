<?php if (isset($component)) { $__componentOriginal131d2de898a1503a92a84eccccfb5c3d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal131d2de898a1503a92a84eccccfb5c3d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.member','data' => ['title' => 'Robots']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.member'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Robots']); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Robot / EA Subscriptions</h1>
            <p class="mt-1 text-sm text-slate-500">Systematic trade execution, tailored to your risk profile.</p>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        <?php $__currentLoopData = $robots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $robot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $sub = $activeSubscriptions->get($robot->id); ?>
            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden flex flex-col transition hover:shadow-md hover:-translate-y-0.5">

                
                <div class="relative h-40 overflow-hidden">
                    <?php if($robot->image): ?>
                        <img src="<?php echo e(Storage::disk('public')->url($robot->image)); ?>"
                             alt="<?php echo e($robot->name); ?>"
                             class="h-full w-full object-cover transition-transform duration-300 hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    <?php else: ?>
                        
                        <div class="h-full w-full flex items-center justify-center relative"
                             style="background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #0f2444 100%);">
                            
                            <svg class="absolute inset-0 w-full h-full opacity-10" viewBox="0 0 400 160" preserveAspectRatio="xMidYMid slice">
                                <defs>
                                    <pattern id="grid-<?php echo e($robot->id); ?>" width="40" height="40" patternUnits="userSpaceOnUse">
                                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="#60a5fa" stroke-width="0.5"/>
                                    </pattern>
                                </defs>
                                <rect width="400" height="160" fill="url(#grid-<?php echo e($robot->id); ?>)"/>
                                
                                <circle cx="200" cy="80" r="60" fill="none" stroke="#3b82f6" stroke-width="0.5" opacity="0.4"/>
                                <circle cx="200" cy="80" r="40" fill="none" stroke="#60a5fa" stroke-width="0.5" opacity="0.3"/>
                                
                                <polyline points="40,110 80,90 120,100 160,70 200,80 240,50 280,60 320,40 360,55" fill="none" stroke="#34d399" stroke-width="1.5" opacity="0.5"/>
                                <polyline points="40,120 80,115 120,118 160,100 200,105 240,88 280,92 320,75 360,80" fill="none" stroke="#60a5fa" stroke-width="1" opacity="0.4"/>
                            </svg>
                            
                            <div class="relative flex flex-col items-center gap-2">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-blue-400/30 bg-blue-500/20 backdrop-blur-sm shadow-lg">
                                    <svg class="h-7 w-7 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21M6.75 19.5h10.5a2.25 2.25 0 002.25-2.25V6.75a2.25 2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 004.5 6.75v10.5a2.25 2.25 0 002.25 2.25zm.75-12h9v9h-9v-9z"/>
                                    </svg>
                                </div>
                                <span class="text-[10px] font-semibold tracking-widest text-blue-300/70 uppercase">EA Robot</span>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <div class="absolute top-2.5 right-2.5">
                        <?php if($sub): ?>
                            <span class="inline-flex items-center gap-1 rounded-full bg-emerald-500 px-2.5 py-0.5 text-[11px] font-bold text-white shadow">
                                <span class="h-1.5 w-1.5 rounded-full bg-white/80 animate-pulse"></span>
                                Active
                            </span>
                        <?php else: ?>
                            <span class="inline-flex items-center gap-1 rounded-full bg-black/50 px-2.5 py-0.5 text-[11px] font-semibold text-white/80 backdrop-blur-sm border border-white/10">
                                <svg class="h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/></svg>
                                Locked
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="flex flex-1 flex-col p-4">
                    <div class="flex items-start justify-between gap-2">
                        <div class="min-w-0">
                            <h3 class="truncate text-base font-bold text-slate-900"><?php echo e($robot->name); ?></h3>
                            <p class="text-[11px] text-slate-400">v<?php echo e($robot->version); ?></p>
                        </div>
                    </div>
                    <p class="mt-2 flex-1 text-xs leading-relaxed text-slate-500 line-clamp-2"><?php echo e($robot->description); ?></p>

                    <div class="mt-4 space-y-2">
                        <?php if($sub): ?>
                            <div class="flex items-center gap-1.5 text-xs font-medium text-emerald-600">
                                <svg class="h-3.5 w-3.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Expires <?php echo e($sub->expires_at?->format('M d, Y')); ?>

                            </div>
                            <a href="<?php echo e(route('member.robots.show', $robot)); ?>"
                               class="flex w-full items-center justify-center rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">
                                View Details
                            </a>
                        <?php else: ?>
                            <div class="flex items-end justify-between">
                                <div>
                                    <p class="text-xl font-extrabold text-slate-900"><?php echo e($robot->priceFormatted()); ?></p>
                                    <p class="text-[10px] text-slate-400"><?php echo e($robot->duration_days); ?>-day access</p>
                                </div>
                            </div>
                            <button type="button"
                                    onclick="openRobotModal('<?php echo e(route('member.robots.unlock', $robot)); ?>', <?php echo e(json_encode($robot->name)); ?>, <?php echo e(json_encode($robot->priceFormatted())); ?>)"
                                    class="flex w-full items-center justify-center gap-2 rounded-xl border border-brand-200 bg-brand-50 px-4 py-2.5 text-sm font-bold text-brand-700 transition hover:bg-brand-100 active:scale-[.98]">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/></svg>
                                Unlock Robot
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div id="robot-unlock-modal"
         class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/60 p-4 backdrop-blur-sm"
         onclick="if(event.target===this) closeRobotModal()">

        <div class="w-full max-w-4xl overflow-hidden rounded-2xl bg-white shadow-2xl">

            
            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-brand-50">
                        <svg class="h-5 w-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 leading-tight">Unlock Robot</h3>
                        <p id="robot-modal-subtitle" class="text-xs text-slate-500"></p>
                    </div>
                </div>
                <button onclick="closeRobotModal()" class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            
            <div class="flex flex-col sm:flex-row divide-y sm:divide-y-0 sm:divide-x divide-slate-100">

                
                <div class="flex flex-col gap-4 bg-slate-50 p-5 sm:w-96 sm:flex-shrink-0 overflow-y-auto" style="max-height:80vh">

                    
                    <div class="flex items-center gap-3 rounded-xl border border-brand-100 bg-white px-4 py-3 shadow-sm">
                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-brand-600">
                            <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-medium uppercase tracking-wide text-slate-400">Amount Due</p>
                            <p id="robot-modal-price" class="text-xl font-extrabold text-slate-900"></p>
                        </div>
                    </div>

                    
                    <div class="space-y-3">
                        <p class="text-[10px] font-semibold uppercase tracking-widest text-slate-400">How to Pay</p>

                        <?php $__empty_1 = true; $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                                $filledDetails = collect($method->details ?? [])->filter(fn($d) => !empty($d['label'] ?? '') || !empty($d['value'] ?? ''))->values();
                                $headerBg = match($method->icon_color) {
                                    'emerald' => 'bg-emerald-50 border-emerald-100',
                                    'blue'    => 'bg-blue-50 border-blue-100',
                                    'gold'    => 'bg-yellow-50 border-yellow-100',
                                    'purple'  => 'bg-purple-50 border-purple-100',
                                    default   => 'bg-slate-50 border-slate-100',
                                };
                                $iconBg = match($method->icon_color) {
                                    'emerald' => 'bg-emerald-600',
                                    'blue'    => 'bg-blue-600',
                                    'gold'    => 'bg-yellow-500',
                                    'purple'  => 'bg-purple-600',
                                    default   => 'bg-slate-700',
                                };
                            ?>
                            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                                <div class="flex items-center gap-2 border-b px-3.5 py-2.5 <?php echo e($headerBg); ?>">
                                    <div class="flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-lg text-xs font-extrabold text-white <?php echo e($iconBg); ?>">
                                        <?php echo e($method->typeIcon()); ?>

                                    </div>
                                    <div class="min-w-0">
                                        <span class="block text-xs font-bold text-slate-800"><?php echo e($method->name); ?></span>
                                        <?php if($method->subtitle): ?>
                                            <span class="text-[10px] text-slate-500"><?php echo e($method->subtitle); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if($filledDetails->isNotEmpty()): ?>
                                    <div class="divide-y divide-slate-100 px-3.5 py-1">
                                        <?php $__currentLoopData = $filledDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $val = $detail['value'] ?: '—'; ?>
                                            <div class="py-2.5">
                                                <span class="block text-[10px] font-medium uppercase tracking-wide text-slate-400 mb-1"><?php echo e($detail['label'] ?? ''); ?></span>
                                                <div class="flex items-center gap-2">
                                                    <span class="font-mono text-[12px] font-semibold text-slate-800 select-all break-all leading-snug flex-1"><?php echo e($val); ?></span>
                                                    <?php if($val !== '—'): ?>
                                                        <button type="button"
                                                                onclick="copyValue(this, <?php echo e(json_encode($val)); ?>)"
                                                                title="Copy to clipboard"
                                                                class="copy-btn flex-shrink-0 flex items-center gap-1 px-2 py-1 rounded-lg border border-slate-200 bg-slate-50 hover:bg-emerald-50 hover:border-emerald-300 text-slate-500 hover:text-emerald-600 transition text-[10px] font-medium whitespace-nowrap">
                                                            <svg class="copy-icon h-3.5 w-3.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                                            </svg>
                                                            <svg class="check-icon h-3.5 w-3.5 flex-shrink-0 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                                            </svg>
                                                            <span class="copy-label">Copy</span>
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php else: ?>
                                    <p class="px-3.5 py-2.5 text-[11px] italic text-slate-400">Contact admin for details.</p>
                                <?php endif; ?>
                                <?php if($method->note): ?>
                                    <p class="border-t border-slate-50 px-3.5 pb-2.5 pt-2 text-[10px] text-slate-400"><?php echo e($method->note); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="rounded-xl border border-dashed border-slate-200 bg-white p-4 text-center">
                                <p class="text-xs text-slate-400">No payment methods configured yet.</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <p class="text-[10px] leading-relaxed text-slate-400">
                        After paying, upload your receipt on the right. Admin will verify and unlock the robot within 24 hours.
                    </p>
                </div>

                
                <form id="robot-unlock-form" method="POST" action="" enctype="multipart/form-data"
                      class="flex flex-1 flex-col p-6">
                    <?php echo csrf_field(); ?>

                    <h4 class="mb-4 text-sm font-bold text-slate-800">Upload Payment Proof</h4>

                    <label id="rob-drop-zone"
                           class="flex flex-1 cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 p-8 text-center transition hover:border-brand-400 hover:bg-brand-50">
                        <div id="rob-dz-idle" class="flex flex-col items-center gap-3">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white shadow-sm border border-slate-200">
                                <svg class="h-7 w-7 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-700">Click or drag & drop</p>
                                <p class="mt-0.5 text-xs text-slate-400">Screenshot or PDF of your payment receipt</p>
                            </div>
                            <span class="rounded-lg border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-500 shadow-sm">JPG · PNG · PDF — max 5 MB</span>
                        </div>
                        <div id="rob-dz-preview" class="hidden flex-col items-center gap-2">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50">
                                <svg class="h-7 w-7 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <p id="rob-dz-filename" class="max-w-[180px] truncate text-sm font-semibold text-emerald-700"></p>
                            <p class="text-xs text-slate-400">Click to change file</p>
                        </div>
                        <input type="file" name="proof" id="rob-proof" accept="image/*,.pdf" class="hidden">
                    </label>

                    <ul class="mt-4 space-y-1">
                        <li class="flex items-start gap-1.5 text-xs text-slate-400">
                            <svg class="mt-px h-3.5 w-3.5 flex-shrink-0 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Make sure the receipt clearly shows the amount and transaction ID.
                        </li>
                        <li class="flex items-start gap-1.5 text-xs text-slate-400">
                            <svg class="mt-px h-3.5 w-3.5 flex-shrink-0 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Admin will review and unlock your robot within 24 hours.
                        </li>
                    </ul>

                    <button type="submit"
                            class="mt-5 flex w-full items-center justify-center gap-2 rounded-xl bg-brand-600 px-4 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-brand-700 active:scale-[.98]">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Submit Payment for Review
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
    function openRobotModal(actionUrl, robotName, price) {
        document.getElementById('robot-unlock-form').action = actionUrl;
        document.getElementById('robot-modal-subtitle').textContent = robotName;
        document.getElementById('robot-modal-price').textContent = price;
        // reset file picker
        document.getElementById('rob-dz-idle').classList.remove('hidden');
        document.getElementById('rob-dz-preview').classList.add('hidden');
        document.getElementById('rob-proof').value = '';
        var m = document.getElementById('robot-unlock-modal');
        m.classList.remove('hidden'); m.classList.add('flex');
    }
    function closeRobotModal() {
        var m = document.getElementById('robot-unlock-modal');
        m.classList.add('hidden'); m.classList.remove('flex');
    }
    document.addEventListener('keydown', function(e){ if(e.key==='Escape') closeRobotModal(); });
    document.getElementById('rob-proof').addEventListener('change', function(){
        if (this.files.length) {
            document.getElementById('rob-dz-filename').textContent = this.files[0].name;
            document.getElementById('rob-dz-idle').classList.add('hidden');
            var p = document.getElementById('rob-dz-preview');
            p.classList.remove('hidden'); p.classList.add('flex');
        }
    });

    function copyValue(btn, text) {
        function doFeedback() {
            var copyIcon  = btn.querySelector('.copy-icon');
            var checkIcon = btn.querySelector('.check-icon');
            var label     = btn.querySelector('.copy-label');
            copyIcon.classList.add('hidden');
            checkIcon.classList.remove('hidden');
            if (label) label.textContent = 'Copied!';
            btn.classList.add('bg-emerald-50','border-emerald-300','text-emerald-600');
            btn.classList.remove('bg-slate-50','border-slate-200','text-slate-500');
            setTimeout(function() {
                copyIcon.classList.remove('hidden');
                checkIcon.classList.add('hidden');
                if (label) label.textContent = 'Copy';
                btn.classList.remove('bg-emerald-50','border-emerald-300','text-emerald-600');
                btn.classList.add('bg-slate-50','border-slate-200','text-slate-500');
            }, 2000);
        }
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(doFeedback).catch(function(){ fallbackCopy(text); doFeedback(); });
        } else { fallbackCopy(text); doFeedback(); }
    }
    function fallbackCopy(text) {
        var ta = document.createElement('textarea');
        ta.value = text;
        ta.style.cssText = 'position:fixed;top:0;left:0;opacity:0;pointer-events:none';
        document.body.appendChild(ta); ta.focus(); ta.select();
        try { document.execCommand('copy'); } catch(e) {}
        document.body.removeChild(ta);
    }
    </script>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/member/robots/index.blade.php ENDPATH**/ ?>