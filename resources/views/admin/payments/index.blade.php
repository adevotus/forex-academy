<x-layouts.admin title="Payments">
@php
    $currency       = \App\Models\Setting::get('currency', 'USD');
    $currencySymbol = $currency === 'TZS' ? 'TZS ' : '$';
    $totalShown     = $payments->sum('amount');
@endphp
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Payments</h1>
            <p class="mt-1 text-sm text-slate-500">Approve a payment to instantly grant member access.</p>
        </div>
        {{-- Filter bar --}}
        <form method="GET" class="flex gap-2">
            <select name="status" class="input !py-2 !text-sm !w-auto" onchange="this.form.submit()">
                <option value="pending"  @selected(request('status','pending')==='pending')>⏳ Pending</option>
                <option value="approved" @selected(request('status')==='approved')>✓ Approved</option>
                <option value="rejected" @selected(request('status')==='rejected')>✕ Rejected</option>
                <option value=""         @selected(request('status')==='')>All</option>
            </select>
        </form>
    </x-slot>

    @if(session('status'))
        <div class="mb-4 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
            <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('status') }}
        </div>
    @endif

    {{-- ── Summary strip ──────────────────────────────────── --}}
    <div class="mb-5 grid grid-cols-3 gap-4">
        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-medium text-slate-500">Showing</p>
            <p class="mt-1 text-xl font-extrabold text-slate-900">{{ $payments->total() }}</p>
            <p class="text-xs text-slate-400">{{ ucfirst(request('status', 'pending')) }} payments</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-medium text-slate-500">Total (this page)</p>
            <p class="mt-1 text-xl font-extrabold text-slate-900">{{ $currencySymbol }}{{ number_format($totalShown, 0) }}</p>
            <p class="text-xs text-slate-400">{{ $payments->count() }} records</p>
        </div>
        <div class="rounded-2xl border border-emerald-100 bg-emerald-50 p-4 shadow-sm">
            <p class="text-xs font-medium text-emerald-600">All-time Revenue</p>
            <p class="mt-1 text-xl font-extrabold text-emerald-800">
                {{ $currencySymbol }}{{ number_format(\App\Models\Payment::where('status','approved')->sum('amount'), 0) }}
            </p>
            <p class="text-xs text-emerald-500">approved payments</p>
        </div>
    </div>

    {{-- ── Payment rows ──────────────────────────────────── --}}
    <div class="space-y-3">
        @forelse ($payments as $payment)
            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">

                {{-- Main row --}}
                <div class="flex flex-wrap items-center justify-between gap-4 p-5">

                    {{-- Member avatar + info --}}
                    <div class="flex items-center gap-4">
                        <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 font-bold text-sm">
                            {{ strtoupper(substr($payment->user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-semibold text-slate-900">{{ $payment->user->name }}</p>
                            <p class="text-xs text-slate-500">{{ $payment->user->email }}</p>
                        </div>
                    </div>

                    {{-- Type --}}
                    <div class="min-w-[140px]">
                        <p class="text-sm font-semibold text-slate-700">{{ $payment->typeLabel() }}</p>
                        <p class="text-xs text-slate-400 mt-0.5">{{ $payment->created_at->format('d M Y, H:i') }}</p>
                        @if($payment->description)
                            <p class="text-xs text-slate-400 mt-0.5 italic">{{ Str::limit($payment->description, 50) }}</p>
                        @endif
                    </div>

                    {{-- Amount --}}
                    <div class="text-right">
                        <p class="text-xl font-extrabold text-slate-900">{{ $payment->amountFormatted() }}</p>
                        <p class="text-xs text-slate-400 mt-0.5">{{ $payment->created_at->diffForHumans() }}</p>
                    </div>

                    {{-- Status badge --}}
                    <span class="badge text-xs {{ match($payment->status) {
                        'approved' => 'border-emerald-200 bg-emerald-50 text-emerald-700',
                        'rejected' => 'border-rose-200 bg-rose-50 text-rose-700',
                        default    => 'border-gold-200 bg-gold-50 text-gold-700',
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
                    @endif
                </div>

                {{-- Proof strip (if any) --}}
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

                {{-- Admin note (if approved/rejected) --}}
                @if($payment->admin_note)
                    <div class="border-t border-slate-100 bg-slate-50 px-5 py-2.5">
                        <p class="text-xs text-slate-500"><span class="font-semibold">Admin note:</span> {{ $payment->admin_note }}</p>
                    </div>
                @endif

            </div>
        @empty
            <div class="flex flex-col items-center gap-3 rounded-2xl border border-slate-200 bg-white py-16 text-center shadow-sm">
                <svg class="h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/>
                </svg>
                <p class="text-sm font-semibold text-slate-500">Nothing to review right now.</p>
                <p class="text-xs text-slate-400">Pending payments will appear here when members submit proof.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-6">{{ $payments->links() }}</div>
</x-layouts.admin>
