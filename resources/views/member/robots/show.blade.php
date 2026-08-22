<x-layouts.member :title="$robot->name">
    <x-slot name="header">
        <div>
            <a href="{{ route('member.robots.index') }}" class="text-xs font-medium text-brand-300 hover:text-brand-200">&larr; Robots</a>
            <h1 class="mt-2 text-2xl font-bold text-white">{{ $robot->name }}</h1>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="card p-6 lg:col-span-2">
            <p class="text-sm leading-relaxed text-slate-300">{{ $robot->description }}</p>

            @if ($unlocked)
                <div class="mt-6 rounded-xl border border-emerald-400/20 bg-emerald-400/5 p-5">
                    <p class="font-semibold text-emerald-300">Robot Active</p>
                    <p class="mt-1 text-sm text-slate-400">Subscription expires {{ $subscription?->expires_at?->format('M d, Y') }}.</p>
                    <a href="#" class="btn-primary mt-4 !py-2 text-sm">Download EA File</a>
                </div>

                <div class="mt-8">
                    <h2 class="font-semibold text-white">How to Install &amp; Use</h2>
                    <ol class="mt-3 space-y-2 text-sm text-slate-400">
                        <li>1. Download the EA file above and copy it into your MT4/MT5 "Experts" folder.</li>
                        <li>2. Restart your trading terminal and drag the EA onto your chosen chart.</li>
                        <li>3. Apply the recommended risk parameters from the setup checklist.</li>
                        <li>4. Enable "Algo Trading" and confirm the robot is running.</li>
                    </ol>
                </div>
            @else
                <div class="mt-6 rounded-xl border border-gold-400/20 bg-gold-400/5 p-5 text-center">
                    <p class="font-semibold text-white">{{ $robot->priceFormatted() }} / {{ $robot->duration_days }} days</p>
                    <form method="POST" action="{{ route('member.robots.unlock', $robot) }}" class="mt-4">
                        @csrf
                        <button class="btn-gold">Request Unlock</button>
                    </form>
                </div>
            @endif
        </div>

        <div class="card p-6">
            <h2 class="font-semibold text-white">Robot Performance Log</h2>
            <p class="mt-2 text-sm text-slate-400">
                {{ $unlocked ? 'Performance tracking becomes available once your robot is live on a connected account.' : 'Unlock this robot to start tracking performance here.' }}
            </p>
        </div>
    </div>
</x-layouts.member>
