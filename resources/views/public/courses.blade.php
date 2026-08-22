<x-layouts.public title="Courses — EMMIOXFOREX ACADEMY">

    {{-- Page hero --}}
    <section class="border-b border-slate-200 bg-slate-50 px-4 py-20 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="badge mx-auto">Online Forex Classes</span>
            <h1 class="mt-5 text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">
                A leveled learning path<br>built to make progress simple
            </h1>
            <p class="mt-5 text-lg text-slate-600">
                Starter &rarr; Intermediate &rarr; Advanced &rarr; Pro. Each level unlocks the next.
            </p>
        </div>
    </section>

    {{-- Course listing --}}
    <section class="px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">

            @forelse ($courses as $level => $group)
                <div class="mt-10 first:mt-0">
                    {{-- Level divider --}}
                    <div class="flex items-center gap-4">
                        <span class="badge badge-level-{{ $level }}">{{ ucfirst($level) }}</span>
                        <div class="h-px flex-1 bg-slate-200"></div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($group as $course)
                            <a href="{{ route('courses.show', $course) }}"
                               class="card-hover group flex flex-col p-6 transition">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 ring-1 ring-brand-200 transition group-hover:bg-brand-100">
                                    <svg class="h-5 w-5 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <h3 class="mt-4 font-bold text-slate-900 transition group-hover:text-brand-600">{{ $course->title }}</h3>
                                <p class="mt-2 flex-1 line-clamp-3 text-sm leading-relaxed text-slate-500">{{ $course->description }}</p>
                                <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-4 text-sm">
                                    <span class="font-bold text-slate-900">{{ $course->priceFormatted() }}</span>
                                    <span class="text-slate-400">{{ $course->lessons()->count() }} lessons</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="py-24 text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100">
                        <svg class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13"/>
                        </svg>
                    </div>
                    <p class="mt-4 text-base font-semibold text-slate-700">Courses are being prepared</p>
                    <p class="mt-2 text-sm text-slate-500">Check back soon — we're building great content for you.</p>
                </div>
            @endforelse

        </div>
    </section>

</x-layouts.public>
