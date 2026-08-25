<x-layouts.admin title="Testimonials">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Testimonials</h1>
            <p class="mt-1 text-sm text-slate-500">Manage what members say  shown on the website and member area.</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="btn-primary">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Add Testimonial
        </a>
    </x-slot>

    @if(session('status'))
        <div class="mb-4 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
            <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('status') }}
        </div>
    @endif

    @if($testimonials->isEmpty())
        <div class="flex flex-col items-center gap-3 rounded-2xl border border-slate-200 bg-white py-16 text-center shadow-sm">
            <svg class="h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
            </svg>
            <p class="text-sm font-semibold text-slate-500">No testimonials yet.</p>
            <a href="{{ route('admin.testimonials.create') }}" class="btn-primary text-xs px-4 py-2">Add the first one</a>
        </div>
    @else
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">
            @foreach($testimonials as $t)
                <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden flex flex-col">

                    {{-- Media preview --}}
                    @if($t->media_path)
                        @if($t->isVideo())
                            <video src="{{ $t->mediaUrl() }}"
                                   class="h-40 w-full object-cover bg-slate-900"
                                   muted playsinline
                                   onmouseenter="this.play()" onmouseleave="this.pause();this.currentTime=0">
                            </video>
                        @else
                            <img src="{{ $t->mediaUrl() }}" alt="{{ $t->name }}"
                                 class="h-40 w-full object-cover">
                        @endif
                    @else
                        <div class="flex h-40 w-full items-center justify-center bg-gradient-to-br from-brand-50 to-slate-100">
                            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-brand-100 text-2xl font-extrabold text-brand-600 ring-4 ring-white shadow">
                                {{ $t->initial() }}
                            </div>
                        </div>
                    @endif

                    <div class="flex flex-1 flex-col p-5">
                        {{-- Stars --}}
                        @if($t->rating)
                            <div class="flex gap-0.5 mb-3">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="h-4 w-4 {{ $i <= $t->rating ? 'text-gold-400' : 'text-slate-200' }}"
                                         fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                @endfor
                            </div>
                        @endif

                        <p class="flex-1 text-sm leading-relaxed text-slate-600 line-clamp-3 italic">"{{ $t->content }}"</p>

                        <div class="mt-4 border-t border-slate-100 pt-4">
                            <p class="font-semibold text-slate-900 text-sm">{{ $t->name }}</p>
                            @if($t->role)
                                <p class="text-xs text-slate-400">{{ $t->role }}</p>
                            @endif
                        </div>

                        {{-- Actions --}}
                        <div class="mt-4 flex items-center gap-2">
                            {{-- Toggle --}}
                            <form method="POST" action="{{ route('admin.testimonials.toggle', $t) }}">
                                @csrf @method('PATCH')
                                <button class="rounded-lg border px-3 py-1.5 text-xs font-semibold transition {{ $t->is_active ? 'border-emerald-200 bg-emerald-50 text-emerald-700 hover:bg-emerald-100' : 'border-slate-200 bg-slate-50 text-slate-500 hover:bg-slate-100' }}">
                                    {{ $t->is_active ? '● Live' : '○ Hidden' }}
                                </button>
                            </form>

                            <a href="{{ route('admin.testimonials.edit', $t) }}"
                               class="ml-auto rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-600 hover:bg-slate-50 transition">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}"
                                  onsubmit="return confirm('Delete this testimonial?')">
                                @csrf @method('DELETE')
                                <button class="rounded-lg border border-rose-200 bg-rose-50 px-3 py-1.5 text-xs font-semibold text-rose-600 hover:bg-rose-100 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">{{ $testimonials->links() }}</div>
    @endif
</x-layouts.admin>
