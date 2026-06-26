@props(['active' => 'home'])

@php
    $brandLogo = asset('glowfm%20logo.jpeg');
    $links = [
        ['key' => 'home', 'label' => 'Home', 'short' => 'Home', 'url' => route('home'), 'icon' => 'fa-house', 'active' => 'text-sky-700', 'hover' => 'hover:text-sky-700'],
        ['key' => 'services', 'label' => 'Services', 'short' => 'Care', 'url' => route('services'), 'icon' => 'fa-stethoscope', 'active' => 'text-emerald-700', 'hover' => 'hover:text-emerald-700'],
        ['key' => 'outreach', 'label' => 'Next Outreach', 'short' => 'Outreach', 'url' => route('outreach'), 'icon' => 'fa-circle-plus', 'active' => 'text-blue-700', 'hover' => 'hover:text-blue-700'],
        ['key' => 'impact', 'label' => 'Impact', 'short' => 'Impact', 'url' => route('impact'), 'icon' => 'fa-heart-pulse', 'active' => 'text-cyan-700', 'hover' => 'hover:text-cyan-700'],
        ['key' => 'volunteer', 'label' => 'Volunteer', 'short' => 'Volunteer', 'url' => route('volunteer'), 'icon' => 'fa-users', 'active' => 'text-amber-700', 'hover' => 'hover:text-amber-700'],
        ['key' => 'partner', 'label' => 'Partner', 'short' => 'Partner', 'url' => route('partner'), 'icon' => 'fa-handshake', 'active' => 'text-teal-700', 'hover' => 'hover:text-teal-700'],
        ['key' => 'contact', 'label' => 'Contact', 'short' => 'Contact', 'url' => route('contact'), 'icon' => 'fa-envelope', 'active' => 'text-slate-900', 'hover' => 'hover:text-slate-900'],
    ];
@endphp

