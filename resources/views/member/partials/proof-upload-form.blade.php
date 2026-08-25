<form method="POST" action="{{ route('member.pending.proof') }}" enctype="multipart/form-data" class="space-y-3">
    @csrf
    @if($errors->any())
        <div class="rounded-lg border border-rose-200 bg-rose-50 p-3 text-xs text-rose-700">
            {{ $errors->first() }}
        </div>
    @endif
    <label class="block">
        <span class="block text-xs font-medium text-slate-700 mb-1.5">Proof of payment <span class="text-rose-500">*</span></span>
        <div class="flex cursor-pointer flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 p-5 text-center transition hover:border-brand-400 hover:bg-brand-50/30"
             id="proof-dropzone">
            <svg class="h-7 w-7 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
            </svg>
            <p class="text-xs font-medium text-slate-600" id="proof-label">Click to upload or drag & drop</p>
            <p class="text-[10px] text-slate-400">PNG, JPG, WEBP or PDF — max 5 MB</p>
            <input type="file" name="proof" accept=".png,.jpg,.jpeg,.webp,.pdf" required class="sr-only" id="proof-input">
        </div>
    </label>
    <button type="submit" class="btn-primary w-full justify-center">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
        Submit Payment Proof
    </button>
</form>

<script>
(function () {
    const input    = document.getElementById('proof-input');
    const label    = document.getElementById('proof-label');
    const dropzone = document.getElementById('proof-dropzone');
    if (!input) return;
    dropzone.addEventListener('click', () => input.click());
    input.addEventListener('change', () => {
        if (input.files[0]) label.textContent = input.files[0].name;
    });
    ['dragover','dragleave','drop'].forEach(ev => dropzone.addEventListener(ev, e => e.preventDefault()));
    dropzone.addEventListener('drop', e => {
        const file = e.dataTransfer.files[0];
        if (file) { const dt = new DataTransfer(); dt.items.add(file); input.files = dt.files; label.textContent = file.name; }
    });
})();
</script>
