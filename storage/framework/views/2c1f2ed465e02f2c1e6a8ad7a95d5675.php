<?php if (isset($component)) { $__componentOriginal131d2de898a1503a92a84eccccfb5c3d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal131d2de898a1503a92a84eccccfb5c3d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.member','data' => ['title' => 'My Courses']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.member'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'My Courses']); ?>
     <?php $__env->slot('header', null, []); ?> My Courses <?php $__env->endSlot(); ?>

<?php
    $allLevels = ['starter', 'intermediate', 'advanced', 'pro'];
    $activeTab = request('level', 'all');
    // Flatten grouped collection into a single list
    $flatCourses = $courses->flatten();
?>

    
    <div class="mb-6">
        <h1 class="text-2xl font-extrabold text-slate-900">My Courses</h1>
        <p class="mt-1 text-sm text-slate-500">Starter → Pro. Progress level by level.</p>
    </div>

    
    <div class="mb-6 flex gap-2 overflow-x-auto pb-1">
        <a href="<?php echo e(route('member.courses.index')); ?>"
           class="flex-shrink-0 rounded-xl px-4 py-2 text-sm font-semibold transition
                  <?php echo e($activeTab === 'all' ? 'bg-slate-900 text-white shadow-sm' : 'border border-slate-200 bg-white text-slate-600 hover:border-slate-300 hover:text-slate-900'); ?>">
            All
        </a>
        <?php $__currentLoopData = $allLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lvl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('member.courses.index', ['level' => $lvl])); ?>"
               class="flex-shrink-0 rounded-xl px-4 py-2 text-sm font-semibold transition capitalize
                      <?php echo e($activeTab === $lvl ? 'bg-slate-900 text-white shadow-sm' : 'border border-slate-200 bg-white text-slate-600 hover:border-slate-300 hover:text-slate-900'); ?>">
                <?php echo e(ucfirst($lvl)); ?>

            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <?php if($flatCourses->isNotEmpty()): ?>
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <?php $__currentLoopData = $flatCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $unlocked = $course->isUnlockedFor(auth()->user());
                $level    = $course->level;
                $barColor = match($level) {
                    'starter'      => 'bg-emerald-400',
                    'intermediate' => 'bg-brand-500',
                    'advanced'     => 'bg-amber-400',
                    'pro'          => 'bg-violet-500',
                    default        => 'bg-slate-300',
                };
            ?>

            <div class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md">

                
                <div class="h-1.5 w-full <?php echo e($barColor); ?>"></div>

                <div class="flex flex-1 flex-col p-5">
                    
                    <div class="flex items-center justify-between gap-2">
                        <span class="badge badge-level-<?php echo e($level); ?> !px-2 !py-0.5 !text-[10px]"><?php echo e(ucfirst($level)); ?></span>
                        <?php if($unlocked): ?>
                            <span class="flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-emerald-50">
                                <?php if (isset($component)) { $__componentOriginald88937ee957874c050ccbc67a5e19575 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald88937ee957874c050ccbc67a5e19575 = $attributes; } ?>
