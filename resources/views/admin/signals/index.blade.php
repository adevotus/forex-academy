<x-layouts.admin title="Signals">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Signals</h1>
            <p class="mt-1 text-sm text-slate-500">Publish trading setups with a short explainer.</p>
        </div>
        <button onclick="openSignalModal()" class="btn-primary !py-2 text-sm flex items-center gap-2">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            New Signal
        </button>
    </x-slot>

    @if(session('success'))
        <div class="mb-4 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
            <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <th class="px-6 py-3">Pair</th>
                    <th class="px-6 py-3">Direction</th>
                    <th class="px-6 py-3">Entry / SL / TP</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Published</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($signals as $signal)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 font-semibold text-slate-900">{{ $signal->pair }}</td>
                        <td class="px-6 py-4">
                            @if($signal->direction === 'buy')
                                <span class="inline-flex items-center rounded-full border border-emerald-200 bg-emerald-50 px-2.5 py-0.5 text-xs font-bold text-emerald-700">BUY</span>
                            @else
                                <span class="inline-flex items-center rounded-full border border-rose-200 bg-rose-50 px-2.5 py-0.5 text-xs font-bold text-rose-700">SELL</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-mono text-xs text-slate-600">
                            {{ $signal->entry_price }} / {{ $signal->stop_loss }} / {{ $signal->take_profit }}
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusMap = [
                                    'active'  => ['bg-blue-50 text-blue-700 border-blue-200', 'Active'],
                                    'hit_tp'  => ['bg-emerald-50 text-emerald-700 border-emerald-200', 'Hit TP'],
                                    'hit_sl'  => ['bg-rose-50 text-rose-700 border-rose-200', 'Hit SL'],
                                    'closed'  => ['bg-slate-100 text-slate-500 border-slate-200', 'Closed'],
                                ];
                                [$cls, $lbl] = $statusMap[$signal->status] ?? ['bg-slate-100 text-slate-500 border-slate-200', ucfirst($signal->status)];
                            @endphp
                            <span class="inline-flex rounded-full border px-2.5 py-0.5 text-xs font-semibold {{ $cls }}">{{ $lbl }}</span>
                        </td>
                        <td class="px-6 py-4 text-slate-500 text-xs">{{ $signal->published_at?->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button onclick="editSignal(@json($signal))"
                                    class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-700 hover:bg-slate-50 transition shadow-sm">
                                    Edit
                                </button>
                                <form method="POST" action="{{ route('admin.signals.destroy', $signal) }}" onsubmit="return confirm('Delete {{ addslashes($signal->pair) }} signal? This cannot be undone.')">
                                    @csrf @method('DELETE')
                                    <button class="rounded-lg border border-rose-200 bg-rose-50 px-3 py-1.5 text-xs font-semibold text-rose-700 hover:bg-rose-100 transition">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center">
                            <svg class="mx-auto h-10 w-10 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>
                            </svg>
                            <p class="mt-3 text-sm font-semibold text-slate-500">No signals yet</p>
                            <p class="mt-1 text-xs text-slate-400">Click "New Signal" to publish your first trading setup.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $signals->links() }}</div>


    {{-- ── Signal Modal ── --}}
    <div id="signal-modal" class="fixed inset-0 z-50 hidden" style="background:rgba(15,23,42,0.45)">
        <div class="absolute inset-0" onclick="closeSignalModal()"></div>

        <div class="absolute inset-0 flex items-center justify-center p-6 pointer-events-none">
            <div class="pointer-events-auto w-full rounded-2xl bg-white shadow-2xl" style="max-width:460px">

                {{-- Header --}}
                <div class="flex items-center justify-between px-6 pt-5 pb-4 border-b border-slate-100">
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Trading Signal</p>
                        <h3 id="modal-title" class="text-lg font-extrabold text-slate-900 mt-0.5">New Signal</h3>
                    </div>
                    <button onclick="closeSignalModal()"
                            class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                {{-- Form --}}
                <form id="signal-form" method="POST" class="px-6 py-5 space-y-4">
                    @csrf
                    <input type="hidden" name="_method" id="form-method" value="POST">

                    {{-- Pair + Direction --}}
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-slate-700">Pair <span class="text-rose-500">*</span></label>
                            <input type="text" name="pair" id="f-pair" class="input w-full" placeholder="EUR/USD" required>
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-slate-700">Direction</label>
                            <select name="direction" id="f-direction" class="input w-full">
                                <option value="buy">Buy</option>
                                <option value="sell">Sell</option>
                            </select>
                        </div>
                    </div>

                    {{-- Entry / SL / TP --}}
                    <div class="grid grid-cols-3 gap-3">
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-slate-700">Entry</label>
                            <input type="number" step="0.00001" name="entry_price" id="f-entry"
                                   class="input w-full" placeholder="0.00000">
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-rose-500">Stop Loss</label>
                            <input type="number" step="0.00001" name="stop_loss" id="f-sl"
                                   class="input w-full" placeholder="0.00000">
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-emerald-600">Take Profit</label>
                            <input type="number" step="0.00001" name="take_profit" id="f-tp"
                                   class="input w-full" placeholder="0.00000">
                        </div>
                    </div>

                    {{-- Explainer --}}
                    <div>
                        <label class="mb-1 block text-sm font-semibold text-slate-700">Explainer</label>
                        <textarea name="explainer" id="f-explainer" rows="2"
                                  class="input w-full resize-none"
                                  placeholder="Why this setup was chosen…"></textarea>
                    </div>

                    {{-- Status --}}
                    <div>
                        <label class="mb-1 block text-sm font-semibold text-slate-700">Status</label>
                        <select name="status" id="f-status" class="input w-full">
                            <option value="active">Active</option>
                            <option value="hit_tp">Hit Take Profit</option>
                            <option value="hit_sl">Hit Stop Loss</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>

                    {{-- Footer --}}
                    <div class="flex items-center justify-end gap-2 pt-1 border-t border-slate-100">
                        <button type="button" onclick="closeSignalModal()"
                                class="rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-50 transition">
                            Cancel
                        </button>
                        <button type="submit" id="modal-submit" class="btn-primary px-5">
                            Publish Signal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layouts.admin>

