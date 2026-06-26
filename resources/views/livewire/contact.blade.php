@php
    $heroImage = asset('images/outreach/family-health-education-ondo.webp');
@endphp

<x-glow.public-shell active="contact">
    <main>
        <section class="relative isolate overflow-hidden bg-sky-50">
            <div class="absolute inset-x-0 top-0 h-1 bg-slate-300" aria-hidden="true"></div>
            <div class="mx-auto grid max-w-7xl gap-8 px-4 pb-12 pt-8 sm:px-6 sm:py-16 lg:grid-cols-[0.92fr_1.08fr] lg:items-center lg:px-8">
                <div>
                    <a href="{{ route('home') }}" wire:navigate class="animate__animated animate__fadeIn inline-flex items-center gap-2 rounded-full border border-white/70 bg-white/75 px-3 py-2 text-xs font-semibold text-sky-800 shadow-sm backdrop-blur-xl sm:px-4 sm:text-sm">
                        <i class="fa-solid fa-arrow-left text-[0.75rem]" aria-hidden="true"></i>
                        Back to homepage
                    </a>
                    <h1 class="gh-display animate__animated animate__fadeIn mt-5 text-[2.35rem] leading-[1.04] text-slate-950 sm:text-5xl lg:text-6xl">
                        Reach the <span class="text-sky-700">Outreach</span> Desk
                    </h1>
                    <p class="animate__animated animate__fadeIn mt-5 max-w-2xl text-base leading-8 text-slate-700">
                        Contact Glow Health Outreach for registration guidance, volunteer coordination, partnership discussions, media requests, or community health needs.
                    </p>
                    <div class="mt-7 grid gap-3 sm:flex">
                        <a href="mailto:chairman@glowfmhealth.com?subject=Glow%20Health%20Outreach%20Inquiry" class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-900/10 transition hover:-translate-y-0.5 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">
                            <i class="fa-solid fa-envelope text-[0.9rem]" aria-hidden="true"></i>
                            <span>Email the Desk</span>
                        </a>
                        <a href="{{ route('outreach') }}" wire:navigate class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-800 shadow-sm transition hover:-translate-y-0.5 hover:border-sky-300 hover:text-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                            <i class="fa-solid fa-calendar-check text-[0.9rem]" aria-hidden="true"></i>
                            <span>Next Outreach</span>
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
                    <p class="text-sm font-semibold text-sky-700">Contact channels</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">Send the right message to the right desk</h2>
                    <p class="mt-4 text-base leading-8 text-slate-700">
                        Clear inquiries help the team confirm registrations, assign volunteers, brief partners, and respond to community needs faster.
                    </p>
                </div>

                <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($channels as $channel)
                        <article class="gh-reveal rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-sky-200 hover:shadow-xl" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')" style="animation-delay: {{ $loop->index * 70 }}ms">
                            <div class="flex size-12 items-center justify-center rounded-2xl border {{ $channel['color'] }}">
                                <i class="fa-solid {{ $channel['icon'] }} text-xl" aria-hidden="true"></i>
                            </div>
                            <h3 class="mt-5 text-lg font-semibold text-slate-950">{{ $channel['title'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600">{{ $channel['description'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-slate-50 py-12 sm:py-16">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.95fr_1.05fr] lg:items-start lg:px-8">
                <div>
                    <p class="text-sm font-semibold text-cyan-700">Direct details</p>
                    <h2 class="gh-display mt-3 text-3xl leading-tight text-slate-950 sm:text-5xl">Where to reach the team</h2>
                    <div class="mt-7 grid gap-4">
                        @foreach ($details as $detail)
                            <article class="gh-reveal rounded-2xl border border-white/70 bg-white/80 p-5 shadow-sm backdrop-blur-xl" x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
                                <div class="flex gap-4">
                                    <span class="flex size-12 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sky-700">
                                        <i class="fa-solid {{ $detail['icon'] }} text-lg" aria-hidden="true"></i>
                                    </span>
                                    <span>
                                        <h3 class="font-semibold text-slate-950">{{ $detail['label'] }}</h3>
                                        <p class="mt-2 text-sm leading-7 text-slate-600">{{ $detail['value'] }}</p>
                                    </span>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>

                <form
                    class="gh-reveal rounded-3xl border border-white/70 bg-white/85 p-5 shadow-2xl shadow-slate-900/10 backdrop-blur-xl sm:p-7"
                    x-data="{
                        name: '',
                        phone: '',
                        topic: 'Resident registration',
                        message: '',
                        submitContact() {
                            const subject = encodeURIComponent(this.topic + ' - Glow Health Outreach')
                            const body = encodeURIComponent('Name: ' + this.name + '\nPhone or email: ' + this.phone + '\nTopic: ' + this.topic + '\n\nMessage:\n' + this.message)
                            window.location.href = 'mailto:chairman@glowfmhealth.com?subject=' + subject + '&body=' + body
                        }
                    }"
                    x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')"
                    @submit.prevent="submitContact()"
                >
                    <p class="text-sm font-semibold text-sky-700">Message builder</p>
                    <h3 class="gh-display mt-2 text-2xl leading-tight text-slate-950">Prepare a clear email</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        This opens your email app with the details filled in, so the outreach desk receives a complete request.
                    </p>

                    <div class="mt-6 grid gap-4">
                        <label class="grid gap-2 text-sm font-semibold text-slate-700">
                            Full name
                            <input x-model="name" required type="text" class="rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm font-normal text-slate-950 outline-none transition focus:border-sky-300 focus:ring-2 focus:ring-sky-200" placeholder="Your name">
                        </label>
                        <label class="grid gap-2 text-sm font-semibold text-slate-700">
                            Phone or email
                            <input x-model="phone" required type="text" class="rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm font-normal text-slate-950 outline-none transition focus:border-sky-300 focus:ring-2 focus:ring-sky-200" placeholder="How we can respond">
                        </label>
                        <label class="grid gap-2 text-sm font-semibold text-slate-700">
                            Topic
                            <select x-model="topic" class="rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm font-normal text-slate-950 outline-none transition focus:border-sky-300 focus:ring-2 focus:ring-sky-200">
                                <option>Resident registration</option>
                                <option>Volunteer registration</option>
                                <option>Partnership or sponsorship</option>
                                <option>Community outreach request</option>
                                <option>Media or documentation</option>
                            </select>
                        </label>
                        <label class="grid gap-2 text-sm font-semibold text-slate-700">
                            Message
                            <textarea x-model="message" required rows="5" class="rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm font-normal text-slate-950 outline-none transition focus:border-sky-300 focus:ring-2 focus:ring-sky-200" placeholder="Tell us what you need"></textarea>
                        </label>
                    </div>

                    <button type="submit" class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">
                        <span>Open Email</span>
                        <i class="fa-solid fa-paper-plane text-[0.85rem]" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </section>
    </main>
</x-glow.public-shell>
