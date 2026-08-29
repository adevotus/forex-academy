<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => ($title ?? 'Dashboard').' — EMMIOXFOREX ACADEMY']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($title ?? 'Dashboard').' — EMMIOXFOREX ACADEMY')]); ?>
<?php
    $authUser        = auth()->user();
    $memberNoteCount = $authUser->payments()
        ->where('type', 'registration')
        ->where('status', 'pending')
        ->whereNotNull('proof_path')
        ->count();
?>
    
    <div class="flex h-screen overflow-hidden bg-slate-50">

        
        <aside class="hidden w-60 flex-shrink-0 flex-col bg-navy-950 lg:flex">

            <div class="border-b border-white/5 px-5 py-5">
                <?php echo $__env->make('partials.logo', ['dark' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <span class="mt-3 inline-flex items-center gap-1.5 rounded-full border border-brand-400/30 bg-brand-400/10 px-2.5 py-0.5 text-[10px] font-semibold uppercase tracking-wider text-brand-300">
                    <svg class="h-2.5 w-2.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    Member Area
                </span>
            </div>

            <nav class="flex-1 space-y-0.5 overflow-y-auto px-3 py-5">
                <p class="mb-2 px-3 text-[10px] font-semibold uppercase tracking-widest text-slate-600">Main</p>
                <a href="<?php echo e(route('member.dashboard')); ?>"
                   class="<?php echo e(request()->routeIs('member.dashboard') ? 'sidebar-link-active' : 'sidebar-link'); ?>">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    Overview
                </a>
                <p class="mb-2 mt-5 px-3 text-[10px] font-semibold uppercase tracking-widest text-slate-600">Academy</p>
                <a href="<?php echo e(route('member.courses.index')); ?>"
                   class="<?php echo e(request()->routeIs('member.courses.*') ? 'sidebar-link-active' : 'sidebar-link'); ?>">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    My Courses
                </a>
                <a href="<?php echo e(route('member.robots.index')); ?>"
                   class="<?php echo e(request()->routeIs('member.robots.*') ? 'sidebar-link-active' : 'sidebar-link'); ?>">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><path d="M8 21h8m-4-4v4"/></svg>
                    Robots / EAs
                </a>
                <a href="<?php echo e(route('member.signals.index')); ?>"
                   class="<?php echo e(request()->routeIs('member.signals.*') ? 'sidebar-link-active' : 'sidebar-link'); ?>">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    Signals
                </a>
                <a href="<?php echo e(route('member.mentorship.index')); ?>"
                   class="<?php echo e(request()->routeIs('member.mentorship.*') ? 'sidebar-link-active' : 'sidebar-link'); ?>">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Mentorship
                </a>
                <p class="mb-2 mt-5 px-3 text-[10px] font-semibold uppercase tracking-widest text-slate-600">Account</p>
                <a href="<?php echo e(route('member.billing.index')); ?>"
                   class="<?php echo e(request()->routeIs('member.billing.*') ? 'sidebar-link-active' : 'sidebar-link'); ?>">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                    Billing
                </a>
                <a href="<?php echo e(route('member.profile')); ?>"
                   class="<?php echo e(request()->routeIs('member.profile*') ? 'sidebar-link-active' : 'sidebar-link'); ?>">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    My Profile
                </a>
            </nav>

            <div class="border-t border-white/5 p-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-brand-500/20 text-sm font-bold text-brand-300">
                        <?php echo e(strtoupper(substr($authUser->name, 0, 1))); ?>

                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-sm font-semibold text-white"><?php echo e($authUser->name); ?></p>
                        <p class="truncate text-xs text-slate-500">Member</p>
                    </div>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" data-no-loading>
                        <?php echo csrf_field(); ?>
                        <button type="submit" title="Log out"
                                class="flex h-8 w-8 items-center justify-center rounded-lg border border-white/10 text-slate-400 transition hover:bg-white/10 hover:text-white">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        
        <div class="flex flex-1 flex-col min-w-0 overflow-hidden">

            
            <div class="flex flex-shrink-0 items-center justify-between border-b border-slate-200 bg-white px-4 py-3 lg:hidden">
                <?php echo $__env->make('partials.logo', ['dark' => false], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <button id="mob-member-btn" class="rounded-lg border border-slate-200 p-2 text-slate-600 hover:bg-slate-50">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>

            
            <div id="mob-member-menu" class="hidden flex-shrink-0 border-b border-slate-200 bg-white px-4 pb-4 lg:hidden">
                <nav class="mt-3 space-y-1">
                    <a href="<?php echo e(route('member.dashboard')); ?>"        class="<?php echo e(request()->routeIs('member.dashboard')     ? 'nav-link-active' : 'nav-link'); ?>">Overview</a>
                    <a href="<?php echo e(route('member.courses.index')); ?>"    class="<?php echo e(request()->routeIs('member.courses.*')     ? 'nav-link-active' : 'nav-link'); ?>">My Courses</a>
                    <a href="<?php echo e(route('member.robots.index')); ?>"     class="<?php echo e(request()->routeIs('member.robots.*')      ? 'nav-link-active' : 'nav-link'); ?>">Robots / EAs</a>
                    <a href="<?php echo e(route('member.signals.index')); ?>"    class="<?php echo e(request()->routeIs('member.signals.*')     ? 'nav-link-active' : 'nav-link'); ?>">Signals</a>
                    <a href="<?php echo e(route('member.mentorship.index')); ?>" class="<?php echo e(request()->routeIs('member.mentorship.*') ? 'nav-link-active' : 'nav-link'); ?>">Mentorship</a>
                    <a href="<?php echo e(route('member.billing.index')); ?>"    class="<?php echo e(request()->routeIs('member.billing.*')     ? 'nav-link-active' : 'nav-link'); ?>">Billing</a>
                    <a href="<?php echo e(route('member.profile')); ?>"          class="<?php echo e(request()->routeIs('member.profile*')      ? 'nav-link-active' : 'nav-link'); ?>">My Profile</a>
                </nav>
            </div>

            
            <div class="flex-1 overflow-y-auto">

                
                <div class="sticky top-0 z-30 hidden items-center justify-between border-b border-slate-200 bg-white px-6 py-3 lg:flex">
                    <div class="flex items-center gap-2 text-sm text-slate-500">
                        <span class="font-semibold text-slate-700">Member Portal</span>
                        <?php if(isset($header)): ?>
                            <svg class="h-3.5 w-3.5 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                            <span><?php echo e(is_string($header) ? $header : ''); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="flex items-center gap-3">
                        
                        <div class="relative" id="member-notif-wrapper">
                            <button id="member-notif-btn"
                                    class="relative flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-500 transition hover:bg-slate-50 hover:text-slate-700">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                                <?php if($memberNoteCount > 0): ?>
                                    <span class="absolute -right-1 -top-1 flex h-4 w-4 items-center justify-center rounded-full bg-rose-500 text-[9px] font-bold text-white"><?php echo e($memberNoteCount > 9 ? '9+' : $memberNoteCount); ?></span>
                                <?php endif; ?>
                            </button>
                            <div id="member-notif-panel"
                                 class="absolute right-0 top-full z-50 mt-2 hidden w-80 rounded-xl border border-slate-200 bg-white shadow-lg">
                                <div class="border-b border-slate-100 px-4 py-3">
                                    <p class="text-sm font-bold text-slate-900">Notifications</p>
                                </div>
                                <?php if($memberNoteCount > 0): ?>
                                    <div class="p-3">
                                        <div class="flex items-start gap-3 rounded-xl border border-amber-100 bg-amber-50 p-3">
                                            <div class="mt-0.5 flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-amber-100">
                                                <svg class="h-4 w-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-amber-800">Payment proof under review</p>
                                                <p class="mt-0.5 text-xs text-amber-700">Your registration proof has been submitted and is being reviewed.</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="flex flex-col items-center gap-2 py-8 text-center">
                                        <svg class="h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                                        <p class="text-sm font-medium text-slate-500">You're all caught up!</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        
                        <div class="relative" id="member-avatar-menu">
                            <button id="member-avatar-btn"
                                    class="flex items-center gap-2.5 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-sm transition hover:bg-slate-50">
                                <span class="flex h-7 w-7 items-center justify-center rounded-full bg-brand-500/20 text-xs font-bold text-brand-600"><?php echo e(strtoupper(substr($authUser->name, 0, 1))); ?></span>
                                <span class="hidden max-w-[120px] truncate font-medium text-slate-700 sm:block"><?php echo e(explode(' ', $authUser->name)[0]); ?></span>
                                <svg class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div id="member-avatar-dropdown"
                                 class="absolute right-0 top-full z-50 mt-2 hidden w-52 rounded-xl border border-slate-200 bg-white py-1 shadow-lg">
                                <div class="border-b border-slate-100 px-4 py-3">
                                    <p class="truncate text-sm font-semibold text-slate-900"><?php echo e($authUser->name); ?></p>
                                    <p class="truncate text-xs text-slate-500"><?php echo e($authUser->email); ?></p>
                                </div>
                                <div class="my-1 border-t border-slate-100"></div>
                                <form method="POST" action="<?php echo e(route('logout')); ?>" data-no-loading>
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="flex w-full items-center gap-3 px-4 py-2.5 text-sm text-rose-600 transition hover:bg-rose-50">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        Log out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                
                <main class="mx-auto w-full max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
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
        var mobBtn  = document.getElementById('mob-member-btn');
        var mobMenu = document.getElementById('mob-member-menu');
        if (mobBtn && mobMenu) mobBtn.addEventListener('click', function () { mobMenu.classList.toggle('hidden'); });

        function dropdown(btnId, panelId, siblingId) {
            var btn    = document.getElementById(btnId);
            var panel  = document.getElementById(panelId);
            var sib    = document.getElementById(siblingId);
            if (!btn || !panel) return;
            btn.addEventListener('click', function (e) {
                e.stopPropagation();
                panel.classList.toggle('hidden');
                if (sib) sib.classList.add('hidden');
            });
            if (panel.tagName !== 'FORM') panel.addEventListener('click', function (e) { e.stopPropagation(); });
        }
        dropdown('member-notif-btn',   'member-notif-panel',      'member-avatar-dropdown');
        dropdown('member-avatar-btn',  'member-avatar-dropdown',  'member-notif-panel');
        document.addEventListener('click', function () {
            ['member-notif-panel','member-avatar-dropdown'].forEach(function(id){
                var el = document.getElementById(id); if(el) el.classList.add('hidden');
            });
        });
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/components/layouts/member.blade.php ENDPATH**/ ?>