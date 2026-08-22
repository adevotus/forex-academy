<x-layouts.admin title="Signals">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-bold text-white">Signals</h1>
            <p class="mt-1 text-sm text-slate-400">Publish trading setups with a short explainer.</p>
        </div>
        <a href="{{ route('admin.signals.create') }}" class="btn-primary !py-2 text-sm"><x-icon name="plus" class="h-4 w-4" /> New Signal</a>
    </x-slot>

    <div class="card overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-white/10 text-xs uppercase tracking-wider text-slate-500">
                    <th class="px-6 py-3">Pair</th>
                    <th class="px-6 py-3">Direction</th>
                    <th class="px-6 py-3">Entry / SL / TP</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Published</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse ($signals as $signal)
                    <tr>
                        <td class="px-6 py-4 font-medium text-white">{{ $signal->pair }}</td>
                        <td class="px-6 py-4">
                            <span class="badge {{ $signal->direction === 'buy' ? 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300' : 'border-rose-400/30 bg-rose-400/10 text-rose-300' }}">{{ strtoupper($signal->direction) }}</span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">{{ $signal->entry_price }} / {{ $signal->stop_loss }} / {{ $signal->take_profit }}</td>
                        <td class="px-6 py-4 text-slate-400">{{ ucfirst(str_replace('_',' ', $signal->status)) }}</td>
                        <td class="px-6 py-4 text-slate-500">{{ $signal->published_at?->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.signals.edit', $signal) }}" class="rounded-lg border border-white/10 px-3 py-1.5 text-xs text-slate-300 hover:bg-white/5">Edit</a>
                                <form method="POST" action="{{ route('admin.signals.destroy', $signal) }}" onsubmit="return confirm('Delete this signal?')">
                                    @csrf @method('DELETE')
                                    <button class="rounded-lg border border-rose-400/30 bg-rose-400/10 px-3 py-1.5 text-xs text-rose-300 hover:bg-rose-400/20">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-8 text-center text-slate-500">No signals yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $signals->links() }}</div>
</x-layouts.admin>
