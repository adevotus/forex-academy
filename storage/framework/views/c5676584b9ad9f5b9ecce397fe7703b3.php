<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => $session->exists ? 'Edit Mentorship' : 'New Mentorship']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($session->exists ? 'Edit Mentorship' : 'New Mentorship')]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <a href="<?php echo e(route('admin.mentorship.index')); ?>" class="text-xs font-medium text-brand-300 hover:text-brand-200">&larr; Mentorship</a>
            <h1 class="mt-2 text-2xl font-bold text-white"><?php echo e($session->exists ? 'Edit Mentorship' : 'New Mentorship'); ?></h1>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="card max-w-2xl p-6">
        <form method="POST" action="<?php echo e($session->exists ? route('admin.mentorship.update', $session) : route('admin.mentorship.store')); ?>" class="space-y-4">
            <?php echo csrf_field(); ?>
            <?php if($session->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

            <div>
                <label class="label">Title</label>
                <input type="text" name="title" value="<?php echo e(old('title', $session->title)); ?>" class="input" required>
            </div>
            <div>
                <label class="label">Description</label>
                <textarea name="description" rows="4" class="input"><?php echo e(old('description', $session->description)); ?></textarea>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="label">Mentor Name</label>
                    <input type="text" name="mentor_name" value="<?php echo e(old('mentor_name', $session->mentor_name)); ?>" class="input">
                </div>
                <div>
                    <label class="label">Type</label>
                    <select name="type" class="input">
                        <option value="group" <?php if(old('type', $session->type)==='group'): echo 'selected'; endif; ?>>Group</option>
                        <option value="one_on_one" <?php if(old('type', $session->type)==='one_on_one'): echo 'selected'; endif; ?>>1-on-1</option>
                    </select>
                </div>
                <div>
                    <label class="label">Price (USD)</label>
                    <input type="number" step="0.01" min="0" name="price" value="<?php echo e(old('price', $session->exists ? $session->price / 100 : '')); ?>" class="input" required>
                </div>
            </div>
            <label class="flex items-center gap-2 text-sm text-slate-300">
                <input type="checkbox" name="published" value="1" <?php if(old('published', $session->published ?? true)): echo 'checked'; endif; ?> class="rounded border-white/20 bg-navy-900 text-brand-500">
                Published
            </label>
            <button class="btn-primary"><?php echo e($session->exists ? 'Save Changes' : 'Create Package'); ?></button>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views\admin\mentorship\form.blade.php ENDPATH**/ ?>