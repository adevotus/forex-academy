<?php if (isset($component)) { $__componentOriginal131d2de898a1503a92a84eccccfb5c3d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal131d2de898a1503a92a84eccccfb5c3d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.member','data' => ['title' => $course->title]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.member'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($course->title)]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <span class="badge badge-level-<?php echo e($course->level); ?>"><?php echo e($course->levelLabel()); ?></span>
            <h1 class="mt-2 text-2xl font-bold text-white"><?php echo e($course->title); ?></h1>
            <p class="mt-1 text-sm text-slate-400"><?php echo e($course->description); ?></p>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2">
            <?php if(! $unlocked): ?>
                <div class="card mb-6 flex flex-wrap items-center justify-between gap-4 border-gold-400/20 bg-gold-400/5 p-6">
                    <div>
                        <p class="font-semibold text-white">This course is locked</p>
                        <p class="mt-1 text-sm text-slate-400">Unlock for <?php echo e($course->priceFormatted()); ?> to access every lesson.</p>
                    </div>
                    <button onclick="document.getElementById('unlock-modal').classList.remove('hidden'); document.body.style.overflow='hidden'" class="btn-gold">
                        Unlock Course
                    </button>
                </div>

                
                <div id="unlock-modal" class="fixed inset-0 z-50 hidden" style="background:rgba(15,23,42,0.55)">
                    <div class="absolute inset-0" onclick="document.getElementById('unlock-modal').classList.add('hidden'); document.body.style.overflow=''"></div>

                    <div class="absolute inset-0 flex items-center justify-center p-4 pointer-events-none">
                        <div class="pointer-events-auto w-full rounded-2xl bg-white shadow-2xl overflow-hidden" style="max-width:720px">

                            
                            <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-xl" style="background:#eff6ff">
                                        <svg class="h-5 w-5" style="color:#2563eb" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-base font-extrabold text-slate-900">Unlock Course</p>
                                        <p class="text-xs text-slate-500"><?php echo e($course->title); ?></p>
                                    </div>
                                </div>
                                <button onclick="document.getElementById('unlock-modal').classList.add('hidden'); document.body.style.overflow=''"
                                        class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 transition">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>

                            
                            <form method="POST" action="<?php echo e(route('member.courses.unlock', $course)); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="grid grid-cols-2 divide-x divide-slate-100">

                                    
                                    <div class="p-6 space-y-5 overflow-y-auto" style="max-height:70vh">

                                        
                                        <div class="flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4">
                                            <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl" style="background:#2563eb">
                                                <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            </div>
                                            <div>
                                                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Amount Due</p>
                                                <p class="text-2xl font-extrabold text-slate-900"><?php echo e($course->priceFormatted()); ?></p>
                                            </div>
                                        </div>

                                        
                                        <div>
                                            <p class="mb-3 text-[11px] font-bold uppercase tracking-widest text-slate-400">How to Pay</p>
                                            <div class="space-y-3">
                                                <?php $__empty_1 = true; $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <?php
                                                        $filledDetails = collect($method->details ?? [])->filter(fn($d) => !empty($d['label'] ?? '') || !empty($d['value'] ?? ''))->values();
                                                    ?>
                                                    <div class="rounded-xl border border-slate-200 bg-white overflow-hidden">
                                                        
                                                        <div class="flex items-center gap-3 px-4 py-3 <?php echo e($method->icon_color === 'emerald' ? 'bg-emerald-50' : ($method->icon_color === 'blue' ? 'bg-blue-50' : ($method->icon_color === 'gold' ? 'bg-yellow-50' : 'bg-slate-50'))); ?>">
                                                            <div class="flex h-8 w-8 items-center justify-center rounded-lg text-sm font-extrabold
                                                                <?php echo e($method->icon_color === 'emerald' ? 'bg-emerald-600 text-white' : ($method->icon_color === 'blue' ? 'bg-blue-600 text-white' : ($method->icon_color === 'gold' ? 'bg-yellow-500 text-white' : 'bg-slate-700 text-white'))); ?>">
                                                                <?php echo e($method->typeIcon()); ?>

                                                            </div>
                                                            <div class="flex-1 min-w-0">
                                                                <span class="text-sm font-bold text-slate-800 block"><?php echo e($method->name); ?></span>
                                                                <?php if($method->subtitle): ?>
                                                                    <span class="text-[11px] text-slate-500"><?php echo e($method->subtitle); ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        
                                                        <?php if($filledDetails->isNotEmpty()): ?>
                                                            <div class="divide-y divide-slate-100 px-4">
                                                                <?php $__currentLoopData = $filledDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="flex items-center justify-between py-2.5">
                                                                        <span class="text-xs text-slate-500"><?php echo e($detail['label'] ?? ''); ?></span>
                                                                        <span class="text-xs font-semibold text-slate-800 select-all font-mono"><?php echo e(($detail['value'] ?: '—')); ?></span>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="px-4 py-3">
                                                                <p class="text-xs text-slate-400 italic">Payment details coming soon — contact admin.</p>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if($method->note): ?>
                                                            <p class="px-4 pb-3 text-[11px] text-slate-400 border-t border-slate-100 pt-2"><?php echo e($method->note); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 p-6 text-center">
                                                        <p class="text-sm text-slate-400">No payment methods configured yet.</p>
                                                        <p class="mt-1 text-xs text-slate-300">Please contact the admin.</p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <p class="text-xs text-slate-400">After paying, upload your receipt on the right. Admin will verify and unlock the course within 24 hours.</p>
                                    </div>

                                    
                                    <div class="flex flex-col p-6 space-y-4">
                                        <p class="text-sm font-bold text-slate-900">Upload Payment Proof</p>

                                        
                                        <label for="proof-upload" class="flex flex-1 cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 hover:border-blue-400 hover:bg-blue-50 transition min-h-[180px]" id="drop-zone">
                                            <input type="file" name="proof" id="proof-upload" accept=".jpg,.jpeg,.png,.pdf" class="hidden" onchange="previewFile(this)">
                                            <div id="drop-placeholder" class="flex flex-col items-center gap-2 text-center p-4">
                                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white shadow-sm border border-slate-200">
                                                    <svg class="h-6 w-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                                                    </svg>
                                                </div>
                                                <p class="text-sm font-semibold text-slate-700">Click or drag &amp; drop</p>
                                                <p class="text-xs text-slate-400">Screenshot or PDF of your payment receipt</p>
                                                <span class="mt-1 rounded-full border border-slate-200 bg-white px-3 py-1 text-[11px] font-semibold text-slate-500">JPG · PNG · PDF — max 5 MB</span>
                                            </div>
                                            <div id="drop-preview" class="hidden w-full px-4 pb-4 text-center">
                                                <svg class="mx-auto h-8 w-8 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                <p id="file-name" class="mt-2 text-xs font-semibold text-slate-700 break-all"></p>
                                                <p class="text-[11px] text-slate-400">Click to change</p>
                                            </div>
                                        </label>

                                        
                                        <div class="space-y-1.5">
                                            <div class="flex items-start gap-2 text-xs text-slate-500">
                                                <svg class="mt-0.5 h-3.5 w-3.5 flex-shrink-0 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 16v-4m0-4h.01"/></svg>
                                                Make sure the receipt clearly shows the amount and transaction ID.
                                            </div>
                                            <div class="flex items-start gap-2 text-xs text-slate-500">
                                                <svg class="mt-0.5 h-3.5 w-3.5 flex-shrink-0 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3"/></svg>
                                                Admin will review and unlock your course within 24 hours.
                                            </div>
                                        </div>

                                        
                                        <button type="submit"
                                                class="mt-auto flex w-full items-center justify-center gap-2 rounded-xl py-3 text-sm font-bold text-white shadow transition hover:opacity-90"
                                                style="background:#1d4ed8">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            Submit Payment for Review
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                function previewFile(input) {
                    const placeholder = document.getElementById('drop-placeholder');
                    const preview = document.getElementById('drop-preview');
                    const fileName = document.getElementById('file-name');
                    if (input.files && input.files[0]) {
                        fileName.textContent = input.files[0].name;
                        placeholder.classList.add('hidden');
                        preview.classList.remove('hidden');
                    }
                }
                document.addEventListener('keydown', e => {
                    if (e.key === 'Escape') {
                        document.getElementById('unlock-modal').classList.add('hidden');
                        document.body.style.overflow = '';
                    }
                });
                </script>
            <?php endif; ?>

            <div class="card divide-y divide-white/5">
                <?php $__currentLoopData = $course->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $done = $progress->contains($lesson->id); $canWatch = $lesson->isUnlockedFor(auth()->user()); ?>
                    <a href="<?php echo e($canWatch ? route('member.courses.lesson', [$course, $lesson]) : '#'); ?>"
                       class="flex items-center justify-between px-6 py-4 <?php echo e($canWatch ? 'hover:bg-white/5' : 'cursor-not-allowed opacity-50'); ?>">
                        <div class="flex items-center gap-3">
                            <span class="flex h-8 w-8 items-center justify-center rounded-full <?php echo e($done ? 'bg-emerald-400/20 text-emerald-300' : 'bg-white/5 text-slate-400'); ?> text-xs font-semibold">
                                <?php if($done): ?> <?php if (isset($component)) { $__componentOriginald88937ee957874c050ccbc67a5e19575 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald88937ee957874c050ccbc67a5e19575 = $attributes; } ?>
