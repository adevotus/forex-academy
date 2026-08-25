<x-layouts.admin title="Payments">
@php
    $currency       = \App\Models\Setting::get('currency', 'USD');
    $currencySymbol = $currency === 'TZS' ? 'TZS ' : '$';
    $totalShown     = $payments->sum('amount');
    $activeStatus   = request('status', '');
    $activeType     = request('type', '');
@endphp

    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Payments</h1>
            <p class="mt-1 text-sm text-slate-500">Manage and review all member payments.</p>
        </div>

        {{-- Export button --}}
        <a href="{{ route('admin.payments.export', request()->query()) }}"
           class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50 transition">
            <svg class="h-4 w-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
            Export CSV
        </a>
    </x-slot>

    @if(session('status'))
        <div class="mb-4 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
            <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('status') }}
        </div>
    @endif

    {{-- ── Stats strip ── --}}
    <div class="mb-5 grid grid-cols-2 gap-3 sm:grid-cols-4">
        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-medium text-slate-500">All Payments</p>
            <p class="mt-1 text-2xl font-extrabold text-slate-900">{{ number_format($stats['all']) }}</p>
        </div>
        <div class="rounded-2xl border border-amber-100 bg-amber-50 p-4 shadow-sm">
            <p class="text-xs font-medium text-amber-600">Pending</p>
            <p class="mt-1 text-2xl font-extrabold text-amber-800">{{ number_format($stats['pending']) }}</p>
        </div>
        <div class="rounded-2xl border border-emerald-100 bg-emerald-50 p-4 shadow-sm">
            <p class="text-xs font-medium text-emerald-600">Approved</p>
            <p class="mt-1 text-2xl font-extrabold text-emerald-800">{{ number_format($stats['approved']) }}</p>
        </div>
        <div class="rounded-2xl border border-emerald-100 bg-emerald-50 p-4 shadow-sm">
            <p class="text-xs font-medium text-emerald-600">All-time Revenue</p>
            <p class="mt-1 text-2xl font-extrabold text-emerald-800">{{ $currencySymbol }}{{ number_format($stats['revenue'], 0) }}</p>
        </div>
    </div>

    {{-- ── Filter bar ── --}}
    <form method="GET" class="mb-5 flex flex-wrap items-center gap-3">

        {{-- Search --}}
        <div class="relative flex-1 min-w-[180px]">
            <svg class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name or email…"
                   class="input pl-9 !py-2 !text-sm w-full">
        </div>

        {{-- Status filter --}}
        <select name="status" class="input !py-2 !text-sm !w-auto" onchange="this.form.submit()">
            <option value=""         @selected($activeStatus === '')>All Statuses</option>
            <option value="pending"  @selected($activeStatus === 'pending')>⏳ Pending</option>
            <option value="approved" @selected($activeStatus === 'approved')>✓ Approved</option>
            <option value="rejected" @selected($activeStatus === 'rejected')>✕ Rejected</option>
        </select>

        {{-- Type filter --}}
        <select name="type" class="input !py-2 !text-sm !w-auto" onchange="this.form.submit()">
            <option value=""                   @selected($activeType === '')>All Types</option>
            <option value="registration"       @selected($activeType === 'registration')>Registration Fee</option>
            <option value="course"             @selected($activeType === 'course')>Course Unlock</option>
            <option value="robot"              @selected($activeType === 'robot')>Robot / EA</option>
            <option value="signal_subscription"@selected($activeType === 'signal_subscription')>Signal Subscription</option>
            <option value="mentorship"         @selected($activeType === 'mentorship')>Mentorship</option>
        </select>

        <button type="submit" class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition shadow-sm">Search</button>

        @if(request()->hasAny(['search','status','type']))
            <a href="{{ route('admin.payments.index') }}" class="text-xs font-medium text-slate-400 hover:text-slate-600 transition">✕ Clear</a>
        @endif
    </form>

    {{-- Page-level count --}}
    <p class="mb-3 text-xs text-slate-400">
        Showing {{ $payments->firstItem() }}–{{ $payments->lastItem() }} of {{ $payments->total() }} payments
        &nbsp;·&nbsp; Page total: <span class="font-semibold text-slate-700">{{ $currencySymbol }}{{ number_format($totalShown, 0) }}</span>
    </p>

    {{-- ── Payment rows ── --}}
    <div class="space-y-3">
        @forelse ($payments as $payment)
            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">

                {{-- Main row --}}
                <div class="flex flex-wrap items-center justify-between gap-4 p-5">

                    {{-- Member avatar + info --}}
                    <div class="flex items-center gap-4 min-w-[180px]">
                        <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 font-bold text-sm">
                            {{ strtoupper(substr($payment->user->name ?? '?', 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-semibold text-slate-900">{{ $payment->user->name }}</p>
                            <p class="text-xs text-slate-500">{{ $payment->user->email }}</p>
                        </div>
                    </div>

                    {{-- Type + date --}}
                    <div class="min-w-[160px]">
                        <span class="inline-block rounded-full px-2.5 py-0.5 text-[11px] font-semibold
                            {{ match($payment->type) {
                                'registration' => 'bg-blue-50 text-blue-700 border border-blue-200',
                                'course'       => 'bg-purple-50 text-purple-700 border border-purple-200',
                                'robot'        => 'bg-indigo-50 text-indigo-700 border border-indigo-200',
                                'mentorship'   => 'bg-pink-50 text-pink-700 border border-pink-200',
                                default        => 'bg-slate-50 text-slate-700 border border-slate-200',
                            } }}">
                            {{ $payment->typeLabel() }}
                        </span>
                        <p class="text-xs text-slate-400 mt-1">{{ $payment->created_at->format('d M Y, H:i') }}</p>
                    </div>

                    {{-- Amount --}}
                    <div class="text-right">
                        <p class="text-xl font-extrabold text-slate-900">{{ $payment->amountFormatted() }}</p>
                        <p class="text-xs text-slate-400 mt-0.5">{{ $payment->created_at->diffForHumans() }}</p>
                        @if($payment->status === 'pending')
                            <button type="button"
                                onclick="toggleEditAmount('edit-{{ $payment->id }}')"
                                class="mt-1 text-[10px] font-semibold text-blue-500 hover:text-blue-700 underline underline-offset-2">
                                Edit amount
                            </button>
                        @endif
                    </div>

                    {{-- Status badge --}}
                    <span class="rounded-full border px-3 py-1 text-xs font-semibold {{ match($payment->status) {
                        'approved' => 'border-emerald-200 bg-emerald-50 text-emerald-700',
                        'rejected' => 'border-rose-200 bg-rose-50 text-rose-700',
                        default    => 'border-amber-200 bg-amber-50 text-amber-700',
                    } }}">{{ ucfirst($payment->status) }}</span>

                    {{-- Actions --}}
                    @if ($payment->status === 'pending')
                        <div class="flex gap-2">
                            <form method="POST" action="{{ route('admin.payments.approve', $payment) }}">
                                @csrf
                                <button class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-2 text-xs font-bold text-emerald-700 transition hover:bg-emerald-100 active:scale-95">
                                    ✓ Approve
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.payments.reject', $payment) }}">
                                @csrf
                                <button class="rounded-xl border border-rose-200 bg-rose-50 px-4 py-2 text-xs font-bold text-rose-700 transition hover:bg-rose-100 active:scale-95">
                                    ✕ Reject
                                </button>
                            </form>
                        </div>
                    @elseif($payment->status === 'approved')
                        <div class="flex items-center gap-1.5 text-xs text-emerald-600">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Approved {{ $payment->approved_at?->diffForHumans() }}
                        </div>
                    @elseif($payment->status === 'rejected')
                        <div class="flex items-center gap-1.5 text-xs text-rose-500">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Rejected
                        </div>
                    @endif
                </div>

                {{-- Proof strip --}}
                @if($payment->proof_path ?? false)
                    <div class="flex items-center gap-3 border-t border-slate-100 bg-slate-50 px-5 py-2.5">
                        <svg class="h-3.5 w-3.5 flex-shrink-0 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                        </svg>
                        <a href="{{ asset('storage/'.$payment->proof_path) }}" target="_blank"
                           class="text-xs font-semibold text-brand-600 hover:underline">
                            View payment proof ↗
                        </a>
                        <span class="ml-auto text-xs text-slate-400">Uploaded {{ $payment->created_at->diffForHumans() }}</span>
                    </div>
                @endif

                {{-- Inline edit amount (pending only) --}}
                @if($payment->status === 'pending')
                    <div id="edit-{{ $payment->id }}" class="hidden border-t border-blue-100 bg-blue-50 px-5 py-3">
                        <form method="POST" action="{{ route('admin.payments.amount', $payment) }}" class="flex items-center gap-3">
                            @csrf
                            @method('PATCH')
                            <label class="text-xs font-semibold text-blue-800">Correct Amount:</label>
                            <div class="flex items-center gap-1.5 rounded-lg border border-blue-200 bg-white px-3 py-1.5">
                                <span class="text-xs font-semibold text-slate-400">{{ $payment->currencySymbol() }}</span>
                                <input type="number" name="amount" step="0.01" min="1"
                                    value="{{ $payment->amount }}"
                                    class="w-28 text-sm font-bold text-slate-900 outline-none">
                            </div>
                            <button type="submit" class="rounded-lg bg-blue-600 px-4 py-1.5 text-xs font-bold text-white hover:bg-blue-700 transition">
                                Save
                            </button>
                            <button type="button" onclick="toggleEditAmount('edit-{{ $payment->id }}')"
                                class="text-xs font-medium text-slate-500 hover:text-slate-700">
                                Cancel
                            </button>
                        </form>
                    </div>
                @endif

                {{-- Admin note --}}
                @if($payment->admin_note)
                    <div class="border-t border-slate-100 bg-slate-50 px-5 py-2.5">
                        <p class="text-xs text-slate-500"><span class="font-semibold">Admin note:</span> {{ $payment->admin_note }}</p>
                    </div>
                @endif

            </div>
        @empty
            <div class="flex flex-col items-center gap-3 rounded-2xl border border-slate-200 bg-white py-16 text-center shadow-sm">
                <svg class="h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
                <p class="text-sm font-semibold text-slate-500">No payments found.</p>
                <p class="text-xs text-slate-400">Try adjusting the filters above.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-6">{{ $payments->links() }}</div>

</x-layouts.admin>

<script>
function toggleEditAmount(id) {
    const el = document.getElementById(id);
    if (el) el.classList.toggle('hidden');
}
</script>