<script>
const storeUrl = "{{ route('admin.signals.store') }}";

function openSignalModal() {
    // Reset to create mode
    document.getElementById('modal-title').textContent = 'New Signal';
    document.getElementById('modal-submit').textContent = 'Publish Signal';
    document.getElementById('signal-form').action = storeUrl;
    document.getElementById('form-method').value = 'POST';
    document.getElementById('f-pair').value = '';
    document.getElementById('f-direction').value = 'buy';
    document.getElementById('f-entry').value = '';
    document.getElementById('f-sl').value = '';
    document.getElementById('f-tp').value = '';
    document.getElementById('f-explainer').value = '';
    document.getElementById('f-status').value = 'active';
    document.getElementById('signal-modal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function editSignal(signal) {
    document.getElementById('modal-title').textContent = 'Edit Signal';
    document.getElementById('modal-submit').textContent = 'Save Changes';
    document.getElementById('signal-form').action = `/admin/signals/${signal.id}`;
    document.getElementById('form-method').value = 'PUT';
    document.getElementById('f-pair').value = signal.pair ?? '';
    document.getElementById('f-direction').value = signal.direction ?? 'buy';
    document.getElementById('f-entry').value = signal.entry_price ?? '';
    document.getElementById('f-sl').value = signal.stop_loss ?? '';
    document.getElementById('f-tp').value = signal.take_profit ?? '';
    document.getElementById('f-explainer').value = signal.explainer ?? '';
    document.getElementById('f-status').value = signal.status ?? 'active';
    document.getElementById('signal-modal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeSignalModal() {
    document.getElementById('signal-modal').classList.add('hidden');
    document.body.style.overflow = '';
}

document.addEventListener('keydown', e => { if (e.key === 'Escape') closeSignalModal(); });
</script>
