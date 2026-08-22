<x-layouts.admin title="Courses">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-bold text-white">Courses & Lessons</h1>
            <p class="mt-1 text-sm text-slate-400">Upload and organize the leveled learning path.</p>
        </div>
        <a href="{{ route('admin.courses.create') }}" class="btn-primary !py-2 text-sm"><x-icon name="plus" class="h-4 w-4" /> New Course</a>
    </x-slot>

    <div class="card overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-white/10 text-xs uppercase tracking-wider text-slate-500">
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Level</th>
                    <th class="px-6 py-3">Price</th>
                    <th class="px-6 py-3">Lessons</th>
                    <th class="px-6 py-3">Published</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse ($courses as $course)
                    <tr>
                        <td class="px-6 py-4 font-medium text-white">{{ $course->title }}</td>
                        <td class="px-6 py-4"><span class="badge badge-level-{{ $course->level }}">{{ ucfirst($course->level) }}</span></td>
                        <td class="px-6 py-4 text-slate-300">{{ $course->priceFormatted() }}</td>
                        <td class="px-6 py-4 text-slate-400">{{ $course->lessons_count }}</td>
                        <td class="px-6 py-4">
                            @if ($course->published)
                                <span class="badge border-emerald-400/30 bg-emerald-400/10 text-emerald-300">Live</span>
                            @else
                                <span class="badge">Draft</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.courses.edit', $course) }}" class="rounded-lg border border-white/10 px-3 py-1.5 text-xs text-slate-300 hover:bg-white/5">Manage</a>
                                <form method="POST" action="{{ route('admin.courses.destroy', $course) }}" onsubmit="return confirm('Delete this course and all its lessons?')">
                                    @csrf @method('DELETE')
                                    <button class="rounded-lg border border-rose-400/30 bg-rose-400/10 px-3 py-1.5 text-xs text-rose-300 hover:bg-rose-400/20">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-8 text-center text-slate-500">No courses yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
