<x-layouts.member :title="$robot->name">
    <x-slot name="header">
        <div>
            <a href="{{ route('member.robots.index') }}" class="text-xs font-medium text-brand-600 hover:text-brand-700">&larr; Robots</a>
            <h1 class="mt-2 text-2xl font-bold text-slate-900">{{ $robot->name }}</h1>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-2">
            <p class="text-sm leading-relaxed text-slate-600">{{ $robot->description }}</p>

            @if ($unlocked)
                <div class="mt-6 rounded-xl border border-emerald-200 bg-emerald-50 p-5">
                    <p class="font-semibold text-emerald-700">Robot Active</p>
                    <p class="mt-1 text-sm text-slate-500">Subscription expires {{ $subscription?->expires_at?->format('M d, Y') }}.</p>
                    <a href="#" class="mt-4 inline-flex items-center gap-2 rounded-xl bg-brand-600 px-4 py-2 text-sm font-bold text-white shadow-sm hover:bg-brand-700 transition">
                        Download EA File
                    </a>
                </div>

                <div class="mt-8">
                    <h2 class="font-semibold text-slate-900">How to Install &amp; Use</h2>
                    <ol class="mt-3 space-y-2 text-sm text-slate-500">
                        <li>1. Download the EA file above and copy it into your MT4/MT5 "Experts" folder.</li>
                        <li>2. Restart your trading terminal and drag the EA onto your chosen chart.</li>
                        <li>3. Apply the recommended risk parameters from the setup checklist.</li>
                        <li>4. Enable "Algo Trading" and confirm the robot is running.</li>
                    </ol>
                </div>
            @else
                <div class="mt-6 rounded-xl border border-amber-200 bg-amber-50 p-5">
                    <p class="font-semibold text-slate-900">{{ $robot->priceFormatted() }} / {{ $robot->duration_days }} days</p>
                    <p class="mt-1 text-sm text-slate-500">Pay using the payment methods below and upload your receipt.</p>
                    <button type="button"
                            onclick="openRobotModal('{{ route('member.robots.unlock', $robot) }}', {{ json_encode($robot->name) }}, {{ json_encode($robot->priceFormatted()) }})"
                            class="mt-4 inline-flex items-center gap-2 rounded-xl bg-amber-500 px-4 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-amber-600 transition">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        Request Unlock
                    </button>
                </div>
            @endif
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="font-semibold text-slate-900">Robot Performance Log</h2>
            <p class="mt-2 text-sm text-slate-500">
                {{ $unlocked ? 'Performance tracking becomes available once your robot is live on a connected account.' : 'Unlock this robot to start tracking performance here.' }}
            </p>
        </div>
    </div>

    {{-- ── Robot Unlock Modal (shared with index) ── --}}
    <div id="robot-unlock-modal"
         class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/60 p-4 backdrop-blur-sm"
         onclick="if(event.target===this) closeRobotModal()">

        <div class="w-full max-w-4xl overflow-hidden rounded-2xl bg-white shadow-2xl">

            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-brand-50">
                        <svg class="h-5 w-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 leading-tight">Unlock Robot</h3>
                        <p id="robot-modal-subtitle" class="text-xs text-slate-500"></p>
                    </div>
                </div>
                <button onclick="closeRobotModal()" class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="flex flex-col sm:flex-row divide-y sm:divide-y-0 sm:divide-x divide-slate-100">

                <div class="flex flex-col gap-4 bg-slate-50 p-5 sm:w-96 sm:flex-shrink-0 overflow-y-auto" style="max-height:80vh">
                    <div class="flex items-center gap-3 rounded-xl border border-brand-100 bg-white px-4 py-3 shadow-sm">
                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-brand-600">
                            <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-medium uppercase tracking-wide text-slate-400">Amount Due</p>
                            <p id="robot-modal-price" class="text-xl font-extrabold text-slate-900"></p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <p class="text-[10px] font-semibold uppercase tracking-widest text-slate-400">How to Pay</p>
                        @forelse($paymentMethods as $method)
                            @php
                                $filledDetails = collect($method->details ?? [])->filter(fn($d) => !empty($d['label'] ?? '') || !empty($d['value'] ?? ''))->values();
                                $headerBg = match($method->icon_color) { 'emerald'=>'bg-emerald-50 border-emerald-100','blue'=>'bg-blue-50 border-blue-100','gold'=>'bg-yellow-50 border-yellow-100','purple'=>'bg-purple-50 border-purple-100',default=>'bg-slate-50 border-slate-100' };
                                $iconBg   = match($method->icon_color) { 'emerald'=>'bg-emerald-600','blue'=>'bg-blue-600','gold'=>'bg-yellow-500','purple'=>'bg-purple-600',default=>'bg-slate-700' };
                            @endphp
                            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                                <div class="flex items-center gap-2 border-b px-3.5 py-2.5 {{ $headerBg }}">
                                    <div class="flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-lg text-xs font-extrabold text-white {{ $iconBg }}">{{ $method->typeIcon() }}</div>
                                    <div class="min-w-0">
                                        <span class="block text-xs font-bold text-slate-800">{{ $method->name }}</span>
                                        @if($method->subtitle)<span class="text-[10px] text-slate-500">{{ $method->subtitle }}</span>@endif
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
                                                        <button type="button" onclick="copyValue(this, {{ json_encode($val) }})" title="Copy"
                                                                class="copy-btn flex-shrink-0 flex items-center gap-1 px-2 py-1 rounded-lg border border-slate-200 bg-slate-50 hover:bg-emerald-50 hover:border-emerald-300 text-slate-500 hover:text-emerald-600 transition text-[10px] font-medium whitespace-nowrap">
                                                            <svg class="copy-icon h-3.5 w-3.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                                            <svg class="check-icon h-3.5 w-3.5 flex-shrink-0 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
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
                                @if($method->note)<p class="border-t border-slate-50 px-3.5 pb-2.5 pt-2 text-[10px] text-slate-400">{{ $method->note }}</p>@endif
                            </div>
                        @empty
                            <div class="rounded-xl border border-dashed border-slate-200 bg-white p-4 text-center">
                                <p class="text-xs text-slate-400">No payment methods configured yet.</p>
                            </div>
                        @endforelse
                    </div>
                    <p class="text-[10px] leading-relaxed text-slate-400">After paying, upload your receipt on the right. Admin will verify and unlock your robot within 24 hours.</p>
                </div>

                <form id="robot-unlock-form" method="POST" action="" enctype="multipart/form-data" class="flex flex-1 flex-col p-6">
                    @csrf
                    <h4 class="mb-4 text-sm font-bold text-slate-800">Upload Payment Proof</h4>
                    <label id="rob-drop-zone" class="flex flex-1 cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 p-8 text-center transition hover:border-brand-400 hover:bg-brand-50">
                        <div id="rob-dz-idle" class="flex flex-col items-center gap-3">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white shadow-sm border border-slate-200">
                                <svg class="h-7 w-7 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-700">Click or drag & drop</p>
                                <p class="mt-0.5 text-xs text-slate-400">Screenshot or PDF of your payment receipt</p>
                            </div>
                            <span class="rounded-lg border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-500 shadow-sm">JPG · PNG · PDF — max 5 MB</span>
                        </div>
                        <div id="rob-dz-preview" class="hidden flex-col items-center gap-2">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50">
                                <svg class="h-7 w-7 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <p id="rob-dz-filename" class="max-w-[180px] truncate text-sm font-semibold text-emerald-700"></p>
                            <p class="text-xs text-slate-400">Click to change file</p>
                        </div>
                        <input type="file" name="proof" id="rob-proof" accept="image/*,.pdf" class="hidden">
                    </label>
                    <ul class="mt-4 space-y-1">
                        <li class="flex items-start gap-1.5 text-xs text-slate-400"><svg class="mt-px h-3.5 w-3.5 flex-shrink-0 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Make sure the receipt clearly shows the amount and transaction ID.</li>
                        <li class="flex items-start gap-1.5 text-xs text-slate-400"><svg class="mt-px h-3.5 w-3.5 flex-shrink-0 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Admin will review and unlock your robot within 24 hours.</li>
                    </ul>
                    <button type="submit" class="mt-5 flex w-full items-center justify-center gap-2 rounded-xl bg-brand-600 px-4 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-brand-700 active:scale-[.98]">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Submit Payment for Review
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
    function openRobotModal(actionUrl, robotName, price) {
        document.getElementById('robot-unlock-form').action = actionUrl;
        document.getElementById('robot-modal-subtitle').textContent = robotName;
        document.getElementById('robot-modal-price').textContent = price;
        document.getElementById('rob-dz-idle').classList.remove('hidden');
        document.getElementById('rob-dz-preview').classList.add('hidden');
        document.getElementById('rob-proof').value = '';
        var m = document.getElementById('robot-unlock-modal');
        m.classList.remove('hidden'); m.classList.add('flex');
    }
    function closeRobotModal() {
        var m = document.getElementById('robot-unlock-modal');
        m.classList.add('hidden'); m.classList.remove('flex');
    }
    document.addEventListener('keydown', function(e){ if(e.key==='Escape') closeRobotModal(); });
    document.getElementById('rob-proof').addEventListener('change', function(){
        if (this.files.length) {
            document.getElementById('rob-dz-filename').textContent = this.files[0].name;
            document.getElementById('rob-dz-idle').classList.add('hidden');
            var p = document.getElementById('rob-dz-preview');
            p.classList.remove('hidden'); p.classList.add('flex');
        }
    });
    function copyValue(btn, text) {
        function doFeedback() {
            var ci = btn.querySelector('.copy-icon'), ch = btn.querySelector('.check-icon'), lb = btn.querySelector('.copy-label');
            ci.classList.add('hidden'); ch.classList.remove('hidden');
            if (lb) lb.textContent = 'Copied!';
            btn.classList.add('bg-emerald-50','border-emerald-300','text-emerald-600');
            btn.classList.remove('bg-slate-50','border-slate-200','text-slate-500');
            setTimeout(function(){ ci.classList.remove('hidden'); ch.classList.add('hidden'); if(lb) lb.textContent='Copy'; btn.classList.remove('bg-emerald-50','border-emerald-300','text-emerald-600'); btn.classList.add('bg-slate-50','border-slate-200','text-slate-500'); }, 2000);
        }
        navigator.clipboard && navigator.clipboard.writeText ? navigator.clipboard.writeText(text).then(doFeedback).catch(function(){ var ta=document.createElement('textarea'); ta.value=text; ta.style.cssText='position:fixed;opacity:0'; document.body.appendChild(ta); ta.select(); try{document.execCommand('copy');}catch(e){} document.body.removeChild(ta); doFeedback(); }) : doFeedback();
    }
    </script>
</x-layouts.member>
