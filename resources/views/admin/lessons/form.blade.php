<x-layouts.admin :title="$lesson->exists ? 'Edit Lesson' : 'New Lesson'">
    <x-slot name="header">
        <div>
            <a href="{{ route('admin.courses.edit', $course) }}" class="text-xs font-medium text-brand-300 hover:text-brand-200">&larr; {{ $course->title }}</a>
            <h1 class="mt-2 text-2xl font-bold text-white">{{ $lesson->exists ? 'Edit Lesson' : 'New Lesson' }}</h1>
        </div>
        @if ($lesson->exists)
            <form method="POST" action="{{ route('admin.courses.lessons.destroy', [$course, $lesson]) }}" onsubmit="return confirm('Delete this lesson?')">
                @csrf @method('DELETE')
                <button class="rounded-lg border border-rose-400/30 bg-rose-400/10 px-4 py-2 text-xs text-rose-300 hover:bg-rose-400/20">Delete Lesson</button>
            </form>
        @endif
    </x-slot>

    <div class="card max-w-2xl p-6">
        <form method="POST" action="{{ $lesson->exists ? route('admin.courses.lessons.update', [$course, $lesson]) : route('admin.courses.lessons.store', $course) }}" class="space-y-4">
            @csrf
            @if ($lesson->exists) @method('PUT') @endif

            <div>
                <label class="label">Title</label>
                <input type="text" name="title" value="{{ old('title', $lesson->title) }}" class="input" required>
            </div>
            <div>
                <label class="label">Description</label>
                <textarea name="description" rows="3" class="input">{{ old('description', $lesson->description) }}</textarea>
            </div>
            <div>
                <label class="label">Video URL</label>
                <input type="text" name="video_url" value="{{ old('video_url', $lesson->video_url) }}" class="input" placeholder="https://...">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="label">Duration (minutes)</label>
                    <input type="number" name="duration_minutes" value="{{ old('duration_minutes', $lesson->duration_minutes) }}" class="input">
                </div>
                <div>
                    <label class="label">Order</label>
                    <input type="number" name="order" value="{{ old('order', $lesson->order) }}" class="input">
                </div>
            </div>
            <label class="flex items-center gap-2 text-sm text-slate-300">
                <input type="checkbox" name="is_preview" value="1" @checked(old('is_preview', $lesson->is_preview)) class="rounded border-white/20 bg-navy-900 text-brand-500">
                Free preview (watchable before unlocking the course)
            </label>
            <button class="btn-primary">{{ $lesson->exists ? 'Save Changes' : 'Add Lesson' }}</button>
        </form>
    </div>
</x-layouts.admin>
