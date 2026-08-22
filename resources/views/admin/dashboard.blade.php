<x-layouts.admin title="Overview">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Admin Overview</h1>
            <p class="mt-1 text-sm text-slate-500">EMMIOXFOREX ACADEMY platform snapshot.</p>
        </div>
    </x-slot>

    {{-- ── Stat Cards ── --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">

        <div class="card p-5">
            <div class="flex items-center gap-4">
                <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-brand-50 ring-1 ring-brand-100 text-brand-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500">Total Members</p>
                    <p class="text-2xl font-extrabold text-slate-900">{{ $stats['total_members'] }}</p>
                </div>
            </div>
        </div>

        <div class="card p-5">
            <div class="flex items-center gap-4">
                <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-gold-50 ring-1 ring-gold-100 text-gold-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500">Pending Approval</p>
                    <p class="text-2xl font-extrabold text-slate-900">{{ $stats['pending_members'] }}</p>
                </div>
            </div>
        </div>

        <div class="card p-5">
            <div class="flex items-center gap-4">
                <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-rose-50 ring-1 ring-rose-100 text-rose-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500">Pending Payments</p>
                    <p class="text-2xl font-extrabold text-slate-900">{{ $stats['pending_payments'] }}</p>
                </div>
            </div>
        </div>

        <div class="card p-5">
            <div class="flex items-center gap-4">
                <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-emerald-50 ring-1 ring-emerald-100 text-emerald-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500">Total Revenue</p>
                    <p class="text-2xl font-extrabold text-slate-900">${{ number_format($stats['total_revenue'] / 100, 2) }}</p>
                </div>
            </div>
        </div>

    </div>

    {{-- ── Content counts ── --}}
    <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3">

        <a href="{{ route('admin.courses.index') }}"
           class="card group flex items-center gap-4 p-5 transition hover:border-brand-300 hover:shadow-md">
            <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition group-hover:bg-brand-600 group-hover:text-white group-hover:ring-brand-600">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500">Courses</p>
                <p class="text-2xl font-extrabold text-slate-900">{{ $stats['courses'] }}</p>
            </div>
        </a>

        <a href="{{ route('admin.robots.index') }}"
           class="card group flex items-center gap-4 p-5 transition hover:border-gold-300 hover:shadow-md">
            <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-gold-50 text-gold-600 ring-1 ring-gold-100 transition group-hover:bg-gold-500 group-hover:text-white group-hover:ring-gold-500">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><path d="M8 21h8m-4-4v4"/></svg>
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500">Robots / EAs</p>
                <p class="text-2xl font-extrabold text-slate-900">{{ $stats['robots'] }}</p>
            </div>
        </a>

        <a href="{{ route('admin.signals.index') }}"
           class="card group flex items-center gap-4 p-5 transition hover:border-emerald-300 hover:shadow-md">
            <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 ring-1 ring-emerald-100 transition group-hover:bg-emerald-600 group-hover:text-white group-hover:ring-emerald-600">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500">Signals Published</p>
                <p class="text-2xl font-extrabold text-slate-900">{{ $stats['signals'] }}</p>
            </div>
        </a>

    </div>

    {{-- ── Recent activity ── --}}
    <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">

        {{-- Recent Payments --}}
        <div class="card overflow-hidden">
            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                <h2 class="font-extrabold text-slate-900">Recent Payments</h2>
                <a href="{{ route('admin.payments.index') }}"
                   class="text-xs font-semibold text-brand-600 hover:text-brand-700">View all &rarr;</a>
            </div>
            <div class="divide-y divide-slate-100">
                @forelse ($recentPayments as $payment)
                    <div class="flex items-center justify-between px-6 py-3.5">
                        <div>
                            <p class="text-sm font-semibold text-slate-900">{{ $payment->user->name }}</p>
                            <p class="text-xs text-slate-500">{{ $payment->typeLabel() }}</p>
                        </div>
                        <span class="badge {{
                            match($payment->status) {
                                'approved' => 'border-emerald-200 bg-emerald-50 text-emerald-700',
                                'rejected' => 'border-rose-200 bg-rose-50 text-rose-700',
                                default    => 'border-gold-200 bg-gold-50 text-gold-700',
                            }
                        }}">{{ ucfirst($payment->status) }}</span>
                    </div>
                @empty
                    <p class="px-6 py-8 text-center text-sm text-slate-400">No payments yet.</p>
                @endforelse
            </div>
        </div>

        {{-- Recent Members --}}
        <div class="card overflow-hidden">
            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                <h2 class="font-extrabold text-slate-900">Recent Members</h2>
                <a href="{{ route('admin.members.index') }}"
                   class="text-xs font-semibold text-brand-600 hover:text-brand-700">View all &rarr;</a>
            </div>
            <div class="divide-y divide-slate-100">
                @forelse ($recentMembers as $member)
                    <div class="flex items-center gap-3 px-6 py-3.5">
                        <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-slate-100 text-sm font-bold text-slate-600">
                            {{ strtoupper(substr($member->name, 0, 1)) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="truncate text-sm font-semibold text-slate-900">{{ $member->name }}</p>
                            <p class="truncate text-xs text-slate-500">{{ $member->email }}</p>
                        </div>
                        <span class="badge {{ $member->status === 'approved'
                            ? 'border-emerald-200 bg-emerald-50 text-emerald-700'
                            : 'border-gold-200 bg-gold-50 text-gold-700' }}">
                            {{ ucfirst($member->status) }}
                        </span>
                    </div>
                @empty
                    <p class="px-6 py-8 text-center text-sm text-slate-400">No members yet.</p>
                @endforelse
            </div>
        </div>

    </div>
</x-layouts.admin>
