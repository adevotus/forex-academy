<x-layouts.admin title="Mentorship">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-bold text-white">Mentorship Packages</h1>
            <p class="mt-1 text-sm text-slate-400">Manage group and 1-on-1 mentorship offerings.</p>
        </div>
        <a href="{{ route('admin.mentorship.create') }}" class="btn-primary !py-2 text-sm"><x-icon name="plus" class="h-4 w-4" /> New Package</a>
    </x-slot>

    <div class="card overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-white/10 text-xs uppercase tracking-wider text-slate-500">
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Type</th>
                    <th class="px-6 py-3">Price</th>
                    <th class="px-6 py-3">Bookings</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse ($sessions as $session)
                    <tr>
                        <td class="px-6 py-4 font-medium text-white">{{ $session->title }}</td>
                        <td class="px-6 py-4 text-slate-400">{{ $session->type === 'one_on_one' ? '1-on-1' : 'Group' }}</td>
                        <td class="px-6 py-4 text-slate-300">{{ $session->priceFormatted() }}</td>
                        <td class="px-6 py-4 text-slate-400">{{ $session->bookings_count }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.mentorship.edit', $session) }}" class="rounded-lg border border-white/10 px-3 py-1.5 text-xs text-slate-300 hover:bg-white/5">Edit</a>
                                <form method="POST" action="{{ route('admin.mentorship.destroy', $session) }}" onsubmit="return confirm('Delete this package?')">
                                    @csrf @method('DELETE')
                                    <button class="rounded-lg border border-rose-400/30 bg-rose-400/10 px-3 py-1.5 text-xs text-rose-300 hover:bg-rose-400/20">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-8 text-center text-slate-500">No mentorship packages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
