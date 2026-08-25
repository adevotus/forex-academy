<x-layouts.member title="Overview">
    <x-slot name="header">
        <div>
            <h1 class="text-lg font-bold text-slate-900">Welcome back, {{ explode(' ', $user->name)[0] }} 👋</h1>
            <p class="text-xs text-slate-500">Here's where you left off.</p>
        </div>
    </x-slot>

    {{-- Stat cards --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                    <x-icon name="check-circle" class="h-5 w-5" />
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500">Lessons Completed</p>
                    <p class="text-2xl font-extrabold text-slate-900">{{ $completedLessons }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-600">
                    <x-icon name="cpu" class="h-5 w-5" />
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500">Active Robots</p>
                    <p class="text-2xl font-extrabold text-slate-900">{{ $activeRobots }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                    <x-icon name="chart" class="h-5 w-5" />
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500">Signals</p>
                    <p class="text-2xl font-extrabold text-slate-900">{{ $hasSignals ? 'Active' : 'Locked' }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-50 text-violet-600">
                    <x-icon name="trophy" class="h-5 w-5" />
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500">Badges Earned</p>
                    <p class="text-2xl font-extrabold text-slate-900">{{ $badges->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">
        {{-- Continue learning --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-2">
            <div class="flex items-center justify-between">
                <h2 class="font-bold text-slate-900">Continue Learning</h2>
                <a href="{{ route('member.courses.index') }}" class="text-xs font-semibold text-brand-600 hover:text-brand-700">All courses &rarr;</a>
            </div>

            @if ($lastProgress)
                <a href="{{ route('member.courses.lesson', [$lastProgress->lesson->course, $lastProgress->lesson]) }}"
                   class="mt-4 flex items-center justify-between rounded-xl border border-brand-100 bg-brand-50 p-4 transition hover:bg-brand-100">
                    <div>
                        <p class="text-xs font-medium text-brand-500">{{ $lastProgress->lesson->course->title }}</p>
                        <p class="mt-0.5 font-semibold text-brand-900">{{ $lastProgress->lesson->title }}</p>
                    </div>
                    <x-icon name="play-solid" class="h-8 w-8 text-brand-600" />
                </a>
            @else
                <div class="mt-4 rounded-xl border border-slate-100 bg-slate-50 p-4 text-center">
                    <p class="text-sm text-slate-500">You haven't started a lesson yet.</p>
                    <a href="{{ route('member.courses.index') }}" class="mt-2 inline-block text-xs font-semibold text-brand-600 hover:underline">Browse courses →</a>
                </div>
            @endif

            <div class="mt-6 space-y-1">
                @foreach ($courses->take(4) as $course)
                    <a href="{{ route('member.courses.show', $course) }}"
                       class="flex items-center justify-between rounded-xl px-3 py-2.5 transition hover:bg-slate-50">
                        <div class="flex items-center gap-3">
                            <span class="badge badge-level-{{ $course->level }} !px-2 !py-0.5 !text-[10px]">{{ $course->levelLabel() }}</span>
                            <span class="text-sm font-medium text-slate-700">{{ $course->title }}</span>
                        </div>
                        @if ($course->isUnlockedFor($user))
                            <x-icon name="unlock" class="h-4 w-4 text-emerald-500" />
                        @else
                            <x-icon name="lock" class="h-4 w-4 text-slate-400" />
                        @endif
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Side column --}}
        <div class="space-y-6">
            {{-- Robot Status --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex items-center gap-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8m-4-4v4"/></svg>
                    </div>
                    <h2 class="font-bold text-slate-900">My Robots</h2>
                </div>
                <p class="mt-3 text-sm text-slate-600">
                    {{ $activeRobots > 0 ? "You have {$activeRobots} active robot subscription(s)." : 'No active robot subscription yet.' }}
                </p>
                <a href="{{ route('member.robots.index') }}"
                   class="mt-4 flex w-full items-center justify-center rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-slate-300 hover:bg-slate-100">
                    Manage Robots
                </a>
            </div>

            {{-- Signals --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex items-center gap-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </div>
                    <h2 class="font-bold text-slate-900">My Signals</h2>
                </div>
                @if ($hasSignals && $latestSignal)
                    <div class="mt-3 rounded-xl border border-emerald-100 bg-emerald-50 p-3">
                        <p class="text-xs font-semibold text-emerald-700">{{ $latestSignal->pair }} · {{ strtoupper($latestSignal->direction) }}</p>
                        <p class="mt-1 text-sm text-emerald-800 line-clamp-2">{{ $latestSignal->explainer }}</p>
                    </div>
                @else
                    <p class="mt-3 text-sm text-slate-500">Unlock the 3-month signal subscription to see live setups.</p>
                @endif
                <a href="{{ route('member.signals.index') }}"
                   class="mt-4 flex w-full items-center justify-center rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-slate-300 hover:bg-slate-100">
                    View Signals
                </a>
            </div>

            {{-- Achievements --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex items-center gap-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-violet-50 text-violet-600">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3l14 0M5 3a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2M9 3v18m6-18v18"/></svg>
                    </div>
                    <h2 class="font-bold text-slate-900">Achievements</h2>
                </div>
                <div class="mt-3 flex flex-wrap gap-2">
                    @forelse ($badges as $badge)
                        <span class="inline-flex items-center gap-1 rounded-full border border-amber-200 bg-amber-50 px-2.5 py-1 text-xs font-semibold text-amber-700">
                            <x-icon name="badge" class="h-3.5 w-3.5 text-amber-500" /> {{ $badge->name }}
                        </span>
                    @empty
                        <p class="text-sm text-slate-500">Complete lessons to earn your first badge.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- ── Member Testimonials strip ── --}}
    @if(isset($testimonials) && $testimonials->isNotEmpty())
    <div class="mt-10">
        <div class="mb-4 flex items-center justify-between">
            <h2 class="font-bold text-slate-900">What members are saying</h2>
            <span class="text-xs text-slate-400">From our community</span>
        </div>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($testimonials->take(3) as $t)
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm flex gap-4">
                    {{-- Avatar --}}
                    @if($t->isImage() && $t->media_path)
                        <img src="{{ $t->mediaUrl() }}" alt="{{ $t->name }}"
                             class="h-11 w-11 flex-shrink-0 rounded-full object-cover ring-2 ring-brand-100">
                    @elseif($t->isVideo() && $t->media_path)
                        <video src="{{ $t->mediaUrl() }}"
                               class="h-11 w-11 flex-shrink-0 rounded-full object-cover bg-slate-900"
                               muted playsinline loop autoplay></video>
                    @else
                        <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-full bg-brand-50 text-sm font-bold text-brand-600 ring-2 ring-brand-100">
                            {{ $t->initial() }}
                        </div>
                    @endif

                    <div class="min-w-0">
                        {{-- Stars --}}
                        @if($t->rating)
                            <div class="flex gap-px mb-1">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="h-3 w-3 {{ $i <= $t->rating ? 'text-gold-400' : 'text-slate-200' }}"
                                         fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                @endfor
                            </div>
                        @endif
                        <p class="text-xs leading-relaxed text-slate-600 line-clamp-3 italic">"{{ $t->content }}"</p>
                        <p class="mt-2 text-xs font-semibold text-slate-900">{{ $t->name }}
                            @if($t->role)<span class="font-normal text-slate-400"> · {{ $t->role }}</span>@endif
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</x-layouts.member>
