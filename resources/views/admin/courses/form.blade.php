<x-layouts.admin :title="$course->exists ? 'Edit Course' : 'New Course'">
    <x-slot name="header">
        <div>
            <a href="{{ route('admin.courses.index') }}" class="text-xs font-medium text-brand-300 hover:text-brand-200">&larr; Courses</a>
            <h1 class="mt-2 text-2xl font-bold text-white">{{ $course->exists ? 'Edit Course' : 'New Course' }}</h1>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="card p-6 lg:col-span-2">
            <form method="POST" action="{{ $course->exists ? route('admin.courses.update', $course) : route('admin.courses.store') }}" class="space-y-4">
                @csrf
                @if ($course->exists) @method('PUT') @endif

                <div>
                    <label class="label">Title</label>
                    <input type="text" name="title" value="{{ old('title', $course->title) }}" class="input" required>
                </div>
                <div>
                    <label class="label">Description</label>
                    <textarea name="description" rows="4" class="input">{{ old('description', $course->description) }}</textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="label">Level</label>
                        <select name="level" class="input">
                            @foreach (['starter','intermediate','advanced','pro'] as $lvl)
                                <option value="{{ $lvl }}" @selected(old('level', $course->level)===$lvl)>{{ ucfirst($lvl) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="label">Price (USD)</label>
                        <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $course->price / 100) }}" class="input">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="label">Order</label>
                        <input type="number" name="order" value="{{ old('order', $course->order) }}" class="input">
                    </div>
                    <div class="flex items-end gap-6 pb-2">
                        <label class="flex items-center gap-2 text-sm text-slate-300">
                            <input type="checkbox" name="is_free" value="1" @checked(old('is_free', $course->is_free)) class="rounded border-white/20 bg-navy-900 text-brand-500">
                            Free course
                        </label>
                        <label class="flex items-center gap-2 text-sm text-slate-300">
                            <input type="checkbox" name="published" value="1" @checked(old('published', $course->published ?? true)) class="rounded border-white/20 bg-navy-900 text-brand-500">
                            Published
                        </label>
                    </div>
                </div>
                <button class="btn-primary">{{ $course->exists ? 'Save Changes' : 'Create Course' }}</button>
            </form>
        </div>

        @if ($course->exists)
            <div class="card p-6">
                <div class="flex items-center justify-between">
                    <h2 class="font-semibold text-white">Lessons</h2>
                    <a href="{{ route('admin.courses.lessons.create', $course) }}" class="text-xs font-medium text-brand-300 hover:text-brand-200">+ Add Lesson</a>
                </div>
                <div class="mt-4 space-y-2">
                    @forelse ($course->lessons as $lesson)
                        <a href="{{ route('admin.courses.lessons.edit', [$course, $lesson]) }}" class="flex items-center justify-between rounded-lg border border-white/10 bg-white/5 px-3 py-2 text-sm hover:bg-white/10">
                            <span class="text-slate-200">{{ $lesson->title }}</span>
                            <x-icon name="edit" class="h-3.5 w-3.5 text-slate-500" />
                        </a>
                    @empty
                        <p class="text-sm text-slate-500">No lessons yet.</p>
                    @endforelse
                </div>
            </div>
        @endif
    </div>
</x-layouts.admin>
