@php
    $heroImage = asset('images/outreach/family-health-education-ondo.webp');
    $volunteerImage = asset('images/outreach/medical-volunteers-outreach-table.webp');
    $homeUrl = route('home');
    $servicesUrl = route('services');
    $outreachUrl = route('outreach');
    $impactUrl = route('impact');
    $volunteerUrl = route('volunteer');
    $partnerUrl = route('partner');
    $contactUrl = route('contact');
@endphp

<x-glow.public-shell active="services">
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
            <div class="mx-auto grid max-w-7xl gap-8 px-4 pb-12 pt-8 sm:px-6 sm:py-16 lg:grid-cols-[0.95fr_1.05fr] lg:items-center lg:px-8">
                <div>
                    <a href="{{ $homeUrl }}" class="animate__animated animate__fadeIn inline-flex items-center gap-2 rounded-full border border-white/70 bg-white/75 px-3 py-2 text-xs font-semibold text-sky-800 shadow-sm backdrop-blur-xl sm:px-4 sm:text-sm">
                        <i class="fa-solid fa-arrow-left text-[0.75rem]" aria-hidden="true"></i>
                        Back to homepage
                    </a>
                    <h1 class="gh-display animate__animated animate__fadeIn mt-5 text-[2.35rem] leading-[1.04] text-slate-950 sm:text-5xl lg:text-6xl">
                        Free <span class="text-emerald-700">Healthcare</span> Services for Local Communities
                    </h1>
                    <p class="animate__animated animate__fadeIn mt-5 max-w-2xl text-base leading-8 text-slate-700">
                        Each outreach is designed to give residents practical access to consultation, screening, medications, health education, and referral guidance without consultation fees.
                    </p>
                    <div class="mt-7 grid gap-3 sm:flex">
                        <a href="mailto:chairman@glowfmhealth.com?subject=Register%20for%20Glow%20FM%20Free%20Medical%20Initiative" class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-900/10 transition hover:-translate-y-0.5 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">
                            <span>Register for Care</span>
                            <i class="fa-solid fa-arrow-right text-[0.85rem]" aria-hidden="true"></i>
                        </a>
                        <a href="{{ $outreachUrl }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-800 shadow-sm transition hover:-translate-y-0.5 hover:border-sky-300 hover:text-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                            <i class="fa-solid fa-calendar-check text-[0.9rem]" aria-hidden="true"></i>
                            <span>View Next Outreach</span>
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
                    <p class="text-sm font-semibold text-emerald-700">Care areas</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">What residents can receive</h2>
                    <p class="mt-4 text-base leading-8 text-slate-700">
                        Services are delivered by qualified professionals and trained volunteers according to available supplies, clinical need, and outreach capacity.
                    </p>
                </div>

                <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($services as $service)
                        <article
                            class="gh-reveal rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-sky-200 hover:shadow-xl"
                            x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')"
                            style="animation-delay: {{ $loop->index * 55 }}ms"
                        >
                            <div class="flex size-12 items-center justify-center rounded-2xl border {{ $service['color'] }}">
                                <i class="fa-solid {{ $service['icon'] }} text-xl" aria-hidden="true"></i>
                            </div>
                            <h3 class="mt-5 text-lg font-semibold text-slate-950">{{ $service['title'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600">{{ $service['description'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-slate-50 py-12 sm:py-16">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.88fr_1.12fr] lg:items-center lg:px-8">
                <div class="overflow-hidden rounded-3xl shadow-2xl shadow-slate-900/10">
                    <img src="{{ $volunteerImage }}" alt="Black Nigerian medical volunteers preparing supplies for a free health outreach" class="aspect-[4/3] w-full object-cover">
                </div>
                <div>
                    <p class="text-sm font-semibold text-cyan-700">How care moves</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">From arrival to follow-up guidance</h2>
                    <div class="mt-7 grid gap-4">
                        @foreach ($careFlow as $item)
                            <article class="gh-reveal rounded-2xl border border-white/70 bg-white/80 p-5 shadow-sm backdrop-blur-xl" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                                <div class="flex gap-4">
                                    <span class="flex size-12 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sky-700">
                                        <i class="fa-solid {{ $item['icon'] }} text-lg" aria-hidden="true"></i>
                                    </span>
                                    <span>
                                        <h3 class="font-semibold text-slate-950">{{ $item['title'] }}</h3>
                                        <p class="mt-2 text-sm leading-7 text-slate-600">{{ $item['description'] }}</p>
                                    </span>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white py-12 sm:py-16">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.92fr_1.08fr] lg:items-start lg:px-8">
                <div>
                    <p class="text-sm font-semibold text-amber-700">Who should come</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">Care is open to residents who need practical support</h2>
                    <p class="mt-5 text-base leading-8 text-slate-700">
                        The initiative prioritizes people who face cost, distance, or access barriers. Emergency cases should still go directly to the nearest hospital or emergency facility.
                    </p>
                </div>
                <div class="grid gap-3">
                    @foreach ($whoCanAttend as $item)
                        <div class="gh-reveal flex gap-3 rounded-2xl border border-slate-200 bg-slate-50 p-4" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
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
                    <p class="text-sm font-semibold text-sky-200">Ready for the next outreach?</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight sm:text-4xl">Register, volunteer, or help sponsor care delivery.</h2>
                    <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-300">
                        Glow helps connect residents, medical volunteers, community leaders, NGOs, public agencies, and sponsors around measurable health impact.
                    </p>
                </div>
                <div class="mt-6 grid gap-3 sm:flex lg:mt-0">
                    <a href="mailto:chairman@glowfmhealth.com?subject=Register%20for%20Glow%20FM%20Free%20Medical%20Initiative" class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition hover:bg-sky-50">
                        Register Now
                    </a>
                    <a href="{{ $volunteerUrl }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/20 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                        Partner or Volunteer
                    </a>
                </div>
            </div>
        </section>
    </main>
</div>
</x-glow.public-shell>
