<?php if (isset($component)) { $__componentOriginal131d2de898a1503a92a84eccccfb5c3d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal131d2de898a1503a92a84eccccfb5c3d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.member','data' => ['title' => $lesson->title]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.member'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($lesson->title)]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <a href="<?php echo e(route('member.courses.show', $course)); ?>" class="text-xs font-medium text-brand-300 hover:text-brand-200">&larr; <?php echo e($course->title); ?></a>
            <h1 class="mt-2 text-2xl font-bold text-white"><?php echo e($lesson->title); ?></h1>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2">
            
            <div class="card flex aspect-video items-center justify-center overflow-hidden bg-black">
                <div class="text-center">
                    <?php if (isset($component)) { $__componentOriginald88937ee957874c050ccbc67a5e19575 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald88937ee957874c050ccbc67a5e19575 = $attributes; } ?>
<?php $component = App\View\Components\Icon::resolve(['name' => 'play-solid','class' => 'mx-auto h-14 w-14 text-brand-400'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                    <p class="mt-3 text-sm text-slate-500">Lesson video player</p>
                    <p class="text-xs text-slate-600"><?php echo e($lesson->video_url); ?></p>
                </div>
            </div>

            <div class="card mt-6 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="font-semibold text-white">About this lesson</h2>
                        <p class="mt-1 text-xs text-slate-500"><?php echo e($lesson->duration_minutes); ?> minutes</p>
                    </div>
                    <form method="POST" action="<?php echo e(route('member.courses.lesson.complete', [$course, $lesson])); ?>">
                        <?php echo csrf_field(); ?>
                        <?php if($completedLessonIds->contains($lesson->id)): ?>
                            <span class="badge border-emerald-400/30 bg-emerald-400/10 text-emerald-300"><?php if (isset($component)) { $__componentOriginald88937ee957874c050ccbc67a5e19575 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald88937ee957874c050ccbc67a5e19575 = $attributes; } ?>
<?php $component = App\View\Components\Icon::resolve(['name' => 'check','class' => 'h-3.5 w-3.5'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php endif; ?> Completed</span>
                        <?php else: ?>
                            <button class="btn-primary !py-2 text-sm">Mark as Complete</button>
                        <?php endif; ?>
                    </form>
                </div>
                <p class="mt-3 text-sm leading-relaxed text-slate-400"><?php echo e($lesson->description); ?></p>
            </div>

            
            <?php if($lesson->quiz && $lesson->quiz->questions->count()): ?>
                <div class="card mt-6 p-6">
                    <h2 class="font-semibold text-white">Quick Check</h2>
                    <p class="mt-1 text-xs text-slate-500">3–5 questions to reinforce what you just learned.</p>

                    <?php if(session('quiz_result')): ?>
                        <?php $r = session('quiz_result'); ?>
                        <div class="mt-4 rounded-lg border <?php echo e($r['passed'] ? 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300' : 'border-gold-400/30 bg-gold-400/10 text-gold-300'); ?> px-4 py-3 text-sm">
                            You scored <?php echo e($r['score']); ?> / <?php echo e($r['total']); ?> — <?php echo e($r['passed'] ? 'Nice work!' : 'Give it another look and try again.'); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('member.courses.lesson.quiz', [$course, $lesson])); ?>" class="mt-4 space-y-5">
                        <?php echo csrf_field(); ?>
                        <?php $__currentLoopData = $lesson->quiz->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <p class="text-sm font-medium text-slate-200"><?php echo e($loop->iteration); ?>. <?php echo e($question->question); ?></p>
                                <div class="mt-2 space-y-2">
                                    <?php $__currentLoopData = $question->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="flex items-center gap-2 rounded-lg border border-white/10 bg-white/5 px-3 py-2 text-sm text-slate-300 hover:bg-white/10">
                                            <input type="radio" name="answers[<?php echo e($question->id); ?>]" value="<?php echo e($option->id); ?>" class="border-white/20 bg-navy-900 text-brand-500 focus:ring-brand-400" required>
                                            <?php echo e($option->text); ?>

                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <button class="btn-primary">Submit Answers</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>

        
        <div class="card h-fit divide-y divide-white/5">
            <?php $__currentLoopData = $course->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('member.courses.lesson', [$course, $l])); ?>"
                   class="flex items-center gap-3 px-4 py-3 <?php echo e($l->id === $lesson->id ? 'bg-white/5' : 'hover:bg-white/5'); ?>">
                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full <?php echo e($completedLessonIds->contains($l->id) ? 'bg-emerald-400/20 text-emerald-300' : 'bg-white/5 text-slate-500'); ?> text-[11px] font-semibold">
                        <?php if($completedLessonIds->contains($l->id)): ?> <?php if (isset($component)) { $__componentOriginald88937ee957874c050ccbc67a5e19575 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald88937ee957874c050ccbc67a5e19575 = $attributes; } ?>
<?php $component = App\View\Components\Icon::resolve(['name' => 'check','class' => 'h-3.5 w-3.5'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php endif; ?> <?php else: ?> <?php echo e($loop->iteration); ?> <?php endif; ?>
                    </span>
                    <span class="truncate text-sm <?php echo e($l->id === $lesson->id ? 'font-semibold text-white' : 'text-slate-300'); ?>"><?php echo e($l->title); ?></span>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/member/courses/lesson.blade.php ENDPATH**/ ?>