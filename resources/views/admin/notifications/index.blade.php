<x-layouts.admin title="Notifications">
    <x-slot name="header">Notifications</x-slot>

    <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Notifications</h1>
            <p class="mt-1 text-sm text-slate-500">All pending actions across all members.</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.notifications', ['type' => 'all']) }}"
               class="rounded-xl px-4 py-2 text-sm font-semibold transition {{ request('type', 'all') === 'all' ? 'bg-slate-900 text-white' : 'border border-slate-200 bg-white text-slate-600 hover:text-slate-900' }}">
                All ({{ $notifications->count() }})
            </a>
            <a href="{{ route('admin.notifications', ['type' => 'payment']) }}"
               class="rounded-xl px-4 py-2 text-sm font-semibold transition {{ request('type') === 'payment' ? 'bg-slate-900 text-white' : 'border border-slate-200 bg-white text-slate-600 hover:text-slate-900' }}">
                Payments
            </a>
            <a href="{{ route('admin.notifications', ['type' => 'member']) }}"
               class="rounded-xl px-4 py-2 text-sm font-semibold transition {{ request('type') === 'member' ? 'bg-slate-900 text-white' : 'border border-slate-200 bg-white text-slate-600 hover:text-slate-900' }}">
                Members
            </a>
        </div>
    </div>

    {{-- Summary --}}
    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-medium text-slate-500">Total Pending</p>
            <p class="mt-1 text-2xl font-extrabold text-slate-900">{{ $notifications->count() }}</p>
            <p class="mt-0.5 text-xs text-slate-400">actions need attention</p>
        </div>
        <div class="rounded-2xl border border-amber-100 bg-amber-50 p-5 shadow-sm">
            <p class="text-xs font-medium text-amber-600">Payment Proofs</p>
            <p class="mt-1 text-2xl font-extrabold text-amber-800">{{ $notifications->where('type', 'payment')->count() }}</p>
            <p class="mt-0.5 text-xs text-amber-500">awaiting review</p>
        </div>
        <div class="rounded-2xl border border-brand-100 bg-brand-50 p-5 shadow-sm">
            <p class="text-xs font-medium text-brand-600">Member Registrations</p>
            <p class="mt-1 text-2xl font-extrabold text-brand-800">{{ $notifications->where('type', 'member')->count() }}</p>
            <p class="mt-0.5 text-xs text-brand-500">pending approval</p>
        </div>
    </div>

    {{-- Notification list --}}
    <div class="space-y-3">
        @forelse ($notifications as $note)
            @php $isPayment = $note['type'] === 'payment'; @endphp
            <div class="flex flex-wrap items-center gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md">

                {{-- Icon --}}
                <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl
                    {{ $isPayment ? 'bg-amber-50 text-amber-600' : 'bg-brand-50 text-brand-600' }}">
                    @if($isPayment)
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    @else
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    @endif
                </div>

                {{-- Info --}}
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-slate-900">{{ $note['title'] }}</p>
                    <p class="text-sm text-slate-500">{{ $note['sub'] }}</p>
                </div>

                {{-- Time --}}
                <span class="flex-shrink-0 text-xs text-slate-400">{{ $note['time']->diffForHumans() }}</span>

                {{-- Type badge --}}
                <span class="flex-shrink-0 rounded-full border px-2.5 py-1 text-xs font-semibold
                    {{ $isPayment ? 'border-amber-200 bg-amber-50 text-amber-700' : 'border-brand-200 bg-brand-50 text-brand-700' }}">
                    {{ $isPayment ? 'Payment Proof' : 'New Member' }}
                </span>

                {{-- Action button --}}
                <a href="{{ $note['link'] }}"
                   class="flex-shrink-0 rounded-xl {{ $isPayment ? 'bg-amber-500 hover:bg-amber-600' : 'bg-brand-600 hover:bg-brand-700' }} px-4 py-2 text-xs font-bold text-white transition">
                    {{ $isPayment ? 'Review Payment' : 'View Member' }}
                </a>
            </div>
        @empty
            <div class="flex flex-col items-center gap-3 rounded-2xl border border-slate-200 bg-white py-20 text-center shadow-sm">
                <svg class="h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                <p class="text-sm font-semibold text-slate-500">All caught up!</p>
                <p class="text-xs text-slate-400">No pending notifications right now.</p>
            </div>
        @endforelse
    </div>
</x-layouts.admin>
