<x-layouts.public title="EMMIOXFOREX ACADEMY | Learn. Trade. Automate. Grow.">

    {{-- ═══════════════════════════════════════════════════
         HERO
    ═══════════════════════════════════════════════════ --}}
    <section class="relative px-4 pb-28 pt-20 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl text-center">

            {{-- Eyebrow badge --}}
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
                <a href="{{ route('register') }}" class="btn-primary px-7 py-3 text-base">
                    Start Your Journey
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ route('courses.index') }}" class="btn-outline px-7 py-3 text-base">Browse Courses</a>
            </div>

            {{-- Stats row --}}
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

    {{-- ═══════════════════════════════════════════════════
         WHAT WE OFFER
    ═══════════════════════════════════════════════════ --}}
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
                @foreach ([
                    ['M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'Online Forex Classes', 'Starter to Pro courses covering technical analysis, risk management, psychology and strategy.', 'bg-brand-50 text-brand-500 ring-brand-100'],
                    ['M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v18m0 0h10a2 2 0 0 0 2-2V9M9 21H5a2 2 0 0 1-2-2V9m0 0h18', 'Robot Subscription', 'Access the Financial Magnetic Robot EA for systematic, disciplined trade execution.', 'bg-gold-50 text-gold-500 ring-amber-100'],
                    ['M17 20h5v-2a3 3 0 0 0-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 0 1 5.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 0 1 9.288 0M15 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0z', 'Professional Mentorship', 'Personalised guidance to build discipline and structured trading strategies.', 'bg-violet-50 text-violet-500 ring-violet-100'],
                    ['M13 7h8m0 0v8m0-8l-8 8-4-4-6 6', '3-Month Signal Subscription', 'Market setups with entry, stop-loss and take-profit — plus the reasoning behind each call.', 'bg-emerald-50 text-emerald-500 ring-emerald-100'],
                    ['M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'Account Management', 'Structured trading-account management for eligible clients under clear risk parameters.', 'bg-rose-50 text-rose-500 ring-rose-100'],
                    ['M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'Account Flipping', 'Aggressive growth strategies for eligible clients who accept the associated risk.', 'bg-amber-50 text-amber-500 ring-amber-100'],
                ] as [$path, $title, $desc, $iconClass])
                    <div class="card-hover group p-7 transition">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl ring-1 {{ $iconClass }}">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}"/>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-base font-bold text-slate-900 group-hover:text-brand-600 transition">{{ $title }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-500">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════
         LEARNING PATH
    ═══════════════════════════════════════════════════ --}}
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
                {{-- Connector line (desktop) --}}
                <div class="absolute left-0 right-0 top-8 hidden h-px bg-gradient-to-r from-transparent via-slate-300 to-transparent lg:block" style="margin: 0 12.5%"></div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ([
                        ['starter',      'Starter',      'Market basics & terminology',    'bg-emerald-50 text-emerald-700 ring-emerald-200', 'text-emerald-600'],
                        ['intermediate', 'Intermediate', 'Charts, indicators, risk',       'bg-brand-50 text-brand-700 ring-brand-200',       'text-brand-600'],
                        ['advanced',     'Advanced',     'Strategy & psychology',          'bg-violet-50 text-violet-700 ring-violet-200',    'text-violet-600'],
                        ['pro',          'Pro',          'Automation & account flipping',  'bg-amber-50 text-amber-700 ring-amber-200',       'text-amber-600'],
                    ] as $i => [$level, $label, $desc, $badgeClass, $numClass])
                        <div class="card relative p-6 text-center">
                            <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full border-4 border-white bg-white shadow-card ring-2 ring-slate-200">
                                <span class="text-lg font-extrabold {{ $numClass }}">{{ $i + 1 }}</span>
                            </div>
                            <span class="badge badge-level-{{ $level }}">Level {{ $i + 1 }}</span>
                            <h3 class="mt-4 text-base font-bold text-slate-900">{{ $label }}</h3>
                            <p class="mt-1.5 text-sm text-slate-500">{{ $desc }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════
         FEATURED COURSES
    ═══════════════════════════════════════════════════ --}}
    @if ($courses->count())
    <section class="bg-slate-50 px-4 py-24 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <h2 class="section-title">Featured Courses</h2>
                    <p class="mt-2 text-slate-500">Hand-picked to get you started fast.</p>
                </div>
                <a href="{{ route('courses.index') }}"
                   class="inline-flex items-center gap-1.5 text-sm font-semibold text-brand-500 hover:text-brand-600 transition">
                    View all courses
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($courses as $course)
                    <a href="{{ route('courses.show', $course) }}"
                       class="card-hover group block overflow-hidden p-6 transition">
                        <span class="badge badge-level-{{ $course->level }}">{{ $course->levelLabel() }}</span>
                        <h3 class="mt-4 font-bold text-slate-900 group-hover:text-brand-600 transition">{{ $course->title }}</h3>
                        <p class="mt-2 line-clamp-2 text-sm leading-relaxed text-slate-500">{{ $course->description }}</p>
                        <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-4 text-sm">
                            <span class="font-bold text-slate-900">{{ $course->priceFormatted() }}</span>
{{--                            <span class="flex items-center gap-1 text-slate-400">--}}
{{--                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>--}}
{{--                                {{ $course->lessons()->count() }} lessons--}}
{{--                            </span>--}}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ═══════════════════════════════════════════════════
         WHY CHOOSE US  (dark section — robot image left, features right)
    ═══════════════════════════════════════════════════ --}}
    <section id="why-choose-us" style="background:#f8fafc; position:relative; overflow:hidden; padding:6rem 1rem;">

        {{-- Subtle decorative blobs --}}
        <div style="pointer-events:none; position:absolute; inset:0; overflow:hidden;" aria-hidden="true">
            <div style="position:absolute; left:-8rem; top:50%; width:500px; height:500px; transform:translateY(-50%); border-radius:9999px; background:rgba(99,102,241,0.06); filter:blur(100px);"></div>
            <div style="position:absolute; right:-8rem; bottom:0; width:400px; height:400px; border-radius:9999px; background:rgba(16,185,129,0.05); filter:blur(90px);"></div>
        </div>

        <div style="position:relative; max-width:80rem; margin:0 auto; padding:0 1.5rem;">

            {{-- Section badge --}}
            <div class="wcu-in" style="margin-bottom:3rem; text-align:center;">
                <span style="display:inline-flex; align-items:center; gap:6px; border-radius:9999px; border:1px solid rgba(99,102,241,0.25); background:rgba(99,102,241,0.08); padding:4px 14px; font-size:11px; font-weight:700; letter-spacing:0.08em; text-transform:uppercase; color:#6366f1;">
                    <svg style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    Why Choose Us
                </span>
            </div>

            {{-- Two-column grid --}}
            <div style="display:grid; grid-template-columns:1fr; gap:3rem; align-items:center;">

                {{-- ── LEFT: Robot image ── --}}
                @php $featuredRobot = $robots->firstWhere('image', '!=', null) ?? $robots->first(); @endphp
                <div class="wcu-left" style="order:2;">
                    <div style="position:relative; max-width:28rem; margin:0 auto;">

                        {{-- Glow behind card --}}
                        <div style="position:absolute; inset:0; border-radius:1.5rem; background:linear-gradient(135deg,rgba(99,102,241,0.25),transparent,rgba(16,185,129,0.15)); filter:blur(40px);"></div>

                        {{-- Image card with float animation --}}
                        <div class="wcu-float" style="position:relative; border-radius:1.5rem; overflow:hidden; border:1px solid rgba(255,255,255,0.1); box-shadow:0 25px 60px rgba(0,0,0,0.5);">
                            @if($featuredRobot && $featuredRobot->image)
                                <img src="{{ Storage::disk('public')->url($featuredRobot->image) }}"
                                     alt="{{ $featuredRobot->name }}"
                                     style="width:100%; height:340px; object-fit:cover; display:block;">
                            @else
                                <div style="width:100%; height:340px; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,#0f172a,#1e3a5f,#0a2540);">
                                    <svg viewBox="0 0 380 340" style="width:100%; height:100%;" xmlns="http://www.w3.org/2000/svg">
                                        <defs><pattern id="wcu-circ" x="0" y="0" width="30" height="30" patternUnits="userSpaceOnUse"><circle cx="15" cy="15" r="0.8" fill="#60a5fa" opacity="0.25"/><line x1="15" y1="0" x2="15" y2="30" stroke="#60a5fa" stroke-width="0.3" opacity="0.15"/><line x1="0" y1="15" x2="30" y2="15" stroke="#60a5fa" stroke-width="0.3" opacity="0.15"/></pattern></defs>
                                        <rect width="380" height="340" fill="url(#wcu-circ)"/>
                                        <polyline points="10,260 60,230 110,240 160,190 210,200 260,150 310,160 370,110" fill="none" stroke="#10b981" stroke-width="2" opacity="0.6"/>
                                        <polyline points="10,290 60,280 120,265 180,245 240,220 300,195 370,165" fill="none" stroke="#6366f1" stroke-width="1.5" opacity="0.4"/>
                                        <g transform="translate(110,80)">
                                            <rect x="0" y="0" width="160" height="130" rx="18" fill="rgba(30,58,138,0.6)" stroke="#60a5fa" stroke-width="1.5"/>
                                            <rect x="18" y="18" width="124" height="94" rx="10" fill="rgba(59,130,246,0.12)" stroke="#93c5fd" stroke-width="1"/>
                                            <text x="80" y="72" text-anchor="middle" font-family="monospace" font-size="28" font-weight="bold" fill="#93c5fd">EA</text>
                                            <text x="80" y="92" text-anchor="middle" font-family="monospace" font-size="11" fill="#60a5fa" opacity="0.8">AUTO TRADER</text>
                                        </g>
                                    </svg>
                                </div>
                            @endif

                            {{-- Bottom overlay --}}
                            <div style="position:absolute; inset-inline:0; bottom:0; height:8rem; background:linear-gradient(to top,rgba(15,23,42,0.7),transparent);"></div>

                            {{-- Live badge --}}
                            <div style="position:absolute; bottom:1rem; left:1rem; display:flex; align-items:center; gap:8px; border-radius:9999px; border:1px solid rgba(52,211,153,0.3); background:rgba(15,23,42,0.85); padding:6px 14px; backdrop-filter:blur(8px);">
                                <span style="position:relative; display:flex; width:8px; height:8px;">
                                    <span class="animate-ping" style="position:absolute; inset:0; border-radius:9999px; background:#34d399; opacity:0.75;"></span>
                                    <span style="position:relative; display:inline-flex; width:8px; height:8px; border-radius:9999px; background:#10b981;"></span>
                                </span>
                                <span style="font-size:12px; font-weight:700; color:#34d399;">Robot Trading Live</span>
                            </div>

                            {{-- Monthly badge --}}
                            <div style="position:absolute; top:1rem; right:1rem; border-radius:12px; border:1px solid rgba(255,255,255,0.1); background:rgba(15,23,42,0.85); padding:8px 14px; text-align:center; backdrop-filter:blur(8px);">
                                <p style="font-size:10px; font-weight:600; text-transform:uppercase; letter-spacing:0.06em; color:#94a3b8;">Avg. Monthly</p>
                                <p style="font-size:18px; font-weight:900; color:#34d399;">+18.4%</p>
                            </div>
                        </div>

                        {{-- Floating stat cards --}}
                        <div class="wcu-float-slow wcu-stat-card" style="position:absolute; top:3.5rem; left:-1rem; border-radius:16px; border:1px solid #e2e8f0; background:#fff; padding:12px 14px; box-shadow:0 8px 24px rgba(0,0,0,0.1);">
                            <div style="display:flex; align-items:center; gap:10px;">
                                <div style="width:34px; height:34px; border-radius:10px; display:flex; align-items:center; justify-content:center; background:rgba(99,102,241,0.2);">
                                    <svg style="width:16px; height:16px; color:#a5b4fc;" fill="none" viewBox="0 0 24 24" stroke="#a5b4fc" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div>
                                    <p style="font-size:10px; color:#94a3b8;">Trades Today</p>
                                    <p style="font-size:13px; font-weight:700; color:#0f172a;">247 executed</p>
                                </div>
                            </div>
                        </div>

                        <div class="wcu-float-slow wcu-stat-card" style="position:absolute; bottom:5rem; right:-1rem; border-radius:16px; border:1px solid #e2e8f0; background:#fff; padding:12px 14px; box-shadow:0 8px 24px rgba(0,0,0,0.1); animation-delay:1.5s;">
                            <div style="display:flex; align-items:center; gap:10px;">
                                <div style="width:34px; height:34px; border-radius:10px; display:flex; align-items:center; justify-content:center; background:rgba(16,185,129,0.2);">
                                    <svg style="width:16px; height:16px;" fill="none" viewBox="0 0 24 24" stroke="#34d399" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div>
                                    <p style="font-size:10px; color:#94a3b8;">Win Rate</p>
                                    <p style="font-size:13px; font-weight:700; color:#0f172a;">98.0%</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- ── RIGHT: Features ── --}}
                <div class="wcu-right" style="order:1;">

                    <h2 class="wcu-in" style="font-size:clamp(1.75rem,4vw,2.6rem); font-weight:900; line-height:1.15; color:#0f172a; margin:0;">
                        Built for traders who want<br>
                        <span style="background:linear-gradient(90deg,#6366f1,#10b981); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">real results</span>
                    </h2>

                    <p class="wcu-in" style="margin-top:1rem; font-size:1rem; line-height:1.75; color:#64748b;">
                        We don't just sell courses we give you a complete ecosystem that takes you from beginner to confident, tech enabled trader with automated tools working for you 24/7.
                    </p>

                    {{-- Feature list (hardcoded gradients via inline style) --}}
                    <div style="margin-top:2.5rem; display:flex; flex-direction:column; gap:1.5rem;">

                        <div class="wcu-feature" style="display:flex; gap:1rem; align-items:flex-start;">
                            <div style="flex-shrink:0; width:44px; height:44px; border-radius:14px; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,#6366f1,#818cf8); box-shadow:0 4px 14px rgba(99,102,241,0.4);">
                                <svg style="width:20px;height:20px;" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                            </div>
                            <div>
                                <p style="font-weight:700; color:#0f172a; margin:0;">Structured, Progressive Curriculum</p>
                                <p style="margin-top:4px; font-size:14px; line-height:1.6; color:#64748b;">Four clear levels  Starter, Intermediate, Advanced, Pro  each building on the last so you never feel lost.</p>
                            </div>
                        </div>

                        <div class="wcu-feature" style="display:flex; gap:1rem; align-items:flex-start;">
                            <div style="flex-shrink:0; width:44px; height:44px; border-radius:14px; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,#10b981,#34d399); box-shadow:0 4px 14px rgba(16,185,129,0.4);">
                                <svg style="width:20px;height:20px;" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </div>
                            <div>
                                <p style="font-weight:700; color:#0f172a; margin:0;">Automated EAs &amp; Live Signals</p>
                                <p style="margin-top:4px; font-size:14px; line-height:1.6; color:#64748b;">Our expert robots trade the market for you while you learn  technology and education working hand in hand.</p>
                            </div>
                        </div>

                        <div class="wcu-feature" style="display:flex; gap:1rem; align-items:flex-start;">
                            <div style="flex-shrink:0; width:44px; height:44px; border-radius:14px; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,#8b5cf6,#a78bfa); box-shadow:0 4px 14px rgba(139,92,246,0.4);">
                                <svg style="width:20px;height:20px;" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <p style="font-weight:700; color:#0f172a; margin:0;">Human Mentors, Not Just Videos</p>
                                <p style="margin-top:4px; font-size:14px; line-height:1.6; color:#64748b;">Real traders guide you, hold you accountable, and fast track your growth with personalized feedback.</p>
                            </div>
                        </div>

                        <div class="wcu-feature" style="display:flex; gap:1rem; align-items:flex-start;">
                            <div style="flex-shrink:0; width:44px; height:44px; border-radius:14px; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,#f59e0b,#fbbf24); box-shadow:0 4px 14px rgba(245,158,11,0.4);">
                                <svg style="width:20px;height:20px;" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            </div>
                            <div>
                                <p style="font-weight:700; color:#0f172a; margin:0;">Proven Track Record</p>
                                <p style="margin-top:4px; font-size:14px; line-height:1.6; color:#64748b;">Hundreds of members across Africa and beyond have transformed their trading with our platform.</p>
                            </div>
                        </div>

                    </div>

                    {{-- CTA buttons --}}
                    <div class="wcu-in" style="margin-top:2.5rem; display:flex; flex-wrap:wrap; gap:12px;">
                        <a href="{{ route('register') }}"
                           style="display:inline-flex; align-items:center; gap:8px; border-radius:12px; background:linear-gradient(135deg,#6366f1,#4f46e5); padding:12px 24px; font-size:14px; font-weight:700; color:#fff; text-decoration:none; box-shadow:0 4px 20px rgba(99,102,241,0.35); transition:transform 0.2s,box-shadow 0.2s;"
                           onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 28px rgba(99,102,241,0.5)'"
                           onmouseout="this.style.transform=''; this.style.boxShadow='0 4px 20px rgba(99,102,241,0.35)'">
                            Get Started Free
                            <svg style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                        @if($robots->isNotEmpty())
                        <a href="{{ route('robots.index') }}"
                           style="display:inline-flex; align-items:center; gap:8px; border-radius:12px; border:1px solid #cbd5e1; background:#fff; padding:12px 24px; font-size:14px; font-weight:700; color:#334155; text-decoration:none; transition:background 0.2s,transform 0.2s,box-shadow 0.2s;"
                           onmouseover="this.style.background='#f1f5f9'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)'"
                           onmouseout="this.style.background='#fff'; this.style.transform=''; this.style.boxShadow=''">
                            View Our Robots
                        </a>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </section>

    <style>
    /* Responsive two-column at lg */
    @media (min-width: 1024px) {
        #why-choose-us > div > div:last-child {
            grid-template-columns: 1fr 1fr !important;
            gap: 5rem !important;
        }
        .wcu-left  { order: 1 !important; }
        .wcu-right { order: 2 !important; }
        .wcu-stat-card { display: flex !important; }
    }
    @media (max-width: 1023px) {
        .wcu-stat-card { display: none !important; }
    }

    /* Float animations */
    @keyframes wcu-float {
        0%, 100% { transform: translateY(0); }
        50%       { transform: translateY(-14px); }
    }
    @keyframes wcu-float-slow {
        0%, 100% { transform: translateY(0); }
        50%       { transform: translateY(-8px); }
    }
    .wcu-float      { animation: wcu-float      4s ease-in-out infinite; }
    .wcu-float-slow { animation: wcu-float-slow 6s ease-in-out infinite; }

    /* Scroll-reveal — starts visible, animates in nicely */
    .wcu-in, .wcu-feature {
        opacity: 0;
        transform: translateY(24px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .wcu-in.is-visible, .wcu-feature.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
    /* Fallback: always show after 1.5s in case JS or observer fails */
    .wcu-fallback-shown .wcu-in,
    .wcu-fallback-shown .wcu-feature {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }
    </style>

    <script>
    (function () {
        var section = document.getElementById('why-choose-us');
        if (!section) return;

        var allAnim = section.querySelectorAll('.wcu-in, .wcu-feature');

        // Fallback: force-show after 1.5s regardless
        var fallback = setTimeout(function () {
            section.classList.add('wcu-fallback-shown');
        }, 1500);

        function revealAll() {
            clearTimeout(fallback);
            var features = section.querySelectorAll('.wcu-feature');
            section.querySelectorAll('.wcu-in').forEach(function (el) {
                el.classList.add('is-visible');
            });
            features.forEach(function (el, i) {
                setTimeout(function () { el.classList.add('is-visible'); }, i * 110);
            });
        }

        if (!('IntersectionObserver' in window)) { revealAll(); return; }

        var io = new IntersectionObserver(function (entries) {
            if (entries[0].isIntersecting) { revealAll(); io.disconnect(); }
        }, { threshold: 0.1 });

        io.observe(section);
    })();
    </script>

    {{-- ═══════════════════════════════════════════════════
         TESTIMONIALS
    ═══════════════════════════════════════════════════ --}}
    @if($testimonials->isNotEmpty())
    <section class="bg-navy-950 px-4 py-24 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">

            {{-- Header --}}
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div class="mx-auto max-w-xl text-center lg:mx-0 lg:text-left">
                    <span class="badge border-white/15 bg-white/10 text-slate-300 mb-4 inline-flex">
                        <svg class="h-3.5 w-3.5 text-gold-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        Member Stories
                    </span>
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">What our traders say</h2>
                    <p class="mt-3 text-base text-slate-400">Real results from real members of EMMIOXFOREX ACADEMY.</p>
                </div>
                <a href="{{ route('testimonials') }}"
                   class="inline-flex items-center gap-1.5 text-sm font-semibold text-gold-400 hover:text-gold-300 transition">
                    View all stories
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            {{-- 3-column grid — always 3 on desktop --}}
            <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($testimonials->take(3) as $t)
                    <div class="flex flex-col overflow-hidden rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm transition hover:border-white/25 hover:bg-white/8">

                        {{-- ── Media (16:9 aspect ratio box) ── --}}
                        @if($t->media_path)
                            <div class="relative w-full overflow-hidden" style="aspect-ratio:16/9; background:#0a0f1e">
                                @if($t->isVideo())
                                    <video src="{{ $t->mediaUrl() }}"
                                           controls preload="metadata"
                                           class="absolute inset-0 h-full w-full object-contain"></video>
                                @else
                                    <img src="{{ $t->mediaUrl() }}" alt="{{ $t->name }}"
                                         class="absolute inset-0 h-full w-full object-cover transition duration-300 hover:scale-105 cursor-zoom-in"
                                         onclick="openLightbox(this.src)">
                                    {{-- Zoom icon overlay --}}
                                    <button type="button" onclick="openLightbox('{{ $t->mediaUrl() }}')"
                                            class="absolute inset-0 flex items-center justify-center bg-black/0 hover:bg-black/40 transition-all group">
                                        <span class="scale-0 group-hover:scale-100 transition-transform duration-200 rounded-full bg-white/90 p-3 shadow-lg">
                                            <svg class="h-5 w-5 text-slate-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                            </svg>
                                        </span>
                                    </button>
                                @endif
                            </div>
                        @else
                            {{-- Decorative placeholder --}}
                            <div class="flex items-center justify-center bg-gradient-to-br from-brand-900/50 to-navy-900/80" style="aspect-ratio:16/9">
                                <svg class="h-12 w-12 text-white/10" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                            </div>
                        @endif

                        {{-- ── Content ── --}}
                        <div class="flex flex-1 flex-col p-6">

                            {{-- Stars --}}
                            @if($t->rating)
                                <div class="flex gap-0.5 mb-4">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="h-4 w-4 {{ $i <= $t->rating ? 'text-gold-400' : 'text-white/15' }}"
                                             fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                        </svg>
                                    @endfor
                                </div>
                            @endif

                            {{-- Opening quote mark --}}
                            <svg class="h-6 w-6 text-brand-500/40 mb-2 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>

                            {{-- Quote text --}}
                            <blockquote class="flex-1 text-sm leading-relaxed text-slate-300 line-clamp-4">
                                {{ $t->content }}
                            </blockquote>

                            {{-- Person --}}
                            <div class="mt-5 flex items-center gap-3 border-t border-white/10 pt-4">
                                @if($t->isImage() && $t->media_path)
                                    <img src="{{ $t->mediaUrl() }}" alt="{{ $t->name }}"
                                         class="h-10 w-10 flex-shrink-0 rounded-full object-cover ring-2 ring-white/20">
                                @else
                                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-brand-600/20 text-sm font-bold text-brand-300 ring-2 ring-brand-500/20">
                                        {{ $t->initial() }}
                                    </div>
                                @endif
                                <div>
                                    <p class="text-sm font-semibold text-white">{{ $t->name }}</p>
                                    @if($t->role)
                                        <p class="text-xs text-slate-400">{{ $t->role }}</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            {{-- View all link (centered, below cards) --}}
            @if($testimonials->count() > 3)
            <div class="mt-10 text-center">
                <a href="{{ route('testimonials') }}"
                   class="inline-flex items-center gap-2 rounded-xl border border-white/15 bg-white/5 px-6 py-3 text-sm font-semibold text-slate-300 transition hover:bg-white/10 hover:text-white">
                    Read all {{ $testimonials->count() }} member stories
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            @endif

        </div>
    </section>
    @endif

    {{-- ═══════════════════════════════════════════════════
         CTA
    ═══════════════════════════════════════════════════ --}}
    <section class="px-4 pb-28 sm:px-6 lg:px-8 mt-3">
        <div class="mx-auto max-w-5xl overflow-hidden rounded-3xl bg-gradient-to-br from-navy-950 via-navy-900 to-brand-900 px-10 py-16 text-center shadow-glow sm:px-16">
            <div class="pointer-events-none absolute inset-0 bg-grid-glow opacity-60"></div>
            <span class="badge border-white/15 bg-white/10 text-slate-300 mx-auto mb-4">
                <svg class="h-3.5 w-3.5 text-gold-400" fill="currentColor" viewBox="0 0 24 24"><path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 0 0 .95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 0 0-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 0 0-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 0 0-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 0 0 .951-.69l1.519-4.674z"/></svg>
                Join Today
            </span>
            <h2 class="relative text-3xl font-extrabold text-white sm:text-4xl">Ready to start your<br>trading journey?</h2>
            <p class="relative mx-auto mt-4 max-w-xl text-base text-slate-400">
                Register today, get approved, and unlock a structured path from Starter to Pro with robots, signals and mentorship along the way.
            </p>
            <div class="relative mt-10 flex flex-wrap items-center justify-center gap-4">
                <a href="{{ route('register') }}" class="btn-gold px-8 py-3 text-base">Join EMMIOXFOREX ACADEMY</a>
                <a href="{{ route('about') }}"    class="btn-outline-white px-8 py-3 text-base">Learn More</a>
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

    {{-- ── Image Lightbox (testimonial screenshots) ── --}}
    <div id="img-lightbox"
         class="fixed inset-0 z-50 hidden items-center justify-center p-4"
         style="background:rgba(0,0,0,0.93)"
         onclick="closeLightbox()">

        <button type="button" onclick="closeLightbox()"
                class="absolute top-4 right-4 rounded-full bg-white/10 hover:bg-white/25 p-2.5 transition text-white z-10">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <img id="lightbox-img" src="" alt="Preview"
             class="rounded-xl shadow-2xl object-contain"
             style="max-height:90vh; max-width:92vw"
             onclick="event.stopPropagation()">

        <p class="absolute bottom-4 left-1/2 -translate-x-1/2 text-xs text-white/40 select-none">
            Click outside or press Esc to close
        </p>
    </div>

    <script>
    function openLightbox(src) {
        document.getElementById('lightbox-img').src = src;
        const lb = document.getElementById('img-lightbox');
        lb.classList.remove('hidden');
        lb.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    function closeLightbox() {
        const lb = document.getElementById('img-lightbox');
        lb.classList.add('hidden');
        lb.classList.remove('flex');
        document.getElementById('lightbox-img').src = '';
        document.body.style.overflow = '';
    }
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeLightbox();
    });
    </script>

</x-layouts.public>
