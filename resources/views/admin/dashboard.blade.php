<x-layouts.admin title="Overview">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-bold text-white">Admin Overview</h1>
            <p class="mt-1 text-sm text-slate-400">EMMIOXFOREX ACADEMY platform snapshot.</p>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ([
            ['users', 'Total Members', $stats['total_members'], 'bg-brand-400/10 text-brand-300'],
            ['clock', 'Pending Approval', $stats['pending_members'], 'bg-gold-400/10 text-gold-300'],
            ['card', 'Pending Payments', $stats['pending_payments'], 'bg-rose-400/10 text-rose-300'],
            ['sparkles', 'Total Revenue', '$'.number_format($stats['total_revenue']/100, 2), 'bg-emerald-400/10 text-emerald-300'],
        ] as [$icon, $label, $value, $colorClasses])
            <div class="card p-5">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg {{ $colorClasses }}"><x-icon :name="$icon" class="h-5 w-5" /></div>
                    <div>
                        <p class="text-xs text-slate-500">{{ $label }}</p>
                        <p class="text-xl font-bold text-white">{{ $value }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-3">
        <a href="{{ route('admin.courses.index') }}" class="card p-5 hover:border-brand-400/30">
            <p class="text-xs text-slate-500">Courses</p>
            <p class="text-2xl font-bold text-white">{{ $stats['courses'] }}</p>
        </a>
        <a href="{{ route('admin.robots.index') }}" class="card p-5 hover:border-brand-400/30">
            <p class="text-xs text-slate-500">Robots / EAs</p>
            <p class="text-2xl font-bold text-white">{{ $stats['robots'] }}</p>
        </a>
        <a href="{{ route('admin.signals.index') }}" class="card p-5 hover:border-brand-400/30">
            <p class="text-xs text-slate-500">Signals Published</p>
            <p class="text-2xl font-bold text-white">{{ $stats['signals'] }}</p>
        </a>
    </div>

    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">
        <div class="card p-6">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-white">Recent Payments</h2>
                <a href="{{ route('admin.payments.index') }}" class="text-xs font-medium text-brand-300 hover:text-brand-200">View all &rarr;</a>
            </div>
            <div class="mt-4 space-y-3">
                @forelse ($recentPayments as $payment)
                    <div class="flex items-center justify-between rounded-lg border border-white/10 bg-white/5 px-4 py-3 text-sm">
                        <div>
                            <p class="text-slate-200">{{ $payment->user->name }}</p>
                            <p class="text-xs text-slate-500">{{ $payment->typeLabel() }}</p>
                        </div>
                        <span class="badge {{ match($payment->status) {
                            'approved' => 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300',
                            'rejected' => 'border-rose-400/30 bg-rose-400/10 text-rose-300',
                            default => 'border-gold-400/30 bg-gold-400/10 text-gold-300',
                        } }}">{{ ucfirst($payment->status) }}</span>
                    </div>
                @empty
                    <p class="text-sm text-slate-500">No payments yet.</p>
                @endforelse
            </div>
        </div>

        <div class="card p-6">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-white">Recent Members</h2>
                <a href="{{ route('admin.members.index') }}" class="text-xs font-medium text-brand-300 hover:text-brand-200">View all &rarr;</a>
            </div>
            <div class="mt-4 space-y-3">
                @forelse ($recentMembers as $member)
                    <div class="flex items-center justify-between rounded-lg border border-white/10 bg-white/5 px-4 py-3 text-sm">
                        <div>
                            <p class="text-slate-200">{{ $member->name }}</p>
                            <p class="text-xs text-slate-500">{{ $member->email }}</p>
                        </div>
                        <span class="badge {{ $member->status === 'approved' ? 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300' : 'border-gold-400/30 bg-gold-400/10 text-gold-300' }}">
                            {{ ucfirst($member->status) }}
                        </span>
                    </div>
                @empty
                    <p class="text-sm text-slate-500">No members yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.admin>
