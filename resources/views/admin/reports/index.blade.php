<x-layouts.admin title="Reports">
    <x-slot name="header">
        <div>
            <h1 class="text-lg font-bold text-slate-900">Reports & Analytics</h1>
            <p class="text-xs text-slate-500">Revenue, visitor trends, predictions and payment breakdown.</p>
        </div>

        {{-- Period filter --}}
        <div class="flex items-center gap-1 rounded-xl border border-slate-200 bg-slate-50 p-1">
            @foreach([3 => '3 Months', 6 => '6 Months', 12 => '12 Months'] as $val => $label)
                <a href="{{ request()->fullUrlWithQuery(['period' => $val]) }}"
                   class="rounded-lg px-4 py-1.5 text-sm font-semibold transition
                          {{ $period == $val ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </x-slot>

    @php
        $fmtMoney = fn($cents) => '$'.number_format($cents / 100, 2);
        $allLabels   = array_merge($labels, $predictLabels);
        $revHistory  = array_merge($revenueData,       array_fill(0, 3, null));
        $revPredict  = array_merge(array_fill(0, count($revenueData), null), $revenuePredict);
        $regHistory  = array_merge($registrationData,  array_fill(0, 3, null));
        $regPredict  = array_merge(array_fill(0, count($registrationData), null), $registrationPredict);
        $visHistory  = array_merge($visitData,         array_fill(0, 3, null));
        $visPredict  = array_merge(array_fill(0, count($visitData), null), $visitPredict);
        $uniqHistory = array_merge($uniqueVisitData,   array_fill(0, 3, null));
    @endphp

    {{-- ════════════════════════════════
         KPI CARDS
    ════════════════════════════════ --}}
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-2 lg:grid-cols-4 mb-8">

        {{-- Total Revenue --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Total Revenue</p>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-50">
                    <svg class="h-4 w-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <p class="text-2xl font-extrabold text-slate-900">{{ $fmtMoney($totalRevenue) }}</p>
            <p class="mt-1 text-xs text-slate-400">This month: <span class="font-semibold text-emerald-600">{{ $fmtMoney($thisMonthRevenue) }}</span></p>
        </div>

        {{-- Payments --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Payments</p>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50">
                    <svg class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                </div>
            </div>
            <p class="text-2xl font-extrabold text-slate-900">{{ $approvedPayments }}</p>
            <p class="mt-1 text-xs text-slate-400">
                <span class="font-semibold text-amber-500">{{ $pendingPayments }} pending</span>
                &nbsp;·&nbsp;
                <span class="text-rose-500">{{ $rejectedPayments }} rejected</span>
            </p>
        </div>

        {{-- Members --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Members</p>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-violet-50">
                    <svg class="h-4 w-4 text-violet-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
            </div>
            <p class="text-2xl font-extrabold text-slate-900">{{ $totalMembers }}</p>
            <p class="mt-1 text-xs text-slate-400">Active: <span class="font-semibold text-violet-600">{{ $activeMembers }}</span> &nbsp;·&nbsp; New this month: <span class="font-semibold">{{ $newThisMonth }}</span></p>
        </div>

        {{-- Site Visits --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Site Visits</p>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50">
                    <svg class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
            </div>
            <p class="text-2xl font-extrabold text-slate-900">{{ number_format(array_sum($visitData)) }}</p>
            <p class="mt-1 text-xs text-slate-400">Unique: <span class="font-semibold text-amber-600">{{ number_format(array_sum($uniqueVisitData)) }}</span> in last {{ $period }} months</p>
        </div>
    </div>

    {{-- ════════════════════════════════
         REVENUE CHART
    ════════════════════════════════ --}}
    <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-4 flex items-center justify-between flex-wrap gap-3">
            <div>
                <h2 class="text-sm font-bold text-slate-900">Revenue Trend</h2>
                <p class="text-xs text-slate-400">Monthly approved payments · dashed = predicted</p>
            </div>
            <div class="flex items-center gap-4 text-xs text-slate-500">
                <span class="flex items-center gap-1.5"><span class="inline-block h-2 w-6 rounded bg-emerald-500"></span>Actual</span>
                <span class="flex items-center gap-1.5"><span class="inline-block h-2 w-6 rounded border-2 border-dashed border-emerald-300 bg-transparent"></span>Predicted</span>
            </div>
        </div>
        <div class="relative h-64">
            <canvas id="revenueChart"></canvas>
        </div>
    </div>

    {{-- ════════════════════════════════
         REGISTRATIONS + VISITS CHARTS
    ════════════════════════════════ --}}
    <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-2">

        {{-- Registrations --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mb-4">
                <h2 class="text-sm font-bold text-slate-900">New Member Registrations</h2>
                <p class="text-xs text-slate-400">Monthly sign-ups · dashed = predicted</p>
            </div>
            <div class="relative h-52">
                <canvas id="registrationsChart"></canvas>
            </div>
        </div>

        {{-- Site Visitors --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mb-4">
                <h2 class="text-sm font-bold text-slate-900">Site Visitor Traffic</h2>
                <p class="text-xs text-slate-400">Total vs unique visits · dashed = predicted</p>
            </div>
            <div class="relative h-52">
                <canvas id="visitsChart"></canvas>
            </div>
        </div>
    </div>

    {{-- ════════════════════════════════
         BREAKDOWN DOUGHNUTS
    ════════════════════════════════ --}}
    <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-2">

        {{-- Payment by type --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="mb-4 text-sm font-bold text-slate-900">Revenue by Payment Type</h2>
            <div class="flex items-center gap-6">
                <div class="relative h-44 w-44 flex-shrink-0">
                    <canvas id="paymentTypeChart"></canvas>
                </div>
                <div class="flex-1 space-y-2">
                    @php
                        $typeColors = ['registration'=>'#6366f1','course'=>'#10b981','robot'=>'#f59e0b','signal_subscription'=>'#3b82f6','mentorship'=>'#a855f7'];
                        $typeTotal  = $paymentByType->sum('total') ?: 1;
                    @endphp
                    @foreach($paymentByType as $pt)
                        <div class="flex items-center justify-between gap-2">
                            <div class="flex items-center gap-2 min-w-0">
                                <span class="h-2.5 w-2.5 flex-shrink-0 rounded-full" style="background:{{ $typeColors[$pt->type] ?? '#94a3b8' }}"></span>
                                <span class="truncate text-xs text-slate-600 capitalize">{{ str_replace('_', ' ', $pt->type) }}</span>
                            </div>
                            <div class="text-right flex-shrink-0">
                                <span class="text-xs font-semibold text-slate-800">{{ $fmtMoney($pt->total) }}</span>
                                <span class="ml-1 text-xs text-slate-400">({{ round($pt->total / $typeTotal * 100) }}%)</span>
                            </div>
                        </div>
                    @endforeach
                    @if($paymentByType->isEmpty())
                        <p class="text-xs text-slate-400">No approved payments yet.</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Member status --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="mb-4 text-sm font-bold text-slate-900">Member Status Breakdown</h2>
            <div class="flex items-center gap-6">
                <div class="relative h-44 w-44 flex-shrink-0">
                    <canvas id="memberStatusChart"></canvas>
                </div>
                <div class="flex-1 space-y-2">
                    @php
                        $statusColors = ['approved'=>'#10b981','pending'=>'#f59e0b','suspended'=>'#ef4444'];
                        $memberTotal  = $memberStatuses->sum('count') ?: 1;
                    @endphp
                    @foreach($memberStatuses as $ms)
                        <div class="flex items-center justify-between gap-2">
                            <div class="flex items-center gap-2">
                                <span class="h-2.5 w-2.5 rounded-full flex-shrink-0" style="background:{{ $statusColors[$ms->status] ?? '#94a3b8' }}"></span>
                                <span class="text-xs text-slate-600 capitalize">{{ $ms->status }}</span>
                            </div>
                            <div class="text-right">
                                <span class="text-xs font-semibold text-slate-800">{{ $ms->count }}</span>
                                <span class="ml-1 text-xs text-slate-400">({{ round($ms->count / $memberTotal * 100) }}%)</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- ════════════════════════════════
         PREDICTIONS SUMMARY
    ════════════════════════════════ --}}
    <div class="mb-6 rounded-2xl border border-indigo-100 bg-indigo-50 p-6">
        <div class="mb-4 flex items-center gap-2">
            <svg class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
            </svg>
            <h2 class="text-sm font-bold text-indigo-900">Trend Predictions — Next 3 Months</h2>
            <span class="rounded-full bg-indigo-100 px-2 py-0.5 text-[10px] font-semibold text-indigo-600 ring-1 ring-indigo-200">Linear regression</span>
        </div>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            @foreach($predictLabels as $i => $pLabel)
                <div class="rounded-xl border border-indigo-200 bg-white p-4">
                    <p class="text-xs font-semibold text-indigo-400 uppercase tracking-wide mb-3">{{ $pLabel }}</p>
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="flex items-center gap-1.5 text-xs text-slate-500">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>Revenue
                            </span>
                            <span class="text-sm font-bold text-slate-800">${{ number_format($revenuePredict[$i] ?? 0, 2) }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="flex items-center gap-1.5 text-xs text-slate-500">
                                <span class="h-1.5 w-1.5 rounded-full bg-violet-500"></span>Sign-ups
                            </span>
                            <span class="text-sm font-bold text-slate-800">{{ number_format($registrationPredict[$i] ?? 0) }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="flex items-center gap-1.5 text-xs text-slate-500">
                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>Visits
                            </span>
                            <span class="text-sm font-bold text-slate-800">{{ number_format($visitPredict[$i] ?? 0) }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <p class="mt-3 text-xs text-indigo-400">Predictions are based on linear regression of historical data. Actual results may vary.</p>
    </div>

    {{-- ════════════════════════════════
         RECENT PAYMENTS TABLE
    ════════════════════════════════ --}}
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 px-6 py-4">
            <h2 class="text-sm font-bold text-slate-900">Recent Payments</h2>
            <form method="GET" action="{{ route('admin.reports') }}" class="flex flex-wrap items-center gap-2">
                <input type="hidden" name="period" value="{{ $period }}">
                <select name="status" onchange="this.form.submit()"
                        class="rounded-lg border border-slate-200 bg-slate-50 px-3 py-1.5 text-xs font-medium text-slate-600 focus:outline-none focus:ring-2 focus:ring-brand-400">
                    <option value="">All Statuses</option>
                    @foreach(['pending','approved','rejected'] as $s)
                        <option value="{{ $s }}" {{ $statusFilter == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                    @endforeach
                </select>
                <select name="type" onchange="this.form.submit()"
                        class="rounded-lg border border-slate-200 bg-slate-50 px-3 py-1.5 text-xs font-medium text-slate-600 focus:outline-none focus:ring-2 focus:ring-brand-400">
                    <option value="">All Types</option>
                    @foreach(['registration','course','robot','signal_subscription','mentorship'] as $t)
                        <option value="{{ $t }}" {{ $typeFilter == $t ? 'selected' : '' }}>{{ ucfirst(str_replace('_', ' ', $t)) }}</option>
                    @endforeach
                </select>
                @if($statusFilter || $typeFilter)
                    <a href="{{ route('admin.reports', ['period' => $period]) }}"
                       class="rounded-lg border border-rose-200 bg-rose-50 px-3 py-1.5 text-xs font-medium text-rose-600 hover:bg-rose-100 transition">Clear</a>
                @endif
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold">Member</th>
                        <th class="px-6 py-3 text-left font-semibold">Type</th>
                        <th class="px-6 py-3 text-left font-semibold">Amount</th>
                        <th class="px-6 py-3 text-left font-semibold">Status</th>
                        <th class="px-6 py-3 text-left font-semibold">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($recentPayments as $payment)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-full bg-brand-50 text-xs font-bold text-brand-600">
                                        {{ strtoupper(substr($payment->user->name ?? '?', 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-slate-800">{{ $payment->user->name ?? '—' }}</p>
                                        <p class="text-xs text-slate-400">{{ $payment->user->email ?? '' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-3">
                                <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-medium text-slate-600">
                                    {{ ucfirst(str_replace('_', ' ', $payment->type)) }}
                                </span>
                            </td>
                            <td class="px-6 py-3 font-semibold text-slate-800">
                                {{ $fmtMoney($payment->amount) }}
                                @if($payment->currency !== 'USD')
                                    <span class="text-xs text-slate-400">{{ $payment->currency }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-3">
                                @php
                                    $badge = match($payment->status) {
                                        'approved' => 'bg-emerald-50 text-emerald-700 ring-emerald-200',
                                        'rejected' => 'bg-rose-50 text-rose-700 ring-rose-200',
                                        default    => 'bg-amber-50 text-amber-700 ring-amber-200',
                                    };
                                @endphp
                                <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold ring-1 {{ $badge }}">
                                    {{ ucfirst($payment->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-3 text-xs text-slate-400">
                                {{ $payment->created_at->format('d M Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-sm text-slate-400">
                                No payments found for the selected filters.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($recentPayments->count() >= 20)
            <div class="border-t border-slate-100 px-6 py-3 text-center">
                <a href="{{ route('admin.payments.index') }}" class="text-xs font-semibold text-brand-500 hover:text-brand-600 transition">
                    View all payments →
                </a>
            </div>
        @endif
    </div>

    {{-- ════════════════════════════════
         CHART.JS
    ════════════════════════════════ --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
    <script>
    (function () {
        const allLabels  = @json($allLabels);
        const histCount  = {{ count($labels) }};

        // Helpers
        const gridColor  = '#f1f5f9';
        const tickColor  = '#94a3b8';

        function baseOpts(title) {
            return {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        padding: 10,
                        cornerRadius: 8,
                        titleFont: { size: 11 },
                        bodyFont:  { size: 12, weight: 'bold' },
                    }
                },
                scales: {
                    x: {
                        grid: { color: gridColor },
                        ticks: { color: tickColor, font: { size: 10 }, maxRotation: 45 }
                    },
                    y: {
                        grid: { color: gridColor },
                        ticks: { color: tickColor, font: { size: 10 } },
                        beginAtZero: true
                    }
                }
            };
        }

        /* ── 1. Revenue chart ── */
        new Chart(document.getElementById('revenueChart'), {
            type: 'bar',
            data: {
                labels: allLabels,
                datasets: [
                    {
                        label: 'Revenue ($)',
                        data: @json($revHistory),
                        backgroundColor: 'rgba(16,185,129,0.85)',
                        borderRadius: 6,
                        order: 2,
                    },
                    {
                        label: 'Predicted ($)',
                        data: @json($revPredict),
                        type: 'line',
                        borderColor: '#6ee7b7',
                        borderDash: [6, 4],
                        borderWidth: 2,
                        pointBackgroundColor: '#6ee7b7',
                        pointRadius: 4,
                        fill: false,
                        tension: 0.3,
                        order: 1,
                    }
                ]
            },
            options: {
                ...baseOpts(),
                scales: {
                    ...baseOpts().scales,
                    y: {
                        ...baseOpts().scales.y,
                        ticks: { color: tickColor, font: { size: 10 }, callback: v => '$' + v.toLocaleString() }
                    }
                },
                plugins: {
                    ...baseOpts().plugins,
                    legend: {
                        display: true,
                        position: 'top',
                        align: 'end',
                        labels: { boxWidth: 12, font: { size: 11 }, color: tickColor }
                    }
                }
            }
        });

        /* ── 2. Registrations chart ── */
        new Chart(document.getElementById('registrationsChart'), {
            type: 'line',
            data: {
                labels: allLabels,
                datasets: [
                    {
                        label: 'Sign-ups',
                        data: @json($regHistory),
                        borderColor: '#8b5cf6',
                        backgroundColor: 'rgba(139,92,246,0.08)',
                        borderWidth: 2.5,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#8b5cf6',
                        pointRadius: 4,
                    },
                    {
                        label: 'Predicted',
                        data: @json($regPredict),
                        borderColor: '#c4b5fd',
                        borderDash: [6, 4],
                        borderWidth: 2,
                        fill: false,
                        tension: 0.3,
                        pointBackgroundColor: '#c4b5fd',
                        pointRadius: 4,
                    }
                ]
            },
            options: baseOpts()
        });

        /* ── 3. Visits chart ── */
        new Chart(document.getElementById('visitsChart'), {
            type: 'line',
            data: {
                labels: allLabels,
                datasets: [
                    {
                        label: 'Total Visits',
                        data: @json($visHistory),
                        borderColor: '#f59e0b',
                        backgroundColor: 'rgba(245,158,11,0.08)',
                        borderWidth: 2.5,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#f59e0b',
                        pointRadius: 4,
                    },
                    {
                        label: 'Unique Visits',
                        data: @json($uniqHistory),
                        borderColor: '#fcd34d',
                        borderWidth: 2,
                        fill: false,
                        tension: 0.4,
                        pointBackgroundColor: '#fcd34d',
                        pointRadius: 3,
                    },
                    {
                        label: 'Predicted Total',
                        data: @json($visPredict),
                        borderColor: '#fde68a',
                        borderDash: [6, 4],
                        borderWidth: 2,
                        fill: false,
                        tension: 0.3,
                        pointBackgroundColor: '#fde68a',
                        pointRadius: 4,
                    }
                ]
            },
            options: baseOpts()
        });

        /* ── 4. Payment type doughnut ── */
        @php
            $typeColors = ['registration'=>'#6366f1','course'=>'#10b981','robot'=>'#f59e0b','signal_subscription'=>'#3b82f6','mentorship'=>'#a855f7'];
        @endphp
        new Chart(document.getElementById('paymentTypeChart'), {
            type: 'doughnut',
            data: {
                labels: @json($paymentByType->pluck('type')->map(fn($t) => ucfirst(str_replace('_',' ',$t)))->toArray()),
                datasets: [{
                    data: @json($paymentByType->pluck('total')->map(fn($v) => round($v/100, 2))->toArray()),
                    backgroundColor: @json($paymentByType->pluck('type')->map(fn($t) => $typeColors[$t] ?? '#94a3b8')->toArray()),
                    borderWidth: 2,
                    borderColor: '#fff',
                    hoverOffset: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: { display: false },
                    tooltip: { backgroundColor: '#1e293b', padding: 10, cornerRadius: 8 }
                }
            }
        });

        /* ── 5. Member status doughnut ── */
        const statusColors = { approved: '#10b981', pending: '#f59e0b', suspended: '#ef4444' };
        new Chart(document.getElementById('memberStatusChart'), {
            type: 'doughnut',
            data: {
                labels: @json($memberStatuses->pluck('status')->map(fn($s) => ucfirst($s))->toArray()),
                datasets: [{
                    data: @json($memberStatuses->pluck('count')->toArray()),
                    backgroundColor: @json($memberStatuses->pluck('status')->map(fn($s) => $statusColors[$s] ?? '#94a3b8')->toArray()),
                    borderWidth: 2,
                    borderColor: '#fff',
                    hoverOffset: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: { display: false },
                    tooltip: { backgroundColor: '#1e293b', padding: 10, cornerRadius: 8 }
                }
            }
        });
    })();
    </script>
</x-layouts.admin>
