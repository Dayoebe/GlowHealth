<x-layouts::app :title="__('Confirm password')">
    <div class="gh-page min-w-0 flex-1">
        <section class="mx-auto flex min-h-[calc(100vh-4rem)] w-full max-w-5xl items-center px-4 py-8 sm:px-6 lg:px-8">
            <div class="grid w-full overflow-hidden rounded-[2rem] border border-sky-100 bg-white shadow-2xl shadow-sky-950/10 dark:border-slate-700 dark:bg-slate-900 lg:grid-cols-[0.85fr_1.15fr]">
                <aside class="relative isolate overflow-hidden bg-sky-950 p-6 text-white sm:p-8 lg:p-10">
                    <div class="absolute -right-20 -top-20 size-56 rounded-full bg-orange-500/20 blur-3xl" aria-hidden="true"></div>
                    <div class="relative flex h-full flex-col">
                        <span class="flex size-14 items-center justify-center rounded-2xl bg-orange-700 text-xl shadow-lg"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i></span>
                        <p class="mt-8 text-xs font-bold uppercase tracking-[0.16em] text-orange-300">Protected action</p>
                        <h1 class="mt-3 text-3xl font-extrabold leading-tight">Confirm it’s really you</h1>
                        <p class="mt-4 text-sm leading-7 text-sky-100">This extra check protects your account before you access sensitive security settings or make an important change.</p>
                        <div class="mt-8 rounded-2xl border border-white/10 bg-white/5 p-4 text-sm leading-6 text-sky-100">
                            <i class="fa-solid fa-lock mr-2 text-orange-300" aria-hidden="true"></i>Your password is submitted securely and is never displayed to Glow Health staff.
                        </div>
                    </div>
                </aside>

                <div class="p-6 sm:p-8 lg:p-10">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.14em] text-orange-700">Security verification</p>
                            <h2 class="mt-2 text-2xl font-extrabold text-sky-950 dark:text-white">Enter your password</h2>
                            <p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">Continue as <span class="font-bold">{{ auth()->user()->email }}</span>.</p>
                        </div>
                        <a href="{{ route('dashboard') }}" aria-label="Cancel and return to dashboard" class="flex size-10 shrink-0 items-center justify-center rounded-xl border border-slate-200 text-slate-500 transition hover:border-orange-200 hover:text-orange-700 dark:border-slate-700"><i class="fa-solid fa-xmark" aria-hidden="true"></i></a>
                    </div>

                    <div class="mt-7">
                        <x-passkey-verify options-route="passkey.confirm-options" submit-route="passkey.confirm" :label="__('Confirm with passkey')" :loading-label="__('Confirming...')" :separator="__('Or confirm with password')"/>
                    </div>

                    <form method="POST" action="{{ route('password.confirm.store') }}" class="mt-6 grid gap-5">
                        @csrf
                        <div x-data="{ visible: false }" class="grid gap-2">
                            <label for="confirm-password" class="text-sm font-bold text-slate-700 dark:text-slate-200">Password</label>
                            <div class="relative">
                                <input id="confirm-password" name="password" :type="visible ? 'text' : 'password'" required autofocus autocomplete="current-password" class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-4 pr-12 text-slate-950 shadow-sm outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-200 dark:border-slate-700 dark:bg-slate-800 dark:text-white">
                                <button type="button" @click="visible = ! visible" :aria-label="visible ? 'Hide password' : 'Show password'" class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-slate-500 transition hover:text-orange-700">
                                    <i class="fa-solid" :class="visible ? 'fa-eye-slash' : 'fa-eye'" aria-hidden="true"></i>
                                </button>
                            </div>
                            @error('password')<span class="text-sm font-semibold text-red-600 dark:text-red-400">{{ $message }}</span>@enderror
                        </div>

                        <button type="submit" data-test="confirm-password-button" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-orange-700 px-5 py-3 font-bold text-white shadow-lg shadow-orange-950/10 transition hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2">
                            <i class="fa-solid fa-unlock-keyhole" aria-hidden="true"></i>Confirm and continue
                        </button>
                    </form>

                    <a href="{{ route('dashboard') }}" class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-sky-800 hover:text-orange-700 dark:text-sky-200"><i class="fa-solid fa-arrow-left text-xs" aria-hidden="true"></i>Return to dashboard</a>
                </div>
            </div>
        </section>
    </div>
</x-layouts::app>
