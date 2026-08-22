<x-layouts.admin :title="$member->name">
    <x-slot name="header">
        <div>
            <a href="{{ route('admin.members.index') }}" class="text-xs font-medium text-brand-300 hover:text-brand-200">&larr; Members</a>
            <h1 class="mt-2 text-2xl font-bold text-white">{{ $member->name }}</h1>
            <p class="mt-1 text-sm text-slate-400">{{ $member->email }} @if($member->phone) · {{ $member->phone }} @endif</p>
        </div>
        <div class="flex gap-2">
            @if ($member->status !== 'approved')
                <form method="POST" action="{{ route('admin.members.approve', $member) }}">
                    @csrf
                    <button class="rounded-lg border border-emerald-400/30 bg-emerald-400/10 px-4 py-2 text-sm font-medium text-emerald-300 hover:bg-emerald-400/20">Approve Member</button>
                </form>
            @endif
        </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="card p-6 lg:col-span-2">
            <h2 class="font-semibold text-white">Payment History</h2>
            <div class="mt-4 divide-y divide-white/5">
                @forelse ($member->payments as $payment)
                    <div class="flex items-center justify-between py-3 text-sm">
                        <div>
                            <p class="text-slate-200">{{ $payment->typeLabel() }}</p>
                            <p class="text-xs text-slate-500">{{ $payment->created_at->format('M d, Y') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-medium text-white">{{ $payment->amountFormatted() }}</p>
                            <span class="badge {{ match($payment->status) {
                                'approved' => 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300',
                                'rejected' => 'border-rose-400/30 bg-rose-400/10 text-rose-300',
                                default => 'border-gold-400/30 bg-gold-400/10 text-gold-300',
                            } }}">{{ ucfirst($payment->status) }}</span>
                        </div>
                    </div>
                @empty
                    <p class="py-3 text-sm text-slate-500">No payments yet.</p>
                @endforelse
            </div>
        </div>

        <div class="space-y-6">
            <div class="card p-6">
                <h2 class="font-semibold text-white">Robot Subscriptions</h2>
                <div class="mt-3 space-y-2">
                    @forelse ($member->robotSubscriptions as $sub)
                        <div class="rounded-lg border border-white/10 bg-white/5 px-3 py-2 text-sm">
                            <p class="text-slate-200">{{ $sub->robot->name }}</p>
                            <p class="text-xs text-slate-500">Status: {{ ucfirst($sub->status) }}</p>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500">None yet.</p>
                    @endforelse
                </div>
            </div>

            <div class="card p-6">
                <h2 class="font-semibold text-white">Lesson Progress</h2>
                <p class="mt-2 text-sm text-slate-400">{{ $member->lessonProgress->where('completed', true)->count() }} lessons completed</p>
            </div>
        </div>
    </div>
</x-layouts.admin>
