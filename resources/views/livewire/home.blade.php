<div class="min-h-screen bg-white text-slate-950 antialiased">
    <section class="relative overflow-hidden bg-slate-950 text-white">
        <img
            src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1800&q=85"
            alt="Healthcare professionals preparing patient care notes during a community clinic"
            class="absolute inset-0 h-full w-full object-cover"
            loading="eager"
            fetchpriority="high"
        >
        <div class="absolute inset-0 bg-slate-950/60"></div>
        <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-slate-950/80 to-transparent"></div>

        <header class="relative z-10 border-b border-white/15">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <a href="#top" class="flex min-w-0 items-center gap-3" aria-label="Glow Healthcare Outreach Initiative home">
                    <span class="flex size-11 shrink-0 items-center justify-center rounded-md bg-white text-emerald-700 shadow-sm">
                        <flux:icon.heart class="size-6" />
                    </span>
                    <span class="min-w-0">
                        <span class="block text-sm font-semibold leading-5 text-white sm:text-base">Glow Healthcare</span>
                        <span class="block truncate text-xs leading-5 text-emerald-100">Outreach Initiative</span>
                    </span>
                </a>

                <nav class="hidden items-center gap-7 text-sm font-medium text-emerald-50 md:flex" aria-label="Primary navigation">
                    <a href="#programs" class="transition hover:text-white">Programs</a>
                    <a href="#approach" class="transition hover:text-white">Approach</a>
                    <a href="#outreach" class="transition hover:text-white">Outreach</a>
                    <a href="#contact" class="transition hover:text-white">Partner</a>
                </nav>

                <a
                    href="#contact"
                    class="inline-flex items-center gap-2 rounded-md bg-white px-4 py-2 text-sm font-semibold text-emerald-800 shadow-sm transition hover:bg-emerald-50 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-emerald-900"
                >
                    <span>Get involved</span>
                    <flux:icon.arrow-right class="size-4" />
                </a>
            </div>
        </header>

        <div id="top" class="relative z-10 mx-auto flex min-h-[70svh] max-w-7xl items-center px-4 py-14 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
            <div class="max-w-3xl">
                <p class="mb-5 inline-flex rounded-md border border-emerald-200/40 bg-emerald-950/45 px-3 py-1 text-sm font-medium text-emerald-50">
                    Community health outreach, prevention, and referral support
                </p>
                <h1 class="max-w-3xl text-4xl font-semibold leading-[1.05] text-white sm:text-5xl lg:text-6xl">
                    Compassionate healthcare outreach for families who need care closer.
                </h1>
                <p class="mt-6 max-w-2xl text-base leading-8 text-slate-100 sm:text-lg">
                    Glow Healthcare Outreach Initiative brings preventive care, practical health education, and guided referrals into underserved communities with dignity and clinical discipline.
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a
                        href="#programs"
                        class="inline-flex items-center justify-center gap-2 rounded-md bg-emerald-500 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-200 focus:ring-offset-2 focus:ring-offset-slate-950"
                    >
                        <span>Explore programs</span>
                        <flux:icon.arrow-right class="size-4" />
                    </a>
                    <a
                        href="#contact"
                        class="inline-flex items-center justify-center gap-2 rounded-md border border-white/40 px-5 py-3 text-sm font-semibold text-white transition hover:border-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-slate-950"
                    >
                        <flux:icon.hand-raised class="size-4" />
                        <span>Partner with us</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="border-b border-slate-200 bg-white">
            <div class="mx-auto grid max-w-7xl gap-4 px-4 py-8 sm:px-6 md:grid-cols-3 lg:px-8">
                @foreach ($metrics as $metric)
                    <article class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                        <p class="text-3xl font-semibold text-emerald-700">{{ $metric['value'] }}</p>
                        <h2 class="mt-2 text-base font-semibold text-slate-950">{{ $metric['label'] }}</h2>
                        <p class="mt-2 text-sm leading-6 text-slate-600">{{ $metric['detail'] }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        <section id="programs" class="bg-[#f7fbf9] py-16 sm:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-[0.85fr_1.15fr] lg:items-end">
                    <div>
                        <p class="text-sm font-semibold text-emerald-700">Our care model</p>
                        <h2 class="mt-3 text-3xl font-semibold leading-tight text-slate-950 sm:text-4xl">
                            Built for prevention, access, and continuity of care.
                        </h2>
                    </div>
                    <p class="text-base leading-8 text-slate-600">
                        Each outreach is designed to reduce the distance between families and dependable health guidance. The work stays practical: screen early, explain clearly, refer responsibly, and follow through.
                    </p>
                </div>

                <div class="mt-10 grid gap-5 md:grid-cols-2">
                    @foreach ($programs as $program)
                        <article class="rounded-lg border border-emerald-100 bg-white p-6 shadow-sm">
                            <div class="mb-5 flex size-11 items-center justify-center rounded-md bg-emerald-50 text-emerald-700">
                                @switch($program['icon'])
                                    @case('clipboard-document-check')
                                        <flux:icon.clipboard-document-check class="size-6" />
                                        @break

                                    @case('heart')
                                        <flux:icon.heart class="size-6" />
                                        @break

                                    @case('academic-cap')
                                        <flux:icon.academic-cap class="size-6" />
                                        @break

                                    @default
                                        <flux:icon.shield-check class="size-6" />
                                @endswitch
                            </div>
                            <h3 class="text-lg font-semibold text-slate-950">{{ $program['title'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600">{{ $program['description'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="approach" class="bg-slate-950 py-16 text-white sm:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-10 lg:grid-cols-[0.85fr_1.15fr]">
                    <div>
                        <p class="text-sm font-semibold text-amber-300">How outreach works</p>
                        <h2 class="mt-3 text-3xl font-semibold leading-tight sm:text-4xl">
                            Practical health support that does not stop at the event.
                        </h2>
                    </div>

                    <div class="grid gap-4">
                        @foreach ($process as $item)
                            <article class="rounded-lg border border-white/15 bg-white/5 p-5">
                                <div class="flex gap-4">
                                    <span class="flex size-11 shrink-0 items-center justify-center rounded-md bg-amber-300 text-sm font-semibold text-slate-950">
                                        {{ $item['step'] }}
                                    </span>
                                    <div>
                                        <h3 class="text-lg font-semibold text-white">{{ $item['title'] }}</h3>
                                        <p class="mt-2 text-sm leading-7 text-slate-300">{{ $item['description'] }}</p>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section id="outreach" class="bg-white py-16 sm:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                    <div class="max-w-2xl">
                        <p class="text-sm font-semibold text-emerald-700">Outreach priorities</p>
                        <h2 class="mt-3 text-3xl font-semibold leading-tight text-slate-950 sm:text-4xl">
                            A focused calendar for communities, families, and partners.
                        </h2>
                    </div>
                    <a
                        href="#contact"
                        class="inline-flex w-fit items-center gap-2 rounded-md border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-800 transition hover:border-emerald-600 hover:text-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-600 focus:ring-offset-2"
                    >
                        <flux:icon.calendar-days class="size-4" />
                        <span>Coordinate an outreach</span>
                    </a>
                </div>

                <div class="mt-10 grid gap-5 lg:grid-cols-3">
                    @foreach ($outreaches as $outreach)
                        <article class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                            <p class="inline-flex rounded-md bg-sky-50 px-3 py-1 text-sm font-semibold text-sky-700">{{ $outreach['label'] }}</p>
                            <h3 class="mt-5 text-lg font-semibold text-slate-950">{{ $outreach['title'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600">{{ $outreach['description'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="contact" class="bg-emerald-700 py-16 text-white sm:py-20">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_0.72fr] lg:items-center lg:px-8">
                <div>
                    <p class="text-sm font-semibold text-emerald-100">Partner with Glow</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-tight sm:text-4xl">
                        Help bring trusted health support closer to the people who need it.
                    </h2>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-emerald-50">
                        Clinics, schools, faith communities, corporate sponsors, and medical volunteers can strengthen the next outreach with supplies, space, transport, clinical support, and follow-up care.
                    </p>
                </div>

                <div class="rounded-lg border border-white/20 bg-white p-6 text-slate-950 shadow-sm">
                    <h3 class="text-lg font-semibold">Start a partnership conversation</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Share the community, preferred outreach focus, and support available. The Glow team can align the right care track and volunteer needs.
                    </p>
                    <div class="mt-6 grid gap-3">
                        <a
                            href="mailto:hello@glowhealthcare.org?subject=Partnership%20with%20Glow%20Healthcare%20Outreach%20Initiative"
                            class="inline-flex items-center justify-center gap-2 rounded-md bg-slate-950 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-950 focus:ring-offset-2"
                        >
                            <flux:icon.envelope class="size-4" />
                            <span>Email the team</span>
                        </a>
                        <a
                            href="#programs"
                            class="inline-flex items-center justify-center gap-2 rounded-md border border-slate-300 px-4 py-3 text-sm font-semibold text-slate-800 transition hover:border-emerald-600 hover:text-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-600 focus:ring-offset-2"
                        >
                            <flux:icon.check-circle class="size-4" />
                            <span>Review care pillars</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="border-t border-slate-200 bg-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-8 text-sm text-slate-600 sm:px-6 md:flex-row md:items-center md:justify-between lg:px-8">
            <p class="font-medium text-slate-800">Glow Healthcare Outreach Initiative</p>
            <p>Community health outreach with dignity, prevention, and continuity.</p>
        </div>
    </footer>
</div>
