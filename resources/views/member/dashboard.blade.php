<x-layouts.member title="Overview">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-bold text-white">Welcome back, {{ explode(' ', $user->name)[0] }} 👋</h1>
            <p class="mt-1 text-sm text-slate-400">Here's where you left off.</p>
        </div>
    </x-slot>

    {{-- Stat cards --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="card p-5">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-400/10 text-emerald-300"><x-icon name="check-circle" class="h-5 w-5" /></div>
                <div>
                    <p class="text-xs text-slate-500">Lessons Completed</p>
                    <p class="text-xl font-bold text-white">{{ $completedLessons }}</p>
                </div>
            </div>
        </div>
        <div class="card p-5">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-brand-400/10 text-brand-300"><x-icon name="cpu" class="h-5 w-5" /></div>
                <div>
                    <p class="text-xs text-slate-500">Active Robots</p>
                    <p class="text-xl font-bold text-white">{{ $activeRobots }}</p>
                </div>
            </div>
        </div>
        <div class="card p-5">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gold-400/10 text-gold-300"><x-icon name="chart" class="h-5 w-5" /></div>
                <div>
                    <p class="text-xs text-slate-500">Signals</p>
                    <p class="text-xl font-bold text-white">{{ $hasSignals ? 'Active' : 'Locked' }}</p>
                </div>
            </div>
        </div>
        <div class="card p-5">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-violet-400/10 text-violet-300"><x-icon name="trophy" class="h-5 w-5" /></div>
                <div>
                    <p class="text-xs text-slate-500">Badges Earned</p>
                    <p class="text-xl font-bold text-white">{{ $badges->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">
        {{-- Continue learning --}}
        <div class="card p-6 lg:col-span-2">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-white">Continue Learning</h2>
                <a href="{{ route('member.courses.index') }}" class="text-xs font-medium text-brand-300 hover:text-brand-200">All courses &rarr;</a>
            </div>

            @if ($lastProgress)
                <a href="{{ route('member.courses.lesson', [$lastProgress->lesson->course, $lastProgress->lesson]) }}"
                   class="mt-4 flex items-center justify-between rounded-xl border border-white/10 bg-white/5 p-4 hover:bg-white/10">
                    <div>
                        <p class="text-xs text-slate-500">{{ $lastProgress->lesson->course->title }}</p>
                        <p class="mt-0.5 font-medium text-white">{{ $lastProgress->lesson->title }}</p>
                    </div>
                    <x-icon name="play-solid" class="h-8 w-8 text-brand-400" />
                </a>
            @else
                <p class="mt-4 text-sm text-slate-500">You haven't started a lesson yet.</p>
            @endif

            <div class="mt-6 space-y-3">
                @foreach ($courses->take(4) as $course)
                    <a href="{{ route('member.courses.show', $course) }}" class="flex items-center justify-between rounded-xl px-3 py-2.5 hover:bg-white/5">
                        <div class="flex items-center gap-3">
                            <span class="badge badge-level-{{ $course->level }} !px-2 !py-0.5 !text-[10px]">{{ $course->levelLabel() }}</span>
                            <span class="text-sm text-slate-200">{{ $course->title }}</span>
                        </div>
                        @if ($course->isUnlockedFor($user))
                            <x-icon name="unlock" class="h-4 w-4 text-emerald-400" />
                        @else
                            <x-icon name="lock" class="h-4 w-4 text-slate-600" />
                        @endif
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Side column --}}
        <div class="space-y-6">
            <div class="card p-6">
                <h2 class="font-semibold text-white">My Robot Status</h2>
                <p class="mt-3 text-sm text-slate-400">
                    {{ $activeRobots > 0 ? "You have {$activeRobots} active robot subscription(s)." : 'No active robot subscription yet.' }}
                </p>
                <a href="{{ route('member.robots.index') }}" class="btn-outline mt-4 w-full !py-2 text-sm">Manage Robots</a>
            </div>

            <div class="card p-6">
                <h2 class="font-semibold text-white">My Signals</h2>
                @if ($hasSignals && $latestSignal)
                    <div class="mt-3 rounded-lg border border-white/10 bg-white/5 p-3">
                        <p class="text-xs text-slate-500">{{ $latestSignal->pair }} · {{ strtoupper($latestSignal->direction) }}</p>
                        <p class="mt-1 text-sm text-slate-300 line-clamp-2">{{ $latestSignal->explainer }}</p>
                    </div>
                @else
                    <p class="mt-3 text-sm text-slate-400">Unlock the 3-month signal subscription to see live setups.</p>
                @endif
                <a href="{{ route('member.signals.index') }}" class="btn-outline mt-4 w-full !py-2 text-sm">View Signals</a>
            </div>

            <div class="card p-6">
                <h2 class="font-semibold text-white">Achievements</h2>
                <div class="mt-3 flex flex-wrap gap-2">
                    @forelse ($badges as $badge)
                        <span class="badge"><x-icon name="badge" class="h-3.5 w-3.5 text-gold-400" /> {{ $badge->name }}</span>
                    @empty
                        <p class="text-sm text-slate-500">Complete lessons to earn your first badge.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layouts.member>
