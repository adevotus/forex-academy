<x-layouts.public :title="$course->title.' — EMMIOXFOREX ACADEMY'">

    {{-- Course hero --}}
    <section class="border-b border-slate-200 bg-slate-50 px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl">
            <span class="badge badge-level-{{ $course->level }}">{{ $course->levelLabel() }}</span>
            <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">{{ $course->title }}</h1>
            <p class="mt-4 max-w-2xl text-base leading-relaxed text-slate-600">{{ $course->description }}</p>

            <div class="mt-8 flex flex-wrap items-center gap-4">
                <span class="text-3xl font-extrabold text-slate-900">{{ $course->priceFormatted() }}</span>
                <span class="rounded-full bg-slate-200 px-3 py-1 text-sm font-medium text-slate-600">{{ $course->lessons->count() }} lessons</span>
                @auth
                    <a href="{{ route('member.courses.show', $course) }}" class="btn-primary px-6 py-2.5">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Go to Course
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn-primary px-6 py-2.5">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        Register to Unlock
                    </a>
                @endauth
            </div>
        </div>
    </section>

    {{-- Lesson list --}}
    <section class="px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl">
            <h2 class="mb-6 text-lg font-extrabold text-slate-900">Course Lessons</h2>

            <div class="card overflow-hidden divide-y divide-slate-100">
                @forelse ($course->lessons as $lesson)
                    <div class="flex items-center justify-between px-6 py-4 hover:bg-slate-50 transition">
                        <div class="flex items-center gap-4">
                            <span class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-brand-50 text-xs font-bold text-brand-600">
                                {{ $loop->iteration }}
                            </span>
                            <div>
                                <p class="text-sm font-semibold text-slate-900">{{ $lesson->title }}</p>
                                @if ($lesson->duration_minutes)
                                    <p class="text-xs text-slate-500">{{ $lesson->duration_minutes }} min</p>
                                @endif
                            </div>
                        </div>
                        @if ($lesson->is_preview)
                            <span class="inline-flex items-center gap-1 rounded-full border border-emerald-200 bg-emerald-50 px-2.5 py-0.5 text-xs font-medium text-emerald-700">
                                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                Free Preview
                            </span>
                        @else
                            <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                        @endif
                    </div>
                @empty
                    <div class="px-6 py-10 text-center text-sm text-slate-500">
                        No lessons have been added to this course yet.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

</x-layouts.public>
