<x-layouts.member :title="$course->title">
    <x-slot name="header">
        <div>
            <span class="badge badge-level-{{ $course->level }}">{{ $course->levelLabel() }}</span>
            <h1 class="mt-2 text-2xl font-bold text-white">{{ $course->title }}</h1>
            <p class="mt-1 text-sm text-slate-400">{{ $course->description }}</p>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2">
            @if (! $unlocked)
                <div class="card mb-6 flex flex-wrap items-center justify-between gap-4 border-gold-400/20 bg-gold-400/5 p-6">
                    <div>
                        <p class="font-semibold text-white">This course is locked</p>
                        <p class="mt-1 text-sm text-slate-400">Unlock for {{ $course->priceFormatted() }} to access every lesson.</p>
                    </div>
                    <button onclick="document.getElementById('unlock-modal').classList.remove('hidden'); document.body.style.overflow='hidden'" class="btn-gold">
                        Unlock Course
                    </button>
                </div>

                {{-- ── Unlock Modal ── --}}
                <div id="unlock-modal" class="fixed inset-0 z-50 hidden" style="background:rgba(15,23,42,0.55)">
                    <div class="absolute inset-0" onclick="document.getElementById('unlock-modal').classList.add('hidden'); document.body.style.overflow=''"></div>

                    <div class="absolute inset-0 flex items-center justify-center p-4 pointer-events-none">
                        <div class="pointer-events-auto w-full rounded-2xl bg-white shadow-2xl overflow-hidden" style="max-width:720px">

                            {{-- Header --}}
                            <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-xl" style="background:#eff6ff">
                                        <svg class="h-5 w-5" style="color:#2563eb" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-base font-extrabold text-slate-900">Unlock Course</p>
                                        <p class="text-xs text-slate-500">{{ $course->title }}</p>
                                    </div>
                                </div>
                                <button onclick="document.getElementById('unlock-modal').classList.add('hidden'); document.body.style.overflow=''"
                                        class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 transition">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>

                            {{-- Two-column body --}}
                            <form method="POST" action="{{ route('member.courses.unlock', $course) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-2 divide-x divide-slate-100">

                                    {{-- LEFT: Amount + payment methods --}}
                                    <div class="p-6 space-y-5 overflow-y-auto" style="max-height:70vh">

                                        {{-- Amount card --}}
                                        <div class="flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4">
                                            <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl" style="background:#2563eb">
                                                <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            </div>
                                            <div>
                                                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Amount Due</p>
                                                <p class="text-2xl font-extrabold text-slate-900">{{ $course->priceFormatted() }}</p>
                                            </div>
                                        </div>

                                        {{-- Payment methods --}}
                                        <div>
                                            <p class="mb-3 text-[11px] font-bold uppercase tracking-widest text-slate-400">How to Pay</p>
                                            <div class="space-y-3">
                                                @forelse($paymentMethods as $method)
                                                    @php
                                                        $filledDetails = collect($method->details ?? [])->filter(fn($d) => !empty($d['label'] ?? '') || !empty($d['value'] ?? ''))->values();
                                                    @endphp
                                                    <div class="rounded-xl border border-slate-200 bg-white overflow-hidden">
                                                        {{-- Method header --}}
                                                        <div class="flex items-center gap-3 px-4 py-3 {{ $method->icon_color === 'emerald' ? 'bg-emerald-50' : ($method->icon_color === 'blue' ? 'bg-blue-50' : ($method->icon_color === 'gold' ? 'bg-yellow-50' : 'bg-slate-50')) }}">
                                                            <div class="flex h-8 w-8 items-center justify-center rounded-lg text-sm font-extrabold
                                                                {{ $method->icon_color === 'emerald' ? 'bg-emerald-600 text-white' : ($method->icon_color === 'blue' ? 'bg-blue-600 text-white' : ($method->icon_color === 'gold' ? 'bg-yellow-500 text-white' : 'bg-slate-700 text-white')) }}">
                                                                {{ $method->typeIcon() }}
                                                            </div>
                                                            <div class="flex-1 min-w-0">
                                                                <span class="text-sm font-bold text-slate-800 block">{{ $method->name }}</span>
                                                                @if($method->subtitle)
                                                                    <span class="text-[11px] text-slate-500">{{ $method->subtitle }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        {{-- Details --}}
                                                        @if($filledDetails->isNotEmpty())
                                                            <div class="divide-y divide-slate-100 px-4">
                                                                @foreach($filledDetails as $detail)
                                                                    <div class="flex items-center justify-between py-2.5">
                                                                        <span class="text-xs text-slate-500">{{ $detail['label'] ?? '' }}</span>
                                                                        <span class="text-xs font-semibold text-slate-800 select-all font-mono">{{ ($detail['value'] ?: '—') }}</span>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <div class="px-4 py-3">
                                                                <p class="text-xs text-slate-400 italic">Payment details coming soon — contact admin.</p>
                                                            </div>
                                                        @endif
                                                        @if($method->note)
                                                            <p class="px-4 pb-3 text-[11px] text-slate-400 border-t border-slate-100 pt-2">{{ $method->note }}</p>
                                                        @endif
                                                    </div>
                                                @empty
                                                    <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 p-6 text-center">
                                                        <p class="text-sm text-slate-400">No payment methods configured yet.</p>
                                                        <p class="mt-1 text-xs text-slate-300">Please contact the admin.</p>
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>

                                        <p class="text-xs text-slate-400">After paying, upload your receipt on the right. Admin will verify and unlock the course within 24 hours.</p>
                                    </div>

                                    {{-- RIGHT: Upload proof --}}
                                    <div class="flex flex-col p-6 space-y-4">
                                        <p class="text-sm font-bold text-slate-900">Upload Payment Proof</p>

                                        {{-- Drop zone --}}
                                        <label for="proof-upload" class="flex flex-1 cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 hover:border-blue-400 hover:bg-blue-50 transition min-h-[180px]" id="drop-zone">
                                            <input type="file" name="proof" id="proof-upload" accept=".jpg,.jpeg,.png,.pdf" class="hidden" onchange="previewFile(this)">
                                            <div id="drop-placeholder" class="flex flex-col items-center gap-2 text-center p-4">
                                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white shadow-sm border border-slate-200">
                                                    <svg class="h-6 w-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                                                    </svg>
                                                </div>
                                                <p class="text-sm font-semibold text-slate-700">Click or drag &amp; drop</p>
                                                <p class="text-xs text-slate-400">Screenshot or PDF of your payment receipt</p>
                                                <span class="mt-1 rounded-full border border-slate-200 bg-white px-3 py-1 text-[11px] font-semibold text-slate-500">JPG · PNG · PDF — max 5 MB</span>
                                            </div>
                                            <div id="drop-preview" class="hidden w-full px-4 pb-4 text-center">
                                                <svg class="mx-auto h-8 w-8 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                <p id="file-name" class="mt-2 text-xs font-semibold text-slate-700 break-all"></p>
                                                <p class="text-[11px] text-slate-400">Click to change</p>
                                            </div>
                                        </label>

                                        {{-- Tips --}}
                                        <div class="space-y-1.5">
                                            <div class="flex items-start gap-2 text-xs text-slate-500">
                                                <svg class="mt-0.5 h-3.5 w-3.5 flex-shrink-0 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 16v-4m0-4h.01"/></svg>
                                                Make sure the receipt clearly shows the amount and transaction ID.
                                            </div>
                                            <div class="flex items-start gap-2 text-xs text-slate-500">
                                                <svg class="mt-0.5 h-3.5 w-3.5 flex-shrink-0 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3"/></svg>
                                                Admin will review and unlock your course within 24 hours.
                                            </div>
                                        </div>

                                        {{-- Submit --}}
                                        <button type="submit"
                                                class="mt-auto flex w-full items-center justify-center gap-2 rounded-xl py-3 text-sm font-bold text-white shadow transition hover:opacity-90"
                                                style="background:#1d4ed8">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            Submit Payment for Review
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                function previewFile(input) {
                    const placeholder = document.getElementById('drop-placeholder');
                    const preview = document.getElementById('drop-preview');
                    const fileName = document.getElementById('file-name');
                    if (input.files && input.files[0]) {
                        fileName.textContent = input.files[0].name;
                        placeholder.classList.add('hidden');
                        preview.classList.remove('hidden');
                    }
                }
                document.addEventListener('keydown', e => {
                    if (e.key === 'Escape') {
                        document.getElementById('unlock-modal').classList.add('hidden');
                        document.body.style.overflow = '';
                    }
                });
                </script>
            @endif

            <div class="card divide-y divide-white/5">
                @foreach ($course->lessons as $lesson)
                    @php $done = $progress->contains($lesson->id); $canWatch = $lesson->isUnlockedFor(auth()->user()); @endphp
                    <a href="{{ $canWatch ? route('member.courses.lesson', [$course, $lesson]) : '#' }}"
                       class="flex items-center justify-between px-6 py-4 {{ $canWatch ? 'hover:bg-white/5' : 'cursor-not-allowed opacity-50' }}">
                        <div class="flex items-center gap-3">
                            <span class="flex h-8 w-8 items-center justify-center rounded-full {{ $done ? 'bg-emerald-400/20 text-emerald-300' : 'bg-white/5 text-slate-400' }} text-xs font-semibold">
                                @if ($done) <x-icon name="check" class="h-4 w-4" /> @else {{ $loop->iteration }} @endif
                            </span>
                            <div>
                                <p class="text-sm font-medium text-white">{{ $lesson->title }}</p>
                                <p class="text-xs text-slate-500">{{ $lesson->duration_minutes }} min @if($lesson->is_preview) · Free Preview @endif</p>
                            </div>
                        </div>
                        @if (! $canWatch)
                            <x-icon name="lock" class="h-4 w-4 text-slate-600" />
                        @else
                            <x-icon name="play" class="h-4 w-4 text-brand-400" />
                        @endif
                    </a>
                @endforeach
            </div>
        </div>

        <div class="space-y-6">
            @if ($course->cheatSheets->count())
                <div class="card p-6">
                    <h2 class="font-semibold text-white">Cheat Sheets</h2>
                    <div class="mt-3 space-y-2">
                        @foreach ($course->cheatSheets as $sheet)
                            <div class="flex items-center justify-between rounded-lg border border-white/10 bg-white/5 px-3 py-2 text-sm text-slate-300">
                                <span>{{ $sheet->title }}</span>
                                <x-icon name="download" class="h-4 w-4 text-slate-500" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="card p-6">
                <h2 class="font-semibold text-white">Your Progress</h2>
                @php $pct = $course->lessons->count() ? round(($progress->count() / $course->lessons->count()) * 100) : 0; @endphp
                <div class="mt-3 h-2 w-full overflow-hidden rounded-full bg-white/10">
                    <div class="h-full rounded-full bg-gradient-to-r from-brand-500 to-brand-300" style="width: {{ $pct }}%"></div>
                </div>
                <p class="mt-2 text-xs text-slate-500">{{ $progress->count() }} / {{ $course->lessons->count() }} lessons complete ({{ $pct }}%)</p>
            </div>
        </div>
    </div>
</x-layouts.member>
