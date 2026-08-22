<x-layouts.admin title="Payments">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-bold text-white">Payments</h1>
            <p class="mt-1 text-sm text-slate-400">Approve a payment to instantly grant the member access.</p>
        </div>
        <form method="GET" class="flex gap-2">
            <select name="status" class="input !py-2 !text-sm !w-auto" onchange="this.form.submit()">
                <option value="pending" @selected(request('status', 'pending')==='pending')>Pending</option>
                <option value="approved" @selected(request('status')==='approved')>Approved</option>
                <option value="rejected" @selected(request('status')==='rejected')>Rejected</option>
            </select>
        </form>
    </x-slot>

    <div class="space-y-4">
        @forelse ($payments as $payment)
            <div class="card flex flex-wrap items-center justify-between gap-4 p-5">
                <div class="flex items-center gap-4">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-500/15 text-brand-300">
                        <x-icon name="card" class="h-5 w-5" />
                    </div>
                    <div>
                        <p class="font-medium text-white">{{ $payment->user->name }}</p>
                        <p class="text-xs text-slate-500">{{ $payment->user->email }}</p>
                    </div>
                </div>

                <div>
                    <p class="text-sm text-slate-300">{{ $payment->typeLabel() }}</p>
                    @if ($payment->payable)
                        <p class="text-xs text-slate-500">{{ $payment->payable->name ?? $payment->payable->title ?? '' }}</p>
                    @endif
                </div>

                <div class="text-right">
                    <p class="font-semibold text-white">{{ $payment->amountFormatted() }}</p>
                    <p class="text-xs text-slate-500">{{ $payment->created_at->diffForHumans() }}</p>
                </div>

                <span class="badge {{ match($payment->status) {
                    'approved' => 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300',
                    'rejected' => 'border-rose-400/30 bg-rose-400/10 text-rose-300',
                    default => 'border-gold-400/30 bg-gold-400/10 text-gold-300',
                } }}">{{ ucfirst($payment->status) }}</span>

                @if ($payment->status === 'pending')
                    <div class="flex gap-2">
                        <form method="POST" action="{{ route('admin.payments.approve', $payment) }}">
                            @csrf
                            <button class="rounded-lg border border-emerald-400/30 bg-emerald-400/10 px-4 py-2 text-xs font-semibold text-emerald-300 hover:bg-emerald-400/20">Approve</button>
                        </form>
                        <form method="POST" action="{{ route('admin.payments.reject', $payment) }}">
                            @csrf
                            <button class="rounded-lg border border-rose-400/30 bg-rose-400/10 px-4 py-2 text-xs font-semibold text-rose-300 hover:bg-rose-400/20">Reject</button>
                        </form>
                    </div>
                @endif
            </div>
        @empty
            <div class="card p-10 text-center text-slate-500">Nothing to review right now.</div>
        @endforelse
    </div>

    <div class="mt-6">{{ $payments->links() }}</div>
</x-layouts.admin>
