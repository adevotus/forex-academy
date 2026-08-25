<x-layouts.admin :title="isset($method->id) ? 'Edit Payment Method' : 'Add Payment Method'">
    <x-slot:header>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.payment-methods.index') }}"
               class="flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-600 shadow-sm transition hover:bg-slate-50">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back
            </a>
            <div>
                <h1 class="text-xl font-bold text-slate-900">{{ isset($method->id) ? 'Edit Payment Method' : 'Add Payment Method' }}</h1>
                <p class="text-sm text-slate-500 mt-0.5">This will appear on the member payment page.</p>
            </div>
        </div>
    </x-slot:header>

    <div class="mx-auto max-w-2xl">
        <form method="POST"
              action="{{ isset($method->id) ? route('admin.payment-methods.update', $method) : route('admin.payment-methods.store') }}"
              class="space-y-7">
            @csrf
            @if(isset($method->id)) @method('PUT') @endif

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm space-y-5">
                <h2 class="text-sm font-bold text-slate-800 border-b border-slate-100 pb-3">Basic Info</h2>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    {{-- Name --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Method Name <span class="text-rose-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $method->name) }}" required
                               placeholder="e.g. M-Pesa"
                               class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 @error('name') border-rose-400 @enderror">
                        @error('name')<p class="mt-1 text-xs text-rose-600">{{ $message }}</p>@enderror
                    </div>

                    {{-- Subtitle --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Subtitle</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle', $method->subtitle) }}"
                               placeholder="e.g. Mobile Money Transfer"
                               class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20">
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                    {{-- Type --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Type <span class="text-rose-500">*</span></label>
                        <select name="type" class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none">
                            @foreach(['mobile_money' => 'Mobile Money','bank_transfer' => 'Bank Transfer','crypto' => 'Cryptocurrency','paypal' => 'PayPal','other' => 'Other'] as $val => $label)
                                <option value="{{ $val }}" {{ old('type', $method->type) === $val ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Icon colour --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Icon Colour <span class="text-rose-500">*</span></label>
                        <select name="icon_color" class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none">
                            @foreach(['emerald' => 'Green (Emerald)','blue' => 'Blue','gold' => 'Gold / Yellow','purple' => 'Purple','slate' => 'Grey'] as $val => $label)
                                <option value="{{ $val }}" {{ old('icon_color', $method->icon_color ?? 'emerald') === $val ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Order --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Display Order</label>
                        <input type="number" name="order" min="0" value="{{ old('order', $method->order ?? 0) }}"
                               class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none">
                    </div>
                </div>

                {{-- Note --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Note <span class="text-slate-400 font-normal text-xs">(shown below the payment card)</span></label>
                    <textarea name="note" rows="2" placeholder="e.g. Use your email address as payment reference so we can match your payment quickly."
                              class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none resize-none">{{ old('note', $method->note) }}</textarea>
                </div>

                {{-- Active --}}
                <label class="flex cursor-pointer items-center gap-3">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $method->is_active ?? true) ? 'checked' : '' }}
                           class="h-4 w-4 rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                    <span class="text-sm font-medium text-slate-700">Active (visible to members)</span>
                </label>
            </div>

            {{-- Dynamic detail rows --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-sm font-bold text-slate-800">Payment Details</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Add fields like Phone, Account No., Name, Branch etc.</p>
                    </div>
                    <button type="button" id="add-detail-row"
                            class="flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-700 shadow-sm transition hover:bg-slate-50">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        Add Field
                    </button>
                </div>

                <div id="details-container" class="space-y-3">
                    @php $existingDetails = old('details', $method->details ?? []); @endphp
                    @forelse($existingDetails as $i => $detail)
                        <div class="detail-row flex items-center gap-3">
                            <input type="text" name="details[{{ $i }}][label]" value="{{ $detail['label'] ?? '' }}"
                                   placeholder="Label (e.g. Phone)"
                                   class="flex-1 rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none">
                            <input type="text" name="details[{{ $i }}][value]" value="{{ $detail['value'] ?? '' }}"
                                   placeholder="Value (e.g. +255 712 345 678)"
                                   class="flex-[2] rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none">
                            <button type="button" onclick="this.closest('.detail-row').remove()"
                                    class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg border border-rose-200 bg-rose-50 text-rose-500 transition hover:bg-rose-100">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                    @empty
                        {{-- empty placeholder so JS knows starting index --}}
                    @endforelse
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.payment-methods.index') }}" class="btn-outline">Cancel</a>
                <button type="submit" class="btn-primary">
                    {{ isset($method->id) ? 'Save Changes' : 'Create Method' }}
                </button>
            </div>
        </form>
    </div>

    <script>
    (function () {
        let rowIndex = {{ count(old('details', $method->details ?? [])) }};

        document.getElementById('add-detail-row').addEventListener('click', function () {
            const container = document.getElementById('details-container');
            const row = document.createElement('div');
            row.className = 'detail-row flex items-center gap-3';
            row.innerHTML = `
                <input type="text" name="details[${rowIndex}][label]" placeholder="Label (e.g. Phone)"
                       class="flex-1 rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none">
                <input type="text" name="details[${rowIndex}][value]" placeholder="Value (e.g. +255 712 345 678)"
                       class="flex-[2] rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none">
                <button type="button" onclick="this.closest('.detail-row').remove()"
                        class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg border border-rose-200 bg-rose-50 text-rose-500 transition hover:bg-rose-100">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            `;
            container.appendChild(row);
            rowIndex++;
        });
    })();
    </script>
</x-layouts.admin>