<?php $component = App\View\Components\Icon::resolve(['name' => 'check','class' => 'h-4 w-4'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php endif; ?> <?php else: ?> <?php echo e($loop->iteration); ?> <?php endif; ?>
                            </span>
                            <div>
                                <p class="text-sm font-medium text-white"><?php echo e($lesson->title); ?></p>
                                <p class="text-xs text-slate-500"><?php echo e($lesson->duration_minutes); ?> min <?php if($lesson->is_preview): ?> · Free Preview <?php endif; ?></p>
                            </div>
                        </div>
                        <?php if(! $canWatch): ?>
                            <?php if (isset($component)) { $__componentOriginald88937ee957874c050ccbc67a5e19575 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald88937ee957874c050ccbc67a5e19575 = $attributes; } ?>
<?php $component = App\View\Components\Icon::resolve(['name' => 'lock','class' => 'h-4 w-4 text-slate-600'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginald88937ee957874c050ccbc67a5e19575 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald88937ee957874c050ccbc67a5e19575 = $attributes; } ?>
<?php $component = App\View\Components\Icon::resolve(['name' => 'play','class' => 'h-4 w-4 text-brand-400'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                        <?php endif; ?>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="space-y-6">
            <?php if($course->cheatSheets->count()): ?>
                <div class="card p-6">
                    <h2 class="font-semibold text-white">Cheat Sheets</h2>
                    <div class="mt-3 space-y-2">
                        <?php $__currentLoopData = $course->cheatSheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center justify-between rounded-lg border border-white/10 bg-white/5 px-3 py-2 text-sm text-slate-300">
                                <span><?php echo e($sheet->title); ?></span>
                                <?php if (isset($component)) { $__componentOriginald88937ee957874c050ccbc67a5e19575 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald88937ee957874c050ccbc67a5e19575 = $attributes; } ?>
<?php $component = App\View\Components\Icon::resolve(['name' => 'download','class' => 'h-4 w-4 text-slate-500'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="card p-6">
                <h2 class="font-semibold text-white">Your Progress</h2>
                <?php $pct = $course->lessons->count() ? round(($progress->count() / $course->lessons->count()) * 100) : 0; ?>
                <div class="mt-3 h-2 w-full overflow-hidden rounded-full bg-white/10">
                    <div class="h-full rounded-full bg-gradient-to-r from-brand-500 to-brand-300" style="width: <?php echo e($pct); ?>%"></div>
                </div>
                <p class="mt-2 text-xs text-slate-500"><?php echo e($progress->count()); ?> / <?php echo e($course->lessons->count()); ?> lessons complete (<?php echo e($pct); ?>%)</p>
            </div>
        </div>
    </div>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views\member\courses\show.blade.php ENDPATH**/ ?>