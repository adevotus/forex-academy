<x-layouts.member title="Robots">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-bold text-white">Robot / EA Subscriptions</h1>
            <p class="mt-1 text-sm text-slate-400">Systematic trade execution, tailored to your risk profile.</p>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        @foreach ($robots as $robot)
            @php $sub = $activeSubscriptions->get($robot->id); @endphp
            <div class="card p-6">
                <div class="flex items-start justify-between">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-500/15 text-brand-300">
                        <x-icon name="cpu" class="h-5 w-5" />
                    </div>
                    @if ($sub)
                        <span class="badge border-emerald-400/30 bg-emerald-400/10 text-emerald-300">Active</span>
                    @endif
                </div>
                <h3 class="mt-4 text-lg font-semibold text-white">{{ $robot->name }}</h3>
                <p class="mt-1 text-xs text-slate-500">Version {{ $robot->version }}</p>
                <p class="mt-3 text-sm leading-relaxed text-slate-400">{{ $robot->description }}</p>
                @if ($sub)
                    <p class="mt-4 text-xs text-slate-500">Expires {{ $sub->expires_at?->format('M d, Y') }}</p>
                @else
                    <p class="mt-4 text-xl font-bold text-white">{{ $robot->priceFormatted() }}</p>
                @endif
                <a href="{{ route('member.robots.show', $robot) }}" class="btn-outline mt-5 w-full !py-2 text-sm">
                    {{ $sub ? 'View Details' : 'Unlock Robot' }}
                </a>
            </div>
        @endforeach
    </div>
</x-layouts.member>
