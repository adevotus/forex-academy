<x-layouts.public title="Pricing — EMMIOXFOREX ACADEMY">
    <section class="px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-6xl">
            <div class="mx-auto max-w-2xl text-center">
                <span class="badge mx-auto">Pricing</span>
                <h1 class="mt-4 text-4xl font-extrabold text-white">Simple, transparent pricing</h1>
                <p class="mt-4 text-slate-400">Register, get approved, then unlock exactly what you need.</p>
            </div>

            <div class="mt-14 rounded-2xl border border-brand-400/20 bg-brand-500/5 p-8 text-center">
                <h2 class="text-lg font-semibold text-white">Registration Fee</h2>
                <p class="mt-2 text-4xl font-extrabold text-white">$50.00</p>
                <p class="mt-2 text-sm text-slate-400">One-time — unlocks your Academy account after admin approval, including free Starter-level content.</p>
                <a href="{{ route('register') }}" class="btn-primary mt-6">Register Now</a>
            </div>

            <h2 class="mt-16 text-2xl font-bold text-white">Courses</h2>
            <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($courses as $course)
                    <div class="card p-5">
                        <span class="badge badge-level-{{ $course->level }}">{{ $course->levelLabel() }}</span>
                        <h3 class="mt-3 text-sm font-semibold text-white">{{ $course->title }}</h3>
                        <p class="mt-2 text-lg font-bold text-white">{{ $course->priceFormatted() }}</p>
                    </div>
                @endforeach
            </div>

            <h2 class="mt-14 text-2xl font-bold text-white">Robots / EAs</h2>
            <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
                @foreach ($robots as $robot)
                    <div class="card p-5">
                        <h3 class="text-sm font-semibold text-white">{{ $robot->name }}</h3>
                        <p class="mt-2 text-lg font-bold text-white">{{ $robot->priceFormatted() }} <span class="text-xs font-normal text-slate-500">/ {{ $robot->duration_days }} days</span></p>
                    </div>
                @endforeach
            </div>

            <h2 class="mt-14 text-2xl font-bold text-white">Signals & Mentorship</h2>
            <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="card p-5">
                    <h3 class="text-sm font-semibold text-white">3-Month Signal Subscription</h3>
                    <p class="mt-2 text-lg font-bold text-white">$150.00</p>
                </div>
                @foreach ($mentorships as $m)
                    <div class="card p-5">
                        <h3 class="text-sm font-semibold text-white">{{ $m->title }}</h3>
                        <p class="mt-2 text-lg font-bold text-white">{{ $m->priceFormatted() }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.public>
