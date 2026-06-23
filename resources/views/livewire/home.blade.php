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

        .gh-mobile-nav {
            scrollbar-width: none;
        }

        .gh-mobile-nav::-webkit-scrollbar {
            display: none;
        }

        .gh-reveal {
            opacity: 0;
        }

        .gh-reveal.animate__animated {
            opacity: 1;
        }

        .gh-pulse-ring {
            animation: gh-pulse-ring 2.6s ease-out infinite;
        }

        .gh-float {
            animation: gh-float 5.5s ease-in-out infinite;
        }

        @keyframes gh-pulse-ring {
            0% {
                box-shadow: 0 0 0 0 rgba(52, 211, 153, .42);
            }
            70% {
                box-shadow: 0 0 0 16px rgba(52, 211, 153, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(52, 211, 153, 0);
            }
        }

        @keyframes gh-float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .gh-reveal,
            .gh-pulse-ring,
            .gh-float {
                animation: none !important;
                opacity: 1 !important;
                transform: none !important;
            }
        }
    </style>
@endpush

@php
    $brandLogo = asset('glowfm%20logo.jpeg');
    $heroImage = 'https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=1900&q=88';
    $ownerImage = 'https://www.glowfmradio.com/storage/uploads/website/team/wpr3964pwQa76QKTxg7F4gDweMiNmPpdFjB8EFsX.jpg';

    $careSpectrum = [
        ['name' => 'red', 'hex' => '#ef4444'],
        ['name' => 'orange', 'hex' => '#f97316'],
        ['name' => 'amber', 'hex' => '#f59e0b'],
        ['name' => 'yellow', 'hex' => '#eab308'],
        ['name' => 'lime', 'hex' => '#84cc16'],
        ['name' => 'green', 'hex' => '#22c55e'],
        ['name' => 'emerald', 'hex' => '#10b981'],
        ['name' => 'teal', 'hex' => '#14b8a6'],
        ['name' => 'cyan', 'hex' => '#06b6d4'],
        ['name' => 'sky', 'hex' => '#0ea5e9'],
        ['name' => 'blue', 'hex' => '#3b82f6'],
        ['name' => 'indigo', 'hex' => '#6366f1'],
        ['name' => 'violet', 'hex' => '#8b5cf6'],
        ['name' => 'purple', 'hex' => '#a855f7'],
        ['name' => 'fuchsia', 'hex' => '#d946ef'],
        ['name' => 'pink', 'hex' => '#ec4899'],
        ['name' => 'rose', 'hex' => '#f43f5e'],
        ['name' => 'slate', 'hex' => '#475569'],
        ['name' => 'gray', 'hex' => '#6b7280'],
        ['name' => 'zinc', 'hex' => '#71717a'],
        ['name' => 'neutral', 'hex' => '#737373'],
        ['name' => 'stone', 'hex' => '#78716c'],
        ['name' => 'taupe', 'hex' => '#8b7a6b'],
        ['name' => 'mauve', 'hex' => '#9b6b8f'],
        ['name' => 'mist', 'hex' => '#b8c7cf'],
        ['name' => 'olive', 'hex' => '#6f7f3f'],
    ];

    $programAccents = [
        ['bg' => '#fff1f2', 'text' => '#be123c', 'border' => '#fecdd3'],
        ['bg' => '#fff7ed', 'text' => '#c2410c', 'border' => '#fed7aa'],
        ['bg' => '#ecfeff', 'text' => '#0e7490', 'border' => '#a5f3fc'],
        ['bg' => '#ecfdf5', 'text' => '#047857', 'border' => '#a7f3d0'],
    ];

    $outreachAccents = [
        ['bg' => '#fefce8', 'text' => '#854d0e', 'border' => '#fde68a'],
        ['bg' => '#f5f3ff', 'text' => '#6d28d9', 'border' => '#ddd6fe'],
        ['bg' => '#eef7ed', 'text' => '#4d641f', 'border' => '#d4e5bc'],
    ];

    $ownerCredentials = [
        [
            'label' => 'Clinical background',
            'value' => 'Anesthesiology and pain medicine',
            'color' => '#0e7490',
            'bg' => '#ecfeff',
        ],
        [
            'label' => 'Medical education',
            'value' => 'University of Ibadan College of Medicine',
            'color' => '#be123c',
            'bg' => '#fff1f2',
        ],
        [
            'label' => 'Community leadership',
            'value' => 'Founder and CEO of Glow 99.1 FM Akure',
            'color' => '#6d28d9',
            'bg' => '#f5f3ff',
        ],
    ];

    $focusPlans = [
        'screening' => [
            'label' => 'Medical screening',
            'title' => 'Screen early, explain clearly, refer safely.',
            'copy' => 'The field team sets up vitals, blood pressure, blood sugar, malaria risk education, and counseling desks so families can understand their health status before problems become emergencies.',
            'accent' => '#e11d48',
        ],
        'education' => [
            'label' => 'Health education',
            'title' => 'Turn health information into household action.',
            'copy' => 'Short talks and one-on-one guidance cover hypertension, diabetes, malaria prevention, sanitation, nutrition, medication use, maternal warning signs, and when to seek urgent care.',
            'accent' => '#0e7490',
        ],
        'referral' => [
            'label' => 'Referral support',
            'title' => 'Keep vulnerable cases visible after outreach day.',
            'copy' => 'High-risk findings are documented with referral notes, partner clinic contacts, and follow-up lists so people are not left alone after screening.',
            'accent' => '#047857',
        ],
    ];
