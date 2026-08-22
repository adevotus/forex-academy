<x-layouts.member title="Mentorship">
    <x-slot name="header">
        <div>
            <h1 class="text-2xl font-bold text-white">Mentorship</h1>
            <p class="mt-1 text-sm text-slate-400">Personalised guidance to build discipline and a structured strategy.</p>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        @foreach ($sessions as $session)
            <div class="card p-6">
                <span class="badge">{{ $session->type === 'one_on_one' ? '1-on-1' : 'Group' }}</span>
                <h3 class="mt-3 text-lg font-semibold text-white">{{ $session->title }}</h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-400">{{ $session->description }}</p>
                <p class="mt-4 text-xl font-bold text-white">{{ $session->priceFormatted() }}</p>
                <form method="POST" action="{{ route('member.mentorship.book', $session) }}" class="mt-5 space-y-3">
                    @csrf
                    <div>
                        <label class="label text-xs">Preferred date/time (optional)</label>
                        <input type="datetime-local" name="preferred_at" class="input">
                    </div>
                    <button class="btn-primary w-full">Book Session</button>
                </form>
            </div>
        @endforeach
    </div>

    @if ($bookings->count())
        <div class="mt-10">
            <h2 class="text-lg font-semibold text-white">My Bookings</h2>
            <div class="mt-4 card divide-y divide-white/5">
                @foreach ($bookings as $booking)
                    <div class="flex items-center justify-between px-6 py-4">
                        <div>
                            <p class="text-sm font-medium text-white">{{ $booking->session->title }}</p>
                            <p class="text-xs text-slate-500">{{ $booking->preferred_at?->format('M d, Y H:i') ?? 'No preferred time set' }}</p>
                        </div>
                        <span class="badge {{ $booking->status === 'confirmed' ? 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300' : '' }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</x-layouts.member>
