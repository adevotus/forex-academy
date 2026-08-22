<x-layouts.admin title="Preferences">
    <x-slot name="header">
        <h1 class="text-2xl font-extrabold text-slate-900">Preferences</h1>
    </x-slot>

    <form method="POST" action="{{ route('admin.preferences.update') }}">
        @csrf
        @method('PUT')

        <div class="card overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-3">

                {{-- Left: icon + description --}}
                <div class="flex flex-col gap-6 border-b border-slate-100 bg-gradient-to-b from-slate-50 to-white p-8 lg:border-b-0 lg:border-r">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                    </div>
                    <div>
                        <p class="text-base font-extrabold text-slate-900">Display &amp; Alerts</p>
                        <p class="mt-1 text-sm text-slate-500">Customize how the admin panel looks and which events trigger notification badges.</p>
                    </div>
                    <div class="mt-auto rounded-xl border border-slate-200 bg-white p-4">
                        <p class="text-xs font-semibold text-slate-700">Current currency</p>
                        <p class="mt-1 text-2xl font-extrabold text-brand-600">{{ $prefs['currency'] ?? 'USD' }}</p>
                        <p class="mt-0.5 text-xs text-slate-400">{{ ($prefs['currency'] ?? 'USD') === 'TZS' ? 'Tanzanian Shilling' : 'US Dollar' }}</p>
                    </div>
                </div>

                {{-- Right: settings --}}
                <div class="col-span-2 p-8 space-y-8">

                    {{-- Currency --}}
                    <div>
                        <label class="label mb-1">Default Currency</label>
                        <p class="mb-4 text-xs text-slate-500">Controls how prices are displayed across the admin panel.</p>
                        <div class="grid grid-cols-2 gap-3">
                            @foreach (['USD' => ['$', 'US Dollar'], 'TZS' => ['TZS', 'Tanzanian Shilling']] as $code => [$symbol, $label])
                                <label class="relative flex cursor-pointer items-center gap-4 rounded-xl border-2 p-4 transition
                                    {{ ($prefs['currency'] ?? 'USD') === $code
                                        ? 'border-brand-400 bg-brand-50'
                                        : 'border-slate-200 bg-white hover:border-slate-300' }}">
                                    <input type="radio" name="currency" value="{{ $code }}"
                                           class="sr-only"
                                           {{ ($prefs['currency'] ?? 'USD') === $code ? 'checked' : '' }}>
                                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-lg bg-white font-extrabold text-slate-700 ring-1 ring-slate-200 text-sm shadow-sm">
                                        {{ $symbol }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-slate-900">{{ $code }}</p>
                                        <p class="text-xs text-slate-500">{{ $label }}</p>
                                    </div>
                                    @if(($prefs['currency'] ?? 'USD') === $code)
                                        <svg class="absolute right-3 top-3 h-4 w-4 text-brand-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    @endif
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <hr class="border-slate-100">

                    {{-- Notifications --}}
                    <div>
                        <label class="label mb-1">Notification Badges</label>
                        <p class="mb-4 text-xs text-slate-500">Choose which events trigger the red badge on the bell icon.</p>
                        <div class="space-y-3">
                            @foreach ([
                                ['notify_new_member',     'New member registered',        'Notify when a new member signs up.',                'bg-brand-50 text-brand-600'],
                                ['notify_new_payment',    'New payment submitted',         'Alert when a member submits a payment for review.',  'bg-gold-50 text-gold-600'],
                                ['notify_payment_failed', 'Payment rejected notification', 'Badge when a payment is rejected for follow-up.',   'bg-rose-50 text-rose-600'],
                            ] as [$key, $title, $desc, $iconColor])
                                <label class="flex cursor-pointer items-center justify-between gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 transition hover:border-slate-300 hover:bg-white">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg {{ $iconColor }}">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-slate-900">{{ $title }}</p>
                                            <p class="text-xs text-slate-500">{{ $desc }}</p>
                                        </div>
                                    </div>
                                    <div class="relative flex-shrink-0">
                                        <input type="hidden"   name="{{ $key }}" value="0">
                                        <input type="checkbox" name="{{ $key }}" value="1"
                                               class="peer sr-only"
                                               {{ ($prefs[$key] ?? false) ? 'checked' : '' }}>
                                        <div class="h-6 w-11 rounded-full bg-slate-200 transition peer-checked:bg-brand-500"></div>
                                        <div class="absolute left-0.5 top-0.5 h-5 w-5 rounded-full bg-white shadow transition peer-checked:translate-x-5"></div>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex justify-end pt-2">
                        <button type="submit" class="btn-primary px-8 py-2.5">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            Save Preferences
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.querySelectorAll('input[name="currency"]').forEach(function(radio) {
            radio.addEventListener('change', function () {
                document.querySelectorAll('input[name="currency"]').forEach(function(r) {
                    const card = r.closest('label');
                    if (r.checked) {
                        card.classList.add('border-brand-400','bg-brand-50');
                        card.classList.remove('border-slate-200','bg-white');
                    } else {
                        card.classList.remove('border-brand-400','bg-brand-50');
                        card.classList.add('border-slate-200','bg-white');
                    }
                });
            });
        });
    </script>
</x-layouts.admin>
