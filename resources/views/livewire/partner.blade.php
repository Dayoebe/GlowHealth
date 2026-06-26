@php
    $heroImage = asset('images/outreach/community-medical-outreach-akure.webp');
    $supportImage = asset('images/outreach/family-health-education-ondo.webp');
@endphp

<x-glow.public-shell active="partner">
    <main>
        <section class="relative isolate overflow-hidden bg-sky-50">
            <div class="absolute inset-x-0 top-0 h-1 bg-teal-200" aria-hidden="true"></div>
            <div class="mx-auto grid max-w-7xl gap-8 px-4 pb-12 pt-8 sm:px-6 sm:py-16 lg:grid-cols-[0.92fr_1.08fr] lg:items-center lg:px-8">
                <div>
                    <a href="{{ route('home') }}" wire:navigate class="animate__animated animate__fadeIn inline-flex items-center gap-2 rounded-full border border-white/70 bg-white/75 px-3 py-2 text-xs font-semibold text-sky-800 shadow-sm backdrop-blur-xl sm:px-4 sm:text-sm">
                        <i class="fa-solid fa-arrow-left text-[0.75rem]" aria-hidden="true"></i>
                        Back to homepage
                    </a>
                    <h1 class="gh-display animate__animated animate__fadeIn mt-5 text-[2.35rem] leading-[1.04] text-slate-950 sm:text-5xl lg:text-6xl">
                        Partner With a Trusted <span class="text-teal-700">Community Health</span> Platform
                    </h1>
                    <p class="animate__animated animate__fadeIn mt-5 max-w-2xl text-base leading-8 text-slate-700">
                        Help fund, supply, coordinate, and scale free medical outreach for residents who face cost, access, or distance barriers across Ondo State.
                    </p>
                    <div class="mt-7 grid gap-3 sm:flex">
                        <a href="mailto:chairman@glowfmhealth.com?subject=Partnership%20Discussion%20-%20Glow%20Health%20Outreach" class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-900/10 transition hover:-translate-y-0.5 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">
                            <i class="fa-solid fa-handshake text-[0.9rem]" aria-hidden="true"></i>
                            <span>Discuss Partnership</span>
                        </a>
                        <a href="{{ route('impact') }}" wire:navigate class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-800 shadow-sm transition hover:-translate-y-0.5 hover:border-sky-300 hover:text-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                            <i class="fa-solid fa-chart-line text-[0.9rem]" aria-hidden="true"></i>
                            <span>See Impact</span>
                        </a>
                    </div>
                </div>

                <div class="overflow-hidden rounded-[1.75rem] border border-white/70 bg-white/70 p-3 shadow-2xl shadow-slate-900/10 backdrop-blur-xl sm:rounded-[2rem] sm:p-5">
                    <img src="{{ $heroImage }}" alt="Black Nigerian health workers attending to residents at a free medical outreach in Akure" class="aspect-[16/10] w-full rounded-[1.25rem] object-cover sm:aspect-[4/3] sm:rounded-[1.5rem]" loading="eager" fetchpriority="high">
                </div>
            </div>
        </section>

        <section class="bg-white py-12 sm:py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold text-teal-700">Partnership pathways</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">Different partners can solve different access problems</h2>
                    <p class="mt-4 text-base leading-8 text-slate-700">
                        The initiative is structured for practical collaboration with sponsors, hospitals, pharmacies, NGOs, public agencies, community leaders, and responsible corporate citizens.
                    </p>
                </div>

                <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($partnerships as $item)
                        <article class="gh-reveal rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-sky-200 hover:shadow-xl" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')" style="animation-delay: {{ $loop->index * 60 }}ms">
                            <div class="flex size-12 items-center justify-center rounded-2xl border {{ $item['color'] }}">
                                <i class="fa-solid {{ $item['icon'] }} text-xl" aria-hidden="true"></i>
                            </div>
                            <h3 class="mt-5 text-lg font-semibold text-slate-950">{{ $item['title'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600">{{ $item['description'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-slate-50 py-12 sm:py-16">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-center lg:px-8">
                <div class="overflow-hidden rounded-3xl shadow-2xl shadow-slate-900/10">
                    <img src="{{ $supportImage }}" alt="Black Nigerian nurse explaining health education to a local family during community outreach" class="aspect-[4/3] w-full object-cover">
                </div>
                <div>
                    <p class="text-sm font-semibold text-emerald-700">What support covers</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">Field needs are practical, visible, and measurable</h2>
                    <div class="mt-7 grid gap-4 sm:grid-cols-2">
                        @foreach ($needs as $need)
                            <article class="gh-reveal rounded-2xl border border-white/70 bg-white/80 p-5 shadow-sm backdrop-blur-xl" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                                <span class="flex size-12 items-center justify-center rounded-2xl bg-sky-50 text-sky-700">
                                    <i class="fa-solid {{ $need['icon'] }} text-lg" aria-hidden="true"></i>
                                </span>
                                <h3 class="mt-5 font-semibold text-slate-950">{{ $need['label'] }}</h3>
                                <p class="mt-2 text-sm leading-7 text-slate-600">{{ $need['value'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white py-12 sm:py-16">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.92fr_1.08fr] lg:items-start lg:px-8">
                <div>
                    <p class="text-sm font-semibold text-cyan-700">Accountability</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">Partners should see how support becomes care</h2>
                    <p class="mt-5 text-base leading-8 text-slate-700">
                        Glow FM enables public trust and community reach, while the health initiative keeps the focus on field care, transparent coordination, and measurable outcomes.
                    </p>
                </div>
                <div class="grid gap-4">
                    @foreach ($accountability as $item)
                        <article class="gh-reveal rounded-2xl border border-slate-200 bg-slate-50 p-5" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                            <div class="flex gap-4">
                                <span class="flex size-10 shrink-0 items-center justify-center rounded-full bg-teal-100 text-sm font-bold text-teal-700">{{ $loop->iteration }}</span>
                                <span>
                                    <h3 class="font-semibold text-slate-950">{{ $item['title'] }}</h3>
                                    <p class="mt-2 text-sm leading-7 text-slate-600">{{ $item['description'] }}</p>
                                </span>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-slate-900 px-4 py-12 text-white sm:px-6 sm:py-16 lg:px-8">
            <div class="mx-auto max-w-7xl rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-xl sm:p-8 lg:flex lg:items-center lg:justify-between lg:gap-10">
                <div>
                    <p class="text-sm font-semibold text-teal-200">Build a healthier Ondo State</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight sm:text-4xl">Responsible partnership can move care closer to families.</h2>
                    <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-300">
                        Let us align your support with a real outreach need, a clear delivery plan, and a useful impact brief.
                    </p>
                </div>
                <div class="mt-6 grid gap-3 sm:flex lg:mt-0">
                    <a href="mailto:chairman@glowfmhealth.com?subject=Partnership%20Discussion%20-%20Glow%20Health%20Outreach" class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition hover:bg-sky-50">
                        Start Partnership
                    </a>
                    <a href="{{ route('contact') }}" wire:navigate class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/20 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                        Contact the Desk
                    </a>
                </div>
            </div>
        </section>
    </main>
</x-glow.public-shell>
