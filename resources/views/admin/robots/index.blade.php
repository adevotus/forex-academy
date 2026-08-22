<x-layouts.admin title="Robots">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-bold text-white">Robots / EAs</h1>
            <p class="mt-1 text-sm text-slate-400">Manage automated trading products and pricing.</p>
        </div>
        <a href="{{ route('admin.robots.create') }}" class="btn-primary !py-2 text-sm"><x-icon name="plus" class="h-4 w-4" /> New Robot</a>
    </x-slot>

    <div class="card overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-white/10 text-xs uppercase tracking-wider text-slate-500">
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Version</th>
                    <th class="px-6 py-3">Price</th>
                    <th class="px-6 py-3">Subscribers</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse ($robots as $robot)
                    <tr>
                        <td class="px-6 py-4 font-medium text-white">{{ $robot->name }}</td>
                        <td class="px-6 py-4 text-slate-400">{{ $robot->version }}</td>
                        <td class="px-6 py-4 text-slate-300">{{ $robot->priceFormatted() }}</td>
                        <td class="px-6 py-4 text-slate-400">{{ $robot->subscriptions_count }}</td>
                        <td class="px-6 py-4">
                            @if ($robot->published)
                                <span class="badge border-emerald-400/30 bg-emerald-400/10 text-emerald-300">Live</span>
                            @else
                                <span class="badge">Draft</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.robots.edit', $robot) }}" class="rounded-lg border border-white/10 px-3 py-1.5 text-xs text-slate-300 hover:bg-white/5">Edit</a>
                                <form method="POST" action="{{ route('admin.robots.destroy', $robot) }}" onsubmit="return confirm('Delete this robot?')">
                                    @csrf @method('DELETE')
                                    <button class="rounded-lg border border-rose-400/30 bg-rose-400/10 px-3 py-1.5 text-xs text-rose-300 hover:bg-rose-400/20">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-8 text-center text-slate-500">No robots yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
