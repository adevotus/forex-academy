<x-layouts.public title="Courses — EMMIOXFOREX ACADEMY">
    <section class="px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="mx-auto max-w-2xl text-center">
                <span class="badge mx-auto">Online Forex Classes</span>
                <h1 class="mt-4 text-4xl font-extrabold text-white">A leveled learning path built to make progress simple</h1>
                <p class="mt-4 text-slate-400">Starter &rarr; Intermediate &rarr; Advanced &rarr; Pro. Each level unlocks the next.</p>
            </div>

            @forelse ($courses as $level => $group)
                <div class="mt-14">
                    <div class="flex items-center gap-3">
                        <span class="badge badge-level-{{ $level }}">{{ ucfirst($level) }}</span>
                        <div class="h-px flex-1 bg-white/10"></div>
                    </div>
                    <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($group as $course)
                            <a href="{{ route('courses.show', $course) }}" class="card group block overflow-hidden p-6 transition hover:border-brand-400/30">
                                <h3 class="font-semibold text-white group-hover:text-brand-300">{{ $course->title }}</h3>
                                <p class="mt-2 line-clamp-3 text-sm text-slate-400">{{ $course->description }}</p>
                                <div class="mt-5 flex items-center justify-between text-sm">
                                    <span class="font-semibold text-white">{{ $course->priceFormatted() }}</span>
                                    <span class="text-slate-500">{{ $course->lessons()->count() }} lessons</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @empty
                <p class="mt-14 text-center text-slate-500">Courses are being prepared — check back soon.</p>
            @endforelse
        </div>
    </section>
</x-layouts.public>
