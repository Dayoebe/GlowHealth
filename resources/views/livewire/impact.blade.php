@php
    $heroImage = asset('images/outreach/family-health-education-ondo.webp');
    $supportImage = asset('images/outreach/community-medical-outreach-akure.webp');
    $homeUrl = route('home');
    $servicesUrl = route('services');
    $outreachUrl = route('outreach');
    $impactUrl = route('impact');
    $volunteerUrl = route('volunteer');
    $partnerUrl = route('partner');
    $contactUrl = route('contact');
@endphp

<x-glow.public-shell active="impact">
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
            <div class="mx-auto grid max-w-7xl gap-8 px-4 pb-12 pt-8 sm:px-6 sm:py-16 lg:grid-cols-[0.92fr_1.08fr] lg:items-center lg:px-8">
                <div>
                    <a href="{{ $homeUrl }}" wire:navigate class="inline-flex items-center gap-2 rounded-full border border-white/70 bg-white/75 px-3 py-2 text-xs font-semibold text-sky-800 shadow-sm backdrop-blur-xl sm:px-4 sm:text-sm">
                        <i class="fa-solid fa-arrow-left text-[0.75rem]" aria-hidden="true"></i>
                        Back to homepage
                    </a>
                    <p class="mt-5 inline-flex items-center gap-2 rounded-full border border-cyan-200 bg-cyan-50 px-3 py-2 text-xs font-semibold text-cyan-800">
                        <span class="gh-pulse size-2 rounded-full bg-cyan-500"></span>
                        Community health Outreach across Ondo State
                    </p>
                    <h1 class="gh-display mt-5 text-[2.35rem] leading-[1.04] text-slate-950 sm:text-5xl lg:text-6xl">
                        Measuring <span class="text-cyan-700">Health Impact</span> Where Access Matters Most
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-slate-700">
                        Glow Health Outreach Initiative tracks reach, service delivery, referrals, and community feedback so partners can see how free healthcare support is changing lives.
                    </p>
                    <div class="mt-7 grid gap-3 sm:flex">
                        <a href="{{ $outreachUrl }}" wire:navigate class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-900/10 transition hover:-translate-y-0.5 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">
                            <span>Join the Next Outreach</span>
                            <i class="fa-solid fa-arrow-right text-[0.85rem]" aria-hidden="true"></i>
                        </a>
                        <a href="mailto:chairman@glowfmhealth.com?subject=Support%20Glow%20Health%20Impact" class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-800 shadow-sm transition hover:-translate-y-0.5 hover:border-sky-300 hover:text-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                            <i class="fa-solid fa-handshake text-[0.9rem]" aria-hidden="true"></i>
                            <span>Support the Impact</span>
                        </a>
                    </div>
                </div>

                <div class="overflow-hidden rounded-[1.75rem] border border-white/70 bg-white/70 p-3 shadow-2xl shadow-slate-900/10 backdrop-blur-xl sm:rounded-[2rem] sm:p-5">
                    <img src="{{ $heroImage }}" alt="Black Nigerian nurse explaining health education to a local family during community outreach" class="aspect-[16/10] w-full rounded-[1.25rem] object-cover sm:aspect-[4/3] sm:rounded-[1.5rem]" loading="eager" fetchpriority="high">
                </div>
            </div>
        </section>

        <section class="bg-white py-12 sm:py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold text-cyan-700">Impact dashboard</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">What the outreach is already making possible</h2>
                </div>

                <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($metrics as $metric)
                        <article
                            class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-sky-200 hover:shadow-xl"
                            style="animation-delay: {{ $loop->index * 70 }}ms"
                        >
                            <div class="flex size-12 items-center justify-center rounded-2xl border {{ $metric['color'] }}">
                                <i class="fa-solid {{ $metric['icon'] }} text-xl" aria-hidden="true"></i>
                            </div>
                            <p class="mt-5 text-4xl font-bold text-slate-950">
                                <span>{{ number_format($metric['value']) }}</span><span>{{ $metric['suffix'] }}</span>
                            </p>
                            <h3 class="mt-3 text-base font-semibold text-slate-950">{{ $metric['label'] }}</h3>
                            <p class="mt-2 text-sm leading-7 text-slate-600">{{ $metric['description'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-slate-50 py-12 sm:py-16">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.95fr_1.05fr] lg:items-start lg:px-8">
                <div>
                    <p class="text-sm font-semibold text-emerald-700">Community reach</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">Growing from Akure into nearby communities</h2>
                    <p class="mt-5 text-base leading-8 text-slate-700">
                        The initiative combines media reach, local registration, community volunteers, and healthcare professionals to identify where free outreach can close urgent access gaps.
                    </p>
                    <div class="mt-7 overflow-hidden rounded-3xl shadow-2xl shadow-slate-900/10">
                        <img src="{{ $supportImage }}" alt="Black Nigerian medical team providing free screening at a community outreach in Akure" class="aspect-[4/3] w-full object-cover">
                    </div>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                    @foreach ($communities as $community)
                        <article class="gh-reveal rounded-2xl border border-white/70 bg-white/80 p-5 shadow-sm backdrop-blur-xl" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                            <h3 class="font-semibold text-slate-950">{{ $community['name'] }}</h3>
                            <p class="mt-2 text-sm font-semibold text-cyan-700">{{ $community['status'] }}</p>
                            <p class="mt-2 text-sm leading-7 text-slate-600">{{ $community['focus'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-white py-12 sm:py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold text-blue-700">Outcome areas</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">The kind of change partners can support</h2>
                </div>

                <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($outcomes as $outcome)
                        <article class="gh-reveal rounded-2xl border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-1 hover:bg-white hover:shadow-xl" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                            <span class="flex size-12 items-center justify-center rounded-2xl bg-white text-blue-700 shadow-sm">
                                <i class="fa-solid {{ $outcome['icon'] }} text-lg" aria-hidden="true"></i>
                            </span>
                            <h3 class="mt-5 font-semibold text-slate-950">{{ $outcome['title'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600">{{ $outcome['description'] }}</p>
                            <p class="mt-4 text-sm font-semibold text-emerald-700">{{ $outcome['result'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-slate-50 py-12 sm:py-16">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:items-start lg:px-8">
                <div>
                    <p class="text-sm font-semibold text-amber-700">Human results</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">Impact is more than a number</h2>
                    <p class="mt-5 text-base leading-8 text-slate-700">
                        Community health work is measured in screenings, consultations, and medications, but it is also measured in clarity, dignity, timely referral, and trust.
                    </p>
                </div>
                <div class="grid gap-4">
                    @foreach ($stories as $story)
                        <article class="gh-reveal rounded-2xl border border-white/70 bg-white/80 p-5 shadow-sm backdrop-blur-xl" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                            <i class="fa-solid fa-quote-left text-xl text-cyan-600" aria-hidden="true"></i>
                            <p class="mt-4 text-base leading-8 text-slate-700">{{ $story['quote'] }}</p>
                            <div class="mt-5">
                                <p class="font-semibold text-slate-950">{{ $story['name'] }}</p>
                                <p class="text-sm text-slate-500">{{ $story['role'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-white py-12 sm:py-16">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.92fr_1.08fr] lg:items-start lg:px-8">
                <div>
                    <p class="text-sm font-semibold text-teal-700">Transparency</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">What impact reporting tracks</h2>
                    <p class="mt-5 text-base leading-8 text-slate-700">
                        The goal is to make outreach activity understandable to residents, volunteers, NGOs, public agencies, and sponsors who want evidence of community value.
                    </p>
                </div>
                <div class="grid gap-3">
                    @foreach ($reporting as $item)
                        <div class="gh-reveal rounded-2xl border border-slate-200 bg-slate-50 p-5" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                            <p class="text-xs font-semibold uppercase text-slate-500">{{ $item['label'] }}</p>
                            <p class="mt-2 text-base font-semibold text-slate-950">{{ $item['value'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-slate-900 px-4 py-12 text-white sm:px-6 sm:py-16 lg:px-8">
            <div class="mx-auto max-w-7xl rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-xl sm:p-8 lg:flex lg:items-center lg:justify-between lg:gap-10">
                <div>
                    <p class="text-sm font-semibold text-cyan-200">Help deepen the impact</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight sm:text-4xl">Sponsor care, volunteer skills, or help expand outreach coverage.</h2>
                    <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-300">
                        Partnerships make it possible to add more screening supplies, medications, referral support, logistics, and follow-up capacity.
                    </p>
                </div>
                <div class="mt-6 grid gap-3 sm:flex lg:mt-0">
                    <a href="mailto:chairman@glowfmhealth.com?subject=Support%20Glow%20Health%20Impact" class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition hover:bg-sky-50">
                        Support Impact
                    </a>
                    <a href="{{ $outreachUrl }}" wire:navigate class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/20 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                        Join Outreach
                    </a>
                </div>
            </div>
        </section>
    </main>
</div>
</x-glow.public-shell>
