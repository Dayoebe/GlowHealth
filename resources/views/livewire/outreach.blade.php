@php
    $heroImage = asset('images/outreach/community-medical-outreach-akure.webp');
    $supportImage = asset('images/outreach/medical-volunteers-outreach-table.webp');
    $homeUrl = route('home');
    $servicesUrl = route('services');
    $outreachUrl = route('outreach');
    $impactUrl = route('impact');
    $volunteerUrl = route('volunteer');
    $partnerUrl = route('partner');
    $contactUrl = route('contact');
@endphp

<x-glow.public-shell active="outreach">
<div
    class="gh-content"
    x-data="{
        mobileMenuOpen: false,
        init() {
            this.$el.classList.add('gh-js')
        },
        closeMenu() {
            this.mobileMenuOpen = false
        }
    }"
>
    <main>
        <section class="relative isolate overflow-hidden bg-sky-50">
            <div class="absolute inset-x-0 top-0 h-1 bg-sky-200" aria-hidden="true"></div>
            <div class="mx-auto grid max-w-7xl gap-8 px-4 pb-12 pt-8 sm:px-6 sm:py-16 lg:grid-cols-[0.9fr_1.1fr] lg:items-center lg:px-8">
                <div>
                    <a href="{{ $homeUrl }}" wire:navigate class="inline-flex items-center gap-2 rounded-full border border-white/70 bg-white/75 px-3 py-2 text-xs font-semibold text-sky-800 shadow-sm backdrop-blur-xl sm:px-4 sm:text-sm">
                        <i class="fa-solid fa-arrow-left text-[0.75rem]" aria-hidden="true"></i>
                        Back to homepage
                    </a>
                    <p class="mt-5 inline-flex items-center gap-2 rounded-full border border-amber-200 bg-amber-50 px-3 py-2 text-xs font-semibold text-amber-800">
                        <span class="gh-pulse size-2 rounded-full bg-amber-500"></span>
                        {{ $outreach['status'] }}
                    </p>
                    <h1 class="gh-display mt-5 text-[2.35rem] leading-[1.04] text-slate-950 sm:text-5xl lg:text-6xl">
                        Plan for the Next <span class="text-blue-700">Medical Outreach</span> in <span class="text-emerald-700">Akure</span>
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-slate-700">
                        This page gives residents, volunteers, partners, and sponsors one place to understand the outreach schedule, care stations, arrival flow, and preparation requirements.
                    </p>
                    <div class="mt-7 grid gap-3 sm:flex">
                        <a href="mailto:chairman@glowfmhealth.com?subject=Register%20for%20the%20Next%20Glow%20Medical%20Outreach" class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-900/10 transition hover:-translate-y-0.5 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">
                            <span>Register Interest</span>
                            <i class="fa-solid fa-arrow-right text-[0.85rem]" aria-hidden="true"></i>
                        </a>
                        <a href="{{ $servicesUrl }}" wire:navigate class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-800 shadow-sm transition hover:-translate-y-0.5 hover:border-sky-300 hover:text-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                            <i class="fa-solid fa-stethoscope text-[0.9rem]" aria-hidden="true"></i>
                            <span>Review Services</span>
                        </a>
                    </div>
                </div>

                <div class="overflow-hidden rounded-[1.75rem] border border-white/70 bg-white/70 p-3 shadow-2xl shadow-slate-900/10 backdrop-blur-xl sm:rounded-[2rem] sm:p-5">
                    <img src="{{ $heroImage }}" alt="Black Nigerian medical team providing free screening at a community outreach in Akure" class="aspect-[16/10] w-full rounded-[1.25rem] object-cover sm:aspect-[4/3] sm:rounded-[1.5rem]" loading="eager" fetchpriority="high">
                </div>
            </div>
        </section>

        <section class="bg-white py-12 sm:py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($quickFacts as $fact)
                        <article
                            class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-sky-200 hover:shadow-xl"
                            style="animation-delay: {{ $loop->index * 70 }}ms"
                        >
                            <div class="flex size-12 items-center justify-center rounded-2xl border {{ $fact['color'] }}">
                                <i class="fa-solid {{ $fact['icon'] }} text-xl" aria-hidden="true"></i>
                            </div>
                            <p class="mt-5 text-xs font-semibold uppercase text-slate-500">{{ $fact['label'] }}</p>
                            <h2 class="mt-2 text-xl font-bold text-slate-950">{{ $fact['value'] }}</h2>
                        </article>
                    @endforeach
                </div>

                <div class="mt-8 rounded-3xl border border-amber-200 bg-amber-50/80 p-5 text-amber-950 shadow-sm backdrop-blur-xl">
                    <div class="flex gap-3">
                        <span class="mt-1 flex size-9 shrink-0 items-center justify-center rounded-2xl bg-white text-amber-700">
                            <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                        </span>
                        <div>
                            <h2 class="font-semibold">Registration guidance</h2>
                            <p class="mt-2 text-sm leading-7">{{ $outreach['note'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-slate-50 py-12 sm:py-16">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.92fr_1.08fr] lg:items-start lg:px-8">
                <div class="rounded-3xl border border-white/70 bg-white/75 p-6 shadow-sm backdrop-blur-xl sm:p-8">
                    <p class="text-sm font-semibold text-blue-700">Outreach details</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">Outreach information</h2>
                    <div class="mt-7 grid gap-4">
                        <div class="rounded-2xl border border-slate-200 bg-white p-4">
                            <p class="text-xs font-semibold uppercase text-sky-700">Date</p>
                            <p class="mt-2 text-lg font-bold text-slate-950">{{ $outreach['date'] }}</p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-4">
                            <p class="text-xs font-semibold uppercase text-emerald-700">Time</p>
                            <p class="mt-2 text-lg font-bold text-slate-950">{{ $outreach['time'] }}</p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-4">
                            <p class="text-xs font-semibold uppercase text-amber-700">Venue</p>
                            <p class="mt-2 text-lg font-bold text-slate-950">{{ $outreach['venue'] }}</p>
                            <p class="mt-1 text-sm text-slate-600">{{ $outreach['area'] }}</p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-4">
                            <p class="text-xs font-semibold uppercase text-cyan-700">Planned capacity</p>
                            <p class="mt-2 text-lg font-bold text-slate-950">{{ $outreach['capacity'] }}</p>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="text-sm font-semibold text-cyan-700">Care stations</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">How residents will move through care</h2>
                    <div class="mt-7 grid gap-4 sm:grid-cols-2">
                        @foreach ($stations as $station)
                            <article class="gh-reveal rounded-2xl border border-white/70 bg-white/80 p-5 shadow-sm backdrop-blur-xl" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                                <span class="flex size-12 items-center justify-center rounded-2xl bg-sky-50 text-sky-700">
                                    <i class="fa-solid {{ $station['icon'] }} text-lg" aria-hidden="true"></i>
                                </span>
                                <h3 class="mt-5 font-semibold text-slate-950">{{ $station['title'] }}</h3>
                                <p class="mt-2 text-sm leading-7 text-slate-600">{{ $station['description'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white py-12 sm:py-16">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:px-8">
                <div>
                    <p class="text-sm font-semibold text-emerald-700">Outreach day plan</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">A simple schedule for organized community care</h2>
                    <div class="mt-8 grid gap-4">
                        @foreach ($agenda as $item)
                            <article class="gh-reveal rounded-2xl border border-slate-200 bg-slate-50 p-5" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                                <div class="grid gap-3 sm:grid-cols-[7rem_1fr]">
                                    <p class="text-sm font-bold text-blue-700">{{ $item['time'] }}</p>
                                    <div>
                                        <h3 class="font-semibold text-slate-950">{{ $item['title'] }}</h3>
                                        <p class="mt-2 text-sm leading-7 text-slate-600">{{ $item['description'] }}</p>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>

                <div class="overflow-hidden rounded-3xl shadow-2xl shadow-slate-900/10">
                    <img src="{{ $supportImage }}" alt="Black Nigerian medical volunteers preparing supplies for a free health outreach" class="aspect-[4/3] w-full object-cover">
                </div>
            </div>
        </section>

        <section class="bg-slate-50 py-12 sm:py-16">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-start lg:px-8">
                <div>
                    <p class="text-sm font-semibold text-amber-700">Before arrival</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">What residents should bring</h2>
                    <p class="mt-5 text-base leading-8 text-slate-700">
                        These preparation notes help residents move through registration, screening, consultation, medication support, and referral guidance with fewer delays.
                    </p>
                </div>
                <div class="grid gap-3">
                    @foreach ($whatToBring as $item)
                        <div class="gh-reveal flex gap-3 rounded-2xl border border-white/70 bg-white/80 p-4 shadow-sm backdrop-blur-xl" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                            <span class="mt-1 flex size-6 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-700">
                                <i class="fa-solid fa-check text-xs" aria-hidden="true"></i>
                            </span>
                            <p class="text-sm leading-7 text-slate-700">{{ $item }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-slate-900 px-4 py-12 text-white sm:px-6 sm:py-16 lg:px-8">
            <div class="mx-auto max-w-7xl rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-xl sm:p-8 lg:flex lg:items-center lg:justify-between lg:gap-10">
                <div>
                    <p class="text-sm font-semibold text-sky-200">Want to participate?</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight sm:text-4xl">Register interest or join the outreach team.</h2>
                    <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-300">
                        Residents, medical volunteers, community groups, NGOs, and sponsors can use this page as the central planning point once real outreach details are confirmed.
                    </p>
                </div>
                <div class="mt-6 grid gap-3 sm:flex lg:mt-0">
                    <a href="mailto:chairman@glowfmhealth.com?subject=Register%20Interest%20for%20Glow%20Medical%20Outreach" class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition hover:bg-sky-50">
                        Register Interest
                    </a>
                    <a href="{{ $volunteerUrl }}" wire:navigate class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/20 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                        Volunteer or Partner
                    </a>
                </div>
            </div>
        </section>
    </main>
</div>
</x-glow.public-shell>
