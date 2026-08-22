<x-layouts.admin :title="$robot->exists ? 'Edit Robot' : 'New Robot'">
    <x-slot name="header">
        <div>
            <a href="{{ route('admin.robots.index') }}" class="text-xs font-medium text-brand-300 hover:text-brand-200">&larr; Robots</a>
            <h1 class="mt-2 text-2xl font-bold text-white">{{ $robot->exists ? 'Edit Robot' : 'New Robot' }}</h1>
        </div>
    </x-slot>

    <div class="card max-w-2xl p-6">
        <form method="POST" action="{{ $robot->exists ? route('admin.robots.update', $robot) : route('admin.robots.store') }}" class="space-y-4">
            @csrf
            @if ($robot->exists) @method('PUT') @endif

            <div>
                <label class="label">Name</label>
                <input type="text" name="name" value="{{ old('name', $robot->name) }}" class="input" required>
            </div>
            <div>
                <label class="label">Description</label>
                <textarea name="description" rows="4" class="input">{{ old('description', $robot->description) }}</textarea>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="label">Version</label>
                    <input type="text" name="version" value="{{ old('version', $robot->version) }}" class="input">
                </div>
                <div>
                    <label class="label">Price (USD)</label>
                    <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $robot->exists ? $robot->price / 100 : '') }}" class="input" required>
                </div>
                <div>
                    <label class="label">Duration (days)</label>
                    <input type="number" name="duration_days" value="{{ old('duration_days', $robot->duration_days) }}" class="input">
                </div>
            </div>
            <div>
                <label class="label">Downloadable file path (optional)</label>
                <input type="text" name="file_path" value="{{ old('file_path', $robot->file_path) }}" class="input" placeholder="storage/robots/ea-file.ex4">
            </div>
            <label class="flex items-center gap-2 text-sm text-slate-300">
                <input type="checkbox" name="published" value="1" @checked(old('published', $robot->published ?? true)) class="rounded border-white/20 bg-navy-900 text-brand-500">
                Published
            </label>
            <button class="btn-primary">{{ $robot->exists ? 'Save Changes' : 'Create Robot' }}</button>
        </form>
    </div>
</x-layouts.admin>