<?php $component = App\View\Components\Icon::resolve(['name' => 'unlock','class' => 'h-3.5 w-3.5 text-emerald-500'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                            </span>
                        <?php else: ?>
                            <span class="flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-slate-100">
                                <?php if (isset($component)) { $__componentOriginald88937ee957874c050ccbc67a5e19575 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald88937ee957874c050ccbc67a5e19575 = $attributes; } ?>
<?php $component = App\View\Components\Icon::resolve(['name' => 'lock','class' => 'h-3.5 w-3.5 text-slate-400'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                            </span>
                        <?php endif; ?>
                    </div>

                    
                    <h3 class="mt-3 font-bold text-slate-900 leading-snug transition group-hover:text-brand-600">
                        <?php echo e($course->title); ?>

                    </h3>

                    
                    <p class="mt-1.5 flex-1 text-xs text-slate-500 line-clamp-3"><?php echo e($course->description); ?></p>

                    
                    <div class="mt-4 flex items-center justify-between text-xs">
                        <span class="font-bold text-slate-800"><?php echo e($course->priceFormatted()); ?></span>
                        <span class="text-slate-400"><?php echo e($course->lessons()->count()); ?> lessons</span>
                    </div>

                    
                    <div class="mt-4">
                        <?php if($unlocked): ?>
                            <a href="<?php echo e(route('member.courses.show', $course)); ?>"
                               class="flex w-full items-center justify-center gap-1.5 rounded-xl bg-brand-600 px-3 py-2 text-xs font-bold text-white transition hover:bg-brand-700">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Start Learning
                            </a>
                        <?php else: ?>
                            <button type="button"
                                    onclick="openUnlockModal('<?php echo e(route('member.courses.unlock', $course)); ?>', '<?php echo e(addslashes($course->title)); ?>', '<?php echo e($course->priceFormatted()); ?>')"
                                    class="flex w-full items-center justify-center gap-1.5 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs font-bold text-slate-700 transition hover:border-brand-300 hover:bg-brand-50 hover:text-brand-700">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                Unlock Course
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="flex flex-col items-center gap-3 rounded-2xl border border-slate-200 bg-white py-20 text-center shadow-sm">
            <svg class="h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13"/></svg>
            <p class="text-sm font-semibold text-slate-500">No courses available yet.</p>
        </div>
    <?php endif; ?>

    
    <div id="unlock-modal"
         class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4 backdrop-blur-sm"
         onclick="if(event.target===this) closeUnlockModal()">
        <div class="w-full max-w-md rounded-2xl border border-slate-200 bg-white shadow-2xl">

            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                <div>
                    <h3 class="font-bold text-slate-900">Unlock Course</h3>
                    <p id="modal-course-title" class="mt-0.5 text-sm text-slate-500"></p>
                </div>
                <button onclick="closeUnlockModal()" class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-600">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="mx-6 mt-4 flex items-center gap-3 rounded-xl border border-brand-100 bg-brand-50 px-4 py-3">
                <svg class="h-5 w-5 flex-shrink-0 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div>
                    <p class="text-xs text-brand-700">Amount to pay</p>
                    <p id="modal-price" class="text-lg font-bold text-brand-900"></p>
                </div>
            </div>

            <form id="unlock-form" method="POST" action="" enctype="multipart/form-data" class="p-6 pt-4">
                <?php echo csrf_field(); ?>
                <?php $payInfo = \App\Models\Setting::get('payment_instructions', '') ?>
                <div class="mt-3">
                    <label class="mb-1.5 block text-sm font-semibold text-slate-700">How to pay</label>
                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 text-sm text-slate-600">
                        <?php echo e($payInfo ?: 'Transfer the course fee to the account provided by admin, then upload your receipt below.'); ?>

                    </div>
                </div>
                <div class="mt-4">
                    <label class="mb-1.5 block text-sm font-semibold text-slate-700">Payment Proof <span class="text-rose-500">*</span></label>
                    <label class="flex cursor-pointer flex-col items-center gap-2 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 p-6 text-center transition hover:border-brand-300 hover:bg-brand-50">
                        <svg class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                        <span class="text-sm font-medium text-slate-600">Click to upload screenshot or PDF</span>
                        <span class="text-xs text-slate-400">JPG, PNG, PDF — max 5 MB</span>
                        <input type="file" name="proof" id="unlock-proof" accept="image/*,.pdf" class="hidden" required>
                    </label>
                    <p id="unlock-file-name" class="mt-1.5 hidden text-xs text-emerald-600"></p>
                </div>
                <button type="submit" class="mt-5 flex w-full items-center justify-center gap-2 rounded-xl bg-brand-600 px-4 py-3 text-sm font-bold text-white transition hover:bg-brand-700">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Submit Payment for Review
                </button>
            </form>
        </div>
    </div>

    <script>
    function openUnlockModal(actionUrl, courseTitle, price) {
        document.getElementById('unlock-form').action = actionUrl;
        document.getElementById('modal-course-title').textContent = courseTitle;
        document.getElementById('modal-price').textContent = price;
        var m = document.getElementById('unlock-modal');
        m.classList.remove('hidden'); m.classList.add('flex');
    }
    function closeUnlockModal() {
        var m = document.getElementById('unlock-modal');
        m.classList.add('hidden'); m.classList.remove('flex');
    }
    document.addEventListener('keydown', function(e){ if(e.key==='Escape') closeUnlockModal(); });
    document.getElementById('unlock-proof').addEventListener('change', function(){
        var l = document.getElementById('unlock-file-name');
        if(this.files.length){ l.textContent='✓ '+this.files[0].name; l.classList.remove('hidden'); }
    });
    </script>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/member/courses/index.blade.php ENDPATH**/ ?>