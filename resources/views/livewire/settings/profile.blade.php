<section class="gh-page mx-auto w-full max-w-7xl px-4 py-6 sm:px-6 sm:py-8 lg:px-8">
    <div class="relative isolate mb-7 overflow-hidden rounded-[2rem] bg-sky-950 px-5 py-7 text-white shadow-2xl shadow-sky-950/15 sm:px-8">
        <div class="absolute -right-14 -top-20 size-64 rounded-full bg-orange-500/20 blur-3xl" aria-hidden="true"></div>
        <div class="relative flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-4">
                <span class="flex size-16 shrink-0 items-center justify-center rounded-2xl bg-orange-600 text-xl font-extrabold text-white shadow-lg">{{ str(auth()->user()->name)->initials() }}</span>
                <div><p class="text-xs font-bold uppercase tracking-[0.16em] text-orange-300">Account settings</p><h1 class="mt-1 text-2xl font-extrabold sm:text-3xl">Your Glow Health profile</h1><p class="mt-1 text-sm text-sky-100">Keep your identity, participation role, and contact information accurate.</p></div>
            </div>
            <a href="{{ route('dashboard') }}" class="inline-flex w-fit items-center gap-2 rounded-xl border border-white/15 bg-white/10 px-4 py-3 text-sm font-bold transition hover:bg-white/15"><i class="fa-solid fa-arrow-left text-xs" aria-hidden="true"></i>Back to dashboard</a>
        </div>
    </div>

    <x-settings.layout :heading="__('Profile information')" :subheading="__('Manage how you appear and participate in the initiative')">
        <div class="grid gap-6 xl:grid-cols-[minmax(0,1.35fr)_minmax(18rem,0.65fr)]" x-data="{ accountType: $wire.entangle('account_type') }">
            <form wire:submit="updateProfileInformation" class="rounded-3xl border border-sky-100 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-7">
                <div class="flex items-start justify-between gap-4 border-b border-slate-200 pb-5 dark:border-slate-700">
                    <div><p class="text-xs font-bold uppercase tracking-[0.14em] text-orange-700">Personal details</p><h3 class="mt-2 text-xl font-extrabold text-sky-950 dark:text-white">Basic information</h3><p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Used for account communication and participation planning.</p></div>
                    <span class="hidden size-11 items-center justify-center rounded-2xl bg-sky-50 text-sky-800 sm:flex"><i class="fa-solid fa-address-card" aria-hidden="true"></i></span>
                </div>

                <div class="mt-6 grid gap-5 sm:grid-cols-2">
                    <x-ui.input wire:model="name" label="Full name" required autocomplete="name"/>
                    <x-ui.input wire:model="email" label="Email address" type="email" required autocomplete="email"/>
                </div>

                @if ($this->hasUnverifiedEmail)
                    <div class="mt-5 flex items-start gap-3 rounded-2xl border border-orange-200 bg-orange-50 p-4 text-sm text-orange-900">
                        <i class="fa-solid fa-circle-exclamation mt-0.5 text-orange-600" aria-hidden="true"></i>
                        <p>Your email address is unverified. <button type="button" wire:click="resendVerificationNotification" class="font-extrabold underline underline-offset-2">Resend the verification email.</button></p>
                    </div>
                @endif

                <div class="my-7 border-t border-slate-200 dark:border-slate-700"></div>

                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-orange-700">Participation</p>
                    <h3 class="mt-2 text-xl font-extrabold text-sky-950 dark:text-white">Your role in the initiative</h3>
                    <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">This personalizes your dashboard and recommended next steps.</p>
                </div>

                <div class="mt-5 grid gap-2 text-sm font-semibold text-slate-700 dark:text-slate-200">
                    <label for="profile-account-type">Participation role</label>
                    <div class="relative">
                        <select id="profile-account-type" wire:model.live="account_type" x-model="accountType" class="w-full appearance-none rounded-xl border border-slate-300 bg-white px-4 py-3 pr-11 text-slate-950 shadow-sm outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-200 dark:border-slate-700 dark:bg-slate-900 dark:text-white">
                            @foreach (\App\Models\User::accountTypes() as $value => $label)<option value="{{ $value }}">{{ $label }}</option>@endforeach
                        </select>
                        <i class="fa-solid fa-chevron-down pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-xs text-slate-400" aria-hidden="true"></i>
                    </div>
                    @error('account_type')<span class="text-sm text-red-600">{{ $message }}</span>@enderror
                    <p x-show="accountType === 'staff'" x-cloak class="text-xs font-normal leading-5 text-orange-700">Selecting Staff records your request only. Internal access still requires administrator verification.</p>
                </div>

                <div class="mt-5" x-show="accountType === 'other'" x-cloak>
                    <x-ui.input wire:model="account_type_other" label="Describe how you would like to participate" maxlength="120" placeholder="Your role or area of interest"/>
                </div>

                <div class="mt-7 flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:items-center sm:justify-between dark:border-slate-700">
                    <p class="text-xs text-slate-500"><i class="fa-solid fa-lock mr-1 text-emerald-600" aria-hidden="true"></i>Your information is protected.</p>
                    <x-ui.button type="submit" wire:loading.attr="disabled"><span wire:loading.remove wire:target="updateProfileInformation">Save profile changes</span><span wire:loading wire:target="updateProfileInformation">Saving…</span></x-ui.button>
                </div>
            </form>

            <aside class="grid content-start gap-5">
                <article class="rounded-3xl border border-sky-100 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-sky-700">Profile summary</p>
                    <div class="mt-5 flex items-center gap-3"><span class="flex size-12 items-center justify-center rounded-2xl bg-sky-950 font-extrabold text-white">{{ str(auth()->user()->name)->initials() }}</span><div class="min-w-0"><p class="truncate font-extrabold">{{ auth()->user()->name }}</p><p class="truncate text-xs text-slate-500">{{ auth()->user()->email }}</p></div></div>
                    <dl class="mt-5 grid gap-3 text-sm">
                        <div class="rounded-2xl bg-sky-50 p-4 dark:bg-slate-800"><dt class="text-xs font-bold uppercase tracking-wide text-slate-500">Current role</dt><dd class="mt-1 font-extrabold text-sky-900 dark:text-white">{{ auth()->user()->account_type === 'other' ? auth()->user()->account_type_other : (\App\Models\User::accountTypes()[auth()->user()->account_type] ?? 'Community member') }}</dd></div>
                        <div class="rounded-2xl bg-slate-50 p-4 dark:bg-slate-800"><dt class="text-xs font-bold uppercase tracking-wide text-slate-500">Email status</dt><dd class="mt-1 flex items-center gap-2 font-bold"><i class="fa-solid {{ auth()->user()->hasVerifiedEmail() ? 'fa-circle-check text-emerald-600' : 'fa-circle-exclamation text-orange-600' }}" aria-hidden="true"></i>{{ auth()->user()->hasVerifiedEmail() ? 'Verified' : 'Verification pending' }}</dd></div>
                        <div class="rounded-2xl bg-slate-50 p-4 dark:bg-slate-800"><dt class="text-xs font-bold uppercase tracking-wide text-slate-500">Member since</dt><dd class="mt-1 font-bold">{{ auth()->user()->created_at->format('F Y') }}</dd></div>
                    </dl>
                </article>

                <article class="rounded-3xl bg-sky-950 p-5 text-white shadow-sm">
                    <span class="flex size-10 items-center justify-center rounded-xl bg-orange-600"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i></span>
                    <h3 class="mt-4 text-lg font-extrabold">Protect your account</h3><p class="mt-2 text-sm leading-6 text-sky-100">Update your password, enable two-factor authentication, or add a passkey.</p>
                    <a href="{{ route('security.edit') }}" class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-orange-300 hover:text-orange-200">Open security settings <i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i></a>
                </article>
            </aside>
        </div>

        @if ($this->showDeleteUser)
            <div class="mt-7"><livewire:settings.delete-user-form/></div>
        @endif
    </x-settings.layout>
</section>
