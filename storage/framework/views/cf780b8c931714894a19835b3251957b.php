<?php if (isset($component)) { $__componentOriginal131d2de898a1503a92a84eccccfb5c3d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal131d2de898a1503a92a84eccccfb5c3d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.member','data' => ['title' => $robot->name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.member'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($robot->name)]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <a href="<?php echo e(route('member.robots.index')); ?>" class="text-xs font-medium text-brand-300 hover:text-brand-200">&larr; Robots</a>
            <h1 class="mt-2 text-2xl font-bold text-white"><?php echo e($robot->name); ?></h1>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="card p-6 lg:col-span-2">
            <p class="text-sm leading-relaxed text-slate-300"><?php echo e($robot->description); ?></p>

            <?php if($unlocked): ?>
                <div class="mt-6 rounded-xl border border-emerald-400/20 bg-emerald-400/5 p-5">
                    <p class="font-semibold text-emerald-300">Robot Active</p>
                    <p class="mt-1 text-sm text-slate-400">Subscription expires <?php echo e($subscription?->expires_at?->format('M d, Y')); ?>.</p>
                    <a href="#" class="btn-primary mt-4 !py-2 text-sm">Download EA File</a>
                </div>

                <div class="mt-8">
                    <h2 class="font-semibold text-white">How to Install &amp; Use</h2>
                    <ol class="mt-3 space-y-2 text-sm text-slate-400">
                        <li>1. Download the EA file above and copy it into your MT4/MT5 "Experts" folder.</li>
                        <li>2. Restart your trading terminal and drag the EA onto your chosen chart.</li>
                        <li>3. Apply the recommended risk parameters from the setup checklist.</li>
                        <li>4. Enable "Algo Trading" and confirm the robot is running.</li>
                    </ol>
                </div>
            <?php else: ?>
                <div class="mt-6 rounded-xl border border-gold-400/20 bg-gold-400/5 p-5 text-center">
                    <p class="font-semibold text-white"><?php echo e($robot->priceFormatted()); ?> / <?php echo e($robot->duration_days); ?> days</p>
                    <form method="POST" action="<?php echo e(route('member.robots.unlock', $robot)); ?>" class="mt-4">
                        <?php echo csrf_field(); ?>
                        <button class="btn-gold">Request Unlock</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>

        <div class="card p-6">
            <h2 class="font-semibold text-white">Robot Performance Log</h2>
            <p class="mt-2 text-sm text-slate-400">
                <?php echo e($unlocked ? 'Performance tracking becomes available once your robot is live on a connected account.' : 'Unlock this robot to start tracking performance here.'); ?>

            </p>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views\member\robots\show.blade.php ENDPATH**/ ?>