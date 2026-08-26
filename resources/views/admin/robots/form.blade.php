<x-layouts.admin :title="$robot->exists ? 'Edit Robot' : 'New Robot'">
    <x-slot name="header">
        <div>
            <a href="{{ route('admin.robots.index') }}" class="inline-flex items-center gap-1 text-xs font-medium text-slate-500 hover:text-slate-700 transition">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                Back to Robots
            </a>
            <h1 class="mt-1 text-2xl font-extrabold text-slate-900">{{ $robot->exists ? 'Edit Robot' : 'New Robot' }}</h1>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.robots.index') }}" class="rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-50 transition">
                Cancel
            </a>
            <button type="submit" form="robot-form" class="btn-primary px-6">
                {{ $robot->exists ? 'Save Changes' : 'Create Robot' }}
            </button>
        </div>
    </x-slot>

    @if($errors->any())
        <div class="mb-4 rounded-xl border border-rose-200 bg-rose-50 p-3 text-sm text-rose-700 flex items-start gap-2">
            <svg class="h-4 w-4 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            <div>
                <p class="font-semibold">Please fix the following:</p>
                <ul class="mt-0.5 list-disc list-inside space-y-0.5 text-xs">
                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                </ul>
            </div>
        </div>
    @endif

    <form id="robot-form" method="POST" enctype="multipart/form-data"
          action="{{ $robot->exists ? route('admin.robots.update', $robot) : route('admin.robots.store') }}">
        @csrf
        @if ($robot->exists) @method('PUT') @endif

        {{-- Two-column layout --}}
        <div class="grid grid-cols-2 gap-4">

            {{-- LEFT: Basic info + Image --}}
            <div class="space-y-4">
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-slate-400">Basic Information</h2>

                    <div>
                        <label class="mb-1 block text-sm font-semibold text-slate-700">Robot / EA Name <span class="text-rose-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $robot->name) }}"
                               class="input w-full" placeholder="e.g. EmmioPro EA v3" required>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-semibold text-slate-700">Description</label>
                        <textarea name="description" rows="4" class="input w-full resize-none"
                                  placeholder="What this robot does, strategy, pairs it trades…">{{ old('description', $robot->description) }}</textarea>
                    </div>
                </div>

                {{-- Robot Image Upload --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm space-y-3">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-slate-400">Robot Image</h2>

                    {{-- Current image preview --}}
                    @if($robot->exists && $robot->image)
                        <div id="current-img-wrap" class="relative w-full overflow-hidden rounded-xl border border-slate-200 bg-slate-50">
                            <img id="current-img"
                                 src="{{ Storage::disk('public')->url($robot->image) }}"
                                 alt="{{ $robot->name }}"
                                 class="h-44 w-full object-cover">
                            <div class="absolute inset-0 flex items-end p-3 bg-gradient-to-t from-black/40 to-transparent">
                                <span class="text-xs font-medium text-white/90">Current image — upload a new one to replace</span>
                            </div>
                        </div>
                    @endif

                    {{-- Upload zone --}}
                    <label id="img-drop-zone"
                           class="flex cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 p-6 text-center transition hover:border-brand-400 hover:bg-brand-50">

                        <div id="img-dz-idle" class="flex flex-col items-center gap-2">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white shadow-sm border border-slate-200">
                                <svg class="h-6 w-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-700">Click or drag & drop image</p>
                                <p class="mt-0.5 text-xs text-slate-400">JPG, PNG, WebP — max 2 MB</p>
                            </div>
                        </div>

                        <div id="img-dz-preview" class="hidden flex-col items-center gap-2 w-full">
                            <img id="img-preview-thumb" src="" alt="" class="h-36 w-full object-cover rounded-lg border border-slate-200">
                            <p id="img-dz-filename" class="max-w-[220px] truncate text-sm font-semibold text-emerald-700"></p>
                            <p class="text-xs text-slate-400">Click to change image</p>
                        </div>

                        <input type="file" name="image" id="robot-image-input"
                               accept="image/jpeg,image/png,image/webp" class="hidden">
                    </label>

                    <p class="text-[11px] text-slate-400">Displayed on the robot detail page visible to members.</p>
                </div>
            </div>

            {{-- RIGHT: Pricing & details --}}
            <div class="space-y-4">
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm space-y-4">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-slate-400">Pricing & Details</h2>

                    {{-- Version + Price + Duration in a row --}}
                    <div class="grid grid-cols-3 gap-3">
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-slate-700">Version</label>
                            <input type="text" name="version" value="{{ old('version', $robot->version) }}"
                                   class="input w-full" placeholder="3.2">
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-slate-700">Price (USD) <span class="text-rose-500">*</span></label>
                            <div class="flex items-center rounded-xl border border-slate-300 bg-white focus-within:border-brand-400 focus-within:ring-2 focus-within:ring-brand-100 transition overflow-hidden">
                                <span class="px-2.5 text-sm font-semibold text-slate-400 border-r border-slate-200 bg-slate-50 self-stretch flex items-center">$</span>
                                <input type="number" step="0.01" min="0" name="price"
                                       value="{{ old('price', $robot->exists ? number_format($robot->price / 100, 2, '.', '') : '') }}"
                                       class="flex-1 px-2.5 py-2 text-sm font-semibold text-slate-900 outline-none bg-transparent"
                                       placeholder="0.00" required>
                            </div>
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-slate-700">Duration <span class="text-slate-400 font-normal text-xs">(days)</span></label>
                            <input type="number" name="duration_days" value="{{ old('duration_days', $robot->duration_days) }}"
                                   class="input w-full" placeholder="30">
                            <p class="mt-0.5 text-[11px] text-slate-400">Blank = lifetime</p>
                        </div>
                    </div>

                    {{-- File path --}}
                    <div>
                        <label class="mb-1 block text-sm font-semibold text-slate-700">File Path <span class="text-slate-400 font-normal text-xs">(optional)</span></label>
                        <input type="text" name="file_path" value="{{ old('file_path', $robot->file_path) }}"
                               class="input w-full" placeholder="storage/robots/ea-file.ex4">
                        <p class="mt-0.5 text-[11px] text-slate-400">Relative path to the EA file members download after purchase.</p>
                    </div>
                </div>

                {{-- Visibility --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="published" value="1"
                               @checked(old('published', $robot->published ?? true))
                               class="h-4 w-4 rounded border-slate-300 text-brand-600">
                        <div>
                            <p class="text-sm font-semibold text-slate-800">Published</p>
                            <p class="text-xs text-slate-400">Visible to members on the robots page.</p>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </form>

    <script>
    (function () {
        var input   = document.getElementById('robot-image-input');
        var idle    = document.getElementById('img-dz-idle');
        var preview = document.getElementById('img-dz-preview');
        var thumb   = document.getElementById('img-preview-thumb');
        var fname   = document.getElementById('img-dz-filename');
        var curWrap = document.getElementById('current-img-wrap');

        if (!input) return;

        input.addEventListener('change', function () {
            var file = this.files[0];
            if (!file) return;

            var reader = new FileReader();
            reader.onload = function (e) {
                thumb.src = e.target.result;
                fname.textContent = file.name;
                idle.classList.add('hidden');
                preview.classList.remove('hidden');
                preview.classList.add('flex');
                // Hide old image when a new one is chosen
                if (curWrap) curWrap.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        });
    })();
    </script>
</x-layouts.admin>
