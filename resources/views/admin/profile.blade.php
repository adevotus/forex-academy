<x-layouts.admin title="Profile">
    <x-slot name="header">
        <h1 class="text-2xl font-extrabold text-slate-900">My Profile</h1>
    </x-slot>

    {{-- ── Top: Avatar + Info (left) / Edit form (right) ── --}}
    <div class="card overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-3">

            {{-- Left: Identity --}}
            <div class="flex flex-col items-center justify-center gap-4 border-b border-slate-100 bg-gradient-to-b from-slate-50 to-white p-8 text-center lg:border-b-0 lg:border-r">
                <div class="flex h-20 w-20 items-center justify-center rounded-2xl bg-gold-500/15 text-3xl font-extrabold text-gold-600">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="text-lg font-extrabold text-slate-900">{{ auth()->user()->name }}</p>
                    <p class="mt-0.5 text-sm text-slate-500">{{ auth()->user()->email }}</p>
                    <span class="mt-2 inline-flex items-center gap-1.5 rounded-full border border-gold-300/60 bg-gold-50 px-3 py-1 text-xs font-semibold text-gold-700">
                        <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        Administrator
                    </span>
                </div>
                {{-- Quick stats --}}
                <div class="mt-2 w-full space-y-2 rounded-xl border border-slate-100 bg-white p-4 text-left">
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-slate-500">Role</span>
                        <span class="font-semibold text-slate-700">Admin</span>
                    </div>
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-slate-500">Member since</span>
                        <span class="font-semibold text-slate-700">{{ auth()->user()->created_at->format('M Y') }}</span>
                    </div>
                    @if(auth()->user()->phone)
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-slate-500">Phone</span>
                        <span class="font-semibold text-slate-700">{{ auth()->user()->phone }}</span>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Right: Edit form --}}
            <div class="col-span-2 p-8">
                <h2 class="mb-6 text-base font-extrabold text-slate-900">Edit Information</h2>
                <form method="POST" action="{{ route('admin.profile.update') }}" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <label class="label" for="name">Full Name</label>
                            <input id="name" type="text" name="name"
                                   value="{{ old('name', auth()->user()->name) }}"
                                   class="input" required>
                            @error('name')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="label" for="email">Email Address</label>
                            <input id="email" type="email" name="email"
                                   value="{{ old('email', auth()->user()->email) }}"
                                   class="input" required>
                            @error('email')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label class="label" for="phone">Phone Number</label>
                        <input id="phone" type="text" name="phone"
                               value="{{ old('phone', auth()->user()->phone) }}"
                               class="input" placeholder="+255 700 000000">
                        @error('phone')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex justify-end pt-2">
                        <button type="submit" class="btn-primary px-7 py-2.5">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ── Change Password ── --}}
    <div class="mt-6 card overflow-hidden">
        <div class="border-b border-slate-100 bg-slate-50 px-8 py-5">
            <h2 class="text-base font-extrabold text-slate-900">Change Password</h2>
            <p class="mt-0.5 text-xs text-slate-500">Use a strong password of at least 8 characters.</p>
        </div>
        <form method="POST" action="{{ route('admin.profile.password') }}" class="p-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                <div>
                    <label class="label" for="current_password">Current Password</label>
                    <div class="relative">
                        <input id="current_password" type="password" name="current_password"
                               class="input pr-11" placeholder="••••••••" required>
                        <button type="button" data-toggle-pw="current_password"
                                class="absolute inset-y-0 right-3 flex items-center text-slate-400 hover:text-slate-600 transition">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </button>
                    </div>
                    @error('current_password')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="label" for="password">New Password</label>
                    <div class="relative">
                        <input id="password" type="password" name="password"
                               class="input pr-11" placeholder="Min. 8 characters" required>
                        <button type="button" data-toggle-pw="password"
                                class="absolute inset-y-0 right-3 flex items-center text-slate-400 hover:text-slate-600 transition">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </button>
                    </div>
                    @error('password')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="label" for="password_confirmation">Confirm New Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                           class="input" placeholder="Re-enter new password" required>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="btn-primary px-7 py-2.5">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    Update Password
                </button>
            </div>
        </form>
    </div>

    <script>
        document.querySelectorAll('[data-toggle-pw]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const input = document.getElementById(btn.dataset.togglePw);
                if (input) input.type = input.type === 'password' ? 'text' : 'password';
            });
        });
    </script>
</x-layouts.admin>
