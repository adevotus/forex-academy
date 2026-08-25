<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => $robot->exists ? 'Edit Robot' : 'New Robot']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($robot->exists ? 'Edit Robot' : 'New Robot')]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <a href="<?php echo e(route('admin.robots.index')); ?>" class="inline-flex items-center gap-1 text-xs font-medium text-slate-500 hover:text-slate-700 transition">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                Back to Robots
            </a>
            <h1 class="mt-1 text-2xl font-extrabold text-slate-900"><?php echo e($robot->exists ? 'Edit Robot' : 'New Robot'); ?></h1>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?php echo e(route('admin.robots.index')); ?>" class="rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-50 transition">
                Cancel
            </a>
            <button type="submit" form="robot-form" class="btn-primary px-6">
                <?php echo e($robot->exists ? 'Save Changes' : 'Create Robot'); ?>

            </button>
        </div>
     <?php $__env->endSlot(); ?>

    <?php if($errors->any()): ?>
        <div class="mb-4 rounded-xl border border-rose-200 bg-rose-50 p-3 text-sm text-rose-700 flex items-start gap-2">
            <svg class="h-4 w-4 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            <div>
                <p class="font-semibold">Please fix the following:</p>
                <ul class="mt-0.5 list-disc list-inside space-y-0.5 text-xs">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>

    <form id="robot-form" method="POST"
          action="<?php echo e($robot->exists ? route('admin.robots.update', $robot) : route('admin.robots.store')); ?>">
        <?php echo csrf_field(); ?>
        <?php if($robot->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

        
        <div class="grid grid-cols-2 gap-4">

            
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm space-y-4">
                <h2 class="text-xs font-bold uppercase tracking-wider text-slate-400">Basic Information</h2>

                <div>
                    <label class="mb-1 block text-sm font-semibold text-slate-700">Robot / EA Name <span class="text-rose-500">*</span></label>
                    <input type="text" name="name" value="<?php echo e(old('name', $robot->name)); ?>"
                           class="input w-full" placeholder="e.g. EmmioPro EA v3" required>
                </div>

                <div>
                    <label class="mb-1 block text-sm font-semibold text-slate-700">Description</label>
                    <textarea name="description" rows="5" class="input w-full resize-none"
                              placeholder="What this robot does, strategy, pairs it trades…"><?php echo e(old('description', $robot->description)); ?></textarea>
                </div>
            </div>

            
            <div class="space-y-4">
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-slate-400">Pricing & Details</h2>

                    
                    <div class="grid grid-cols-3 gap-3">
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-slate-700">Version</label>
                            <input type="text" name="version" value="<?php echo e(old('version', $robot->version)); ?>"
                                   class="input w-full" placeholder="3.2">
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-slate-700">Price (USD) <span class="text-rose-500">*</span></label>
                            <div class="flex items-center rounded-xl border border-slate-300 bg-white focus-within:border-brand-400 focus-within:ring-2 focus-within:ring-brand-100 transition overflow-hidden">
                                <span class="px-2.5 text-sm font-semibold text-slate-400 border-r border-slate-200 bg-slate-50 self-stretch flex items-center">$</span>
                                <input type="number" step="0.01" min="0" name="price"
                                       value="<?php echo e(old('price', $robot->exists ? $robot->price : '')); ?>"
                                       class="flex-1 px-2.5 py-2 text-sm font-semibold text-slate-900 outline-none bg-transparent"
                                       placeholder="0.00" required>
                            </div>
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-slate-700">Duration <span class="text-slate-400 font-normal text-xs">(days)</span></label>
                            <input type="number" name="duration_days" value="<?php echo e(old('duration_days', $robot->duration_days)); ?>"
                                   class="input w-full" placeholder="30">
                            <p class="mt-0.5 text-[11px] text-slate-400">Blank = lifetime</p>
                        </div>
                    </div>

                    
                    <div>
                        <label class="mb-1 block text-sm font-semibold text-slate-700">File Path <span class="text-slate-400 font-normal text-xs">(optional)</span></label>
                        <input type="text" name="file_path" value="<?php echo e(old('file_path', $robot->file_path)); ?>"
                               class="input w-full" placeholder="storage/robots/ea-file.ex4">
                        <p class="mt-0.5 text-[11px] text-slate-400">Relative path to the EA file members download after purchase.</p>
                    </div>
                </div>

                
                <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="published" value="1"
                               <?php if(old('published', $robot->published ?? true)): echo 'checked'; endif; ?>
                               class="h-4 w-4 rounded border-slate-300 text-brand-600">
                        <div>
                            <p class="text-sm font-semibold text-slate-800">Published</p>
                            <p class="text-xs text-slate-400">Visible to members on the robots page.</p>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </form>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/admin/robots/form.blade.php ENDPATH**/ ?>