<x-layouts.public :title="$course->title.' — EMMIOXFOREX ACADEMY'">
    <section class="px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl">
            <span class="badge badge-level-{{ $course->level }}">{{ $course->levelLabel() }}</span>
            <h1 class="mt-4 text-3xl font-extrabold text-white sm:text-4xl">{{ $course->title }}</h1>
            <p class="mt-4 text-slate-400">{{ $course->description }}</p>

            <div class="mt-8 flex flex-wrap items-center gap-4">
                <span class="text-2xl font-bold text-white">{{ $course->priceFormatted() }}</span>
                <span class="text-sm text-slate-500">{{ $course->lessons->count() }} lessons</span>
                @auth
                    <a href="{{ route('member.courses.show', $course) }}" class="btn-primary">Go to Course</a>
                @else
                    <a href="{{ route('register') }}" class="btn-primary">Register to Unlock</a>
                @endauth
            </div>

            <div class="mt-12 card divide-y divide-white/5">
                @foreach ($course->lessons as $lesson)
                    <div class="flex items-center justify-between px-6 py-4">
                        <div class="flex items-center gap-3">
                            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-white/5 text-xs font-semibold text-slate-400">{{ $loop->iteration }}</span>
                            <div>
                                <p class="text-sm font-medium text-white">{{ $lesson->title }}</p>
                                <p class="text-xs text-slate-500">{{ $lesson->duration_minutes }} min</p>
                            </div>
                        </div>
                        @if ($lesson->is_preview)
                            <span class="badge">Free Preview</span>
                        @else
                            <x-icon name="lock" class="h-4 w-4 text-slate-600" />
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.public>
