<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => $course->exists ? 'Edit Course' : 'New Course']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($course->exists ? 'Edit Course' : 'New Course')]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <a href="<?php echo e(route('admin.courses.index')); ?>" class="text-xs font-medium text-brand-300 hover:text-brand-200">&larr; Courses</a>
            <h1 class="mt-2 text-2xl font-bold text-white"><?php echo e($course->exists ? 'Edit Course' : 'New Course'); ?></h1>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="card p-6 lg:col-span-2">
            <form method="POST" action="<?php echo e($course->exists ? route('admin.courses.update', $course) : route('admin.courses.store')); ?>" class="space-y-4">
                <?php echo csrf_field(); ?>
                <?php if($course->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

                <div>
                    <label class="label">Title</label>
                    <input type="text" name="title" value="<?php echo e(old('title', $course->title)); ?>" class="input" required>
                </div>
                <div>
                    <label class="label">Description</label>
                    <textarea name="description" rows="4" class="input"><?php echo e(old('description', $course->description)); ?></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="label">Level</label>
                        <select name="level" class="input">
                            <?php $__currentLoopData = ['starter','intermediate','advanced','pro']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lvl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lvl); ?>" <?php if(old('level', $course->level)===$lvl): echo 'selected'; endif; ?>><?php echo e(ucfirst($lvl)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div>
                        <label class="label">Price (USD)</label>
                        <input type="number" step="0.01" min="0" name="price" value="<?php echo e(old('price', $course->price / 100)); ?>" class="input">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="label">Order</label>
                        <input type="number" name="order" value="<?php echo e(old('order', $course->order)); ?>" class="input">
                    </div>
                    <div class="flex items-end gap-6 pb-2">
                        <label class="flex items-center gap-2 text-sm text-slate-300">
                            <input type="checkbox" name="is_free" value="1" <?php if(old('is_free', $course->is_free)): echo 'checked'; endif; ?> class="rounded border-white/20 bg-navy-900 text-brand-500">
                            Free course
                        </label>
                        <label class="flex items-center gap-2 text-sm text-slate-300">
                            <input type="checkbox" name="published" value="1" <?php if(old('published', $course->published ?? true)): echo 'checked'; endif; ?> class="rounded border-white/20 bg-navy-900 text-brand-500">
                            Published
                        </label>
                    </div>
                </div>
                <button class="btn-primary"><?php echo e($course->exists ? 'Save Changes' : 'Create Course'); ?></button>
            </form>
        </div>

        <?php if($course->exists): ?>
            <div class="card p-6">
                <div class="flex items-center justify-between">
                    <h2 class="font-semibold text-white">Lessons</h2>
                    <a href="<?php echo e(route('admin.courses.lessons.create', $course)); ?>" class="text-xs font-medium text-brand-300 hover:text-brand-200">+ Add Lesson</a>
                </div>
                <div class="mt-4 space-y-2">
                    <?php $__empty_1 = true; $__currentLoopData = $course->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('admin.courses.lessons.edit', [$course, $lesson])); ?>" class="flex items-center justify-between rounded-lg border border-white/10 bg-white/5 px-3 py-2 text-sm hover:bg-white/10">
                            <span class="text-slate-200"><?php echo e($lesson->title); ?></span>
                            <?php if (isset($component)) { $__componentOriginald88937ee957874c050ccbc67a5e19575 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald88937ee957874c050ccbc67a5e19575 = $attributes; } ?>
<?php $component = App\View\Components\Icon::resolve(['name' => 'edit','class' => 'h-3.5 w-3.5 text-slate-500'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-sm text-slate-500">No lessons yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/admin/courses/form.blade.php ENDPATH**/ ?>