<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => $signal->exists ? 'Edit Signal' : 'New Signal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($signal->exists ? 'Edit Signal' : 'New Signal')]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <a href="<?php echo e(route('admin.signals.index')); ?>" class="text-xs font-medium text-brand-300 hover:text-brand-200">&larr; Signals</a>
            <h1 class="mt-2 text-2xl font-bold text-white"><?php echo e($signal->exists ? 'Edit Signal' : 'New Signal'); ?></h1>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="card max-w-2xl p-6">
        <form method="POST" action="<?php echo e($signal->exists ? route('admin.signals.update', $signal) : route('admin.signals.store')); ?>" class="space-y-4">
            <?php echo csrf_field(); ?>
            <?php if($signal->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="label">Pair</label>
                    <input type="text" name="pair" value="<?php echo e(old('pair', $signal->pair)); ?>" class="input" placeholder="EUR/USD" required>
                </div>
                <div>
                    <label class="label">Direction</label>
                    <select name="direction" class="input">
                        <option value="buy" <?php if(old('direction', $signal->direction)==='buy'): echo 'selected'; endif; ?>>Buy</option>
                        <option value="sell" <?php if(old('direction', $signal->direction)==='sell'): echo 'selected'; endif; ?>>Sell</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="label">Entry Price</label>
                    <input type="number" step="0.00001" name="entry_price" value="<?php echo e(old('entry_price', $signal->entry_price)); ?>" class="input">
                </div>
                <div>
                    <label class="label">Stop Loss</label>
                    <input type="number" step="0.00001" name="stop_loss" value="<?php echo e(old('stop_loss', $signal->stop_loss)); ?>" class="input">
                </div>
                <div>
                    <label class="label">Take Profit</label>
                    <input type="number" step="0.00001" name="take_profit" value="<?php echo e(old('take_profit', $signal->take_profit)); ?>" class="input">
                </div>
            </div>
            <div>
                <label class="label">Explainer — why this setup was chosen</label>
                <textarea name="explainer" rows="4" class="input"><?php echo e(old('explainer', $signal->explainer)); ?></textarea>
            </div>
            <div>
                <label class="label">Status</label>
                <select name="status" class="input">
                    <?php $__currentLoopData = ['active'=>'Active','hit_tp'=>'Hit Take Profit','hit_sl'=>'Hit Stop Loss','closed'=>'Closed']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val=>$lbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($val); ?>" <?php if(old('status', $signal->status)===$val): echo 'selected'; endif; ?>><?php echo e($lbl); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <button class="btn-primary"><?php echo e($signal->exists ? 'Save Changes' : 'Publish Signal'); ?></button>
        </form>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views\admin\signals\form.blade.php ENDPATH**/ ?>