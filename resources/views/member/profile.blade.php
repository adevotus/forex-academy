<x-layouts.member title="My Profile">
    <x-slot name="header">
        <div>
            <h1 class="text-lg font-bold text-slate-900">My Profile</h1>
            <p class="text-xs text-slate-500">Manage your personal details and password.</p>
        </div>
    </x-slot>

    @if(session('status'))
        <div class="mb-6 flex items-center gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
            <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('status') }}
        </div>
    @endif

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

        {{-- ── Avatar / Info card ── --}}
        <div class="lg:col-span-1">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm text-center">
                {{-- Avatar circle --}}
                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-gradient-to-br from-brand-500 to-brand-600 text-3xl font-extrabold text-white shadow-lg">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <h2 class="mt-4 text-base font-extrabold text-slate-900">{{ $user->name }}</h2>
                <p class="mt-0.5 text-sm text-slate-500">{{ $user->email }}</p>

                <div class="mt-4 inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-emerald-200">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                    {{ ucfirst($user->status) }} Member
                </div>

                <div class="mt-6 space-y-3 text-left text-sm">
                    <div class="flex items-center gap-3 rounded-xl bg-slate-50 px-4 py-3">
                        <svg class="h-4 w-4 flex-shrink-0 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span class="text-slate-600">{{ $user->phone ?: 'No phone added' }}</span>
                    </div>
                    <div class="flex items-center gap-3 rounded-xl bg-slate-50 px-4 py-3">
                        <svg class="h-4 w-4 flex-shrink-0 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span class="text-slate-600">{{ $user->country ?: 'No country added' }}</span>
                    </div>
                    <div class="flex items-center gap-3 rounded-xl bg-slate-50 px-4 py-3">
                        <svg class="h-4 w-4 flex-shrink-0 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span class="text-slate-600">Joined {{ $user->created_at->format('M Y') }}</span>
                    </div>
                </div>

                {{-- Email note --}}
                <div class="mt-5 rounded-xl border border-amber-200 bg-amber-50 px-4 py-3 text-xs text-amber-700 text-left">
                    <p class="font-semibold">Need to change your email?</p>
                    <p class="mt-0.5 leading-relaxed">Email changes require admin approval. Please contact us and we'll update it for you.</p>
                </div>
            </div>
        </div>

        {{-- ── Right: Forms ── --}}
        <div class="space-y-6 lg:col-span-2">

            {{-- Personal Info form --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h3 class="mb-5 text-sm font-bold uppercase tracking-wider text-slate-400">Personal Information</h3>

                <form method="POST" action="{{ route('member.profile.update') }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    {{-- Email (read-only) --}}
                    <div>
                        <label class="mb-1 block text-sm font-semibold text-slate-700">Email Address <span class="text-xs font-normal text-slate-400">(contact admin to change)</span></label>
                        <div class="flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm text-slate-500 cursor-not-allowed">
                            <svg class="h-4 w-4 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            {{ $user->email }}
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-slate-700">Full Name <span class="text-rose-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                   class="input w-full @error('name') border-rose-300 @enderror"
                                   placeholder="Your full name" required>
                            @error('name')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-slate-700">Phone Number</label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                   class="input w-full @error('phone') border-rose-300 @enderror"
                                   placeholder="+255 700 000 000">
                            @error('phone')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-semibold text-slate-700">Country</label>
                        <input type="text" name="country" value="{{ old('country', $user->country) }}"
                               class="input w-full @error('country') border-rose-300 @enderror"
                               placeholder="e.g. Tanzania">
                        @error('country')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex justify-end pt-2">
                        <button type="submit" class="btn-primary px-6">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>

            {{-- Change Password form --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h3 class="mb-5 text-sm font-bold uppercase tracking-wider text-slate-400">Change Password</h3>

                <form method="POST" action="{{ route('member.profile.password') }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="mb-1 block text-sm font-semibold text-slate-700">Current Password</label>
                        <input type="password" name="current_password"
                               class="input w-full @error('current_password') border-rose-300 @enderror"
                               placeholder="••••••••" autocomplete="current-password">
                        @error('current_password')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-slate-700">New Password</label>
                            <input type="password" name="password"
                                   class="input w-full @error('password') border-rose-300 @enderror"
                                   placeholder="••••••••" autocomplete="new-password">
                            @error('password')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-slate-700">Confirm New Password</label>
                            <input type="password" name="password_confirmation"
                                   class="input w-full"
                                   placeholder="••••••••" autocomplete="new-password">
                        </div>
                    </div>

                    <p class="text-xs text-slate-400">Minimum 8 characters.</p>

                    <div class="flex justify-end pt-2">
                        <button type="submit" class="inline-flex items-center gap-2 rounded-xl border border-slate-300 bg-white px-6 py-2 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">
                            Update Password
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-layouts.member>
