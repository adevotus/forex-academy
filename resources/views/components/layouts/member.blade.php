<x-layouts.app :title="$title ?? 'Member Dashboard'">
    <div class="flex min-h-screen bg-slate-50">

        {{-- ── Sidebar (dark) ──────────────────────────────── --}}
        <aside class="hidden w-64 flex-col bg-navy-950 lg:flex">

            {{-- Logo --}}
            <div class="border-b border-white/5 px-5 py-5">
                @include('partials.logo', ['dark' => true])
            </div>

            {{-- Nav --}}
            <nav class="flex-1 space-y-0.5 px-3 py-5">
                <p class="mb-2 px-3 text-[10px] font-semibold uppercase tracking-widest text-slate-600">Main</p>

                <a href="{{ route('member.dashboard') }}"
                   class="{{ request()->routeIs('member.dashboard') ? 'sidebar-link-active' : 'sidebar-link' }}">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    Overview
                </a>

                <p class="mb-2 mt-5 px-3 text-[10px] font-semibold uppercase tracking-widest text-slate-600">Academy</p>

                <a href="{{ route('member.courses.index') }}"
                   class="{{ request()->routeIs('member.courses.*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    My Courses
                </a>

                <a href="{{ route('member.robots.index') }}"
                   class="{{ request()->routeIs('member.robots.*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><path d="M8 21h8m-4-4v4"/></svg>
                    Robots / EAs
                </a>

                <a href="{{ route('member.signals.index') }}"
                   class="{{ request()->routeIs('member.signals.*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    Signals
                </a>

                <a href="{{ route('member.mentorship.index') }}"
                   class="{{ request()->routeIs('member.mentorship.*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 0 0-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 0 1 5.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 0 1 9.288 0M15 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/></svg>
                    Mentorship
                </a>

                <p class="mb-2 mt-5 px-3 text-[10px] font-semibold uppercase tracking-widest text-slate-600">Account</p>

                <a href="{{ route('member.billing.index') }}"
                   class="{{ request()->routeIs('member.billing.*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                    <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                    Billing
                </a>
            </nav>

            {{-- User footer --}}
            <div class="border-t border-white/5 p-4">
                <div class="mb-3 flex items-center gap-3">
                    <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-brand-500/20 text-sm font-bold text-brand-300">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <p class="truncate text-sm font-semibold text-white">{{ auth()->user()->name }}</p>
                        <p class="truncate text-xs text-slate-500">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="flex w-full items-center justify-center gap-2 rounded-lg border border-white/10 px-3 py-2 text-xs font-medium text-slate-400 transition hover:bg-white/5 hover:text-white">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Log out
                    </button>
                </form>
            </div>
        </aside>

        {{-- ── Main content ─────────────────────────────────── --}}
        <div class="flex flex-1 flex-col min-w-0">

            {{-- Mobile top bar --}}
            <div class="flex items-center justify-between border-b border-slate-200 bg-white px-4 py-3 lg:hidden">
                @include('partials.logo', ['dark' => false])
                <button id="mob-menu-btn" class="rounded-lg border border-slate-200 p-2 text-slate-600 hover:bg-slate-50">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>

            {{-- Mobile nav drawer --}}
            <div id="mob-menu" class="hidden border-b border-slate-200 bg-white px-4 pb-4 lg:hidden">
                <nav class="mt-3 space-y-1">
                    <a href="{{ route('member.dashboard') }}"      class="{{ request()->routeIs('member.dashboard')   ? 'nav-link-active' : 'nav-link' }} flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                        Overview</a>
                    <a href="{{ route('member.courses.index') }}"  class="{{ request()->routeIs('member.courses.*')   ? 'nav-link-active' : 'nav-link' }} flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13"/></svg>
                        My Courses</a>
                    <a href="{{ route('member.robots.index') }}"   class="{{ request()->routeIs('member.robots.*')    ? 'nav-link-active' : 'nav-link' }} flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8m-4-4v4"/></svg>
                        Robots</a>
                    <a href="{{ route('member.signals.index') }}"  class="{{ request()->routeIs('member.signals.*')   ? 'nav-link-active' : 'nav-link' }} flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        Signals</a>
                    <a href="{{ route('member.mentorship.index') }}"class="{{ request()->routeIs('member.mentorship.*')? 'nav-link-active' : 'nav-link' }} flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 0 0-5.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857"/></svg>
                        Mentorship</a>
                    <a href="{{ route('member.billing.index') }}"  class="{{ request()->routeIs('member.billing.*')   ? 'nav-link-active' : 'nav-link' }} flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                        Billing</a>
                </nav>
            </div>

            <main class="mx-auto w-full max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
                @if (isset($header))
                    <div class="mb-8">{{ $header }}</div>
                @endif
                @include('partials.flash')
                {{ $slot }}
            </main>
        </div>
    </div>

    <script>
        const btn  = document.getElementById('mob-menu-btn');
        const menu = document.getElementById('mob-menu');
        if (btn && menu) btn.addEventListener('click', () => menu.classList.toggle('hidden'));
    </script>
</x-layouts.app>
