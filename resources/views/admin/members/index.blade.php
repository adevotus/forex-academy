<x-layouts.admin title="Members">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-bold text-white">Members</h1>
            <p class="mt-1 text-sm text-slate-400">Approve registrations and manage member access.</p>
        </div>
        <form method="GET" class="flex gap-2">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search name or email" class="input !py-2 !text-sm">
            <select name="status" class="input !py-2 !text-sm !w-auto">
                <option value="">All statuses</option>
                <option value="pending" @selected(request('status')==='pending')>Pending</option>
                <option value="approved" @selected(request('status')==='approved')>Approved</option>
                <option value="suspended" @selected(request('status')==='suspended')>Suspended</option>
            </select>
            <button class="btn-outline !py-2 !text-sm">Filter</button>
        </form>
    </x-slot>

    <div class="card overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-white/10 text-xs uppercase tracking-wider text-slate-500">
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Joined</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse ($members as $member)
                    <tr>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.members.show', $member) }}" class="font-medium text-white hover:text-brand-300">{{ $member->name }}</a>
                        </td>
                        <td class="px-6 py-4 text-slate-400">{{ $member->email }}</td>
                        <td class="px-6 py-4">
                            <span class="badge {{ match($member->status) {
                                'approved' => 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300',
                                'suspended' => 'border-rose-400/30 bg-rose-400/10 text-rose-300',
                                default => 'border-gold-400/30 bg-gold-400/10 text-gold-300',
                            } }}">{{ ucfirst($member->status) }}</span>
                        </td>
                        <td class="px-6 py-4 text-slate-500">{{ $member->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                @if ($member->status !== 'approved')
                                    <form method="POST" action="{{ route('admin.members.approve', $member) }}">
                                        @csrf
                                        <button class="rounded-lg border border-emerald-400/30 bg-emerald-400/10 px-3 py-1.5 text-xs font-medium text-emerald-300 hover:bg-emerald-400/20">Approve</button>
                                    </form>
                                @endif
                                @if ($member->status !== 'suspended')
                                    <form method="POST" action="{{ route('admin.members.suspend', $member) }}">
                                        @csrf
                                        <button class="rounded-lg border border-rose-400/30 bg-rose-400/10 px-3 py-1.5 text-xs font-medium text-rose-300 hover:bg-rose-400/20">Suspend</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-8 text-center text-slate-500">No members found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $members->links() }}</div>
</x-layouts.admin>
