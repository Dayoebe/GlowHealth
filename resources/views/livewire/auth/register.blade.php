<x-layouts::auth.simple :title="__('Create your Glow Health account')" wide>
<div class="grid lg:grid-cols-[0.9fr_1.1fr]">
    <aside class="relative isolate overflow-hidden bg-sky-950 px-6 py-8 text-white sm:px-10 sm:py-12 lg:min-h-[42rem]">
        <div class="absolute -left-20 top-24 size-64 rounded-full bg-orange-500/20 blur-3xl" aria-hidden="true"></div>
        <div class="absolute -right-16 bottom-10 size-72 rounded-full bg-sky-500/20 blur-3xl" aria-hidden="true"></div>
        <div class="relative flex h-full flex-col">
            <a href="{{ route('home') }}" class="w-44 rounded-xl bg-white p-2"><img src="{{ asset('glow-health-logo.png') }}" width="940" height="500" alt="Glow Health Outreach Initiative" class="h-auto w-full"></a>
            <div class="py-7 sm:my-auto sm:py-10">
                <p class="inline-flex items-center gap-2 rounded-full border border-orange-300/30 bg-orange-400/10 px-3 py-2 text-xs font-bold uppercase tracking-[0.16em] text-orange-200"><span class="size-2 rounded-full bg-orange-400"></span> Community care starts here</p>
                <h1 class="mt-6 text-3xl font-extrabold leading-tight sm:text-4xl">One account.<br><span class="text-orange-300">More ways to make an impact.</span></h1>
                <p class="mt-5 max-w-md text-sm leading-7 text-sky-100">Join the platform supporting residents, volunteers, partners, and healthier communities across Ondo State.</p>
                <div class="mt-8 hidden gap-4 sm:grid">
                    @foreach ([['fa-calendar-check','Stay outreach-ready','Receive important schedules and participation guidance.'],['fa-hand-holding-medical','Take part in care','Connect with volunteer and community health opportunities.'],['fa-shield-heart','A secure account','Manage your details through a protected personal space.']] as [$icon,$title,$copy])
                        <div class="flex gap-4 rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur">
                            <span class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-orange-500 text-white"><i class="fa-solid {{ $icon }}" aria-hidden="true"></i></span>
                            <div><h2 class="font-bold">{{ $title }}</h2><p class="mt-1 text-xs leading-5 text-sky-100">{{ $copy }}</p></div>
                        </div>
                    @endforeach
                </div>
            </div>
            <p class="hidden text-xs text-sky-200 sm:block">We care. We reach. We impact.</p>
        </div>
    </aside>

    <section class="px-6 py-8 sm:px-10 sm:py-12 lg:px-14">
        <div class="mx-auto max-w-lg">
            <div class="flex items-start justify-between gap-5">
                <div><p class="text-sm font-bold uppercase tracking-[0.14em] text-orange-700">Get started</p><h2 class="mt-2 text-3xl font-extrabold text-sky-950 dark:text-white">Create your account</h2><p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">It only takes a minute to join Glow Health.</p></div>
                <span class="hidden size-12 items-center justify-center rounded-2xl bg-orange-50 text-orange-700 sm:flex"><i class="fa-solid fa-user-plus" aria-hidden="true"></i></span>
            </div>

            <form method="POST" action="{{ route('register.store') }}" class="mt-8 grid gap-5" x-data="{ showPassword: false, showConfirmation: false, accountType: @js(old('account_type', 'community_member')) }">
                @csrf
                <x-ui.input name="name" label="Full name" :value="old('name')" required autocomplete="name" placeholder="How should we address you?"/>
                <x-ui.input name="email" label="Email address" :value="old('email')" type="email" required autocomplete="email" placeholder="you@example.com"/>
                <div class="grid gap-2 text-sm font-semibold text-slate-700 dark:text-slate-200">
                    <label for="account-type">How would you like to participate?</label>
                    <div class="relative">
                        <select id="account-type" name="account_type" x-model="accountType" required class="w-full appearance-none rounded-xl border border-slate-300 bg-white px-4 py-3 pr-11 text-slate-950 shadow-sm outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-200 dark:border-slate-700 dark:bg-slate-900 dark:text-white">
                            @foreach (\App\Models\User::accountTypes() as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </select>
                        <i class="fa-solid fa-chevron-down pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-xs text-slate-400" aria-hidden="true"></i>
                    </div>
                    <p class="text-xs font-normal leading-5 text-slate-500" x-show="accountType === 'staff'" x-cloak>Staff accounts require approval before any internal access is granted.</p>
                    @error('account_type')<span class="text-sm text-red-600">{{ $message }}</span>@enderror
                </div>
                <div x-show="accountType === 'other'" x-cloak>
                    <x-ui.input name="account_type_other" label="Tell us how you would like to participate" :value="old('account_type_other')" x-bind:required="accountType === 'other'" maxlength="120" placeholder="Describe your role or interest"/>
                </div>
                <div class="grid gap-2 text-sm font-semibold text-slate-700 dark:text-slate-200">
                    <label for="signup-password">Password</label>
                    <div class="relative">
                        <input id="signup-password" name="password" :type="showPassword ? 'text' : 'password'" required autocomplete="new-password" minlength="8" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 pr-12 text-slate-950 shadow-sm outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-200 dark:border-slate-700 dark:bg-slate-900 dark:text-white" placeholder="At least 8 characters">
                        <button type="button" class="absolute right-1 top-1/2 flex size-10 -translate-y-1/2 items-center justify-center rounded-lg text-slate-500 transition hover:bg-orange-50 hover:text-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-300" @click="showPassword = ! showPassword" :aria-label="showPassword ? 'Hide password' : 'Show password'" :aria-pressed="showPassword.toString()">
                            <i class="fa-solid" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'" aria-hidden="true"></i>
                        </button>
                    </div>
                    @error('password')<span class="text-sm text-red-600">{{ $message }}</span>@enderror
                </div>
                <div class="grid gap-2 text-sm font-semibold text-slate-700 dark:text-slate-200">
                    <label for="signup-password-confirmation">Confirm password</label>
                    <div class="relative">
                        <input id="signup-password-confirmation" name="password_confirmation" :type="showConfirmation ? 'text' : 'password'" required autocomplete="new-password" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 pr-12 text-slate-950 shadow-sm outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-200 dark:border-slate-700 dark:bg-slate-900 dark:text-white" placeholder="Enter your password again">
                        <button type="button" class="absolute right-1 top-1/2 flex size-10 -translate-y-1/2 items-center justify-center rounded-lg text-slate-500 transition hover:bg-orange-50 hover:text-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-300" @click="showConfirmation = ! showConfirmation" :aria-label="showConfirmation ? 'Hide password confirmation' : 'Show password confirmation'" :aria-pressed="showConfirmation.toString()">
                            <i class="fa-solid" :class="showConfirmation ? 'fa-eye-slash' : 'fa-eye'" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <label class="flex items-start gap-3 rounded-xl bg-sky-50 p-3 text-xs leading-5 text-slate-600 dark:bg-slate-800 dark:text-slate-300"><input type="checkbox" required class="mt-0.5 rounded border-slate-300 text-orange-700 focus:ring-orange-300"><span>I agree to use this account responsibly and provide accurate information.</span></label>
                <x-ui.button type="submit" class="w-full py-3.5" data-test="register-user-button">Create my account <i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i></x-ui.button>
            </form>

            <div class="my-7 flex items-center gap-3 text-xs uppercase tracking-widest text-slate-400"><span class="h-px flex-1 bg-slate-200"></span>Already a member?<span class="h-px flex-1 bg-slate-200"></span></div>
            <a href="{{ route('login') }}" class="flex w-full items-center justify-center rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm font-bold text-sky-900 transition hover:border-sky-300 hover:bg-sky-50 dark:border-slate-700 dark:bg-slate-900 dark:text-white">Log in to your account</a>
            <p class="mt-6 text-center text-xs text-slate-500">Your information is used only to manage your account and participation.</p>
        </div>
    </section>
</div>
</x-layouts::auth.simple>
