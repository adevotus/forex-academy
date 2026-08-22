{{-- Pass $dark=true when placing inside dark backgrounds (sidebars, panels) --}}
@php $dark = $dark ?? false; @endphp
<a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-brand-400 to-brand-600 shadow-glow transition group-hover:shadow-glow">
        <svg viewBox="0 0 24 24" class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 17l6-6 4 4 8-8"/>
            <path d="M15 7h6v6"/>
        </svg>
    </span>
    <span class="leading-tight">
        <span class="block text-sm font-extrabold tracking-wide {{ $dark ? 'text-white' : 'text-slate-900' }} transition group-hover:text-brand-500">EMMIOXFOREX</span>
        <span class="block text-[10px] font-semibold uppercase tracking-[0.2em] text-brand-400">Academy</span>
    </span>
</a>
