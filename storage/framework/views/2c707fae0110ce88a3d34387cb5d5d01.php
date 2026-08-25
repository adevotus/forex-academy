<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => ($title ?? 'Admin').' — Admin Panel']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($title ?? 'Admin').' — Admin Panel')]); ?>
    
    <div class="flex h-screen overflow-hidden bg-slate-50">

        
        <aside class="hidden w-64 flex-shrink-0 flex-col bg-navy-950 lg:flex">

            <div class="border-b border-white/5 px-5 py-5">
                <?php echo $__env->make('partials.logo', ['dark' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <span class="mt-3 inline-flex items-center gap-1.5 rounded-full border border-gold-400/30 bg-gold-400/10 px-2.5 py-0.5 text-[10px] font-semibold uppercase tracking-wider text-gold-300">
                    <svg class="h-2.5 w-2.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    Admin Panel
                </span>
            </div>

            <nav class="flex-1 space-y-0.5 overflow-y-auto px-3 py-5">
                <p class="mb-2 px-3 text-[10px] font-semibold uppercase tracking-widest text-slate-600">Overview</p>
                <a href="<?php echo e(route('admin.dashboard')); ?>"
                   class="<?php echo e(request()->routeIs('admin.dashboard') ? 'sidebar-link-active' : 'sidebar-link'); ?>">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                    Overview
                </a>

                <p class="mb-2 mt-5 px-3 text-[10px] font-semibold uppercase tracking-widest text-slate-600">Management</p>
                <a href="<?php echo e(route('admin.members.index')); ?>"
                   class="<?php echo e(request()->routeIs('admin.members.*') ? 'sidebar-link-active' : 'sidebar-link'); ?>">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Members
                </a>
                <a href="<?php echo e(route('admin.payments.index')); ?>"
                   class="<?php echo e(request()->routeIs('admin.payments.*') ? 'sidebar-link-active' : 'sidebar-link'); ?> justify-between">
                    <span class="flex items-center gap-3">
                        <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                        Payments
                    </span>
                    <?php if(($pendingPaymentsCount ?? 0) > 0): ?>
                        <span class="rounded-full bg-rose-500 px-1.5 py-0.5 text-[10px] font-bold text-white"><?php echo e($pendingPaymentsCount); ?></span>
                    <?php endif; ?>
                </a>
                <a href="<?php echo e(route('admin.notifications')); ?>"
                   class="<?php echo e(request()->routeIs('admin.notifications') ? 'sidebar-link-active' : 'sidebar-link'); ?> justify-between">
                    <span class="flex items-center gap-3">
                        <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        Notifications
                    </span>
                    <?php $totalPending = ($pendingPaymentsCount ?? 0) + ((\App\Models\User::where('role','member')->where('status','pending')->count()) ?? 0); ?>
                    <?php if($totalPending > 0): ?>
                        <span class="rounded-full bg-gold-500 px-1.5 py-0.5 text-[10px] font-bold text-white"><?php echo e($totalPending); ?></span>
                    <?php endif; ?>
                </a>

                <a href="<?php echo e(route('admin.contact.index')); ?>"
                   class="<?php echo e(request()->routeIs('admin.contact.*') ? 'sidebar-link-active' : 'sidebar-link'); ?> justify-between">
                    <span class="flex items-center gap-3">
                        <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Contact
                    </span>
                    <?php $contactUnread = \App\Models\ContactMessage::where('status','new')->count(); ?>
                    <?php if($contactUnread > 0): ?>
                        <span class="rounded-full bg-brand-500 px-1.5 py-0.5 text-[10px] font-bold text-white"><?php echo e($contactUnread); ?></span>
                    <?php endif; ?>
                </a>

                <p class="mb-2 mt-5 px-3 text-[10px] font-semibold uppercase tracking-widest text-slate-600">Content</p>
                <a href="<?php echo e(route('admin.courses.index')); ?>"
                   class="<?php echo e(request()->routeIs('admin.courses.*') ? 'sidebar-link-active' : 'sidebar-link'); ?>">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    Courses & Lessons
                </a>
                <a href="<?php echo e(route('admin.robots.index')); ?>"
                   class="<?php echo e(request()->routeIs('admin.robots.*') ? 'sidebar-link-active' : 'sidebar-link'); ?>">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><path d="M8 21h8m-4-4v4"/></svg>
                    Robots / EAs
                </a>
                <a href="<?php echo e(route('admin.signals.index')); ?>"
                   class="<?php echo e(request()->routeIs('admin.signals.*') ? 'sidebar-link-active' : 'sidebar-link'); ?>">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    Signals
                </a>
                <a href="<?php echo e(route('admin.mentorship.index')); ?>"
                   class="<?php echo e(request()->routeIs('admin.mentorship.*') ? 'sidebar-link-active' : 'sidebar-link'); ?>">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                    Mentorship
                </a>
                <a href="<?php echo e(route('admin.testimonials.index')); ?>"
                   class="<?php echo e(request()->routeIs('admin.testimonials.*') ? 'sidebar-link-active' : 'sidebar-link'); ?>">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                    Testimonials
                </a>

                <p class="mb-2 mt-5 px-3 text-[10px] font-semibold uppercase tracking-widest text-slate-600">System</p>
                <a href="<?php echo e(route('admin.payment-methods.index')); ?>"
                   class="<?php echo e(request()->routeIs('admin.payment-methods.*') ? 'sidebar-link-active' : 'sidebar-link'); ?>">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                    Payment Methods
                </a>
                <a href="<?php echo e(route('admin.pricing')); ?>"
                   class="<?php echo e(request()->routeIs('admin.pricing*') ? 'sidebar-link-active' : 'sidebar-link'); ?>">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Pricing
                </a>
            </nav>

            <div class="border-t border-white/5 p-4">
                <div class="mb-3 flex items-center gap-3">
                    <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-gold-500/20 text-sm font-bold text-gold-300">
                        <?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?>

                    </div>
                    <div class="min-w-0">
                        <p class="truncate text-sm font-semibold text-white"><?php echo e(auth()->user()->name); ?></p>
                        <p class="truncate text-xs text-slate-500">Administrator</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <a href="<?php echo e(route('home')); ?>"
                       class="flex items-center justify-center gap-1.5 rounded-lg border border-white/10 px-3 py-2 text-xs font-medium text-slate-400 transition hover:bg-white/5 hover:text-white">
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        View Site
                    </a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button class="flex w-full items-center justify-center gap-1.5 rounded-lg border border-white/10 px-3 py-2 text-xs font-medium text-slate-400 transition hover:bg-white/5 hover:text-white">
                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            Log out
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        
        <div class="flex flex-1 flex-col min-w-0 overflow-hidden">

            
            <div class="flex flex-shrink-0 items-center justify-between border-b border-slate-200 bg-white px-4 py-3 lg:hidden">
                <?php echo $__env->make('partials.logo', ['dark' => false], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <button id="mob-admin-btn" class="rounded-lg border border-slate-200 p-2 text-slate-600 hover:bg-slate-50">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>

            
            <div id="mob-admin-menu" class="hidden flex-shrink-0 border-b border-slate-200 bg-white px-4 pb-4 lg:hidden">
                <nav class="mt-3 space-y-1">
                    <a href="<?php echo e(route('admin.dashboard')); ?>"       class="<?php echo e(request()->routeIs('admin.dashboard')    ? 'nav-link-active' : 'nav-link'); ?>">Overview</a>
                    <a href="<?php echo e(route('admin.members.index')); ?>"   class="<?php echo e(request()->routeIs('admin.members.*')    ? 'nav-link-active' : 'nav-link'); ?>">Members</a>
                    <a href="<?php echo e(route('admin.payments.index')); ?>"  class="<?php echo e(request()->routeIs('admin.payments.*')   ? 'nav-link-active' : 'nav-link'); ?>">Payments</a>
                    <a href="<?php echo e(route('admin.notifications')); ?>"   class="<?php echo e(request()->routeIs('admin.notifications')? 'nav-link-active' : 'nav-link'); ?>">Notifications</a>
                    <a href="<?php echo e(route('admin.courses.index')); ?>"   class="<?php echo e(request()->routeIs('admin.courses.*')    ? 'nav-link-active' : 'nav-link'); ?>">Courses</a>
                    <a href="<?php echo e(route('admin.robots.index')); ?>"    class="<?php echo e(request()->routeIs('admin.robots.*')     ? 'nav-link-active' : 'nav-link'); ?>">Robots</a>
                    <a href="<?php echo e(route('admin.signals.index')); ?>"   class="<?php echo e(request()->routeIs('admin.signals.*')    ? 'nav-link-active' : 'nav-link'); ?>">Signals</a>
                    <a href="<?php echo e(route('admin.contact.index')); ?>"  class="<?php echo e(request()->routeIs('admin.contact.*')    ? 'nav-link-active' : 'nav-link'); ?>">Contact</a>
                </nav>
            </div>

            
            <div class="flex-1 overflow-y-auto">

                
                <div class="sticky top-0 z-30 hidden items-center justify-between border-b border-slate-200 bg-white px-6 py-3 lg:flex">
                    <div class="flex items-center gap-2 text-sm text-slate-500">
                        <span class="font-semibold text-slate-700">Admin Panel</span>
                        <?php if(isset($header)): ?>
                            <svg class="h-3.5 w-3.5 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                            <span><?php echo e(is_string($header) ? $header : ''); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="<?php echo e(route('admin.notifications')); ?>"
                           class="relative flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-500 transition hover:bg-slate-50 hover:text-slate-700">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                            <?php if(($pendingPaymentsCount ?? 0) > 0): ?>
                                <span class="absolute -right-1 -top-1 flex h-4 w-4 items-center justify-center rounded-full bg-rose-500 text-[9px] font-bold text-white"><?php echo e($pendingPaymentsCount > 9 ? '9+' : $pendingPaymentsCount); ?></span>
                            <?php endif; ?>
                        </a>
                        <div class="relative" id="admin-avatar-menu">
                            <button id="admin-avatar-btn"
                                    class="flex items-center gap-2.5 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-sm transition hover:bg-slate-50">
                                <span class="flex h-7 w-7 items-center justify-center rounded-full bg-gold-500/20 text-xs font-bold text-gold-600"><?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?></span>
                                <span class="hidden max-w-[120px] truncate font-medium text-slate-700 sm:block"><?php echo e(auth()->user()->name); ?></span>
                                <svg class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div id="admin-avatar-dropdown"
                                 class="absolute right-0 top-full z-50 mt-2 hidden w-52 rounded-xl border border-slate-200 bg-white py-1 shadow-lg">
                                <div class="border-b border-slate-100 px-4 py-3">
                                    <p class="truncate text-sm font-semibold text-slate-900"><?php echo e(auth()->user()->name); ?></p>
                                    <p class="truncate text-xs text-slate-500"><?php echo e(auth()->user()->email); ?></p>
                                </div>
                                <a href="<?php echo e(route('admin.profile')); ?>" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-brand-600">
                                    <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    Profile
                                </a>
                                <a href="<?php echo e(route('admin.preferences')); ?>" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-brand-600">
                                    <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                                    Preferences
                                </a>
                                <a href="<?php echo e(route('admin.pricing')); ?>" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-brand-600">
                                    <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Pricing
                                </a>
                                <div class="my-1 border-t border-slate-100"></div>
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="flex w-full items-center gap-3 px-4 py-2.5 text-sm text-rose-600 hover:bg-rose-50">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        Log out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <main class="mx-auto w-full max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                    <?php if(isset($header)): ?>
                        <div class="mb-8 flex flex-wrap items-center justify-between gap-4"><?php echo e($header); ?></div>
                    <?php endif; ?>
                    <?php echo $__env->make('partials.flash', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo e($slot); ?>

                </main>
            </div>
        </div>
    </div>

    <script>
    (function () {
        var btn = document.getElementById('mob-admin-btn');
        var menu = document.getElementById('mob-admin-menu');
        if (btn && menu) btn.addEventListener('click', function () { menu.classList.toggle('hidden'); });

        var avatarBtn      = document.getElementById('admin-avatar-btn');
        var avatarDropdown = document.getElementById('admin-avatar-dropdown');
        if (avatarBtn && avatarDropdown) {
            avatarBtn.addEventListener('click', function (e) { e.stopPropagation(); avatarDropdown.classList.toggle('hidden'); });
            avatarDropdown.addEventListener('click', function (e) { e.stopPropagation(); });
            document.addEventListener('click', function () { avatarDropdown.classList.add('hidden'); });
        }
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/components/layouts/admin.blade.php ENDPATH**/ ?>