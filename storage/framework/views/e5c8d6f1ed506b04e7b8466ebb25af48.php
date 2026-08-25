<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Courses — EMMIOXFOREX ACADEMY']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Courses — EMMIOXFOREX ACADEMY']); ?>

    
    <section class="border-b border-slate-200 bg-slate-50 px-4 py-20 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="badge mx-auto">Online Forex Classes</span>
            <h1 class="mt-5 text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">
                A leveled learning path<br>built to make progress simple
            </h1>
            <p class="mt-5 text-lg text-slate-600">
                Starter &rarr; Intermediate &rarr; Advanced &rarr; Pro. Each level unlocks the next.
            </p>
        </div>
    </section>

    
    <section class="sticky top-0 z-20 border-b border-slate-200 bg-white/95 backdrop-blur-sm px-4 py-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

            
            <div class="flex items-center gap-1.5 flex-wrap">
                <button data-filter="all"
                        class="filter-btn active-filter px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                    All Levels
                </button>
                <button data-filter="starter"
                        class="filter-btn px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                    Starter
                </button>
                <button data-filter="intermediate"
                        class="filter-btn px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                    Intermediate
                </button>
                <button data-filter="advanced"
                        class="filter-btn px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                    Advanced
                </button>
                <button data-filter="pro"
                        class="filter-btn px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                    Pro
                </button>
            </div>

            
            <div class="relative w-full sm:w-64">
                <svg class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-slate-400"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35"/>
                </svg>
                <input id="course-search" type="search" placeholder="Search courses…"
                       class="w-full rounded-lg border border-slate-200 bg-slate-50 py-2 pl-9 pr-4 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
            </div>
        </div>

        <div class="mx-auto max-w-7xl mt-2">
            <p id="results-count" class="text-xs text-slate-400 hidden"></p>
        </div>
    </section>

    
    <section class="px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">

            <?php $allCourses = $courses->flatten(); ?>

            <?php if($allCourses->isEmpty()): ?>
                <div class="py-24 text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100">
                        <svg class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13"/>
                        </svg>
                    </div>
                    <p class="mt-4 text-base font-semibold text-slate-700">Courses are being prepared</p>
                    <p class="mt-2 text-sm text-slate-500">Check back soon — we're building great content for you.</p>
                </div>
            <?php else: ?>
                <div id="course-grid" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <?php $__currentLoopData = $allCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('courses.show', $course)); ?>"
                           class="course-card card-hover group flex flex-col transition"
                           data-level="<?php echo e($course->level); ?>"
                           data-title="<?php echo e(strtolower($course->title)); ?>"
                           data-desc="<?php echo e(strtolower($course->description)); ?>">

                            
                            <?php if($course->cover_image): ?>
                                <img src="<?php echo e(asset('storage/'.$course->cover_image)); ?>"
                                     alt="<?php echo e($course->title); ?>"
                                     class="h-44 w-full rounded-t-2xl object-cover">
                                <div class="flex flex-col flex-1 p-5">
                            <?php else: ?>
                                <div class="flex h-44 w-full items-center justify-center rounded-t-2xl bg-brand-50">
                                    <svg class="h-12 w-12 text-brand-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <div class="flex flex-col flex-1 p-5">
                            <?php endif; ?>

                                
                                <span class="inline-flex self-start items-center px-2.5 py-0.5 rounded-full text-xs font-semibold mb-3 badge-level-<?php echo e($course->level); ?>">
                                    <?php echo e(ucfirst($course->level)); ?>

                                </span>

                                <h3 class="font-bold text-slate-900 transition group-hover:text-brand-600 leading-snug"><?php echo e($course->title); ?></h3>
                                <p class="mt-2 flex-1 line-clamp-2 text-sm leading-relaxed text-slate-500"><?php echo e($course->description); ?></p>

                                <div class="mt-4 flex items-center justify-between border-t border-slate-100 pt-4 text-sm">
                                    <span class="font-bold text-slate-900"><?php echo e($course->priceFormatted()); ?></span>
                                    <span class="flex items-center gap-1 text-slate-400">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.069A1 1 0 0121 8.82V15.18a1 1 0 01-1.447.89L15 14M3 8a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"/>
                                        </svg>
                                        <?php echo e($course->lessons()->count()); ?> lessons
                                    </span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
                <div id="no-results" class="hidden py-24 text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100">
                        <svg class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <circle cx="11" cy="11" r="8"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35"/>
                        </svg>
                    </div>
                    <p class="mt-4 text-base font-semibold text-slate-700">No courses found</p>
                    <p class="mt-2 text-sm text-slate-500">Try a different keyword or filter.</p>
                </div>
            <?php endif; ?>

        </div>
    </section>

<style>
.filter-btn { color: #64748b; background: transparent; }
.filter-btn:hover { background: #f1f5f9; color: #1e293b; }
.filter-btn.active-filter { background: #1F6FE0; color: #fff; }
</style>

<script>
(function () {
    const filterBtns  = document.querySelectorAll('.filter-btn');
    const searchInput = document.getElementById('course-search');
    const cards       = document.querySelectorAll('.course-card');
    const noResults   = document.getElementById('no-results');
    const countEl     = document.getElementById('results-count');

    let activeLevel = 'all';
    let searchQuery = '';

    function applyFilters() {
        let visible = 0;

        cards.forEach(card => {
            const levelMatch = activeLevel === 'all' || card.dataset.level === activeLevel;
            const textMatch  = !searchQuery
                || (card.dataset.title || '').includes(searchQuery)
                || (card.dataset.desc  || '').includes(searchQuery);

            if (levelMatch && textMatch) {
                card.style.display = '';
                visible++;
            } else {
                card.style.display = 'none';
            }
        });

        if (noResults) noResults.classList.toggle('hidden', visible > 0);

        if (countEl) {
            if (searchQuery || activeLevel !== 'all') {
                countEl.textContent = visible + ' course' + (visible !== 1 ? 's' : '') + ' found';
                countEl.classList.remove('hidden');
            } else {
                countEl.classList.add('hidden');
            }
        }
    }

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active-filter'));
            btn.classList.add('active-filter');
            activeLevel = btn.dataset.filter;
            applyFilters();
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', () => {
            searchQuery = searchInput.value.trim().toLowerCase();
            applyFilters();
        });
    }
})();
</script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd)): ?>
<?php $attributes = $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd; ?>
<?php unset($__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd)): ?>
<?php $component = $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd; ?>
<?php unset($__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd); ?>
<?php endif; ?>
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/public/courses.blade.php ENDPATH**/ ?>