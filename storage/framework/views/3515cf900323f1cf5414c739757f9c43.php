<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'EMMIOXFOREX ACADEMY — Learn. Trade. Automate. Grow.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'EMMIOXFOREX ACADEMY — Learn. Trade. Automate. Grow.']); ?>

    
    <section class="relative px-4 pb-28 pt-20 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl text-center">

            
            <h1 class="mt-6 text-5xl font-extrabold leading-tight tracking-tight text-slate-900 sm:text-6xl lg:text-7xl">
                Learn to trade forex the
                <span class="bg-gradient-to-r from-brand-500 via-brand-400 to-gold-500 bg-clip-text text-transparent"> structured, guided</span>
                way.
            </h1>

            <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-slate-500">
                EMMIOXFOREX ACADEMY combines leveled online classes, automated trading robots, live signals, and
                professional mentorship in one platform built for real progress.
            </p>

            <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                <a href="<?php echo e(route('register')); ?>" class="btn-primary px-7 py-3 text-base">
                    Start Your Journey
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="<?php echo e(route('courses.index')); ?>" class="btn-outline px-7 py-3 text-base">Browse Courses</a>
            </div>

            
            <div id="stats-row" class="mx-auto mt-16 grid max-w-2xl grid-cols-2 gap-px overflow-hidden rounded-2xl border border-slate-200 shadow-card sm:grid-cols-4">
                <div class="bg-white px-6 py-5 text-center">
                    <div class="text-2xl font-extrabold text-slate-900" data-count="4">0</div>
                    <div class="mt-1 text-xs font-medium text-slate-500">Learning Levels</div>
                </div>
                <div class="bg-white px-6 py-5 text-center">
                    <div class="text-2xl font-extrabold text-slate-900" data-count="2">0</div>
                    <div class="mt-1 text-xs font-medium text-slate-500">Trading Robots</div>
                </div>
                <div class="bg-white px-6 py-5 text-center">
                    <div class="text-2xl font-extrabold text-slate-900">3-Month</div>
                    <div class="mt-1 text-xs font-medium text-slate-500">Signal Access</div>
                </div>
                <div class="bg-white px-6 py-5 text-center">
                    <div class="text-2xl font-extrabold text-slate-900">1-on-1</div>
                    <div class="mt-1 text-xs font-medium text-slate-500">Mentorship</div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="bg-slate-50 px-4 py-24 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="mx-auto max-w-2xl text-center">
                <span class="badge mx-auto mb-4">
                    <svg class="h-3.5 w-3.5 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                    Our Services
                </span>
                <h2 class="section-title">Everything a trader needs</h2>
                <p class="section-subtitle">One structured ecosystem — education, technology, and professional support.</p>
            </div>

            <div class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <?php $__currentLoopData = [
                    ['M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'Online Forex Classes', 'Starter to Pro courses covering technical analysis, risk management, psychology and strategy.', 'bg-brand-50 text-brand-500 ring-brand-100'],
                    ['M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v18m0 0h10a2 2 0 0 0 2-2V9M9 21H5a2 2 0 0 1-2-2V9m0 0h18', 'Robot Subscription', 'Access the Financial Magnetic Robot EA for systematic, disciplined trade execution.', 'bg-gold-50 text-gold-500 ring-amber-100'],
                    ['M17 20h5v-2a3 3 0 0 0-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 0 1 5.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 0 1 9.288 0M15 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0z', 'Professional Mentorship', 'Personalised guidance to build discipline and structured trading strategies.', 'bg-violet-50 text-violet-500 ring-violet-100'],
                    ['M13 7h8m0 0v8m0-8l-8 8-4-4-6 6', '3-Month Signal Subscription', 'Market setups with entry, stop-loss and take-profit — plus the reasoning behind each call.', 'bg-emerald-50 text-emerald-500 ring-emerald-100'],
                    ['M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'Account Management', 'Structured trading-account management for eligible clients under clear risk parameters.', 'bg-rose-50 text-rose-500 ring-rose-100'],
                    ['M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'Account Flipping', 'Aggressive growth strategies for eligible clients who accept the associated risk.', 'bg-amber-50 text-amber-500 ring-amber-100'],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$path, $title, $desc, $iconClass]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-hover group p-7 transition">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl ring-1 <?php echo e($iconClass); ?>">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="<?php echo e($path); ?>"/>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-base font-bold text-slate-900 group-hover:text-brand-600 transition"><?php echo e($title); ?></h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-500"><?php echo e($desc); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    
    <section class="px-4 py-24 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="mx-auto max-w-2xl text-center">
                <span class="badge mx-auto mb-4">
                    <svg class="h-3.5 w-3.5 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                    Structured Curriculum
                </span>
                <h2 class="section-title">A Guided Learning Path</h2>
                <p class="section-subtitle">Progress level by level — a journey, not a random pile of videos.</p>
            </div>

            <div class="relative mt-14">
                
                <div class="absolute left-0 right-0 top-8 hidden h-px bg-gradient-to-r from-transparent via-slate-300 to-transparent lg:block" style="margin: 0 12.5%"></div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <?php $__currentLoopData = [
                        ['starter',      'Starter',      'Market basics & terminology',    'bg-emerald-50 text-emerald-700 ring-emerald-200', 'text-emerald-600'],
                        ['intermediate', 'Intermediate', 'Charts, indicators, risk',       'bg-brand-50 text-brand-700 ring-brand-200',       'text-brand-600'],
                        ['advanced',     'Advanced',     'Strategy & psychology',          'bg-violet-50 text-violet-700 ring-violet-200',    'text-violet-600'],
                        ['pro',          'Pro',          'Automation & account flipping',  'bg-amber-50 text-amber-700 ring-amber-200',       'text-amber-600'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => [$level, $label, $desc, $badgeClass, $numClass]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card relative p-6 text-center">
                            <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full border-4 border-white bg-white shadow-card ring-2 ring-slate-200">
                                <span class="text-lg font-extrabold <?php echo e($numClass); ?>"><?php echo e($i + 1); ?></span>
                            </div>
                            <span class="badge badge-level-<?php echo e($level); ?>">Level <?php echo e($i + 1); ?></span>
                            <h3 class="mt-4 text-base font-bold text-slate-900"><?php echo e($label); ?></h3>
                            <p class="mt-1.5 text-sm text-slate-500"><?php echo e($desc); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>

    
    <?php if($courses->count()): ?>
    <section class="bg-slate-50 px-4 py-24 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <h2 class="section-title">Featured Courses</h2>
                    <p class="mt-2 text-slate-500">Hand-picked to get you started fast.</p>
                </div>
                <a href="<?php echo e(route('courses.index')); ?>"
                   class="inline-flex items-center gap-1.5 text-sm font-semibold text-brand-500 hover:text-brand-600 transition">
                    View all courses
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('courses.show', $course)); ?>"
                       class="card-hover group block overflow-hidden p-6 transition">
                        <span class="badge badge-level-<?php echo e($course->level); ?>"><?php echo e($course->levelLabel()); ?></span>
                        <h3 class="mt-4 font-bold text-slate-900 group-hover:text-brand-600 transition"><?php echo e($course->title); ?></h3>
                        <p class="mt-2 line-clamp-2 text-sm leading-relaxed text-slate-500"><?php echo e($course->description); ?></p>
                        <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-4 text-sm">
                            <span class="font-bold text-slate-900"><?php echo e($course->priceFormatted()); ?></span>
                            <span class="flex items-center gap-1 text-slate-400">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                <?php echo e($course->lessons()->count()); ?> lessons
                            </span>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    
    <section class="px-4 py-24 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 items-center gap-16 lg:grid-cols-2">
                <div>
                    <span class="badge mb-4">
                        <svg class="h-3.5 w-3.5 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        Why Choose Us
                    </span>
                    <h2 class="section-title">Built for traders who want real results</h2>
                    <p class="mt-4 text-base leading-relaxed text-slate-500">
                        We don't just sell courses — we provide a complete, end-to-end ecosystem that takes you from beginner to confident, tech-enabled trader.
                    </p>
                    <div class="mt-8 space-y-5">
                        <?php $__currentLoopData = [
                            ['M13 7h8m0 0v8m0-8l-8 8-4-4-6 6', 'Structured, progressive curriculum', 'Four clear levels — Starter, Intermediate, Advanced, Pro — each building on the last.'],
                            ['M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v18m0 0h10a2 2 0 0 0 2-2V9M9 21H5a2 2 0 0 1-2-2V9m0 0h18', 'Technology meets education', 'Automated EAs and live signals complement your classroom learning with real market exposure.'],
                            ['M17 20h5v-2a3 3 0 0 0-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 0 1 5.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 0 1 9.288 0M15 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0z', 'Human guidance, not just videos', 'Mentors who trade are on hand to hold you accountable and speed up your development.'],
                        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$path, $title, $desc]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex gap-4">
                                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-brand-50 ring-1 ring-brand-100">
                                    <svg class="h-5 w-5 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="<?php echo e($path); ?>"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-900"><?php echo e($title); ?></p>
                                    <p class="mt-1 text-sm leading-relaxed text-slate-500"><?php echo e($desc); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                
                <div class="relative hidden lg:block">
                    <div class="absolute -left-4 top-6 w-56 rotate-[-4deg] card p-5 shadow-card">
                        <div class="flex items-center gap-3">
                            <div class="h-9 w-9 rounded-full bg-emerald-100 flex items-center justify-center">
                                <svg class="h-4 w-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-slate-900">Lesson Completed</p>
                                <p class="text-xs text-slate-500">Technical Analysis 101</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mx-auto max-w-xs p-6 shadow-card-hover">
                        <div class="mb-4 flex items-center justify-between">
                            <span class="text-sm font-semibold text-slate-900">Your Progress</span>
                            <span class="badge badge-level-intermediate">Intermediate</span>
                        </div>
                        <div class="space-y-3">
                            <?php $__currentLoopData = [['Technical Analysis', 80], ['Risk Management', 60], ['Trading Psychology', 35]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $pct]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <div class="mb-1.5 flex justify-between text-xs">
                                        <span class="text-slate-600"><?php echo e($label); ?></span>
                                        <span class="font-semibold text-slate-900"><?php echo e($pct); ?>%</span>
                                    </div>
                                    <div class="h-1.5 overflow-hidden rounded-full bg-slate-100">
                                        <div class="h-1.5 rounded-full bg-gradient-to-r from-brand-500 to-brand-300" style="width:<?php echo e($pct); ?>%"></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="absolute -right-4 bottom-6 w-52 rotate-[3deg] card p-4 shadow-card">
                        <p class="text-xs font-semibold text-slate-500">Signal Alert</p>
                        <p class="mt-1 text-sm font-bold text-slate-900">EURUSD — Buy Setup</p>
                        <div class="mt-2 flex gap-3 text-xs">
                            <span class="text-emerald-600">TP 1.0920</span>
                            <span class="text-rose-500">SL 1.0840</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="px-4 pb-28 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-5xl overflow-hidden rounded-3xl bg-gradient-to-br from-navy-950 via-navy-900 to-brand-900 px-10 py-16 text-center shadow-glow sm:px-16">
            <div class="pointer-events-none absolute inset-0 bg-grid-glow opacity-60"></div>
            <span class="badge border-white/15 bg-white/10 text-slate-300 mx-auto mb-4">
                <svg class="h-3.5 w-3.5 text-gold-400" fill="currentColor" viewBox="0 0 24 24"><path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 0 0 .95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 0 0-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 0 0-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 0 0-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 0 0 .951-.69l1.519-4.674z"/></svg>
                Join Today
            </span>
            <h2 class="relative text-3xl font-extrabold text-white sm:text-4xl">
                Ready to start your<br>trading journey?
            </h2>
            <p class="relative mx-auto mt-4 max-w-xl text-base text-slate-400">
                Register today, get approved, and unlock a structured path from Starter to Pro — with robots, signals and mentorship along the way.
            </p>
            <div class="relative mt-10 flex flex-wrap items-center justify-center gap-4">
                <a href="<?php echo e(route('register')); ?>" class="btn-gold px-8 py-3 text-base">Join EMMIOXFOREX ACADEMY</a>
                <a href="<?php echo e(route('about')); ?>"    class="btn-outline-white px-8 py-3 text-base">Learn More</a>
            </div>
        </div>
    </section>

<script>
(function () {
    function animateCount(el, target, duration) {
        const start = performance.now();
        function step(now) {
            const elapsed = Math.min((now - start) / duration, 1);
            const value   = Math.round(elapsed * target);
            el.textContent = value;
            if (elapsed < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
    }

    const statsRow = document.getElementById('stats-row');
    if (!statsRow) return;

    let fired = false;
    const observer = new IntersectionObserver(function (entries) {
        if (entries[0].isIntersecting && !fired) {
            fired = true;
            statsRow.querySelectorAll('[data-count]').forEach(function (el) {
                animateCount(el, parseInt(el.dataset.count), 1200);
            });
            observer.disconnect();
        }
    }, { threshold: 0.5 });

    observer.observe(statsRow);
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/public/home.blade.php ENDPATH**/ ?>