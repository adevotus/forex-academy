<x-layouts.member :title="$course->title">
    <x-slot name="header">
        <div>
            <span class="badge badge-level-{{ $course->level }}">{{ $course->levelLabel() }}</span>
            <h1 class="mt-2 text-2xl font-bold text-white">{{ $course->title }}</h1>
            <p class="mt-1 text-sm text-slate-400">{{ $course->description }}</p>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2">
            @if (! $unlocked)
                <div class="card mb-6 flex flex-wrap items-center justify-between gap-4 border-gold-400/20 bg-gold-400/5 p-6">
                    <div>
                        <p class="font-semibold text-white">This course is locked</p>
                        <p class="mt-1 text-sm text-slate-400">Unlock for {{ $course->priceFormatted() }} to access every lesson.</p>
                    </div>
                    <form method="POST" action="{{ route('member.courses.unlock', $course) }}">
                        @csrf
                        <button class="btn-gold">Request Unlock</button>
                    </form>
                </div>
            @endif

            <div class="card divide-y divide-white/5">
                @foreach ($course->lessons as $lesson)
                    @php $done = $progress->contains($lesson->id); $canWatch = $lesson->isUnlockedFor(auth()->user()); @endphp
                    <a href="{{ $canWatch ? route('member.courses.lesson', [$course, $lesson]) : '#' }}"
                       class="flex items-center justify-between px-6 py-4 {{ $canWatch ? 'hover:bg-white/5' : 'cursor-not-allowed opacity-50' }}">
                        <div class="flex items-center gap-3">
                            <span class="flex h-8 w-8 items-center justify-center rounded-full {{ $done ? 'bg-emerald-400/20 text-emerald-300' : 'bg-white/5 text-slate-400' }} text-xs font-semibold">
                                @if ($done) <x-icon name="check" class="h-4 w-4" /> @else {{ $loop->iteration }} @endif
                            </span>
                            <div>
                                <p class="text-sm font-medium text-white">{{ $lesson->title }}</p>
                                <p class="text-xs text-slate-500">{{ $lesson->duration_minutes }} min @if($lesson->is_preview) · Free Preview @endif</p>
                            </div>
                        </div>
                        @if (! $canWatch)
                            <x-icon name="lock" class="h-4 w-4 text-slate-600" />
                        @else
                            <x-icon name="play" class="h-4 w-4 text-brand-400" />
                        @endif
                    </a>
                @endforeach
            </div>
        </div>

        <div class="space-y-6">
            @if ($course->cheatSheets->count())
                <div class="card p-6">
                    <h2 class="font-semibold text-white">Cheat Sheets</h2>
                    <div class="mt-3 space-y-2">
                        @foreach ($course->cheatSheets as $sheet)
                            <div class="flex items-center justify-between rounded-lg border border-white/10 bg-white/5 px-3 py-2 text-sm text-slate-300">
                                <span>{{ $sheet->title }}</span>
                                <x-icon name="download" class="h-4 w-4 text-slate-500" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="card p-6">
                <h2 class="font-semibold text-white">Your Progress</h2>
                @php $pct = $course->lessons->count() ? round(($progress->count() / $course->lessons->count()) * 100) : 0; @endphp
                <div class="mt-3 h-2 w-full overflow-hidden rounded-full bg-white/10">
                    <div class="h-full rounded-full bg-gradient-to-r from-brand-500 to-brand-300" style="width: {{ $pct }}%"></div>
                </div>
                <p class="mt-2 text-xs text-slate-500">{{ $progress->count() }} / {{ $course->lessons->count() }} lessons complete ({{ $pct }}%)</p>
            </div>
        </div>
    </div>
</x-layouts.member>
