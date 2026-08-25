<x-layouts.member title="Signals">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Trading Signals</h1>
            <p class="mt-1 text-sm text-slate-500">Market setups with entry, stop-loss and take-profit — plus the reasoning behind each call.</p>
        </div>
    </x-slot>

    @if (! $hasSignals)
        {{-- Locked state --}}
        <div class="rounded-2xl border border-amber-200 bg-amber-50 p-6 shadow-sm">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-amber-400/20">
                        <svg class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </div>
                    <div>
                        <p class="font-bold text-slate-900">Unlock the 3-Month Signal Subscription</p>
                        <p class="mt-0.5 text-sm text-slate-600">$150.00 — includes an explainer with every signal we publish.</p>
                    </div>
                </div>
                <button onclick="openSignalModal()"
                        class="inline-flex items-center gap-2 rounded-xl bg-amber-500 px-5 py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-amber-600 active:scale-[.98]">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    Request Unlock
                </button>
            </div>
        </div>

        {{-- ── Signal Unlock Modal ── --}}
        <div id="signal-unlock-modal"
             class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/60 p-4 backdrop-blur-sm"
             onclick="if(event.target===this) closeSignalModal()">

            <div class="w-full max-w-4xl overflow-hidden rounded-2xl bg-white shadow-2xl">

                {{-- Header --}}
                <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-amber-50">
                            <svg class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 leading-tight">Unlock Trading Signals</h3>
                            <p class="text-xs text-slate-500">3-Month Subscription · $150.00</p>
                        </div>
                    </div>
                    <button onclick="closeSignalModal()" class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                {{-- Two-column body --}}
                <div class="flex flex-col sm:flex-row divide-y sm:divide-y-0 sm:divide-x divide-slate-100">

                    {{-- LEFT — Payment methods --}}
                    <div class="flex flex-col gap-4 bg-slate-50 p-5 sm:w-96 sm:flex-shrink-0 overflow-y-auto" style="max-height:80vh">

                        {{-- Amount --}}
                        <div class="flex items-center gap-3 rounded-xl border border-amber-100 bg-white px-4 py-3 shadow-sm">
                            <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-amber-500">
                                <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-medium uppercase tracking-wide text-slate-400">Amount Due</p>
                                <p class="text-xl font-extrabold text-slate-900">$150.00</p>
                            </div>
                        </div>

                        {{-- Payment methods --}}
                        <div class="space-y-3">
                            <p class="text-[10px] font-semibold uppercase tracking-widest text-slate-400">How to Pay</p>

                            @forelse($paymentMethods as $method)
                                @php
                                    $filledDetails = collect($method->details ?? [])->filter(fn($d) => !empty($d['label'] ?? '') || !empty($d['value'] ?? ''))->values();
                                    $headerBg = match($method->icon_color) {
                                        'emerald' => 'bg-emerald-50 border-emerald-100',
                                        'blue'    => 'bg-blue-50 border-blue-100',
                                        'gold'    => 'bg-yellow-50 border-yellow-100',
                                        'purple'  => 'bg-purple-50 border-purple-100',
                                        default   => 'bg-slate-50 border-slate-100',
                                    };
                                    $iconBg = match($method->icon_color) {
                                        'emerald' => 'bg-emerald-600',
                                        'blue'    => 'bg-blue-600',
                                        'gold'    => 'bg-yellow-500',
                                        'purple'  => 'bg-purple-600',
                                        default   => 'bg-slate-700',
                                    };
                                @endphp
                                <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                                    <div class="flex items-center gap-2 border-b px-3.5 py-2.5 {{ $headerBg }}">
                                        <div class="flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-lg text-xs font-extrabold text-white {{ $iconBg }}">
                                            {{ $method->typeIcon() }}
                                        </div>
                                        <div class="min-w-0">
                                            <span class="block text-xs font-bold text-slate-800">{{ $method->name }}</span>
                                            @if($method->subtitle)
                                                <span class="text-[10px] text-slate-500">{{ $method->subtitle }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    @if($filledDetails->isNotEmpty())
                                        <div class="divide-y divide-slate-100 px-3.5 py-1">
                                            @foreach($filledDetails as $detail)
                                                @php $val = $detail['value'] ?: '—'; @endphp
                                                <div class="py-2.5">
                                                    <span class="block text-[10px] font-medium uppercase tracking-wide text-slate-400 mb-1">{{ $detail['label'] ?? '' }}</span>
                                                    <div class="flex items-center gap-2">
                                                        <span class="font-mono text-[12px] font-semibold text-slate-800 select-all break-all leading-snug flex-1">{{ $val }}</span>
                                                        @if($val !== '—')
                                                            <button type="button"
                                                                    onclick="copyValue(this, {{ json_encode($val) }})"
                                                                    title="Copy to clipboard"
                                                                    class="copy-btn flex-shrink-0 flex items-center gap-1 px-2 py-1 rounded-lg border border-slate-200 bg-slate-50 hover:bg-emerald-50 hover:border-emerald-300 text-slate-500 hover:text-emerald-600 transition text-[10px] font-medium whitespace-nowrap">
                                                                <svg class="copy-icon h-3.5 w-3.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                                                </svg>
                                                                <svg class="check-icon h-3.5 w-3.5 flex-shrink-0 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                                                </svg>
                                                                <span class="copy-label">Copy</span>
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="px-3.5 py-2.5 text-[11px] italic text-slate-400">Contact admin for details.</p>
                                    @endif
                                    @if($method->note)
                                        <p class="border-t border-slate-50 px-3.5 pb-2.5 pt-2 text-[10px] text-slate-400">{{ $method->note }}</p>
                                    @endif
                                </div>
                            @empty
                                <div class="rounded-xl border border-dashed border-slate-200 bg-white p-4 text-center">
                                    <p class="text-xs text-slate-400">No payment methods configured yet.</p>
                                </div>
                            @endforelse
                        </div>

                        <p class="text-[10px] leading-relaxed text-slate-400">
                            After paying, upload your receipt on the right. Admin will verify and activate your subscription within 24 hours.
                        </p>
                    </div>

                    {{-- RIGHT — Upload proof form --}}
                    <form method="POST" action="{{ route('member.signals.unlock') }}" enctype="multipart/form-data"
                          class="flex flex-1 flex-col p-6">
                        @csrf

                        <h4 class="mb-4 text-sm font-bold text-slate-800">Upload Payment Proof</h4>

                        <label id="sig-drop-zone"
                               class="flex flex-1 cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 p-8 text-center transition hover:border-amber-400 hover:bg-amber-50">
                            <div id="sig-dz-idle" class="flex flex-col items-center gap-3">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white shadow-sm border border-slate-200">
                                    <svg class="h-7 w-7 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-700">Click or drag & drop</p>
                                    <p class="mt-0.5 text-xs text-slate-400">Screenshot or PDF of your payment receipt</p>
                                </div>
                                <span class="rounded-lg border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-500 shadow-sm">JPG · PNG · PDF — max 5 MB</span>
                            </div>
                            <div id="sig-dz-preview" class="hidden flex-col items-center gap-2">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50">
                                    <svg class="h-7 w-7 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <p id="sig-dz-filename" class="max-w-[180px] truncate text-sm font-semibold text-emerald-700"></p>
                                <p class="text-xs text-slate-400">Click to change file</p>
                            </div>
                            <input type="file" name="proof" id="sig-proof" accept="image/*,.pdf" class="hidden">
                        </label>

                        <ul class="mt-4 space-y-1">
                            <li class="flex items-start gap-1.5 text-xs text-slate-400">
                                <svg class="mt-px h-3.5 w-3.5 flex-shrink-0 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Make sure the receipt clearly shows the amount and transaction ID.
                            </li>
                            <li class="flex items-start gap-1.5 text-xs text-slate-400">
                                <svg class="mt-px h-3.5 w-3.5 flex-shrink-0 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Admin will review and activate within 24 hours.
                            </li>
                        </ul>

                        <button type="submit"
                                class="mt-5 flex w-full items-center justify-center gap-2 rounded-xl bg-amber-500 px-4 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-amber-600 active:scale-[.98]">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Submit Payment for Review
                        </button>
                    </form>
                </div>
            </div>
        </div>

    @else
        {{-- Active subscription --}}
        <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700 font-medium">
            ✓ Active until {{ $subscription?->expires_at?->format('M d, Y') }}
        </div>

        <div class="space-y-4">
            @foreach ($signals as $signal)
                <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex items-center rounded-lg border px-2.5 py-0.5 text-xs font-bold {{ $signal->direction === 'buy' ? 'border-emerald-200 bg-emerald-50 text-emerald-700' : 'border-rose-200 bg-rose-50 text-rose-700' }}">
                                {{ strtoupper($signal->direction) }}
                            </span>
                            <span class="font-semibold text-slate-900">{{ $signal->pair }}</span>
                        </div>
                        <span class="text-xs text-slate-400">{{ $signal->published_at?->diffForHumans() }}</span>
                    </div>
                    <div class="mt-4 grid grid-cols-3 gap-3 text-center text-sm">
                        <div class="rounded-lg bg-slate-50 py-2.5">
                            <p class="text-xs text-slate-400">Entry</p>
                            <p class="font-semibold text-slate-900">{{ $signal->entry_price }}</p>
                        </div>
                        <div class="rounded-lg bg-rose-50 py-2.5">
                            <p class="text-xs text-slate-400">Stop Loss</p>
                            <p class="font-semibold text-rose-600">{{ $signal->stop_loss }}</p>
                        </div>
                        <div class="rounded-lg bg-emerald-50 py-2.5">
                            <p class="text-xs text-slate-400">Take Profit</p>
                            <p class="font-semibold text-emerald-600">{{ $signal->take_profit }}</p>
                        </div>
                    </div>
                    <p class="mt-4 text-sm leading-relaxed text-slate-500">{{ $signal->explainer }}</p>
                </div>
            @endforeach
        </div>
    @endif

    <script>
    function openSignalModal() {
        var m = document.getElementById('signal-unlock-modal');
        if (m) { m.classList.remove('hidden'); m.classList.add('flex'); }
    }
    function closeSignalModal() {
        var m = document.getElementById('signal-unlock-modal');
        if (m) { m.classList.add('hidden'); m.classList.remove('flex'); }
    }
    document.addEventListener('keydown', function(e){ if(e.key==='Escape') closeSignalModal(); });

    var sigProof = document.getElementById('sig-proof');
    if (sigProof) {
        sigProof.addEventListener('change', function(){
            if (this.files.length) {
                document.getElementById('sig-dz-filename').textContent = this.files[0].name;
                document.getElementById('sig-dz-idle').classList.add('hidden');
                var preview = document.getElementById('sig-dz-preview');
                preview.classList.remove('hidden');
                preview.classList.add('flex');
            }
        });
    }

    function copyValue(btn, text) {
        function doFeedback() {
            var copyIcon  = btn.querySelector('.copy-icon');
            var checkIcon = btn.querySelector('.check-icon');
            var label     = btn.querySelector('.copy-label');
            copyIcon.classList.add('hidden');
            checkIcon.classList.remove('hidden');
            if (label) label.textContent = 'Copied!';
            btn.classList.add('bg-emerald-50','border-emerald-300','text-emerald-600');
            btn.classList.remove('bg-slate-50','border-slate-200','text-slate-500');
            setTimeout(function() {
                copyIcon.classList.remove('hidden');
                checkIcon.classList.add('hidden');
                if (label) label.textContent = 'Copy';
                btn.classList.remove('bg-emerald-50','border-emerald-300','text-emerald-600');
                btn.classList.add('bg-slate-50','border-slate-200','text-slate-500');
            }, 2000);
        }
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(doFeedback).catch(function(){ fallbackCopy(text); doFeedback(); });
        } else { fallbackCopy(text); doFeedback(); }
    }
    function fallbackCopy(text) {
        var ta = document.createElement('textarea');
        ta.value = text;
        ta.style.cssText = 'position:fixed;top:0;left:0;opacity:0;pointer-events:none';
        document.body.appendChild(ta); ta.focus(); ta.select();
        try { document.execCommand('copy'); } catch(e) {}
        document.body.removeChild(ta);
    }
    </script>
</x-layouts.member>
