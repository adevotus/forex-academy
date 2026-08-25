<x-layouts.admin title="Contact Message">
    <x-slot:header>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.contact.index') }}"
               class="flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-600 shadow-sm transition hover:bg-slate-50">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back
            </a>
            <div>
                <h1 class="text-xl font-bold text-slate-900">Contact Message</h1>
                <p class="text-sm text-slate-500 mt-0.5">Received {{ $contact->created_at->format('M j, Y \a\t g:i A') }}</p>
            </div>
        </div>
        <form method="POST" action="{{ route('admin.contact.destroy', $contact) }}"
              onsubmit="return confirm('Delete this message?')">
            @csrf @method('DELETE')
            <button type="submit"
                    class="inline-flex items-center gap-1.5 rounded-lg border border-rose-200 bg-rose-50 px-3 py-1.5 text-xs font-medium text-rose-700 shadow-sm transition hover:bg-rose-100">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                Delete
            </button>
        </form>
    </x-slot:header>

    <div class="mx-auto max-w-3xl space-y-6">

        {{-- Message card --}}
        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">

            {{-- Sender info --}}
            <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-100 bg-slate-50/70 px-6 py-4">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-brand-100 text-lg font-bold text-brand-700 flex-shrink-0">
                        {{ strtoupper(mb_substr($contact->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">{{ $contact->name }}</p>
                        <a href="mailto:{{ $contact->email }}" class="text-sm text-brand-600 hover:underline">{{ $contact->email }}</a>
                    </div>
                </div>
                <div class="text-right">
                    @if($contact->status === 'new')
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-100 px-2.5 py-1 text-xs font-semibold text-brand-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span> New
                        </span>
                    @elseif($contact->status === 'read')
                        <span class="inline-flex rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-500">Read</span>
                    @else
                        <span class="inline-flex rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">Replied</span>
                    @endif
                    <p class="mt-1 text-xs text-slate-400">{{ $contact->created_at->diffForHumans() }}</p>
                </div>
            </div>

            {{-- Subject + body --}}
            <div class="px-6 py-6">
                <h2 class="text-base font-semibold text-slate-900 mb-4">{{ $contact->subject }}</h2>
                <div class="rounded-xl bg-slate-50 p-5">
                    <p class="text-sm leading-relaxed text-slate-700 whitespace-pre-wrap">{{ $contact->message }}</p>
                </div>
                @if($contact->ip_address)
                    <p class="mt-4 text-xs text-slate-400">Submitted from IP: {{ $contact->ip_address }}</p>
                @endif
            </div>
        </div>

        {{-- Reply prompt --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-sm font-semibold text-slate-900 mb-1">Reply to this message</h3>
            <p class="text-xs text-slate-500 mb-4">Use your email client to reply directly to the sender.</p>
            <a href="mailto:{{ $contact->email }}?subject=Re: {{ urlencode($contact->subject) }}"
               class="btn-primary inline-flex items-center gap-2">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                </svg>
                Reply via Email
            </a>
        </div>

    </div>
</x-layouts.admin>
