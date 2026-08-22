<x-layouts.member title="Billing">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-bold text-white">Billing & Payment History</h1>
            <p class="mt-1 text-sm text-slate-400">Every unlock request you've made and its approval status.</p>
        </div>
    </x-slot>

    <div class="card overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-white/10 text-xs uppercase tracking-wider text-slate-500">
                    <th class="px-6 py-3">Item</th>
                    <th class="px-6 py-3">Amount</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse ($payments as $payment)
                    <tr>
                        <td class="px-6 py-4 text-slate-200">{{ $payment->typeLabel() }}</td>
                        <td class="px-6 py-4 font-medium text-white">{{ $payment->amountFormatted() }}</td>
                        <td class="px-6 py-4">
                            <span class="badge {{ match($payment->status) {
                                'approved' => 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300',
                                'rejected' => 'border-rose-400/30 bg-rose-400/10 text-rose-300',
                                default => 'border-gold-400/30 bg-gold-400/10 text-gold-300',
                            } }}">{{ ucfirst($payment->status) }}</span>
                        </td>
                        <td class="px-6 py-4 text-slate-500">{{ $payment->created_at->format('M d, Y') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-8 text-center text-slate-500">No payment activity yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.member>
