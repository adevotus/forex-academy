<x-layouts.public title="Trading Robots — EMMIOXFOREX ACADEMY">
    <section class="px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-6xl">
            <div class="mx-auto max-w-2xl text-center">
                <span class="badge mx-auto">Automated Trading</span>
                <h1 class="mt-4 text-4xl font-extrabold text-white">Robot / EA Subscriptions</h1>
                <p class="mt-4 text-slate-400">Systematic trade execution, paired with setup guidance and a performance log.</p>
            </div>

            <div class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-2">
                @foreach ($robots as $robot)
                    <div class="card p-8">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-500/15 text-brand-300">
                            <x-icon name="cpu" class="h-6 w-6" />
                        </div>
                        <h3 class="mt-5 text-xl font-bold text-white">{{ $robot->name }}</h3>
                        <p class="mt-1 text-xs text-slate-500">Version {{ $robot->version }}</p>
                        <p class="mt-3 text-sm leading-relaxed text-slate-400">{{ $robot->description }}</p>
                        <div class="mt-6 flex items-center justify-between">
                            <span class="text-2xl font-bold text-white">{{ $robot->priceFormatted() }}</span>
                            <span class="text-xs text-slate-500">{{ $robot->duration_days }} days access</span>
                        </div>
                        <a href="{{ route('register') }}" class="btn-primary mt-6 w-full">Get Access</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.public>
