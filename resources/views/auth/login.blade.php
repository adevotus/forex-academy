<x-layouts.app title="Log In — EMMIOXFOREX ACADEMY">
<div class="flex min-h-screen flex-col lg:flex-row">

    {{-- ═══════════════════════════════════════════════════
         LEFT  —  Brand panel with feature slider
    ═══════════════════════════════════════════════════ --}}
    <div class="relative hidden overflow-hidden bg-brand-panel lg:flex lg:w-1/2 lg:flex-col">

        {{-- Background decoration blobs --}}
        <div class="pointer-events-none absolute inset-0 bg-grid-glow opacity-70"></div>
        <div class="pointer-events-none absolute -top-32 -right-32 h-96 w-96 rounded-full bg-brand-500/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-gold-500/10 blur-3xl"></div>

        {{-- Logo --}}
        <div class="relative z-10 p-10">
            @include('partials.logo', ['dark' => true])
        </div>

        {{-- Feature slider --}}
        <div class="relative z-10 flex flex-1 items-center px-10 pb-4">
            <div class="w-full" id="auth-slider">

                {{-- Slide 1 --}}
                <div class="auth-slide transition-opacity duration-700" data-slide="0">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-brand-500/20 ring-1 ring-brand-400/30">
                        <svg class="h-7 w-7 text-brand-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h2 class="mt-6 text-3xl font-extrabold leading-snug text-white">
                        Learn Forex the<br><span class="text-brand-300">Structured Way</span>
                    </h2>
                    <p class="mt-4 text-base leading-relaxed text-slate-400">
                        Progress through Starter, Intermediate, Advanced and Pro levels — covering technical analysis, risk management, psychology and live strategy.
                    </p>
                </div>

                {{-- Slide 2 --}}
                <div class="auth-slide hidden transition-opacity duration-700" data-slide="1">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gold-500/20 ring-1 ring-gold-400/30">
                        <svg class="h-7 w-7 text-gold-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v18m0 0h10a2 2 0 0 0 2-2V9M9 21H5a2 2 0 0 1-2-2V9m0 0h18"/>
                        </svg>
                    </div>
                    <h2 class="mt-6 text-3xl font-extrabold leading-snug text-white">
                        Automated Trading<br><span class="text-gold-300">Robots & EAs</span>
                    </h2>
                    <p class="mt-4 text-base leading-relaxed text-slate-400">
                        Access the Financial Magnetic Robot EA for disciplined, systematic trade execution — available to academy members via subscription.
                    </p>
                </div>

                {{-- Slide 3 --}}
                <div class="auth-slide hidden transition-opacity duration-700" data-slide="2">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-violet-500/20 ring-1 ring-violet-400/30">
                        <svg class="h-7 w-7 text-violet-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 0 0-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 0 1 5.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 0 1 9.288 0M15 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        </svg>
                    </div>
                    <h2 class="mt-6 text-3xl font-extrabold leading-snug text-white">
                        1-on-1 Professional<br><span class="text-violet-300">Mentorship</span>
                    </h2>
                    <p class="mt-4 text-base leading-relaxed text-slate-400">
                        Book personalised sessions with experienced mentors to build trading discipline, refine your strategy and stay accountable.
                    </p>
                </div>

                {{-- Slide 4 --}}
                <div class="auth-slide hidden transition-opacity duration-700" data-slide="3">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-500/20 ring-1 ring-emerald-400/30">
                        <svg class="h-7 w-7 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                    <h2 class="mt-6 text-3xl font-extrabold leading-snug text-white">
                        Live Trading<br><span class="text-emerald-300">Signals — 3 Months</span>
                    </h2>
                    <p class="mt-4 text-base leading-relaxed text-slate-400">
                        Receive real market setups with entry, stop-loss and take-profit levels — plus the reasoning behind each call to accelerate your learning.
                    </p>
                </div>

                {{-- Slide dots --}}
                <div class="mt-10 flex gap-2" id="slide-dots">
                    <button class="slide-dot h-2 w-6 rounded-full bg-brand-400 transition-all" data-dot="0"></button>
                    <button class="slide-dot h-2 w-2 rounded-full bg-white/25 transition-all hover:bg-white/40" data-dot="1"></button>
                    <button class="slide-dot h-2 w-2 rounded-full bg-white/25 transition-all hover:bg-white/40" data-dot="2"></button>
                    <button class="slide-dot h-2 w-2 rounded-full bg-white/25 transition-all hover:bg-white/40" data-dot="3"></button>
                </div>
            </div>
        </div>

        {{-- Stats bar --}}
        <div class="relative z-10 border-t border-white/10 px-10 py-8">
            <div class="grid grid-cols-3 gap-6 text-center">
                <div>
                    <div class="text-2xl font-extrabold text-white">4</div>
                    <div class="mt-1 text-xs text-slate-500">Learning Levels</div>
                </div>
                <div>
                    <div class="text-2xl font-extrabold text-white">3-Mo</div>
                    <div class="mt-1 text-xs text-slate-500">Signal Access</div>
                </div>
                <div>
                    <div class="text-2xl font-extrabold text-white">1-on-1</div>
                    <div class="mt-1 text-xs text-slate-500">Mentorship</div>
                </div>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════════
         RIGHT  —  Login form
    ═══════════════════════════════════════════════════ --}}
    <div class="flex flex-1 flex-col items-center justify-center bg-white px-6 py-12 sm:px-10">

        {{-- Back to website --}}
        <div class="w-full max-w-sm mb-2 flex justify-start">
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-400 hover:text-brand-500 transition-colors">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to website
            </a>
        </div>

        {{-- Mobile logo (only shown on small screens) --}}
        <div class="mb-8 lg:hidden">
            @include('partials.logo', ['dark' => false])
        </div>

        <div class="w-full max-w-sm">

            {{-- Icon + heading --}}
            <div class="mb-8">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-brand-50 ring-1 ring-brand-200">
                    <svg class="h-5 w-5 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </div>
                <h1 class="mt-5 text-2xl font-extrabold text-slate-900">Welcome back</h1>
                <p class="mt-1.5 text-sm text-slate-500">Log in to your Academy dashboard.</p>
            </div>

            @include('partials.flash')

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="label" for="email">
                        <span class="flex items-center gap-1.5">
                            <svg class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            Email address
                        </span>
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                           class="input" placeholder="you@example.com" required autofocus>
                    @error('email')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="label" for="password">
                        <span class="flex items-center gap-1.5">
                            <svg class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Password
                        </span>
                    </label>
                    <div class="relative">
                        <input id="password" type="password" name="password"
                               class="input pr-11" placeholder="••••••••" required>
                        <button type="button" id="toggle-pw"
                                class="absolute inset-y-0 right-3 flex items-center text-slate-400 hover:text-slate-600 transition">
                            <svg id="eye-icon" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex cursor-pointer items-center gap-2 text-sm text-slate-600 select-none">
                        <input type="checkbox" name="remember"
                               class="h-4 w-4 rounded border-slate-300 text-brand-500 focus:ring-brand-400">
                        Remember me
                    </label>
                </div>

                <button type="submit" class="btn-primary w-full py-3 text-base">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                    Log In to Dashboard
                </button>
            </form>

            <div class="mt-6 text-center text-sm text-slate-500">
                Not a member yet?
                <a href="{{ route('register') }}" class="font-semibold text-brand-500 hover:text-brand-600 transition">Create an account &rarr;</a>
            </div>

            {{-- Demo credentials box --}}
            <div class="mt-8 rounded-xl border border-slate-200 bg-slate-50 p-4">
                <p class="mb-2 flex items-center gap-1.5 text-xs font-semibold text-slate-500">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
                    Demo accounts
                </p>
                <div class="space-y-1 text-xs text-slate-500">
                    <div class="flex items-center justify-between"><span class="text-slate-400">Admin:</span><code class="rounded bg-white px-1.5 py-0.5 text-slate-700 border border-slate-200">admin@emmioxforex.academy</code></div>
                    <div class="flex items-center justify-between"><span class="text-slate-400">Member:</span><code class="rounded bg-white px-1.5 py-0.5 text-slate-700 border border-slate-200">member@emmioxforex.academy</code></div>
                    <div class="flex items-center justify-between"><span class="text-slate-400">Password:</span><code class="rounded bg-white px-1.5 py-0.5 text-slate-700 border border-slate-200">password</code></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    // ── Password show/hide ────────────────────────────────
    const toggleBtn = document.getElementById('toggle-pw');
    const pwInput   = document.getElementById('password');
    if (toggleBtn && pwInput) {
        toggleBtn.addEventListener('click', () => {
            pwInput.type = pwInput.type === 'password' ? 'text' : 'password';
        });
    }

    // ── Feature slider ────────────────────────────────────
    const slides = document.querySelectorAll('.auth-slide');
    const dots   = document.querySelectorAll('.slide-dot');
    let current  = 0;
    let timer;

    function goTo(index) {
        slides[current].classList.add('hidden');
        dots[current].classList.remove('bg-brand-400', 'w-6');
        dots[current].classList.add('bg-white/25', 'w-2');

        current = (index + slides.length) % slides.length;

        slides[current].classList.remove('hidden');
        dots[current].classList.add('bg-brand-400', 'w-6');
        dots[current].classList.remove('bg-white/25', 'w-2');
    }

    function startTimer() {
        timer = setInterval(() => goTo(current + 1), 4500);
    }

    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            clearInterval(timer);
            goTo(parseInt(dot.dataset.dot));
            startTimer();
        });
    });

    startTimer();
})();
</script>
</x-layouts.app>
