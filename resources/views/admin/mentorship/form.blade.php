<x-layouts.admin :title="$session->exists ? 'Edit Mentorship' : 'New Mentorship'">
    <x-slot name="header">
        <div>
            <a href="{{ route('admin.mentorship.index') }}" class="text-xs font-medium text-brand-300 hover:text-brand-200">&larr; Mentorship</a>
            <h1 class="mt-2 text-2xl font-bold text-white">{{ $session->exists ? 'Edit Mentorship' : 'New Mentorship' }}</h1>
        </div>
    </x-slot>

    <div class="card max-w-2xl p-6">
        <form method="POST" action="{{ $session->exists ? route('admin.mentorship.update', $session) : route('admin.mentorship.store') }}" class="space-y-4">
            @csrf
            @if ($session->exists) @method('PUT') @endif

            <div>
                <label class="label">Title</label>
                <input type="text" name="title" value="{{ old('title', $session->title) }}" class="input" required>
            </div>
            <div>
                <label class="label">Description</label>
                <textarea name="description" rows="4" class="input">{{ old('description', $session->description) }}</textarea>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="label">Mentor Name</label>
                    <input type="text" name="mentor_name" value="{{ old('mentor_name', $session->mentor_name) }}" class="input">
                </div>
                <div>
                    <label class="label">Type</label>
                    <select name="type" class="input">
                        <option value="group" @selected(old('type', $session->type)==='group')>Group</option>
                        <option value="one_on_one" @selected(old('type', $session->type)==='one_on_one')>1-on-1</option>
                    </select>
                </div>
                <div>
                    <label class="label">Price (USD)</label>
                    <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $session->exists ? $session->price / 100 : '') }}" class="input" required>
                </div>
            </div>
            <label class="flex items-center gap-2 text-sm text-slate-300">
                <input type="checkbox" name="published" value="1" @checked(old('published', $session->published ?? true)) class="rounded border-white/20 bg-navy-900 text-brand-500">
                Published
            </label>
            <button class="btn-primary">{{ $session->exists ? 'Save Changes' : 'Create Package' }}</button>
        </form>
    </div>
</x-layouts.admin>
