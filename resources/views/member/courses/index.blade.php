<x-layouts.member title="My Courses">
    <x-slot name="header">My Courses</x-slot>

@php
    $allLevels = ['starter', 'intermediate', 'advanced', 'pro'];
    $activeTab = request('level', 'all');
    // Flatten grouped collection into a single list
    $flatCourses = $courses->flatten();
@endphp

    {{-- ── Page heading --}}
    <div class="mb-6">
        <h1 class="text-2xl font-extrabold text-slate-900">My Courses</h1>
        <p class="mt-1 text-sm text-slate-500">Starter → Pro. Progress level by level.</p>
    </div>

    {{-- ── Filter tabs --}}
    <div class="mb-6 flex gap-2 overflow-x-auto pb-1">
        <a href="{{ route('member.courses.index') }}"
           class="flex-shrink-0 rounded-xl px-4 py-2 text-sm font-semibold transition
                  {{ $activeTab === 'all' ? 'bg-slate-900 text-white shadow-sm' : 'border border-slate-200 bg-white text-slate-600 hover:border-slate-300 hover:text-slate-900' }}">
            All
        </a>
        @foreach ($allLevels as $lvl)
            <a href="{{ route('member.courses.index', ['level' => $lvl]) }}"
               class="flex-shrink-0 rounded-xl px-4 py-2 text-sm font-semibold transition capitalize
                      {{ $activeTab === $lvl ? 'bg-slate-900 text-white shadow-sm' : 'border border-slate-200 bg-white text-slate-600 hover:border-slate-300 hover:text-slate-900' }}">
                {{ ucfirst($lvl) }}
            </a>
        @endforeach
    </div>

    {{-- ── Flat course grid (no level dividers) --}}
    @if ($flatCourses->isNotEmpty())
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($flatCourses as $course)
            @php
                $unlocked = $course->isUnlockedFor(auth()->user());
                $level    = $course->level;
                $barColor = match($level) {
                    'starter'      => 'bg-emerald-400',
                    'intermediate' => 'bg-brand-500',
                    'advanced'     => 'bg-amber-400',
                    'pro'          => 'bg-violet-500',
                    default        => 'bg-slate-300',
                };
            @endphp

            <div class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md">

                {{-- Level colour accent bar --}}
                <div class="h-1.5 w-full {{ $barColor }}"></div>

                <div class="flex flex-1 flex-col p-5">
                    {{-- Level badge + lock icon --}}
                    <div class="flex items-center justify-between gap-2">
                        <span class="badge badge-level-{{ $level }} !px-2 !py-0.5 !text-[10px]">{{ ucfirst($level) }}</span>
                        @if ($unlocked)
                            <span class="flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-emerald-50">
                                <x-icon name="unlock" class="h-3.5 w-3.5 text-emerald-500" />
                            </span>
                        @else
                            <span class="flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-slate-100">
                                <x-icon name="lock" class="h-3.5 w-3.5 text-slate-400" />
                            </span>
                        @endif
                    </div>

                    {{-- Title --}}
                    <h3 class="mt-3 font-bold text-slate-900 leading-snug transition group-hover:text-brand-600">
                        {{ $course->title }}
                    </h3>

                    {{-- Description --}}
                    <p class="mt-1.5 flex-1 text-xs text-slate-500 line-clamp-3">{{ $course->description }}</p>

                    {{-- Meta --}}
                    <div class="mt-4 flex items-center justify-between text-xs">
                        <span class="font-bold text-slate-800">{{ $course->priceFormatted() }}</span>
                        <span class="text-slate-400">{{ $course->lessons()->count() }} lessons</span>
                    </div>

                    {{-- CTA --}}
                    <div class="mt-4">
                        @if ($unlocked)
                            <a href="{{ route('member.courses.show', $course) }}"
                               class="flex w-full items-center justify-center gap-1.5 rounded-xl bg-brand-600 px-3 py-2 text-xs font-bold text-white transition hover:bg-brand-700">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Start Learning
                            </a>
                        @else
                            <button type="button"
                                    onclick="openUnlockModal('{{ route('member.courses.unlock', $course) }}', '{{ addslashes($course->title) }}', '{{ $course->priceFormatted() }}')"
                                    class="flex w-full items-center justify-center gap-1.5 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs font-bold text-slate-700 transition hover:border-brand-300 hover:bg-brand-50 hover:text-brand-700">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                Unlock Course
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="flex flex-col items-center gap-3 rounded-2xl border border-slate-200 bg-white py-20 text-center shadow-sm">
            <svg class="h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13"/></svg>
            <p class="text-sm font-semibold text-slate-500">No courses available yet.</p>
        </div>
    @endif

    {{-- ── Unlock / payment proof modal (two-column) --}}
    <div id="unlock-modal"
         class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/60 p-4 backdrop-blur-sm"
         onclick="if(event.target===this) closeUnlockModal()">

        <div class="w-full max-w-2xl overflow-hidden rounded-2xl bg-white shadow-2xl">

            {{-- Modal header --}}
            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-brand-50">
                        <svg class="h-5 w-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 leading-tight">Unlock Course</h3>
                        <p id="modal-course-title" class="text-xs text-slate-500"></p>
                    </div>
                </div>
                <button onclick="closeUnlockModal()" class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            {{-- Two-column body --}}
            <div class="flex flex-col sm:flex-row divide-y sm:divide-y-0 sm:divide-x divide-slate-100">

                {{-- LEFT — Payment methods from PaymentMethod table --}}
                <div class="flex flex-col gap-4 bg-slate-50 p-5 sm:w-72 sm:flex-shrink-0 overflow-y-auto" style="max-height:80vh">

                    {{-- Amount --}}
                    <div class="flex items-center gap-3 rounded-xl border border-brand-100 bg-white px-4 py-3 shadow-sm">
                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-brand-600">
                            <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-medium uppercase tracking-wide text-slate-400">Amount Due</p>
                            <p id="modal-price" class="text-xl font-extrabold text-slate-900"></p>
                        </div>
                    </div>

                    {{-- Payment methods from PaymentMethod table --}}
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
                                    <div class="divide-y divide-slate-50 px-3.5 py-1">
                                        @foreach($filledDetails as $detail)
                                            <div class="flex items-center justify-between gap-2 py-2">
                                                <span class="text-[11px] text-slate-400">{{ $detail['label'] ?? '' }}</span>
                                                <span class="text-right font-mono text-[11px] font-bold text-slate-900 select-all">{{ ($detail['value'] ?: '—') }}</span>
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
                        After paying, upload your receipt on the right. Admin will verify and unlock the course within 24 hours.
                    </p>
                </div>

                {{-- RIGHT — Upload proof form --}}
                <form id="unlock-form" method="POST" action="" enctype="multipart/form-data" class="flex flex-1 flex-col p-6">
                    @csrf

                    <h4 class="mb-4 text-sm font-bold text-slate-800">Upload Payment Proof</h4>

                    {{-- Drop zone --}}
                    <label id="drop-zone"
                           class="flex flex-1 cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 p-8 text-center transition hover:border-brand-400 hover:bg-brand-50">
                        <div id="dz-idle" class="flex flex-col items-center gap-3">
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

                        {{-- Preview state (hidden until file chosen) --}}
                        <div id="dz-preview" class="hidden flex-col items-center gap-2">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50">
                                <svg class="h-7 w-7 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <p id="dz-filename" class="max-w-[180px] truncate text-sm font-semibold text-emerald-700"></p>
                            <p class="text-xs text-slate-400">Click to change file</p>
                        </div>

                        <input type="file" name="proof" id="unlock-proof" accept="image/*,.pdf" class="hidden" required>
                    </label>

                    {{-- Tips --}}
                    <ul class="mt-4 space-y-1">
                        <li class="flex items-start gap-1.5 text-xs text-slate-400">
                            <svg class="mt-px h-3.5 w-3.5 flex-shrink-0 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Make sure the receipt clearly shows the amount and transaction ID.
                        </li>
                        <li class="flex items-start gap-1.5 text-xs text-slate-400">
                            <svg class="mt-px h-3.5 w-3.5 flex-shrink-0 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Admin will review and unlock your course within 24 hours.
                        </li>
                    </ul>

                    {{-- Submit --}}
                    <button type="submit"
                            class="mt-5 flex w-full items-center justify-center gap-2 rounded-xl bg-brand-600 px-4 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-brand-700 active:scale-[.98]">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Submit Payment for Review
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
    function openUnlockModal(actionUrl, courseTitle, price) {
        document.getElementById('unlock-form').action = actionUrl;
        document.getElementById('modal-course-title').textContent = courseTitle;
        document.getElementById('modal-price').textContent = price;
        // reset file picker
        document.getElementById('dz-idle').classList.remove('hidden');
        document.getElementById('dz-preview').classList.add('hidden');
        document.getElementById('unlock-proof').value = '';
        var m = document.getElementById('unlock-modal');
        m.classList.remove('hidden'); m.classList.add('flex');
    }
    function closeUnlockModal() {
        var m = document.getElementById('unlock-modal');
        m.classList.add('hidden'); m.classList.remove('flex');
    }
    document.addEventListener('keydown', function(e){ if(e.key==='Escape') closeUnlockModal(); });
    document.getElementById('unlock-proof').addEventListener('change', function(){
        if(this.files.length){
            document.getElementById('dz-filename').textContent = this.files[0].name;
            document.getElementById('dz-idle').classList.add('hidden');
            document.getElementById('dz-preview').classList.remove('hidden');
            document.getElementById('dz-preview').classList.add('flex');
        }
    });
    </script>
</x-layouts.member>
