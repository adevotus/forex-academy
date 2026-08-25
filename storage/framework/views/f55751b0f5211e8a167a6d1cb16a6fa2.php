
<?php $dark = $dark ?? false; ?>
<a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2.5 group">
   <img src="<?php echo e(asset('images/img_1.png')); ?>" style="height: 50px; width: 50px; border-radius: 8px">
    <span class="leading-tight">
        <span class="block text-sm font-extrabold tracking-wide <?php echo e($dark ? 'text-white' : 'text-slate-900'); ?> transition group-hover:text-brand-500">EMMIOXFOREX</span>
        <span class="block text-[10px] font-semibold uppercase tracking-[0.2em] text-brand-400">Academy</span>
    </span>
</a>
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views\partials\logo.blade.php ENDPATH**/ ?>