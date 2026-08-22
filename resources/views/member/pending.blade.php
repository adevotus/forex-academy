<x-layouts.public title="Approval Pending — EMMIOXFOREX ACADEMY">
    <section class="flex min-h-[80vh] items-center justify-center px-4 py-16">
        <div class="w-full max-w-lg text-center">
            <div class="card p-10">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-gold-400/10 text-gold-300">
                    <x-icon name="clock" class="h-7 w-7" />
                </div>
                <h1 class="mt-5 text-2xl font-bold text-white">Your account is pending approval</h1>
                <p class="mt-3 text-sm leading-relaxed text-slate-400">
                    Thanks for registering, {{ $user->name }}! An EMMIOXFOREX ACADEMY admin needs to confirm your
                    registration fee before you can access courses, robots, signals and mentorship. This usually
                    doesn't take long — you'll be able to log in and see your dashboard update automatically once approved.
                </p>
                <div class="mt-6 rounded-xl border border-white/10 bg-white/5 p-4 text-left text-sm text-slate-400">
                    <p class="font-medium text-slate-300">What happens next:</p>
                    <ul class="mt-2 space-y-1.5">
                        <li class="flex items-center gap-2"><x-icon name="check" class="h-4 w-4 text-emerald-400" /> We verify your registration payment</li>
                        <li class="flex items-center gap-2"><x-icon name="check" class="h-4 w-4 text-emerald-400" /> Your account status changes to "Approved"</li>
                        <li class="flex items-center gap-2"><x-icon name="check" class="h-4 w-4 text-emerald-400" /> Your Starter courses unlock immediately</li>
                    </ul>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mt-8">
                    @csrf
                    <button class="btn-outline">Log out</button>
                </form>
            </div>
        </div>
    </section>
</x-layouts.public>