@endphp

<div
    class="gh-page min-h-screen bg-[#fbfaf7] text-neutral-950 antialiased"
    x-data="{
        activeStation: 0,
        activeFocus: 'screening',
        focusPlans: @js($focusPlans),
        stationCount: {{ count($fieldStations) }},
        init() {
            this.$nextTick(() => {
                setInterval(() => {
                    this.activeStation = (this.activeStation + 1) % this.stationCount
                }, 4200)
            })
        }
    }"
>
    <header class="sticky top-0 z-40 border-b border-zinc-200 bg-white/95 backdrop-blur">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-3 px-3 py-3 sm:gap-5 sm:px-6 sm:py-4 lg:px-8">
            <a href="#top" class="flex min-w-0 items-center gap-3" aria-label="Glow Healthcare Outreach Initiative home">
                <img
                    src="{{ $brandLogo }}"
                    alt="Glow logo"
                    class="size-10 shrink-0 rounded-md border border-stone-200 bg-white object-cover shadow-sm sm:size-12"
                    loading="eager"
                    fetchpriority="high"
                >
                <span class="min-w-0">
                    <span class="gh-display block truncate text-sm font-normal leading-5 text-neutral-950 sm:text-lg">Glow Healthcare</span>
                    <span class="hidden truncate text-xs leading-5 text-stone-600 sm:block">Outreach Initiative</span>
                </span>
            </a>

            <nav class="hidden items-center gap-7 text-sm font-medium text-zinc-700 md:flex" aria-label="Primary navigation">
                <a href="#owner" class="transition hover:text-orange-700">Owner</a>
                <a href="#programs" class="transition hover:text-rose-700">Programs</a>
                <a href="#approach" class="transition hover:text-emerald-700">Approach</a>
                <a href="#outreach" class="transition hover:text-sky-700">Outreach</a>
                <a href="#contact" class="transition hover:text-indigo-700">Partner</a>
            </nav>

            <a
                href="#contact"
                class="inline-flex shrink-0 items-center gap-2 rounded-md bg-neutral-950 px-3 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-neutral-800 focus:outline-none focus:ring-2 focus:ring-neutral-950 focus:ring-offset-2 sm:px-4"
                aria-label="Get involved"
            >
                <span class="hidden sm:inline">Get involved</span>
                <flux:icon.arrow-right class="size-4" />
            </a>
        </div>

        <nav class="gh-mobile-nav flex gap-1 overflow-x-auto px-3 pb-3 text-sm font-medium text-zinc-700 md:hidden" aria-label="Mobile navigation">
            <a href="#owner" class="shrink-0 rounded-md border border-stone-200 bg-white px-3 py-2 transition hover:text-orange-700">Owner</a>
            <a href="#programs" class="shrink-0 rounded-md border border-stone-200 bg-white px-3 py-2 transition hover:text-rose-700">Programs</a>
            <a href="#approach" class="shrink-0 rounded-md border border-stone-200 bg-white px-3 py-2 transition hover:text-emerald-700">Approach</a>
            <a href="#outreach" class="shrink-0 rounded-md border border-stone-200 bg-white px-3 py-2 transition hover:text-sky-700">Outreach</a>
            <a href="#contact" class="shrink-0 rounded-md border border-stone-200 bg-white px-3 py-2 transition hover:text-indigo-700">Partner</a>
        </nav>

        <div class="grid h-1 grid-cols-[repeat(26,minmax(0,1fr))]" aria-hidden="true">
            @foreach ($careSpectrum as $tone)
                <span title="{{ $tone['name'] }}" style="background-color: {{ $tone['hex'] }}"></span>
            @endforeach
        </div>
    </header>

    <section id="top" class="relative overflow-hidden border-b border-stone-200 bg-neutral-950 text-white">
        <img
            src="{{ $heroImage }}"
            alt="Healthcare worker supporting a patient during a community medical visit"
            class="absolute inset-0 h-full w-full object-cover object-center"
            loading="eager"
            fetchpriority="high"
        >
        <div class="absolute inset-0" style="background: linear-gradient(90deg, rgba(10, 10, 10, .94) 0%, rgba(10, 10, 10, .76) 48%, rgba(10, 10, 10, .34) 100%);"></div>
        <div class="absolute inset-x-0 bottom-0 h-48 bg-gradient-to-t from-neutral-950 to-transparent"></div>

        <div class="relative mx-auto grid min-h-[calc(100svh-8rem)] max-w-7xl items-center gap-8 px-4 py-10 sm:min-h-[82svh] sm:gap-10 sm:px-6 sm:py-16 lg:grid-cols-[1fr_0.58fr] lg:px-8 lg:py-24">
            <div class="max-w-3xl">
                <p class="animate__animated animate__fadeInDown inline-flex max-w-full rounded-md border border-cyan-200/50 bg-cyan-300/15 px-3 py-1 text-xs font-semibold leading-5 text-cyan-100 sm:text-sm">
                    Non-profit community health outreach led by Dr. Ezekiel Akande
                </p>
                <h1 class="gh-display animate__animated animate__fadeInUp mt-5 max-w-4xl text-4xl font-semibold leading-[1.04] text-white sm:mt-6 sm:text-5xl lg:text-7xl">
                    Free health outreach for families who need care closer.
                </h1>
                <p class="animate__animated animate__fadeInUp animate__delay-1s mt-5 max-w-2xl text-sm leading-7 text-zinc-100 sm:mt-6 sm:text-lg sm:leading-8">
                    Glow Healthcare Outreach Initiative is an NGO-style medical outreach bringing free screening, health education, counseling, basic care navigation, and referral support to underserved communities.
                </p>

                <div class="animate__animated animate__fadeInUp animate__delay-1s mt-7 grid gap-3 sm:mt-8 sm:flex sm:flex-row">
                    <a
                        href="#programs"
                        class="inline-flex items-center justify-center gap-2 rounded-md bg-rose-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-rose-500 focus:outline-none focus:ring-2 focus:ring-rose-200 focus:ring-offset-2 focus:ring-offset-neutral-950"
                    >
                        <span>See outreach services</span>
                        <flux:icon.arrow-right class="size-4" />
                    </a>
                    <a
                        href="#outreach"
                        class="inline-flex items-center justify-center gap-2 rounded-md border border-white/40 px-5 py-3 text-sm font-semibold text-white transition hover:border-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-neutral-950"
                    >
                        <flux:icon.calendar-days class="size-4" />
                        <span>Field clinic plan</span>
                    </a>
                </div>

                <dl class="animate__animated animate__fadeInUp animate__delay-2s mt-8 grid max-w-2xl grid-cols-3 gap-2 sm:mt-10 sm:gap-3">
                    <div class="rounded-lg border border-white/15 bg-white/10 p-3 backdrop-blur sm:p-4">
                        <dt class="text-xs font-semibold uppercase text-rose-200">Screening</dt>
                        <dd class="mt-2 text-2xl font-semibold text-white sm:text-3xl">Free</dd>
                    </div>
                    <div class="rounded-lg border border-white/15 bg-white/10 p-3 backdrop-blur sm:p-4">
                        <dt class="text-xs font-semibold uppercase text-amber-200">Model</dt>
                        <dd class="mt-2 text-2xl font-semibold text-white sm:text-3xl">NGO</dd>
                    </div>
                    <div class="rounded-lg border border-white/15 bg-white/10 p-3 backdrop-blur sm:p-4">
                        <dt class="text-xs font-semibold uppercase text-emerald-200">Care path</dt>
                        <dd class="mt-2 text-2xl font-semibold text-white sm:text-3xl">Refer</dd>
                    </div>
                </dl>
            </div>

            <aside class="gh-float rounded-lg border border-white/15 bg-white/12 p-4 shadow-2xl backdrop-blur sm:p-5">
                <div class="flex items-center gap-3 sm:gap-4">
                    <img
                        src="{{ $ownerImage }}"
                        alt="Dr. Ezekiel Akande"
                        class="size-16 rounded-md border border-white/30 bg-white object-cover object-top sm:size-20"
                        loading="lazy"
                    >
                    <div>
                        <p class="text-xs font-semibold text-amber-100 sm:text-sm">Owner and convener</p>
                        <p class="gh-display mt-1 text-2xl font-semibold leading-tight text-white sm:text-3xl">Dr. Ezekiel Akande</p>
                        <p class="mt-1 text-sm text-zinc-200">Physician. Author. Community-builder.</p>
                    </div>
                </div>

                <div class="mt-6 grid gap-3 text-sm">
                    <div class="rounded-md border border-white/15 bg-white/10 p-4">
                        <div class="flex items-center justify-between gap-3">
                            <p class="font-medium text-cyan-100">Field clinic readiness</p>
                            <span class="gh-pulse-ring rounded-md bg-emerald-400 px-2 py-1 text-xs font-semibold text-emerald-950">Active</span>
                        </div>
                        <p class="mt-2 leading-6 text-zinc-100">Registration, vitals, screening, counseling, referral notes, and follow-up lists prepared before each outreach.</p>
                    </div>
                    <div class="grid gap-3">
                        <div class="flex items-center justify-between gap-3 rounded-md bg-white/10 px-4 py-3">
                            <span class="text-zinc-100">Blood pressure and blood sugar checks</span>
                            <flux:icon.check-circle class="size-5 text-lime-300" />
                        </div>
                        <div class="flex items-center justify-between gap-3 rounded-md bg-white/10 px-4 py-3">
                            <span class="text-zinc-100">Maternal, child, and elderly health counseling</span>
                            <flux:icon.heart class="size-5 text-rose-300" />
                        </div>
                        <div class="flex items-center justify-between gap-3 rounded-md bg-white/10 px-4 py-3">
                            <span class="text-zinc-100">Partner clinic referral and follow-up list</span>
                            <flux:icon.clipboard-document-check class="size-5 text-sky-300" />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-2 sm:gap-3">
                        <div class="rounded-md bg-red-500/90 p-3 text-center">
                            <p class="text-lg font-semibold">01</p>
                            <p class="text-xs text-red-50">Register</p>
                        </div>
                        <div class="rounded-md bg-amber-400 p-3 text-center text-neutral-950">
                            <p class="text-lg font-semibold">02</p>
                            <p class="text-xs">Screen</p>
                        </div>
                        <div class="rounded-md bg-emerald-500 p-3 text-center">
                            <p class="text-lg font-semibold">03</p>
                            <p class="text-xs text-emerald-50">Refer</p>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <main>
        <section class="bg-white">
            <div class="mx-auto grid max-w-7xl gap-4 px-4 py-6 sm:px-6 sm:py-8 md:grid-cols-3 lg:px-8">
                @foreach ($metrics as $metric)
                    @php
                        $metricColors = [
                            ['bar' => '#e11d48', 'bg' => '#fff1f2'],
                            ['bar' => '#f59e0b', 'bg' => '#fffbeb'],
                            ['bar' => '#0d9488', 'bg' => '#f0fdfa'],
                        ][$loop->index] ?? ['bar' => '#334155', 'bg' => '#f8fafc'];
                    @endphp

                    <article
                        class="gh-reveal overflow-hidden rounded-lg border border-stone-200 bg-white shadow-sm"
                        x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')"
                        style="animation-delay: {{ $loop->index * 120 }}ms"
                    >
                        <div class="h-1.5" style="background-color: {{ $metricColors['bar'] }}"></div>
                        <div class="p-5" style="background-color: {{ $metricColors['bg'] }}">
                            <p class="text-2xl font-semibold text-neutral-950 sm:text-3xl">{{ $metric['value'] }}</p>
                            <h2 class="mt-2 text-base font-semibold text-neutral-900">{{ $metric['label'] }}</h2>
                            <p class="mt-2 text-sm leading-6 text-stone-600">{{ $metric['detail'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <section id="owner" class="border-y border-stone-200 bg-[#fdf8f0] py-12 sm:py-20">
            <div
                class="gh-reveal mx-auto grid max-w-7xl gap-8 px-4 sm:gap-10 sm:px-6 lg:grid-cols-[0.74fr_1.26fr] lg:items-center lg:px-8"
                x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')"
            >
                <div class="relative overflow-hidden rounded-lg border border-amber-200 bg-white shadow-sm">
                    <img
                        src="{{ $ownerImage }}"
                        alt="Dr. Ezekiel Akande seated in his office"
                        class="aspect-[4/5] max-h-[32rem] w-full object-cover object-top"
                        loading="lazy"
                    >
                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-neutral-950/92 to-transparent p-4 text-white sm:p-5">
                        <p class="text-sm font-semibold text-amber-200">Owner</p>
                        <p class="gh-display mt-1 text-2xl font-semibold leading-tight sm:text-3xl">Dr. Ezekiel Kayode Akande</p>
                    </div>
                </div>

                <div>
                    <p class="text-sm font-semibold text-orange-700">Owner profile</p>
                    <h2 class="gh-display mt-3 text-3xl font-semibold leading-tight text-neutral-950 sm:text-4xl lg:text-5xl">
                        A healer, communicator, and visionary turning service into community health action.
                    </h2>
                    <p class="mt-5 text-sm leading-7 text-stone-700 sm:text-base sm:leading-8">
                        Dr. Ezekiel Akande is a visionary leader, seasoned medical professional, and transformative communicator whose work bridges science, consciousness, and societal impact. A U.S.-trained anesthesiologist with over three decades of clinical experience, he brings the same precision, calm authority, and depth of insight from clinical practice into humanitarian service.
                    </p>
                    <p class="mt-4 text-sm leading-7 text-stone-700 sm:text-base sm:leading-8">
                        As the Chairman and driving force behind Glow 99.1 FM, Dr. Akande has built a tech-forward, community-centered institution that amplifies truth, inspiration, youth empowerment, and progressive dialogue. Glow Healthcare Outreach Initiative extends that same public-service spirit into free screening, prevention education, counseling, referral support, and volunteer-led follow-up for underserved families.
                    </p>
                    <p class="mt-4 text-sm leading-7 text-stone-700 sm:text-base sm:leading-8">
                        His wider work in personal transformation, purposeful wealth, and human development gives this initiative a deeper mandate: health outreach should not only treat symptoms, but restore dignity, knowledge, confidence, and access. For Dr. Akande, when knowledge, consciousness, and service align, individuals and communities do not merely survive; they rise.
                    </p>

                    <div class="mt-8 grid gap-4 md:grid-cols-3">
                        @foreach ($ownerCredentials as $credential)
                            <article class="rounded-lg border border-stone-200 bg-white p-5 shadow-sm">
                                <p class="inline-flex rounded-md px-3 py-1 text-xs font-semibold" style="background-color: {{ $credential['bg'] }}; color: {{ $credential['color'] }}">{{ $credential['label'] }}</p>
                                <p class="mt-4 text-sm font-semibold leading-6 text-neutral-950">{{ $credential['value'] }}</p>
                            </article>
                        @endforeach
                    </div>

                    <div class="mt-8 rounded-lg border border-[#c9d6ab] bg-[#f5f8ed] p-5">
                        <p class="text-sm font-semibold text-[#6f7f3f]">Leadership note</p>
                        <p class="mt-2 text-sm leading-7 text-stone-700">
                            Glow Healthcare Outreach Initiative reflects Dr. Akande's rare blend of healer, strategist, and visionary: bringing preventive healthcare closer to families, giving vulnerable people clearer next steps, and using service as a practical tool for community upliftment.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="programs" class="border-y border-stone-200 bg-[#f5f1eb] py-12 sm:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-[0.8fr_1.2fr] lg:items-end">
                    <div>
                        <p class="text-sm font-semibold text-rose-700">Our care model</p>
                        <h2 class="gh-display mt-3 text-3xl font-semibold leading-tight text-neutral-950 sm:text-4xl lg:text-5xl">
                            Real outreach services for prevention, early detection, and referral.
                        </h2>
                    </div>
                    <p class="text-sm leading-7 text-stone-700 sm:text-base sm:leading-8">
                        The initiative is built for communities with limited access to routine care. Each visit combines health talks, screening desks, volunteer support, and a referral process that helps people understand what to do next.
                    </p>
                </div>

                <div class="mt-10 grid gap-5 md:grid-cols-2">
                    @foreach ($programs as $program)
                        @php
                            $accent = $programAccents[$loop->index] ?? $programAccents[0];
                        @endphp

                        <article
                            class="gh-reveal rounded-lg border bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg sm:p-6"
                            x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')"
                            style="border-color: {{ $accent['border'] }}; animation-delay: {{ $loop->index * 110 }}ms"
                        >
                            <div class="mb-5 flex size-12 items-center justify-center rounded-md" style="background-color: {{ $accent['bg'] }}; color: {{ $accent['text'] }}">
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
                            <h3 class="text-lg font-semibold text-neutral-950">{{ $program['title'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-stone-600">{{ $program['description'] }}</p>
                        </article>
                    @endforeach
                </div>

                <div
                    class="gh-reveal mt-10 overflow-hidden rounded-lg border border-stone-200 bg-white shadow-sm"
                    x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')"
                >
                    <div class="grid gap-0 lg:grid-cols-[0.72fr_1.28fr]">
                        <div class="border-b border-stone-200 bg-neutral-950 p-5 text-white sm:p-6 lg:border-b-0 lg:border-r">
                            <p class="text-sm font-semibold text-amber-200">Outreach focus planner</p>
                            <h3 class="gh-display mt-3 text-2xl font-semibold leading-tight sm:text-3xl">
                                Choose the need and see how the outreach responds.
                            </h3>
                            <p class="mt-4 text-sm leading-7 text-zinc-300">
                                Alpine keeps this planner instant on the page, while the content stays practical for host communities, donors, and volunteers.
                            </p>
                        </div>

                        <div class="p-5 sm:p-6">
                            <div class="grid gap-2 sm:grid-cols-3" role="tablist" aria-label="Outreach focus options">
                                @foreach ($focusPlans as $key => $plan)
                                    <button
                                        type="button"
                                        x-on:click="activeFocus = '{{ $key }}'"
                                        class="rounded-md border px-4 py-3 text-left text-sm font-semibold transition"
                                        :class="activeFocus === '{{ $key }}' ? 'border-neutral-950 bg-neutral-950 text-white shadow-sm' : 'border-stone-200 bg-white text-stone-700 hover:border-neutral-400'"
                                    >
                                        {{ $plan['label'] }}
                                    </button>
                                @endforeach
                            </div>

                            <div
                                class="mt-5 rounded-lg border-l-4 bg-[#fbfaf7] p-5"
                                :style="'border-color: ' + focusPlans[activeFocus].accent"
                                x-transition.opacity.duration.250ms
                                x-cloak
                            >
                                <p class="text-xs font-semibold uppercase text-stone-500">Selected response</p>
                                <h4 class="mt-2 text-lg font-semibold text-neutral-950" x-text="focusPlans[activeFocus].title"></h4>
                                <p class="mt-3 text-sm leading-7 text-stone-700" x-text="focusPlans[activeFocus].copy"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="approach" class="bg-neutral-950 py-12 text-white sm:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-10 lg:grid-cols-[0.82fr_1.18fr]">
                    <div>
                        <p class="text-sm font-semibold text-lime-300">How outreach works</p>
                        <h2 class="gh-display mt-3 text-3xl font-semibold leading-tight sm:text-4xl lg:text-5xl">
                            From community invitation to patient follow-up.
                        </h2>
                        <p class="mt-5 text-sm leading-7 text-zinc-300">
                            A strong medical outreach is more than a crowd and a few tables. Glow Healthcare organizes each activity around preparation, respectful screening, clear documentation, and next-step support for people with concerning results.
                        </p>
                    </div>

                    <div class="grid gap-4">
                        @foreach ($process as $item)
                            @php
                                $stepColors = [
                                    ['bg' => '#f97316', 'text' => '#fff7ed'],
                                    ['bg' => '#06b6d4', 'text' => '#ecfeff'],
                                    ['bg' => '#84cc16', 'text' => '#1a2e05'],
                                ][$loop->index] ?? ['bg' => '#71717a', 'text' => '#fafafa'];
                            @endphp

                            <article
                                class="gh-reveal rounded-lg border border-white/15 bg-white/5 p-4 transition duration-300 hover:bg-white/10 sm:p-5"
                                x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInRight')"
                                style="animation-delay: {{ $loop->index * 120 }}ms"
                            >
                                <div class="flex gap-4">
                                    <span
                                        class="flex size-11 shrink-0 items-center justify-center rounded-md text-sm font-semibold"
                                        style="background-color: {{ $stepColors['bg'] }}; color: {{ $stepColors['text'] }}"
                                    >
                                        {{ $item['step'] }}
                                    </span>
                                    <div>
                                        <h3 class="text-lg font-semibold text-white">{{ $item['title'] }}</h3>
                                        <p class="mt-2 text-sm leading-7 text-zinc-300">{{ $item['description'] }}</p>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section id="outreach" class="bg-white py-12 sm:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                    <div class="max-w-2xl">
                        <p class="text-sm font-semibold text-blue-700">Outreach priorities</p>
                        <h2 class="gh-display mt-3 text-3xl font-semibold leading-tight text-neutral-950 sm:text-4xl lg:text-5xl">
                            Program areas for families, schools, faith groups, and rural communities.
                        </h2>
                    </div>
                    <a
                        href="#contact"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-md border border-neutral-300 px-4 py-3 text-sm font-semibold text-neutral-800 transition hover:border-blue-700 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 sm:w-fit sm:py-2"
                    >
                        <flux:icon.calendar-days class="size-4" />
                        <span>Invite the outreach team</span>
                    </a>
                </div>

                <div class="mt-10 grid gap-5 lg:grid-cols-3">
                    @foreach ($outreaches as $outreach)
                        @php
                            $accent = $outreachAccents[$loop->index] ?? $outreachAccents[0];
                        @endphp

                        <article
                            class="gh-reveal rounded-lg border bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg sm:p-6"
                            x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')"
                            style="border-color: {{ $accent['border'] }}; animation-delay: {{ $loop->index * 110 }}ms"
                        >
                            <p class="inline-flex rounded-md px-3 py-1 text-sm font-semibold" style="background-color: {{ $accent['bg'] }}; color: {{ $accent['text'] }}">{{ $outreach['label'] }}</p>
                            <h3 class="mt-5 text-lg font-semibold text-neutral-950">{{ $outreach['title'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-stone-600">{{ $outreach['description'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="border-y border-stone-200 bg-[#eef3f4] py-12 sm:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                    <div>
                        <p class="text-sm font-semibold text-indigo-700">Field clinic stations</p>
                        <h2 class="gh-display mt-3 text-3xl font-semibold leading-tight text-neutral-950 sm:text-4xl lg:text-5xl">
                            What happens when Glow sets up in a community.
                        </h2>
                        <p class="mt-5 text-sm leading-7 text-stone-700 sm:text-base sm:leading-8">
                            Each outreach is arranged so people can move from registration to screening, counseling, and referral without confusion. Volunteers help with crowd flow while clinical team members focus on risk detection and health guidance.
                        </p>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        @foreach ($fieldStations as $station)
                            @php
                                $stationColors = [
                                    ['border' => '#d8cfc4', 'bg' => '#f7f3ee', 'text' => '#8b7a6b'],
                                    ['border' => '#e4c9dd', 'bg' => '#fbf2f8', 'text' => '#9b6b8f'],
                                    ['border' => '#cbdde3', 'bg' => '#f4fafb', 'text' => '#0369a1'],
                                    ['border' => '#c9d6ab', 'bg' => '#f5f8ed', 'text' => '#6f7f3f'],
                                ][$loop->index] ?? ['border' => '#e7e5e4', 'bg' => '#ffffff', 'text' => '#57534e'];
                            @endphp

                            <article
                                class="gh-reveal rounded-lg border p-5 transition duration-300"
                                x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')"
                                x-on:mouseenter="activeStation = {{ $loop->index }}"
                                x-on:focusin="activeStation = {{ $loop->index }}"
                                :class="activeStation === {{ $loop->index }} ? 'scale-[1.02] shadow-lg ring-2 ring-neutral-950 ring-offset-2' : 'shadow-sm'"
                                style="border-color: {{ $stationColors['border'] }}; background-color: {{ $stationColors['bg'] }}; animation-delay: {{ $loop->index * 110 }}ms"
                                tabindex="0"
                            >
                                @switch($station['icon'])
                                    @case('clipboard-document-check')
                                        <flux:icon.clipboard-document-check class="size-6" style="color: {{ $stationColors['text'] }}" />
                                        @break

                                    @case('heart')
                                        <flux:icon.heart class="size-6" style="color: {{ $stationColors['text'] }}" />
                                        @break

                                    @case('academic-cap')
                                        <flux:icon.academic-cap class="size-6" style="color: {{ $stationColors['text'] }}" />
                                        @break

                                    @default
                                        <flux:icon.shield-check class="size-6" style="color: {{ $stationColors['text'] }}" />
                                @endswitch
                                <h3 class="mt-4 text-base font-semibold text-neutral-950">{{ $station['title'] }}</h3>
                                <p class="mt-2 text-sm leading-6 text-stone-600">{{ $station['detail'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="bg-neutral-950 py-12 text-white sm:py-20">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_0.72fr] lg:items-center lg:px-8">
                <div>
                    <p class="text-sm font-semibold text-fuchsia-300">Partner with the outreach</p>
                    <h2 class="gh-display mt-3 text-3xl font-semibold leading-tight sm:text-4xl lg:text-5xl">
                        Support free healthcare access for underserved families.
                    </h2>
                    <p class="mt-5 max-w-2xl text-sm leading-7 text-zinc-300 sm:text-base sm:leading-8">
                        Glow Healthcare Outreach Initiative welcomes clinics, medical volunteers, pharmacists, diagnostic partners, schools, churches, mosques, community associations, donors, and corporate sponsors who can help with medicines, consumables, transport, venues, equipment, health education, and referral care.
                    </p>
                </div>

                <div class="rounded-lg border border-white/15 bg-white p-5 text-neutral-950 shadow-sm sm:p-6">
                    <h3 class="text-lg font-semibold">Host, sponsor, or volunteer</h3>
                    <p class="mt-3 text-sm leading-7 text-stone-600">
                        Share the community location, expected audience, available venue, health concerns, and the support you can provide. The team can then plan the right mix of screening stations, health talks, supplies, and referral partners.
                    </p>
                    <div class="mt-6 grid gap-3">
                        <a
                            href="mailto:hello@glowhealthcare.org?subject=Partnership%20with%20Glow%20Healthcare%20Outreach%20Initiative"
                            class="inline-flex items-center justify-center gap-2 rounded-md bg-rose-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-rose-500 focus:outline-none focus:ring-2 focus:ring-rose-600 focus:ring-offset-2"
                        >
                            <flux:icon.envelope class="size-4" />
                            <span>Contact the outreach team</span>
                        </a>
                        <a
                            href="#programs"
                            class="inline-flex items-center justify-center gap-2 rounded-md border border-neutral-300 px-4 py-3 text-sm font-semibold text-neutral-800 transition hover:border-indigo-700 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-700 focus:ring-offset-2"
                        >
                            <flux:icon.check-circle class="size-4" />
                            <span>Review outreach services</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="border-t border-stone-200 bg-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-7 text-sm text-stone-600 sm:px-6 sm:py-8 md:flex-row md:items-center md:justify-between lg:px-8">
            <div class="flex items-center gap-3">
                <img src="{{ $brandLogo }}" alt="Glow logo" class="size-9 rounded-md border border-stone-200 object-cover">
                <p class="font-medium text-neutral-900">Glow Healthcare Outreach Initiative</p>
            </div>
            <p>Free community screening, prevention education, referral support, and volunteer-led follow-up.</p>
            <a href="https://www.dayoebe.github.io" class="text-blue-500 hover:text-blue-700">Wireless </a>
        </div>
    </footer>
</div>
