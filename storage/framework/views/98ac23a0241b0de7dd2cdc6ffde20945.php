<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => $title ?? config('app.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title ?? config('app.name'))]); ?>
    <div class="relative overflow-x-hidden bg-white">

        
        <div class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[500px] bg-hero-light"></div>

        
        <header class="sticky top-0 z-40 border-b border-slate-200 bg-white/90 backdrop-blur-lg shadow-sm">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8">

                <?php echo $__env->make('partials.logo', ['dark' => false], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                
                <nav class="hidden items-center gap-1 md:flex">
                    <a href="<?php echo e(route('home')); ?>"         class="<?php echo e(request()->routeIs('home')        ? 'nav-link-active' : 'nav-link'); ?>">Home</a>
                    <a href="<?php echo e(route('about')); ?>"        class="<?php echo e(request()->routeIs('about')       ? 'nav-link-active' : 'nav-link'); ?>">About</a>
                    <a href="<?php echo e(route('courses.index')); ?>"class="<?php echo e(request()->routeIs('courses.*')  ? 'nav-link-active' : 'nav-link'); ?>">Courses</a>
                    <a href="<?php echo e(route('robots.index')); ?>" class="<?php echo e(request()->routeIs('robots.index')? 'nav-link-active' : 'nav-link'); ?>">Robots</a>
                    <a href="<?php echo e(route('pricing')); ?>"      class="<?php echo e(request()->routeIs('pricing')    ? 'nav-link-active' : 'nav-link'); ?>">Pricing</a>
                    <a href="<?php echo e(route('contact')); ?>"      class="<?php echo e(request()->routeIs('contact')    ? 'nav-link-active' : 'nav-link'); ?>">Contact</a>
                </nav>

                
                <div class="flex items-center gap-2">
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->isAdmin()): ?>
                            <a href="<?php echo e(route('admin.dashboard')); ?>"  class="btn-outline !py-2 text-xs">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                                Admin Panel
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('member.dashboard')); ?>" class="btn-outline !py-2 text-xs">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                Dashboard
                            </a>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>"    class="nav-link hidden sm:inline-flex">Log in</a>
                        <a href="<?php echo e(route('register')); ?>" class="btn-primary !py-2 text-xs">Get Started</a>
                    <?php endif; ?>

                    
                    <button id="mobile-menu-btn" class="md:hidden rounded-lg border border-slate-200 p-2 text-slate-600 hover:bg-slate-50" aria-label="Open menu">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>

            
            <div id="mobile-menu" class="hidden border-t border-slate-100 bg-white px-4 pb-4 md:hidden">
                <nav class="mt-3 flex flex-col gap-1">
                    <a href="<?php echo e(route('home')); ?>"          class="<?php echo e(request()->routeIs('home')        ? 'nav-link-active' : 'nav-link'); ?>">Home</a>
                    <a href="<?php echo e(route('about')); ?>"         class="<?php echo e(request()->routeIs('about')       ? 'nav-link-active' : 'nav-link'); ?>">About</a>
                    <a href="<?php echo e(route('courses.index')); ?>" class="<?php echo e(request()->routeIs('courses.*')  ? 'nav-link-active' : 'nav-link'); ?>">Courses</a>
                    <a href="<?php echo e(route('robots.index')); ?>"  class="<?php echo e(request()->routeIs('robots.index')? 'nav-link-active' : 'nav-link'); ?>">Robots</a>
                    <a href="<?php echo e(route('pricing')); ?>"       class="<?php echo e(request()->routeIs('pricing')    ? 'nav-link-active' : 'nav-link'); ?>">Pricing</a>
                    <a href="<?php echo e(route('contact')); ?>"       class="<?php echo e(request()->routeIs('contact')    ? 'nav-link-active' : 'nav-link'); ?>">Contact</a>
                    <?php if(auth()->guard()->guest()): ?>
                        <a href="<?php echo e(route('login')); ?>"    class="nav-link">Log in</a>
                        <a href="<?php echo e(route('register')); ?>" class="btn-primary mt-2 w-full justify-center">Get Started</a>
                    <?php endif; ?>
                </nav>
            </div>
        </header>

        <main>
            <?php echo e($slot); ?>

        </main>

        
        <footer class="bg-navy-950">
            <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-10 md:grid-cols-4">
                    <div class="md:col-span-1">
                        <?php echo $__env->make('partials.logo', ['dark' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <p class="mt-4 text-sm leading-relaxed text-slate-400">Learn. Trade. Automate. Grow.</p>
                        
                        <div class="mt-5 flex gap-3">
                            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/5 text-slate-400 hover:bg-white/10 hover:text-white cursor-pointer transition">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557a9.83 9.83 0 0 1-2.828.775 4.932 4.932 0 0 0 2.165-2.724 9.864 9.864 0 0 1-3.127 1.195 4.916 4.916 0 0 0-8.384 4.482A13.94 13.94 0 0 1 1.64 3.161a4.917 4.917 0 0 0 1.522 6.557A4.9 4.9 0 0 1 .96 9.079v.062a4.916 4.916 0 0 0 3.946 4.814 4.935 4.935 0 0 1-2.217.084 4.918 4.918 0 0 0 4.59 3.414A9.867 9.867 0 0 1 0 19.54a13.94 13.94 0 0 0 7.548 2.212c9.057 0 14.01-7.503 14.01-14.01 0-.213-.005-.425-.014-.636A10.012 10.012 0 0 0 24 4.557z"/></svg>
                            </span>
                            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/5 text-slate-400 hover:bg-white/10 hover:text-white cursor-pointer transition">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </span>
                            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/5 text-slate-400 hover:bg-white/10 hover:text-white cursor-pointer transition">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.12L7.26 13.593l-2.96-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.537-.194 1.006.131.888.966z"/></svg>
                            </span>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-xs font-semibold uppercase tracking-widest text-slate-500">Platform</h4>
                        <ul class="mt-4 space-y-3 text-sm">
                            <li><a href="<?php echo e(route('courses.index')); ?>" class="text-slate-400 transition hover:text-white">Online Classes</a></li>
                            <li><a href="<?php echo e(route('robots.index')); ?>"  class="text-slate-400 transition hover:text-white">Robot Subscriptions</a></li>
                            <li><a href="<?php echo e(route('pricing')); ?>"       class="text-slate-400 transition hover:text-white">Pricing</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-xs font-semibold uppercase tracking-widest text-slate-500">Company</h4>
                        <ul class="mt-4 space-y-3 text-sm">
                            <li><a href="<?php echo e(route('about')); ?>"    class="text-slate-400 transition hover:text-white">About Us</a></li>
                            <li><a href="<?php echo e(route('register')); ?>" class="text-slate-400 transition hover:text-white">Join the Academy</a></li>
                            <li><a href="<?php echo e(route('login')); ?>"    class="text-slate-400 transition hover:text-white">Member Login</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-xs font-semibold uppercase tracking-widest text-slate-500">Risk Disclosure</h4>
                        <p class="mt-4 text-xs leading-relaxed text-slate-500">
                            Forex and leveraged trading involve substantial risk and may result in partial or complete loss of capital.
                            Trading signals, automated systems, mentorship, account management, and account-flipping services do not
                            guarantee profits or future performance. Past, demo, or backtested results are not guarantees of future results.
                        </p>
                    </div>
                </div>

                <div class="mt-12 border-t border-white/5 pt-6 flex flex-col items-center justify-between gap-4 text-xs text-slate-600 sm:flex-row">
                    <span>&copy; <?php echo e(date('Y')); ?> EMMIOXFOREX ACADEMY. All rights reserved.</span>
                    <span class="text-slate-700">Learn. Trade. Automate. Grow.</span>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Mobile menu toggle
        const btn  = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        if (btn && menu) btn.addEventListener('click', () => menu.classList.toggle('hidden'));

        // Sticky header — reinforce shadow + solid bg on scroll
        (function () {
            const header = document.querySelector('header');
            if (!header) return;
            function onScroll() {
                if (window.scrollY > 12) {
                    header.classList.remove('bg-white/90', 'backdrop-blur-lg', 'shadow-sm');
                    header.classList.add('bg-white', 'shadow-md');
                } else {
                    header.classList.remove('bg-white', 'shadow-md');
                    header.classList.add('bg-white/90', 'backdrop-blur-lg', 'shadow-sm');
                }
            }
            window.addEventListener('scroll', onScroll, { passive: true });
        })();
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/components/layouts/public.blade.php ENDPATH**/ ?>