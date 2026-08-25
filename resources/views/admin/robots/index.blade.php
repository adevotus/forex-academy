<x-layouts.admin title="Robots / EAs">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Robots / EAs</h1>
            <p class="mt-1 text-sm text-slate-500">Manage automated trading products and pricing.</p>
        </div>
        <a href="{{ route('admin.robots.create') }}" class="btn-primary !py-2 text-sm flex items-center gap-2">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            New Robot
        </a>
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
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Version</th>
                    <th class="px-6 py-3">Price</th>
                    <th class="px-6 py-3">Duration</th>
                    <th class="px-6 py-3">Subscribers</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($robots as $robot)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-xl text-xs font-extrabold" style="background:#eff6ff; color:#2563eb">
                                    EA
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-900">{{ $robot->name }}</p>
                                    @if($robot->description)
                                        <p class="text-xs text-slate-400 line-clamp-1">{{ Str::limit($robot->description, 50) }}</p>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="rounded-full border border-slate-200 bg-slate-50 px-2.5 py-0.5 text-xs font-semibold text-slate-700">
                                v{{ $robot->version }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-semibold text-slate-900">{{ $robot->priceFormatted() }}</td>
                        <td class="px-6 py-4 text-slate-500 text-xs">
                            {{ $robot->duration_days ? $robot->duration_days . ' days' : '—' }}
                        </td>
                        <td class="px-6 py-4 text-slate-600">{{ $robot->subscriptions_count ?? 0 }}</td>
                        <td class="px-6 py-4">
                            @if ($robot->published)
                                <span class="inline-flex items-center gap-1 rounded-full border border-emerald-200 bg-emerald-50 px-2.5 py-0.5 text-xs font-semibold text-emerald-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Live
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-slate-50 px-2.5 py-0.5 text-xs font-semibold text-slate-500">
                                    <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span> Draft
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.robots.edit', $robot) }}"
                                   class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-700 hover:bg-slate-50 transition shadow-sm">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.robots.destroy', $robot) }}" onsubmit="return confirm('Delete {{ addslashes($robot->name) }}? This cannot be undone.')">
                                    @csrf @method('DELETE')
                                    <button class="rounded-lg border border-rose-200 bg-rose-50 px-3 py-1.5 text-xs font-semibold text-rose-700 hover:bg-rose-100 transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-16 text-center">
                            <svg class="mx-auto h-10 w-10 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <p class="mt-3 text-sm font-semibold text-slate-500">No robots yet</p>
                            <p class="mt-1 text-xs text-slate-400">Click "New Robot" to add your first automated trading product.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
