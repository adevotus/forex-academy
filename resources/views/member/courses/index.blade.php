<x-layouts.member title="My Courses">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-bold text-white">My Courses</h1>
            <p class="mt-1 text-sm text-slate-400">Starter &rarr; Pro. Progress level by level.</p>
        </div>
    </x-slot>

    @foreach ($courses as $level => $group)
        <div class="mb-10">
            <div class="flex items-center gap-3">
                <span class="badge badge-level-{{ $level }}">{{ ucfirst($level) }}</span>
                <div class="h-px flex-1 bg-white/10"></div>
            </div>
            <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($group as $course)
                    @php $unlocked = $course->isUnlockedFor(auth()->user()); @endphp
                    <a href="{{ route('member.courses.show', $course) }}" class="card group block overflow-hidden p-5 transition hover:border-brand-400/30">
                        <div class="flex items-start justify-between">
                            <h3 class="font-semibold text-white group-hover:text-brand-300">{{ $course->title }}</h3>
                            @if ($unlocked)
                                <x-icon name="unlock" class="h-4 w-4 shrink-0 text-emerald-400" />
                            @else
                                <x-icon name="lock" class="h-4 w-4 shrink-0 text-slate-600" />
                            @endif
                        </div>
                        <p class="mt-2 line-clamp-2 text-sm text-slate-400">{{ $course->description }}</p>
                        <div class="mt-4 flex items-center justify-between text-sm">
                            <span class="font-semibold text-white">{{ $course->priceFormatted() }}</span>
                            <span class="text-slate-500">{{ $course->lessons()->count() }} lessons</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach
</x-layouts.member>
