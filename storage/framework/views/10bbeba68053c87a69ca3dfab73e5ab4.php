<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Complete Registration — EMMIOXFOREX ACADEMY']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Complete Registration — EMMIOXFOREX ACADEMY']); ?>
<section class="min-h-[90vh] bg-slate-50 px-4 py-12 sm:px-6 lg:px-8">
<div class="mx-auto max-w-3xl">

    
    <?php
        $proofSubmitted = $pendingPayment !== null;
        $steps = [
            ['label' => 'Account Created', 'done' => true],
            ['label' => 'Fee Paid',        'done' => $proofSubmitted],
            ['label' => 'Get Approved',    'done' => false, 'current' => true],
            ['label' => 'Access Platform', 'done' => false],
        ];
    ?>

    <div class="mb-8 flex items-center justify-between">
        <?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex flex-1 items-center">
                <div class="flex flex-col items-center flex-shrink-0">
                    <?php if($step['done']): ?>
                        <div class="flex h-9 w-9 items-center justify-center rounded-full text-xs font-bold bg-emerald-500 text-white">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="mt-1.5 text-[10px] font-medium text-center leading-tight text-emerald-600"><?php echo e($step['label']); ?></span>
                    <?php elseif($step['current'] ?? false): ?>
                        <div class="flex h-9 w-9 items-center justify-center rounded-full text-xs font-bold text-white" style="background:#1e3a5f; box-shadow:0 0 0 4px rgba(30,58,95,0.2)">
                            <?php echo e($i + 1); ?>

                        </div>
                        <span class="mt-1.5 text-[10px] font-semibold text-center leading-tight text-slate-800"><?php echo e($step['label']); ?></span>
                    <?php else: ?>
                        <div class="flex h-9 w-9 items-center justify-center rounded-full text-xs font-bold bg-white border-2 border-slate-200 text-slate-400">
                            <?php echo e($i + 1); ?>

                        </div>
                        <span class="mt-1.5 text-[10px] font-medium text-center leading-tight text-slate-400"><?php echo e($step['label']); ?></span>
                    <?php endif; ?>
                </div>
                <?php if(! $loop->last): ?>
                    <div class="mx-2 h-0.5 flex-1 <?php echo e($step['done'] ? 'bg-emerald-400' : 'bg-slate-200'); ?> mb-4"></div>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <?php if($proofSubmitted): ?>
        <div class="mb-6 flex items-start gap-3 rounded-2xl border border-blue-200 bg-blue-50 p-4">
            <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-600 mt-0.5">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-blue-900">Proof submitted — under review</p>
                <p class="mt-0.5 text-xs text-blue-700">Our team is reviewing your payment. You'll get full access once confirmed, usually within a few hours.</p>
            </div>
        </div>
    <?php else: ?>
        <div class="mb-6 flex items-start gap-3 rounded-2xl border border-amber-200 bg-amber-50 p-4">
            <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-amber-100 text-amber-600 mt-0.5">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-slate-800">Complete your registration payment</p>
                <p class="mt-0.5 text-xs text-slate-600">Pay the one-time fee using any method below, then upload your proof. Your account will be approved within a few hours.</p>
            </div>
        </div>
    <?php endif; ?>

    
    <div class="mb-8 rounded-2xl p-6 text-white shadow-xl" style="background: linear-gradient(135deg, #0a1628 0%, #0f2a4a 50%, #1a3a5c 100%)">
        <p class="text-[10px] font-bold uppercase tracking-widest" style="color: rgba(148,163,184,0.9)">One-Time Registration Fee</p>
        <div class="mt-3 flex items-end gap-2">
            <span class="text-5xl font-extrabold text-white"><?php echo e($registrationFee); ?></span>
            <span class="mb-1.5 text-xl font-semibold" style="color:rgba(203,213,225,0.9)"><?php echo e($currency); ?></span>
        </div>
        <p class="mt-1 text-sm" style="color:rgba(148,163,184,0.85)">Paid once. Lifetime academy membership.</p>

        <div class="mt-4 flex flex-wrap gap-2">
            <?php $__currentLoopData = ['Courses', 'Robots', 'Signals', 'Mentorship']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="flex items-center gap-1 rounded-full px-3 py-1 text-xs font-medium text-white" style="background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.2)">
                    <svg class="h-3 w-3 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <?php echo e($feature); ?>

                </span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="mt-5 grid grid-cols-3 pt-4 text-center" style="border-top:1px solid rgba(255,255,255,0.12)">
            <div style="border-right:1px solid rgba(255,255,255,0.12)">
                <p class="text-2xl font-extrabold text-white">4</p>
                <p class="text-[10px] mt-0.5" style="color:rgba(148,163,184,0.8)">Learning Levels</p>
            </div>
            <div style="border-right:1px solid rgba(255,255,255,0.12)">
                <p class="text-2xl font-extrabold text-white">∞</p>
                <p class="text-[10px] mt-0.5" style="color:rgba(148,163,184,0.8)">Lifetime Access</p>
            </div>
            <div>
                <p class="text-2xl font-extrabold text-white">24/7</p>
                <p class="text-[10px] mt-0.5" style="color:rgba(148,163,184,0.8)">Support</p>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

        
        <div>
            <p class="mb-3 text-xs font-bold uppercase tracking-wider text-slate-500">Payment Details</p>

            <?php if($paymentMethods->isEmpty()): ?>
                <div class="rounded-xl border border-slate-200 bg-white p-5 text-center text-xs text-slate-400">
                    Payment methods not configured yet. Please contact support.
                </div>
            <?php else: ?>
                <div class="space-y-3">
                    <?php
                        $iconStyleMap = [
                            'emerald' => 'background:#d1fae5; color:#065f46',
                            'blue'    => 'background:#dbeafe; color:#1e40af',
                            'gold'    => 'background:#fef9c3; color:#854d0e',
                            'purple'  => 'background:#ede9fe; color:#5b21b6',
                            'slate'   => 'background:#f1f5f9; color:#475569',
                        ];
                    ?>
                    <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $iconStyle = $iconStyleMap[$pm->icon_color] ?? $iconStyleMap['slate']; ?>
                        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl text-sm font-extrabold" style="<?php echo e($iconStyle); ?>">
                                    <?php echo e($pm->typeIcon()); ?>

                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-900"><?php echo e($pm->name); ?></p>
                                    <?php if($pm->subtitle): ?>
                                        <p class="text-xs text-slate-400"><?php echo e($pm->subtitle); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if(!empty($pm->details)): ?>
                                <dl class="space-y-2 rounded-lg bg-slate-50 p-3">
                                    <?php $__currentLoopData = $pm->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $isLong = strlen($detail['value']) > 20; ?>
                                        <?php if($isLong): ?>
                                            
                                            <div class="text-xs">
                                                <dt class="text-slate-400 font-medium mb-1"><?php echo e($detail['label']); ?></dt>
                                                <dd class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2">
                                                    <span class="font-mono font-semibold text-slate-800 text-[11px] break-all flex-1 leading-relaxed"><?php echo e($detail['value']); ?></span>
                                                    <button type="button"
                                                        onclick="copyToClipboard(this, '<?php echo e(addslashes($detail['value'])); ?>')"
                                                        class="flex-shrink-0 flex items-center gap-1 rounded-md px-2 py-1 text-[10px] font-semibold transition-all"
                                                        style="background:#eff6ff; color:#2563eb; border:1px solid #bfdbfe"
                                                        title="Copy to clipboard">
                                                        <svg class="h-3 w-3 copy-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
                                                        <svg class="h-3 w-3 check-icon hidden text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                                        <span class="btn-text">Copy</span>
                                                    </button>
                                                </dd>
                                            </div>
                                        <?php else: ?>
                                            
                                            <div class="flex items-center justify-between text-xs">
                                                <dt class="text-slate-400 font-medium"><?php echo e($detail['label']); ?></dt>
                                                <dd class="font-semibold text-slate-800"><?php echo e($detail['value']); ?></dd>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </dl>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                    <?php $noteMethod = $paymentMethods->firstWhere('note', '!=', null); ?>
                    <?php if($noteMethod): ?>
                        <div class="rounded-xl border border-amber-200 bg-amber-50 p-3 text-xs text-slate-700 leading-relaxed">
                            <svg class="inline h-3.5 w-3.5 text-amber-500 mr-1 mb-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Use <span class="font-semibold text-slate-900 bg-amber-100 px-1 rounded"><?php echo e($user->email); ?></span> as your payment reference.
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        
        <div>
            <?php if($proofSubmitted): ?>
                <p class="mb-3 text-xs font-bold uppercase tracking-wider text-slate-500">Awaiting Approval</p>
                <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="mb-4 flex items-start gap-3 rounded-xl p-4" style="background:#eff6ff; border:1px solid #bfdbfe">
                        <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full" style="background:#dbeafe; color:#1d4ed8">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold" style="color:#1e3a8a">Review in progress</p>
                            <p class="text-xs mt-0.5" style="color:#1d4ed8">Approvals usually happen within a few hours on business days.</p>
                        </div>
                    </div>

                    
                    <details class="mt-2 group">
                        <summary class="flex cursor-pointer items-center justify-between rounded-lg border border-slate-200 px-4 py-2.5 text-xs font-medium text-slate-600 hover:bg-slate-50 list-none">
                            Submitted wrong file? Re-upload proof
                            <svg class="h-4 w-4 transition group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                        </summary>
                        <div class="mt-3">
                            <?php echo $__env->make('member.partials.proof-upload-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </details>
                </div>

            <?php else: ?>
                <p class="mb-3 text-xs font-bold uppercase tracking-wider text-slate-500">Upload Payment Proof</p>
                <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                    <p class="text-xs text-slate-500 mb-4">After paying, upload your receipt or screenshot so our team can verify and approve your account.</p>
                    <?php echo $__env->make('member.partials.proof-upload-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            <?php endif; ?>
        </div>

    </div>

    
    <div class="mt-8 text-center">
        <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
            <?php echo csrf_field(); ?>
            <button class="text-xs text-slate-400 hover:text-slate-600 transition underline underline-offset-2">Log out and check back later</button>
        </form>
    </div>

</div>
</section>

<script>
function copyToClipboard(btn, text) {
    navigator.clipboard.writeText(text).then(function () {
        const copyIcon = btn.querySelector('.copy-icon');
        const checkIcon = btn.querySelector('.check-icon');
        const label = btn.querySelector('.btn-text');
        copyIcon.classList.add('hidden');
        checkIcon.classList.remove('hidden');
        label.textContent = 'Copied!';
        btn.style.background = '#d1fae5';
        btn.style.color = '#065f46';
        btn.style.borderColor = '#6ee7b7';
        setTimeout(function () {
            copyIcon.classList.remove('hidden');
            checkIcon.classList.add('hidden');
            label.textContent = 'Copy';
            btn.style.background = '#eff6ff';
            btn.style.color = '#2563eb';
            btn.style.borderColor = '#bfdbfe';
        }, 2000);
    }).catch(function () {
        // Fallback for older browsers
        var ta = document.createElement('textarea');
        ta.value = text;
        ta.style.position = 'fixed';
        ta.style.opacity = '0';
        document.body.appendChild(ta);
        ta.select();
        document.execCommand('copy');
        document.body.removeChild(ta);
    });
}
</script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd)): ?>
<?php $attributes = $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd; ?>
<?php unset($__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd)): ?>
<?php $component = $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd; ?>
<?php unset($__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd); ?>
<?php endif; ?>
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/member/pending.blade.php ENDPATH**/ ?>