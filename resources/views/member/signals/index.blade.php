<x-layouts.member title="Signals">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-bold text-white">Trading Signals</h1>
            <p class="mt-1 text-sm text-slate-400">Market setups with entry, stop-loss and take-profit — plus the reasoning behind each call.</p>
        </div>
    </x-slot>

    @if (! $hasSignals)
        <div class="card flex flex-wrap items-center justify-between gap-4 border-gold-400/20 bg-gold-400/5 p-6">
            <div>
                <p class="font-semibold text-white">Unlock the 3-Month Signal Subscription</p>
                <p class="mt-1 text-sm text-slate-400">$150.00 — includes an explainer with every signal we publish.</p>
            </div>
            <form method="POST" action="{{ route('member.signals.unlock') }}">
                @csrf
                <button class="btn-gold">Request Unlock</button>
            </form>
        </div>
    @else
        <div class="mb-6 rounded-xl border border-emerald-400/20 bg-emerald-400/5 px-4 py-3 text-sm text-emerald-300">
            Active until {{ $subscription?->expires_at?->format('M d, Y') }}
        </div>

        <div class="space-y-4">
            @foreach ($signals as $signal)
                <div class="card p-6">
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <span class="badge {{ $signal->direction === 'buy' ? 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300' : 'border-rose-400/30 bg-rose-400/10 text-rose-300' }}">
                                {{ strtoupper($signal->direction) }}
                            </span>
                            <span class="font-semibold text-white">{{ $signal->pair }}</span>
                        </div>
                        <span class="text-xs text-slate-500">{{ $signal->published_at?->diffForHumans() }}</span>
                    </div>
                    <div class="mt-4 grid grid-cols-3 gap-3 text-center text-sm">
                        <div class="rounded-lg bg-white/5 py-2"><p class="text-xs text-slate-500">Entry</p><p class="font-semibold text-white">{{ $signal->entry_price }}</p></div>
                        <div class="rounded-lg bg-white/5 py-2"><p class="text-xs text-slate-500">Stop Loss</p><p class="font-semibold text-rose-300">{{ $signal->stop_loss }}</p></div>
                        <div class="rounded-lg bg-white/5 py-2"><p class="text-xs text-slate-500">Take Profit</p><p class="font-semibold text-emerald-300">{{ $signal->take_profit }}</p></div>
                    </div>
                    <p class="mt-4 text-sm leading-relaxed text-slate-400">{{ $signal->explainer }}</p>
                </div>
            @endforeach
        </div>
    @endif
</x-layouts.member>
