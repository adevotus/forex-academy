<?php if(session('status')): ?>
    <div class="mb-6 rounded-xl border border-emerald-400/30 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-300">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
<?php if(session('info')): ?>
    <div class="mb-6 rounded-xl border border-brand-400/30 bg-brand-400/10 px-4 py-3 text-sm text-brand-300">
        <?php echo e(session('info')); ?>

    </div>
<?php endif; ?>
<?php if($errors->any()): ?>
    <div class="mb-6 rounded-xl border border-rose-400/30 bg-rose-400/10 px-4 py-3 text-sm text-rose-300">
        <ul class="list-inside list-disc space-y-1">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/partials/flash.blade.php ENDPATH**/ ?>