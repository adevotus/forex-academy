<x-layouts.admin title="Payments">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Payments</h1>
            <p class="mt-1 text-sm text-slate-500">Approve a payment to instantly grant member access.</p>
        </div>
        <form method="GET" class="flex gap-2">
            <select name="status" class="input !py-2 !text-sm !w-auto" onchange="this.form.submit()">
                <option value="pending"  @selected(request('status','pending')==='pending')>Pending</option>
                <option value="approved" @selected(request('status')==='approved')>Approved</option>
                <option value="rejected" @selected(request('status')==='rejected')>Rejected</option>
            </select>
        </form>
    </x-slot>

    <div class="space-y-3">
        @forelse ($payments as $payment)
            <div class="card p-5">
                <div class="flex flex-wrap items-center justify-between gap-4">

                    {{-- Member info --}}
                    <div class="flex items-center gap-4">
                        <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 font-bold text-sm">
                            {{ strtoupper(substr($payment->user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-semibold text-slate-900">{{ $payment->user->name }}</p>
                            <p class="text-xs text-slate-500">{{ $payment->user->email }}</p>
                        </div>
                    </div>

                    {{-- Payment type --}}
                    <div class="min-w-[140px]">
                        <p class="text-sm font-medium text-slate-700">{{ $payment->typeLabel() }}</p>
                        @if ($payment->payable)
                            <p class="text-xs text-slate-400 mt-0.5">{{ $payment->payable->name ?? $payment->payable->title ?? '' }}</p>
                        @endif
                    </div>

                    {{-- Amount & time --}}
                    <div class="text-right">
                        <p class="text-lg font-extrabold text-slate-900">{{ $payment->amountFormatted() }}</p>
                        <p class="text-xs text-slate-400 mt-0.5">{{ $payment->created_at->diffForHumans() }}</p>
                    </div>

                    {{-- Status badge --}}
                    <span class="badge {{ match($payment->status) {
                        'approved' => 'border-emerald-200 bg-emerald-50 text-emerald-700',
                        'rejected' => 'border-rose-200 bg-rose-50 text-rose-700',
                        default    => 'border-gold-200 bg-gold-50 text-gold-700',
                    } }}">{{ ucfirst($payment->status) }}</span>

                    {{-- Actions --}}
                    @if ($payment->status === 'pending')
                        <div class="flex gap-2">
                            <form method="POST" action="{{ route('admin.payments.approve', $payment) }}">
                                @csrf
                                <button class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-2 text-xs font-semibold text-emerald-700 hover:bg-emerald-100 transition">
                                    ✓ Approve
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.payments.reject', $payment) }}">
                                @csrf
                                <button class="rounded-lg border border-rose-200 bg-rose-50 px-4 py-2 text-xs font-semibold text-rose-700 hover:bg-rose-100 transition">
                                    ✕ Reject
                                </button>
                            </form>
                        </div>
                    @endif

                </div>

                {{-- Proof / note if any --}}
                @if($payment->proof_path ?? false)
                    <div class="mt-3 flex items-center gap-2 rounded-lg border border-slate-100 bg-slate-50 px-4 py-2">
                        <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                        <a href="{{ asset('storage/'.$payment->proof_path) }}" target="_blank"
                           class="text-xs font-medium text-brand-600 hover:underline">View payment proof</a>
                    </div>
                @endif
            </div>
        @empty
            <div class="card flex flex-col items-center gap-3 py-16 text-center">
                <svg class="h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                <p class="text-sm font-medium text-slate-500">Nothing to review right now.</p>
                <p class="text-xs text-slate-400">Pending payments will appear here.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-6">{{ $payments->links() }}</div>
</x-layouts.admin>
