@push('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        [x-cloak] {
            display: none !important;
        }

        html {
            scroll-behavior: smooth;
        }

        .gh-page {
            font-family: 'Ubuntu', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        .gh-display {
            font-family: 'Playfair Display', Georgia, Cambria, 'Times New Roman', serif;
            letter-spacing: 0;
        }

        .gh-scrollbar {
            scrollbar-width: none;
        }

        .gh-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .gh-page.gh-js .gh-reveal {
            opacity: 0;
        }

        .gh-page.gh-js .gh-reveal.animate__animated {
            opacity: 1;
        }

        .gh-float-a {
            animation: gh-float-a 5.8s ease-in-out infinite;
        }

        .gh-float-b {
            animation: gh-float-b 6.4s ease-in-out infinite;
        }

        .gh-pulse {
            animation: gh-pulse 2.4s ease-out infinite;
        }

        .gh-orbit {
            animation: gh-orbit 18s linear infinite;
            transform-origin: 50% 50%;
        }

        @keyframes gh-float-a {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-12px);
            }
        }

        @keyframes gh-float-b {
            0%, 100% {
                transform: translate3d(0, 0, 0);
            }
            50% {
                transform: translate3d(10px, -16px, 0);
            }
        }

        @keyframes gh-pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, .38);
            }
            70% {
                box-shadow: 0 0 0 18px rgba(16, 185, 129, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        @keyframes gh-orbit {
            to {
                transform: rotate(360deg);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
            }

            .gh-page.gh-js .gh-reveal {
                opacity: 1 !important;
            }
        }
    </style>
@endpush

@php
    $brandLogo = asset('glowfm%20logo.jpeg');
    $heroImage = 'https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=1800&q=88';
    $storyImage = 'https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?auto=format&fit=crop&w=1400&q=88';
    $volunteerImage = 'https://images.unsplash.com/photo-1550831107-1553da8c8464?auto=format&fit=crop&w=1400&q=88';
    $impactTargets = collect($impactMetrics)->mapWithKeys(fn ($metric) => [$metric['key'] => $metric['value']])->all();
    $impactSuffixes = collect($impactMetrics)->mapWithKeys(fn ($metric) => [$metric['key'] => $metric['suffix']])->all();
@endphp

<div
    class="gh-page min-h-screen bg-slate-50 text-slate-950 antialiased"
    x-data="{
        counted: false,
        counters: {
            patients: 0,
            communities: 0,
            volunteers: 0,
            medications: 0
        },
        targets: @js($impactTargets),
        suffixes: @js($impactSuffixes),
        init() {
            this.$el.classList.add('gh-js')
        },
        format(value) {
            return new Intl.NumberFormat().format(value)
        },
        startCounters() {
            if (this.counted) return
            this.counted = true

            Object.entries(this.targets).forEach(([key, target]) => {
                let current = 0
                const step = Math.max(1, Math.ceil(target / 70))
                const timer = setInterval(() => {
                    current = Math.min(target, current + step)
                    this.counters[key] = current

                    if (current >= target) clearInterval(timer)
                }, 24)
            })
        }
    }"
>
    <header class="sticky top-0 z-50 border-b border-white/70 bg-white/90 shadow-sm backdrop-blur-xl">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-3 px-4 py-3 sm:px-6 lg:px-8">
            <a href="#top" class="flex min-w-0 items-center gap-3" aria-label="Glow FM Free Medical Initiative home">
                <img
                    src="{{ $brandLogo }}"
                    alt="Glow FM logo"
                    class="size-11 shrink-0 rounded-xl border border-emerald-100 bg-white object-cover shadow-sm"
                    loading="eager"
                    fetchpriority="high"
                >
                <span class="min-w-0">
                    <span class="gh-display block truncate text-base font-semibold leading-5 text-slate-950 sm:text-lg">Glow FM Free Medical Initiative</span>
                    <span class="block truncate text-xs leading-5 text-slate-600">Free healthcare outreach across Ondo State</span>
                </span>
            </a>

            <nav class="hidden items-center gap-6 text-sm font-medium text-slate-700 lg:flex" aria-label="Primary navigation">
                <a href="#services" class="transition hover:text-emerald-700">Services</a>
                <a href="#outreach" class="transition hover:text-teal-700">Next Outreach</a>
                <a href="#impact" class="transition hover:text-cyan-700">Impact</a>
                <a href="#volunteer" class="transition hover:text-sky-700">Volunteer</a>
                <a href="#partners" class="transition hover:text-blue-700">Partners</a>
            </nav>

            <a
                href="mailto:hello@glowhealthcare.org?subject=Register%20for%20Glow%20FM%20Free%20Medical%20Initiative"
                class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"
            >
                <span class="hidden sm:inline">Register</span>
                <flux:icon.arrow-right class="size-4" />
            </a>
        </div>

        <nav class="gh-scrollbar flex gap-2 overflow-x-auto px-4 pb-3 text-sm font-medium text-slate-700 lg:hidden" aria-label="Mobile navigation">
            <a href="#services" class="shrink-0 rounded-full border border-emerald-100 bg-emerald-50 px-4 py-2">Services</a>
            <a href="#outreach" class="shrink-0 rounded-full border border-teal-100 bg-teal-50 px-4 py-2">Outreach</a>
            <a href="#impact" class="shrink-0 rounded-full border border-cyan-100 bg-cyan-50 px-4 py-2">Impact</a>
            <a href="#volunteer" class="shrink-0 rounded-full border border-sky-100 bg-sky-50 px-4 py-2">Volunteer</a>
            <a href="#partners" class="shrink-0 rounded-full border border-blue-100 bg-blue-50 px-4 py-2">Partners</a>
        </nav>
    </header>

    <main>
        <section id="top" class="relative isolate overflow-hidden bg-gradient-to-br from-emerald-50 via-cyan-50 to-sky-50">
            <div class="absolute inset-0 -z-10 opacity-60" aria-hidden="true">
                <div class="absolute left-[-6rem] top-[-8rem] size-72 rounded-full bg-emerald-200 blur-3xl"></div>
                <div class="absolute right-[-5rem] top-24 size-80 rounded-full bg-cyan-200 blur-3xl"></div>
                <div class="absolute bottom-[-9rem] left-1/3 size-72 rounded-full bg-sky-200 blur-3xl"></div>
            </div>

            <div class="mx-auto grid min-h-[calc(100svh-7rem)] max-w-7xl items-center gap-10 px-4 py-12 sm:px-6 sm:py-16 lg:grid-cols-[1.02fr_0.98fr] lg:px-8 lg:py-20">
                <div>
                    <p class="animate__animated animate__fadeInDown inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-white/80 px-4 py-2 text-sm font-semibold text-emerald-800 shadow-sm backdrop-blur">
                        <span class="gh-pulse size-2 rounded-full bg-emerald-500"></span>
                        Enabled by Glow FM for community health impact
                    </p>

                    <h1 class="gh-display animate__animated animate__fadeInUp mt-6 max-w-4xl text-4xl font-semibold leading-[1.04] text-slate-950 sm:text-5xl lg:text-7xl">
                        Quality Healthcare Should Not Be a Privilege
                    </h1>

                    <p class="animate__animated animate__fadeInUp animate__delay-1s mt-6 max-w-2xl text-base leading-8 text-slate-700 sm:text-lg">
                        The Glow FM Free Medical Initiative brings free consultations, health screenings, medications, and health education directly to communities across Ondo State.
                    </p>

                    <div class="animate__animated animate__fadeInUp animate__delay-1s mt-8 grid gap-3 sm:flex">
                        <a
                            href="mailto:hello@glowhealthcare.org?subject=Register%20for%20the%20Next%20Glow%20FM%20Medical%20Outreach"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-600/20 transition hover:-translate-y-0.5 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"
                        >
                            <span>Register for the Next Outreach</span>
                            <flux:icon.arrow-right class="size-4" />
                        </a>
                        <a
                            href="mailto:hello@glowhealthcare.org?subject=Volunteer%20for%20Glow%20FM%20Free%20Medical%20Initiative"
                            class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white/80 px-5 py-3 text-sm font-semibold text-slate-900 shadow-sm backdrop-blur transition hover:-translate-y-0.5 hover:border-teal-500 hover:text-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        >
                            <flux:icon.user-group class="size-4" />
                            <span>Become a Volunteer</span>
                        </a>
                    </div>

                    <dl class="mt-9 grid gap-3 sm:grid-cols-2">
                        @foreach ($heroStats as $stat)
                            <div
                                class="gh-reveal rounded-2xl border border-white/80 bg-white/80 p-4 shadow-sm backdrop-blur transition duration-300 hover:-translate-y-1 hover:shadow-lg"
                                x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')"
                                style="animation-delay: {{ $loop->index * 90 }}ms"
                            >
                                <dt class="text-2xl font-bold text-slate-950">{{ $stat['value'] }}</dt>
                                <dd class="mt-1 text-sm font-semibold text-emerald-700">{{ $stat['label'] }}</dd>
                                <p class="mt-2 text-xs leading-5 text-slate-600">{{ $stat['detail'] }}</p>
                            </div>
                        @endforeach
                    </dl>
                </div>

                <div class="relative">
                    <div class="gh-float-a relative overflow-hidden rounded-[2rem] border border-white/80 bg-white/75 p-5 shadow-2xl shadow-emerald-900/10 backdrop-blur-xl">
                        <img
                            src="{{ $heroImage }}"
                            alt="Healthcare worker supporting a patient during a community medical visit"
                            class="aspect-[4/3] w-full rounded-[1.5rem] object-cover"
                            loading="eager"
                            fetchpriority="high"
                        >

                        <div class="absolute left-8 top-8 rounded-2xl border border-white/80 bg-white/90 p-3 shadow-lg backdrop-blur">
                            <flux:icon.heart class="size-6 text-emerald-600" />
                        </div>
                        <div class="gh-float-b absolute right-6 top-20 rounded-2xl border border-cyan-100 bg-cyan-50 p-4 shadow-xl">
                            <flux:icon.shield-check class="size-7 text-cyan-700" />
                        </div>
                        <div class="absolute bottom-7 left-7 right-7 rounded-2xl border border-white/70 bg-slate-950/88 p-4 text-white shadow-xl backdrop-blur">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <p class="text-xs font-semibold uppercase text-emerald-200">Field care flow</p>
                                    <p class="mt-1 text-lg font-semibold">Register. Screen. Treat. Refer.</p>
                                </div>
                                <span class="gh-pulse rounded-full bg-emerald-400 px-3 py-1 text-xs font-bold text-emerald-950">Live</span>
                            </div>
                        </div>
                    </div>

                    <div class="pointer-events-none absolute -right-4 -top-6 hidden size-40 items-center justify-center rounded-full border border-emerald-200/80 bg-white/50 backdrop-blur md:flex" aria-hidden="true">
                        <div class="gh-orbit absolute inset-4 rounded-full border border-dashed border-teal-300"></div>
                        <flux:icon.plus-circle class="size-14 text-emerald-600" />
                    </div>
                </div>
            </div>
        </section>

        <section class="border-y border-emerald-100 bg-white py-12 sm:py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold text-emerald-700">Trust and delivery</p>
                    <h2 class="gh-display mt-3 text-3xl font-semibold leading-tight text-slate-950 sm:text-4xl">
                        Healthcare Delivered with Compassion
                    </h2>
                    <p class="mt-4 text-base leading-8 text-slate-700">
                        Every outreach is organized in partnership with licensed medical professionals, volunteers, community leaders, and healthcare organizations committed to improving lives.
                    </p>
                </div>

                <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($trustFeatures as $feature)
                        <article
                            class="gh-reveal rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg"
                            x-intersect.once="$el.classList.add('animate__animated', 'animate__zoomIn')"
                            style="animation-delay: {{ $loop->index * 80 }}ms"
                        >
                            <div class="mb-4 flex size-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-700">
                                @switch($feature['icon'])
                                    @case('user-group')
                                        <flux:icon.user-group class="size-6" />
                                        @break

                                    @case('heart')
                                        <flux:icon.heart class="size-6" />
                                        @break

                                    @case('clipboard-document-check')
                                        <flux:icon.clipboard-document-check class="size-6" />
                                        @break

                                    @default
                                        <flux:icon.shield-check class="size-6" />
                                @endswitch
                            </div>
                            <h3 class="text-base font-semibold text-slate-950">{{ $feature['title'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600">{{ $feature['description'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="services" class="bg-slate-50 py-12 sm:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-5 md:flex-row md:items-end md:justify-between">
                    <div class="max-w-2xl">
                        <p class="text-sm font-semibold text-teal-700">What residents receive</p>
                        <h2 class="gh-display mt-3 text-3xl font-semibold leading-tight text-slate-950 sm:text-5xl">Free Healthcare Services</h2>
                    </div>
                    <p class="max-w-xl text-sm leading-7 text-slate-700 sm:text-base">
                        Services are arranged to identify common health risks early, provide immediate guidance, and connect residents to next-step care where needed.
                    </p>
                </div>

                <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($services as $service)
                        <article
                            class="gh-reveal group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-cyan-200 hover:shadow-xl"
                            x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')"
                            style="animation-delay: {{ $loop->index * 70 }}ms"
                        >
                            <div class="mb-5 flex size-12 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-50 to-cyan-50 text-teal-700 transition group-hover:scale-110">
                                @switch($service['icon'])
                                    @case('user-group')
                                        <flux:icon.user-group class="size-6" />
                                        @break

                                    @case('heart')
                                        <flux:icon.heart class="size-6" />
                                        @break

                                    @case('beaker')
                                        <flux:icon.beaker class="size-6" />
                                        @break

                                    @case('plus-circle')
                                        <flux:icon.plus-circle class="size-6" />
                                        @break

                                    @case('eye')
                                        <flux:icon.eye class="size-6" />
                                        @break

                                    @case('academic-cap')
                                        <flux:icon.academic-cap class="size-6" />
                                        @break

                                    @case('clipboard-document-check')
                                        <flux:icon.clipboard-document-check class="size-6" />
                                        @break

                                    @default
                                        <flux:icon.shield-check class="size-6" />
                                @endswitch
                            </div>
                            <h3 class="text-base font-semibold text-slate-950">{{ $service['title'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600">{{ $service['description'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-white py-12 sm:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold text-cyan-700">Patient journey</p>
                    <h2 class="gh-display mt-3 text-3xl font-semibold leading-tight text-slate-950 sm:text-5xl">Getting Care Is Simple</h2>
                </div>

                <div class="mt-10 grid gap-4 lg:grid-cols-5">
                    @foreach ($steps as $step)
                        <article
                            class="gh-reveal relative rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"
                            x-intersect.once="$el.classList.add('animate__animated', 'animate__slideInUp')"
                            style="animation-delay: {{ $loop->index * 90 }}ms"
                        >
                            <span class="flex size-11 items-center justify-center rounded-full bg-slate-950 text-sm font-bold text-white">{{ $step['step'] }}</span>
                            <h3 class="mt-5 text-base font-semibold text-slate-950">{{ $step['title'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600">{{ $step['description'] }}</p>
                            @unless ($loop->last)
                                <div class="absolute -right-2 top-10 hidden h-px w-4 bg-cyan-300 lg:block" aria-hidden="true"></div>
                            @endunless
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="outreach" class="bg-gradient-to-br from-slate-950 via-slate-900 to-teal-950 py-12 text-white sm:py-20">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-center lg:px-8">
                <div class="gh-reveal" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                    <p class="text-sm font-semibold text-amber-300">Next Medical Outreach</p>
                    <h2 class="gh-display mt-3 text-3xl font-semibold leading-tight sm:text-5xl">Join us in Akure for a day of free healthcare services delivered by qualified medical professionals.</h2>
                    <p class="mt-5 text-sm leading-7 text-slate-300 sm:text-base">
                        Registration helps the team plan doctors, screening points, medication support, crowd flow, and follow-up needs for each outreach location.
                    </p>
                </div>

                <div
                    class="gh-reveal rounded-3xl border border-white/15 bg-white p-6 text-slate-950 shadow-2xl sm:p-8"
                    x-intersect.once="$el.classList.add('animate__animated', 'animate__zoomIn')"
                >
                    <div class="grid gap-4 sm:grid-cols-3">
                        <div class="rounded-2xl bg-emerald-50 p-4">
                            <p class="text-xs font-semibold uppercase text-emerald-700">Date</p>
                            <p class="mt-2 text-lg font-bold text-slate-950">To be announced</p>
                        </div>
                        <div class="rounded-2xl bg-cyan-50 p-4">
                            <p class="text-xs font-semibold uppercase text-cyan-700">Time</p>
                            <p class="mt-2 text-lg font-bold text-slate-950">9:00 AM - 3:00 PM</p>
                        </div>
                        <div class="rounded-2xl bg-sky-50 p-4">
                            <p class="text-xs font-semibold uppercase text-sky-700">Venue</p>
                            <p class="mt-2 text-lg font-bold text-slate-950">Akure, Ondo State</p>
                        </div>
                    </div>

                    <p class="mt-5 text-sm leading-7 text-slate-600">
                        Confirmed venue details will be shared with registered residents, volunteers, and partner organizations before the outreach day.
                    </p>

                    <a
                        href="mailto:hello@glowhealthcare.org?subject=Register%20for%20Akure%20Medical%20Outreach"
                        class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"
                    >
                        <span>Register for the Next Outreach</span>
                        <flux:icon.arrow-right class="size-4" />
                    </a>
                </div>
            </div>
        </section>

        <section id="impact" class="bg-white py-12 sm:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold text-blue-700">Measurable outcomes</p>
                    <h2 class="gh-display mt-3 text-3xl font-semibold leading-tight text-slate-950 sm:text-5xl">Changing Lives Across Communities</h2>
                </div>

                <div
                    class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4"
                    x-intersect.once="startCounters()"
                >
                    @foreach ($impactMetrics as $metric)
                        <article class="gh-reveal rounded-2xl border border-slate-200 bg-gradient-to-br from-white to-emerald-50 p-6 shadow-sm" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')" style="animation-delay: {{ $loop->index * 90 }}ms">
                            <p class="text-4xl font-bold text-slate-950">
                                <span x-text="format(counters.{{ $metric['key'] }})">0</span><span>{{ $metric['suffix'] }}</span>
                            </p>
                            <h3 class="mt-3 text-base font-semibold text-emerald-800">{{ $metric['label'] }}</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">{{ $metric['detail'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-slate-50 py-12 sm:py-20">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_0.92fr] lg:items-center lg:px-8">
                <div class="gh-reveal overflow-hidden rounded-3xl shadow-2xl shadow-slate-900/10" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeIn')">
                    <img src="{{ $storyImage }}" alt="Medical team providing community healthcare support" class="aspect-[4/3] w-full object-cover">
                </div>
                <div class="gh-reveal" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                    <p class="text-sm font-semibold text-teal-700">Why this initiative matters</p>
                    <h2 class="gh-display mt-3 text-3xl font-semibold leading-tight text-slate-950 sm:text-5xl">Healthcare should reach people before crisis does.</h2>
                    <p class="mt-5 text-base leading-8 text-slate-700">
                        Many families delay seeking healthcare because of cost, distance, or lack of access. The Glow FM Free Medical Initiative exists to bridge that gap by bringing healthcare closer to the people who need it most.
                    </p>
                    <p class="mt-4 text-sm leading-7 text-slate-600">
                        Glow FM serves as the public-interest enabler: using trusted community reach, media visibility, and convening power to connect residents, health workers, volunteers, NGOs, government agencies, and sponsors around practical medical outreach.
                    </p>
                </div>
            </div>
        </section>

        <section id="volunteer" class="bg-white py-12 sm:py-20">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.92fr_1fr] lg:items-center lg:px-8">
                <div class="gh-reveal" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                    <p class="text-sm font-semibold text-sky-700">Volunteer and partner</p>
                    <h2 class="gh-display mt-3 text-3xl font-semibold leading-tight text-slate-950 sm:text-5xl">Become a Force for Good</h2>
                    <p class="mt-5 text-base leading-8 text-slate-700">
                        We welcome doctors, nurses, pharmacists, laboratory scientists, students, media professionals, and community volunteers.
                    </p>
                    <div class="mt-7 grid gap-3 sm:flex">
                        <a href="mailto:hello@glowhealthcare.org?subject=Volunteer%20Registration%20-%20Glow%20FM%20Free%20Medical%20Initiative" class="inline-flex items-center justify-center gap-2 rounded-xl bg-sky-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                            <flux:icon.user-group class="size-4" />
                            <span>Volunteer Registration</span>
                        </a>
                        <a href="mailto:hello@glowhealthcare.org?subject=Partner%20With%20Glow%20FM%20Free%20Medical%20Initiative" class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-800 transition hover:border-emerald-500 hover:text-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                            <flux:icon.shield-check class="size-4" />
                            <span>Partner With Us</span>
                        </a>
                    </div>
                </div>
                <div class="gh-reveal relative overflow-hidden rounded-3xl shadow-2xl shadow-slate-900/10" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeIn')">
                    <img src="{{ $volunteerImage }}" alt="Healthcare volunteer supporting a patient" class="aspect-[4/3] w-full object-cover">
                    <div class="absolute inset-x-5 bottom-5 rounded-2xl bg-white/90 p-4 shadow-lg backdrop-blur">
                        <p class="text-sm font-semibold text-slate-950">Volunteer roles include triage, health talks, pharmacy support, registration, media, logistics, and follow-up calls.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-slate-50 py-12 sm:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold text-emerald-700">Community voices</p>
                    <h2 class="gh-display mt-3 text-3xl font-semibold leading-tight text-slate-950 sm:text-5xl">Stories of trust, service, and care.</h2>
                </div>

                <div class="mt-10 grid gap-5 lg:grid-cols-3">
                    @foreach ($testimonials as $testimonial)
                        <article class="gh-reveal rounded-2xl border border-slate-200 bg-white p-6 shadow-sm" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')" style="animation-delay: {{ $loop->index * 100 }}ms">
                            <div class="flex gap-1 text-amber-400" aria-hidden="true">
                                <span>*</span><span>*</span><span>*</span><span>*</span><span>*</span>
                            </div>
                            <p class="mt-4 text-sm leading-7 text-slate-700">"{{ $testimonial['quote'] }}"</p>
                            <div class="mt-5 border-t border-slate-100 pt-4">
                                <p class="font-semibold text-slate-950">{{ $testimonial['name'] }}</p>
                                <p class="text-sm text-slate-500">{{ $testimonial['role'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="partners" class="bg-white py-12 sm:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                    <div>
                        <p class="text-sm font-semibold text-cyan-700">Sponsors and partners</p>
                        <h2 class="gh-display mt-3 text-3xl font-semibold leading-tight text-slate-950 sm:text-5xl">Our Partners in Community Health</h2>
                    </div>
                    <p class="max-w-xl text-sm leading-7 text-slate-600">
                        The initiative grows through medical expertise, community trust, responsible sponsorship, and Glow FM's ability to mobilize people for good.
                    </p>
                </div>

                <div class="mt-10 grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-6">
                    @foreach ($partners as $partner)
                        <div class="gh-reveal rounded-2xl border border-slate-200 bg-slate-50 p-4 text-center shadow-sm" x-intersect.once="$el.classList.add('animate__animated', 'animate__zoomIn')" style="animation-delay: {{ $loop->index * 70 }}ms">
                            <div class="mx-auto flex size-14 items-center justify-center rounded-2xl bg-white text-sm font-bold text-emerald-700 shadow-sm">{{ $partner['initials'] }}</div>
                            <p class="mt-3 text-xs font-semibold leading-5 text-slate-700">{{ $partner['name'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-gradient-to-br from-emerald-600 via-teal-600 to-cyan-600 py-12 text-white sm:py-16">
            <div class="mx-auto max-w-5xl px-4 text-center sm:px-6 lg:px-8">
                <div class="gh-reveal" x-intersect.once="$el.classList.add('animate__animated', 'animate__zoomIn')">
                    <h2 class="gh-display text-3xl font-semibold leading-tight sm:text-5xl">Together We Can Build a Healthier Ondo State</h2>
                    <p class="mx-auto mt-5 max-w-2xl text-base leading-8 text-emerald-50">
                        Join our mission to make quality healthcare accessible to every community.
                    </p>
                    <div class="mt-8 grid gap-3 sm:flex sm:justify-center">
                        <a href="mailto:hello@glowhealthcare.org?subject=Register%20Now%20-%20Glow%20FM%20Free%20Medical%20Initiative" class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-semibold text-emerald-700 transition hover:bg-emerald-50 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-emerald-600">
                            <span>Register Now</span>
                            <flux:icon.arrow-right class="size-4" />
                        </a>
                        <a href="mailto:hello@glowhealthcare.org?subject=Support%20Glow%20FM%20Free%20Medical%20Initiative" class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/60 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-emerald-600">
                            <span>Support the Initiative</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-slate-50 py-12 sm:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold text-blue-700">Health learning</p>
                    <h2 class="gh-display mt-3 text-3xl font-semibold leading-tight text-slate-950 sm:text-5xl">Health Tips and Community Updates</h2>
                </div>

                <div class="mt-10 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                    @foreach ($articles as $article)
                        <article class="gh-reveal rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-lg" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')" style="animation-delay: {{ $loop->index * 80 }}ms">
                            <p class="inline-flex rounded-full bg-cyan-50 px-3 py-1 text-xs font-semibold text-cyan-700">{{ $article['category'] }}</p>
                            <h3 class="mt-4 text-lg font-semibold leading-6 text-slate-950">{{ $article['title'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600">{{ $article['excerpt'] }}</p>
                            <a href="#contact" class="mt-5 inline-flex text-sm font-semibold text-emerald-700 hover:text-emerald-800">Read update</a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <footer id="contact" class="bg-slate-950 text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 py-12 sm:px-6 lg:grid-cols-[1.1fr_0.9fr] lg:px-8">
            <div>
                <div class="flex items-center gap-3">
                    <img src="{{ $brandLogo }}" alt="Glow FM logo" class="size-11 rounded-xl border border-white/10 object-cover">
                    <div>
                        <p class="gh-display text-xl font-semibold">Glow FM Free Medical Initiative</p>
                        <p class="text-sm text-slate-400">Health impact enabled by Glow FM</p>
                    </div>
                </div>
                <p class="mt-5 max-w-xl text-sm leading-7 text-slate-300">
                    Free consultations, screenings, medications, health education, referrals, volunteer coordination, and community participation for residents of Ondo State.
                </p>
                <div class="mt-6 flex flex-wrap gap-3 text-sm">
                    <a href="#top" class="rounded-full border border-white/10 px-4 py-2 text-slate-300 hover:text-white">About</a>
                    <a href="#services" class="rounded-full border border-white/10 px-4 py-2 text-slate-300 hover:text-white">Programs</a>
                    <a href="#volunteer" class="rounded-full border border-white/10 px-4 py-2 text-slate-300 hover:text-white">Volunteer</a>
                    <a href="mailto:hello@glowhealthcare.org?subject=Donate%20to%20Glow%20FM%20Free%20Medical%20Initiative" class="rounded-full border border-white/10 px-4 py-2 text-slate-300 hover:text-white">Donate</a>
                    <a href="mailto:hello@glowhealthcare.org" class="rounded-full border border-white/10 px-4 py-2 text-slate-300 hover:text-white">Contact</a>
                </div>
            </div>

            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                <h3 class="text-lg font-semibold">Get outreach updates</h3>
                <p class="mt-2 text-sm leading-6 text-slate-300">Receive health tips, registration notices, volunteer calls, and sponsor updates.</p>
                <form class="mt-5 grid gap-3 sm:grid-cols-[1fr_auto]">
                    <label class="sr-only" for="newsletter-email">Email address</label>
                    <input id="newsletter-email" type="email" placeholder="Email address" class="rounded-xl border border-white/10 bg-white px-4 py-3 text-sm text-slate-950 outline-none focus:ring-2 focus:ring-cyan-300">
                    <button type="submit" class="rounded-xl bg-cyan-400 px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-cyan-300">Subscribe</button>
                </form>
                <div class="mt-5 flex gap-3 text-sm text-slate-300">
                    <a href="https://www.glowfmradio.com" class="hover:text-white">Glow FM</a>
                    <a href="#partners" class="hover:text-white">Partners</a>
                    <a href="#impact" class="hover:text-white">Impact</a>
                </div>
            </div>
        </div>
        <div class="border-t border-white/10 px-4 py-5 text-center text-xs text-slate-500">
            &copy; {{ date('Y') }} Glow FM Free Medical Initiative. Built for community health, dignity, and access.
        </div>
    </footer>
</div>
