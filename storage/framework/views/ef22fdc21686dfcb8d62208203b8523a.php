<?php if (isset($component)) { $__componentOriginal131d2de898a1503a92a84eccccfb5c3d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal131d2de898a1503a92a84eccccfb5c3d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.member','data' => ['title' => 'Mentorship']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.member'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Mentorship']); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <h1 class="text-2xl font-bold text-white">Mentorship</h1>
            <p class="mt-1 text-sm text-slate-400">Personalised guidance to build discipline and a structured strategy.</p>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card p-6">
                <span class="badge"><?php echo e($session->type === 'one_on_one' ? '1-on-1' : 'Group'); ?></span>
                <h3 class="mt-3 text-lg font-semibold text-white"><?php echo e($session->title); ?></h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-400"><?php echo e($session->description); ?></p>
                <p class="mt-4 text-xl font-bold text-white"><?php echo e($session->priceFormatted()); ?></p>
                <form method="POST" action="<?php echo e(route('member.mentorship.book', $session)); ?>" class="mt-5 space-y-3">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label class="label text-xs">Preferred date/time (optional)</label>
                        <input type="datetime-local" name="preferred_at" class="input">
                    </div>
                    <button class="btn-primary w-full">Book Session</button>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if($bookings->count()): ?>
        <div class="mt-10">
            <h2 class="text-lg font-semibold text-white">My Bookings</h2>
            <div class="mt-4 card divide-y divide-white/5">
                <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center justify-between px-6 py-4">
                        <div>
                            <p class="text-sm font-medium text-white"><?php echo e($booking->session->title); ?></p>
                            <p class="text-xs text-slate-500"><?php echo e($booking->preferred_at?->format('M d, Y H:i') ?? 'No preferred time set'); ?></p>
                        </div>
                        <span class="badge <?php echo e($booking->status === 'confirmed' ? 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300' : ''); ?>">
                            <?php echo e(ucfirst($booking->status)); ?>

                        </span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views\member\mentorship\index.blade.php ENDPATH**/ ?>