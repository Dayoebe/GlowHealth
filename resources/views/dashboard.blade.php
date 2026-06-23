<x-layouts::app.sidebar :title="__('Outreach Dashboard')">
    <flux:main>
        <section class="mx-auto flex w-full max-w-7xl flex-col gap-8 px-4 py-6 sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-emerald-100 bg-gradient-to-br from-emerald-50 via-white to-cyan-50 p-6 shadow-sm dark:border-emerald-900/40 dark:from-zinc-900 dark:via-zinc-900 dark:to-slate-900">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold uppercase tracking-wide text-emerald-700 dark:text-emerald-300">
                        Glow Free Medical Initiative
                    </p>
                    <h1 class="mt-3 text-2xl font-semibold text-slate-950 dark:text-white sm:text-3xl">
                        Outreach operations dashboard
                    </h1>
                    <p class="mt-3 text-sm leading-6 text-slate-600 dark:text-slate-300 sm:text-base">
                        Coordinate registrations, volunteers, sponsorship conversations, and field activity for free healthcare outreaches across Ondo State.
                    </p>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ([
                    ['label' => 'Residents Reached', 'value' => '5,000+'],
                    ['label' => 'Free Consultations', 'value' => '1,500+'],
                    ['label' => 'Medications Distributed', 'value' => '800+'],
                    ['label' => 'Active Volunteers', 'value' => '100+'],
                ] as $metric)
                    <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                        <p class="text-sm text-slate-500 dark:text-slate-400">{{ $metric['label'] }}</p>
                        <p class="mt-3 text-3xl font-semibold text-slate-950 dark:text-white">{{ $metric['value'] }}</p>
                    </article>
                @endforeach
            </div>

            <div class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
                <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                    <h2 class="text-lg font-semibold text-slate-950 dark:text-white">Next outreach focus</h2>
                    <div class="mt-5 grid gap-4 sm:grid-cols-3">
                        <div class="rounded-2xl bg-emerald-50 p-4 dark:bg-emerald-950/30">
                            <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700 dark:text-emerald-300">Location</p>
                            <p class="mt-2 font-medium text-slate-950 dark:text-white">Akure, Ondo State</p>
                        </div>
                        <div class="rounded-2xl bg-cyan-50 p-4 dark:bg-cyan-950/30">
                            <p class="text-xs font-semibold uppercase tracking-wide text-cyan-700 dark:text-cyan-300">Services</p>
                            <p class="mt-2 font-medium text-slate-950 dark:text-white">Screening, consultation, medication</p>
                        </div>
                        <div class="rounded-2xl bg-amber-50 p-4 dark:bg-amber-950/30">
                            <p class="text-xs font-semibold uppercase tracking-wide text-amber-700 dark:text-amber-300">Priority</p>
                            <p class="mt-2 font-medium text-slate-950 dark:text-white">Community registration</p>
                        </div>
                    </div>
                </article>

                <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                    <h2 class="text-lg font-semibold text-slate-950 dark:text-white">Quick actions</h2>
                    <div class="mt-5 space-y-3">
                        <a href="{{ route('home') }}#outreach" class="flex items-center justify-between rounded-2xl border border-emerald-100 px-4 py-3 text-sm font-medium text-emerald-800 transition hover:bg-emerald-50 dark:border-emerald-900/40 dark:text-emerald-200 dark:hover:bg-emerald-950/30" wire:navigate>
                            Register residents
                            <span aria-hidden="true">-></span>
                        </a>
                        <a href="{{ route('home') }}#volunteer" class="flex items-center justify-between rounded-2xl border border-cyan-100 px-4 py-3 text-sm font-medium text-cyan-800 transition hover:bg-cyan-50 dark:border-cyan-900/40 dark:text-cyan-200 dark:hover:bg-cyan-950/30" wire:navigate>
                            Volunteer signup
                            <span aria-hidden="true">-></span>
                        </a>
                        <a href="{{ route('home') }}#partners" class="flex items-center justify-between rounded-2xl border border-amber-100 px-4 py-3 text-sm font-medium text-amber-800 transition hover:bg-amber-50 dark:border-amber-900/40 dark:text-amber-200 dark:hover:bg-amber-950/30" wire:navigate>
                            Partner engagement
                            <span aria-hidden="true">-></span>
                        </a>
                    </div>
                </article>
            </div>
        </section>
    </flux:main>
</x-layouts::app.sidebar>