<div
    class="gh-page min-h-screen bg-slate-50 pb-24 text-slate-950 antialiased lg:pb-0"
    @keydown.escape.window="mobileMenuOpen = false"
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
    <header class="sticky top-0 z-50 border-b border-white/70 bg-white/80 shadow-lg shadow-slate-900/5 backdrop-blur-2xl">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-3 px-4 py-3 sm:px-6 lg:px-8">
            <a href="{{ route('home') }}" wire:navigate class="flex min-w-0 items-center gap-3" aria-label="Glow Health Outreach Initiative home">
                <img src="{{ $brandLogo }}" alt="Glow logo" class="size-11 shrink-0 rounded-xl border border-sky-200 bg-white object-cover shadow-sm" loading="eager" fetchpriority="high">
                <span class="min-w-0">
                    <span class="gh-display block truncate text-base leading-5 text-slate-950 sm:text-lg"><span class="text-sky-700">Glow</span> Health Outreach Initiative</span>
                    <span class="block truncate text-xs leading-5 text-slate-500">Free healthcare outreach across Ondo State</span>
                </span>
            </a>

            <nav class="hidden items-center gap-4 text-sm font-medium text-slate-600 xl:flex" aria-label="Primary navigation">
                @foreach ($links as $link)
                    <a href="{{ $link['url'] }}" wire:navigate @if ($active === $link['key']) aria-current="page" @endif class="{{ $active === $link['key'] ? 'font-semibold '.$link['active'] : 'transition '.$link['hover'] }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="flex shrink-0 items-center gap-2">
                <a href="{{ route('contact') }}" wire:navigate class="gh-button hidden items-center justify-center gap-2 rounded-xl bg-slate-900 px-4 py-2.5 text-sm text-white shadow-sm transition hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 sm:inline-flex">
                    <span>Get in touch</span>
                    <i class="fa-solid fa-arrow-right text-[0.85rem]" aria-hidden="true"></i>
                </a>

                <button
                    type="button"
                    class="inline-flex size-11 items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 text-slate-800 shadow-sm transition hover:border-sky-200 hover:bg-sky-50 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 xl:hidden"
                    aria-controls="mobile-menu"
                    :aria-expanded="mobileMenuOpen.toString()"
                    @click="mobileMenuOpen = ! mobileMenuOpen"
                >
                    <span class="sr-only">Toggle navigation menu</span>
                    <i class="fa-solid fa-bars text-lg" aria-hidden="true" x-show="! mobileMenuOpen"></i>
                    <i class="fa-solid fa-xmark text-lg" aria-hidden="true" x-cloak x-show="mobileMenuOpen"></i>
                </button>
            </div>
        </div>

        <div id="mobile-menu" x-cloak x-show="mobileMenuOpen" x-transition.opacity.duration.180ms class="xl:hidden">
            <div class="mx-4 mb-3 rounded-[1.5rem] border border-white/70 bg-white/85 p-3 shadow-2xl shadow-slate-900/10 backdrop-blur-2xl" @click.outside="mobileMenuOpen = false">
                <nav class="grid gap-2" aria-label="Mobile menu">
                    @foreach ($links as $link)
                        <a href="{{ $link['url'] }}" wire:navigate @if ($active === $link['key']) aria-current="page" @endif class="{{ $active === $link['key'] ? 'bg-sky-50 font-semibold text-slate-900' : 'text-slate-700 hover:bg-sky-50 hover:text-sky-700' }} flex items-center gap-3 rounded-2xl px-3 py-3 text-sm transition" @click="closeMenu()">
                            <span class="flex size-10 items-center justify-center rounded-xl bg-white text-sky-700 shadow-sm">
                                <i class="fa-solid {{ $link['icon'] }} text-lg" aria-hidden="true"></i>
                            </span>
                            <span>{{ $link['label'] }}</span>
                        </a>
                    @endforeach
                </nav>
            </div>
        </div>
    </header>

    {{ $slot }}

    <footer class="bg-slate-950 text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 py-12 sm:px-6 lg:grid-cols-[1.1fr_0.9fr] lg:px-8">
            <div>
                <div class="flex items-center gap-3">
                    <img src="{{ $brandLogo }}" alt="Glow logo" class="size-11 rounded-xl border border-white/10 object-cover">
                    <div>
                        <p class="gh-display text-xl"><span class="text-sky-300">Glow</span> Health Outreach Initiative</p>
                        <p class="text-sm text-slate-400">Health impact enabled by Dr. Ezekiel Akande</p>
                    </div>
                </div>
                <p class="mt-5 max-w-xl text-sm leading-7 text-slate-300">
                    Free consultations, screenings, medications, health education, referrals, volunteer coordination, and community participation for residents of Ondo State.
                </p>
            </div>

            <div class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur-xl">
                <h3 class="text-lg font-semibold"><span class="text-cyan-200">Page links</span></h3>
                <div class="mt-5 flex flex-wrap gap-3 text-sm">
                    @foreach ($links as $link)
                        <a href="{{ $link['url'] }}" wire:navigate class="rounded-full border border-white/10 px-4 py-2 text-slate-200 hover:text-white">{{ $link['label'] }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="border-t border-white/10 px-4 py-5 text-center text-xs text-slate-500">
            &copy; {{ date('Y') }} Glow Health Outreach Initiative. Built for community health, dignity, and access.
        </div>
    </footer>

    <nav class="fixed inset-x-0 bottom-0 z-50 border-t border-white/70 bg-white/80 px-2 pb-[max(env(safe-area-inset-bottom),0.5rem)] pt-2 shadow-[0_-18px_40px_rgba(15,23,42,0.08)] backdrop-blur-2xl lg:hidden" aria-label="Mobile page tabs">
        <div class="gh-scrollbar mx-auto flex max-w-md gap-1 overflow-x-auto rounded-[1.35rem] border border-white/70 bg-slate-100/70 p-1 text-[0.68rem] font-medium text-slate-500 backdrop-blur-xl">
            @foreach ($links as $link)
                <a href="{{ $link['url'] }}" wire:navigate @if ($active === $link['key']) aria-current="page" @endif class="{{ $active === $link['key'] ? 'bg-white '.$link['active'].' shadow-sm' : 'hover:bg-white '.$link['hover'] }} flex min-w-[4.2rem] flex-col items-center justify-center gap-1 rounded-2xl px-2 py-2 transition">
                    <i class="fa-solid {{ $link['icon'] }} text-base" aria-hidden="true"></i>
                    <span class="truncate">{{ $link['short'] }}</span>
                </a>
            @endforeach
        </div>
    </nav>
</div>
