<?php if (isset($component)) { $__componentOriginal131d2de898a1503a92a84eccccfb5c3d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal131d2de898a1503a92a84eccccfb5c3d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.member','data' => ['title' => 'Signals']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.member'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Signals']); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <h1 class="text-2xl font-bold text-white">Trading Signals</h1>
            <p class="mt-1 text-sm text-slate-400">Market setups with entry, stop-loss and take-profit — plus the reasoning behind each call.</p>
        </div>
     <?php $__env->endSlot(); ?>

    <?php if(! $hasSignals): ?>
        <div class="card flex flex-wrap items-center justify-between gap-4 border-gold-400/20 bg-gold-400/5 p-6">
            <div>
                <p class="font-semibold text-white">Unlock the 3-Month Signal Subscription</p>
                <p class="mt-1 text-sm text-slate-400">$150.00 — includes an explainer with every signal we publish.</p>
            </div>
            <form method="POST" action="<?php echo e(route('member.signals.unlock')); ?>">
                <?php echo csrf_field(); ?>
                <button class="btn-gold">Request Unlock</button>
            </form>
        </div>
    <?php else: ?>
        <div class="mb-6 rounded-xl border border-emerald-400/20 bg-emerald-400/5 px-4 py-3 text-sm text-emerald-300">
            Active until <?php echo e($subscription?->expires_at?->format('M d, Y')); ?>

        </div>

        <div class="space-y-4">
            <?php $__currentLoopData = $signals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $signal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card p-6">
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <span class="badge <?php echo e($signal->direction === 'buy' ? 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300' : 'border-rose-400/30 bg-rose-400/10 text-rose-300'); ?>">
                                <?php echo e(strtoupper($signal->direction)); ?>

                            </span>
                            <span class="font-semibold text-white"><?php echo e($signal->pair); ?></span>
                        </div>
                        <span class="text-xs text-slate-500"><?php echo e($signal->published_at?->diffForHumans()); ?></span>
                    </div>
                    <div class="mt-4 grid grid-cols-3 gap-3 text-center text-sm">
                        <div class="rounded-lg bg-white/5 py-2"><p class="text-xs text-slate-500">Entry</p><p class="font-semibold text-white"><?php echo e($signal->entry_price); ?></p></div>
                        <div class="rounded-lg bg-white/5 py-2"><p class="text-xs text-slate-500">Stop Loss</p><p class="font-semibold text-rose-300"><?php echo e($signal->stop_loss); ?></p></div>
                        <div class="rounded-lg bg-white/5 py-2"><p class="text-xs text-slate-500">Take Profit</p><p class="font-semibold text-emerald-300"><?php echo e($signal->take_profit); ?></p></div>
                    </div>
                    <p class="mt-4 text-sm leading-relaxed text-slate-400"><?php echo e($signal->explainer); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views\member\signals\index.blade.php ENDPATH**/ ?>