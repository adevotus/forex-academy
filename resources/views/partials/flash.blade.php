@if (session('status'))
    <div class="mb-6 rounded-xl border border-emerald-400/30 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-300">
        {{ session('status') }}
    </div>
@endif
@if (session('info'))
    <div class="mb-6 rounded-xl border border-brand-400/30 bg-brand-400/10 px-4 py-3 text-sm text-brand-300">
        {{ session('info') }}
    </div>
@endif
@if ($errors->any())
    <div class="mb-6 rounded-xl border border-rose-400/30 bg-rose-400/10 px-4 py-3 text-sm text-rose-300">
        <ul class="list-inside list-disc space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
