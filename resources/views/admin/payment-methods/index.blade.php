<x-layouts.admin title="Payment Methods">
    <x-slot:header>
        <div>
            <h1 class="text-xl font-bold text-slate-900">Payment Methods</h1>
            <p class="text-sm text-slate-500 mt-0.5">Methods shown to members on the payment & proof submission page.</p>
        </div>
        <a href="{{ route('admin.payment-methods.create') }}" class="btn-primary flex items-center gap-2">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Add Method
        </a>
    </x-slot:header>

    @if($methods->isEmpty())
        <div class="flex flex-col items-center gap-3 py-24 text-center">
            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100">
                <svg class="h-7 w-7 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
            </div>
            <p class="text-sm font-semibold text-slate-700">No payment methods yet</p>
            <p class="text-xs text-slate-400 max-w-xs">Add methods like M-Pesa, bank transfer, or crypto — they'll appear on the member payment page.</p>
            <a href="{{ route('admin.payment-methods.create') }}" class="btn-primary mt-2">Add first method</a>
        </div>
    @else
        <div class="space-y-4">
            @foreach($methods as $m)
                <div class="flex flex-wrap items-center gap-4 rounded-2xl border border-slate-200 bg-white px-5 py-4 shadow-sm">

                    {{-- Icon --}}
                    <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl text-sm font-bold {{ $m->iconColorClasses() }}">
                        {{ $m->typeIcon() }}
                    </div>

                    {{-- Info --}}
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 flex-wrap">
                            <p class="font-semibold text-slate-900">{{ $m->name }}</p>
                            @if($m->subtitle)
                                <span class="text-xs text-slate-400">{{ $m->subtitle }}</span>
                            @endif
                            <span class="rounded-full bg-slate-100 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-wide text-slate-500">{{ $m->typeLabel() }}</span>
                        </div>
                        @if(!empty($m->details))
                            <div class="mt-1.5 flex flex-wrap gap-x-4 gap-y-0.5">
                                @foreach($m->details as $detail)
                                    <span class="text-xs text-slate-500">
                                        <span class="text-slate-400">{{ $detail['label'] }}:</span> {{ $detail['value'] }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- Order --}}
                    <span class="text-xs text-slate-400 hidden sm:block">Order: {{ $m->order }}</span>

                    {{-- Status badge --}}
                    @if($m->is_active)
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Active
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-500">Hidden</span>
                    @endif

                    {{-- Actions --}}
                    <div class="flex items-center gap-2">
                        <form method="POST" action="{{ route('admin.payment-methods.toggle', $m) }}">
                            @csrf @method('PATCH')
                            <button class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-600 shadow-sm transition hover:bg-slate-50">
                                {{ $m->is_active ? 'Hide' : 'Show' }}
                            </button>
                        </form>
                        <a href="{{ route('admin.payment-methods.edit', $m) }}"
                           class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-600 shadow-sm transition hover:bg-slate-50">Edit</a>
                        <form method="POST" action="{{ route('admin.payment-methods.destroy', $m) }}"
                              onsubmit="return confirm('Delete this payment method?')">
                            @csrf @method('DELETE')
                            <button class="rounded-lg border border-rose-200 bg-rose-50 px-3 py-1.5 text-xs font-medium text-rose-600 shadow-sm transition hover:bg-rose-100">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-layouts.admin>
