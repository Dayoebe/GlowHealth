<!DOCTYPE html>
@php
    $signedInUser = auth()->user();
    $signedInRole = $signedInUser->is_super_admin
        ? 'Super administrator'
        : ($signedInUser->account_type === 'other'
        ? ($signedInUser->account_type_other ?: 'Other participant')
        : (\App\Models\User::accountTypes()[$signedInUser->account_type] ?? 'Community member'));
    $navigationRole = $signedInUser->is_super_admin ? 'super_admin' : $signedInUser->account_type;
    $navigationGroups = array_merge(
        config('navigation.shared', []),
        config("navigation.roles.{$navigationRole}", config('navigation.roles.other', [])),
    );
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
    @livewireStyles
</head>
<body class="min-h-screen bg-sky-50 text-slate-950 antialiased dark:bg-slate-950 dark:text-white">
<div x-data="{ notice: '', timer: null }" @notify.window="notice = $event.detail.message; clearTimeout(timer); timer = setTimeout(() => notice = '', 3500)">
    <div x-cloak x-show="notice" x-transition class="fixed right-4 top-4 z-[100] rounded-xl bg-sky-950 px-4 py-3 text-sm font-semibold text-white shadow-xl" x-text="notice"></div>
</div>
<div x-data="{ navOpen: false }" class="min-h-screen lg:flex">
    <div x-cloak x-show="navOpen" class="fixed inset-0 z-40 bg-slate-950/60 lg:hidden" @click="navOpen=false"></div>
    <aside :class="navOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 flex w-72 flex-col border-r border-sky-100 bg-white p-5 transition lg:sticky lg:translate-x-0 dark:border-slate-700 dark:bg-slate-900">
        <div class="flex items-center justify-between"><x-app-logo href="{{ route('dashboard') }}"/><button class="rounded-lg p-2 lg:hidden" @click="navOpen=false" aria-label="Close menu">✕</button></div>
        <nav class="mt-8 grid min-h-0 flex-1 content-start gap-2 overflow-y-auto pr-1" aria-label="Account navigation">
            @foreach ($navigationGroups as $group)
                @php
                    $groupIsActive = collect($group['items'])->contains(fn ($item) => isset($item['route']) && request()->routeIs($item['route']));
                @endphp
                <div x-data="{ open: {{ $groupIsActive ? 'true' : 'false' }} }" class="rounded-2xl">
                    <button type="button" @click="open = ! open" :aria-expanded="open" class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-left text-sm font-extrabold transition {{ $groupIsActive ? 'bg-sky-50 text-sky-950 dark:bg-slate-800 dark:text-white' : 'text-slate-700 hover:bg-sky-50 dark:text-slate-200 dark:hover:bg-slate-800' }}">
                        <i class="fa-solid {{ $group['icon'] }} w-5 text-center text-orange-700" aria-hidden="true"></i>
                        <span class="min-w-0 flex-1 truncate">{{ $group['label'] }}</span>
                        <i class="fa-solid fa-chevron-down text-[0.65rem] text-slate-400 transition-transform" :class="open && 'rotate-180'" aria-hidden="true"></i>
                    </button>
                    <div x-cloak x-show="open" class="mt-1 grid gap-1 pl-3">
                        @foreach ($group['items'] as $item)
                            @php
                                $hasRoute = isset($item['route']) && \Illuminate\Support\Facades\Route::has($item['route']);
                                $itemUrl = $hasRoute ? route($item['route']) : ($item['href'] ?? '#');
                                $itemIsActive = $hasRoute && request()->routeIs($item['route']);
                            @endphp
                            <a href="{{ $itemUrl }}" @if (! $hasRoute) @click.prevent @endif class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold transition {{ $itemIsActive ? 'bg-sky-950 text-white' : 'text-slate-600 hover:bg-orange-50 hover:text-orange-800 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-orange-200' }}" @if (! $hasRoute) aria-disabled="true" title="Coming soon" @endif>
                                <i class="fa-solid {{ $item['icon'] }} w-4 text-center {{ $itemIsActive ? 'text-orange-300' : 'text-sky-700 dark:text-sky-300' }}" aria-hidden="true"></i>
                                <span>{{ $item['label'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <a href="{{ route('home') }}" class="mt-2 flex items-center gap-3 rounded-xl border border-slate-200 px-3 py-3 text-sm font-bold text-slate-700 transition hover:border-orange-200 hover:bg-orange-50 dark:border-slate-700 dark:text-slate-200 dark:hover:bg-slate-800"><i class="fa-solid fa-arrow-up-right-from-square w-5 text-center text-orange-700" aria-hidden="true"></i>Public website</a>
        </nav>
        <div class="mt-auto border-t border-slate-200 pt-5 dark:border-slate-700">
            <p class="truncate font-bold">{{ $signedInUser->name }}</p>
            <p class="mt-0.5 truncate text-sm text-slate-500">{{ $signedInUser->email }}</p>
            <p class="mt-3 inline-flex rounded-full bg-orange-50 px-3 py-1.5 text-xs font-bold text-orange-800 dark:bg-orange-950/30 dark:text-orange-200">{{ $signedInRole }}</p>
            <form method="POST" action="{{ route('logout') }}" class="mt-4">@csrf <x-ui.button variant="secondary" type="submit" class="w-full" data-test="logout-button">Log out</x-ui.button></form>
        </div>
    </aside>
    <div class="min-w-0 flex-1">
        <header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-sky-100 bg-white/90 px-4 backdrop-blur lg:px-8 dark:border-slate-700 dark:bg-slate-900/90">
            <button class="rounded-xl border border-slate-200 p-2 lg:hidden dark:border-slate-700" @click="navOpen=true" aria-label="Open menu">☰</button>
            <p class="font-bold text-sky-950 dark:text-white">{{ $title ?? 'Glow Health' }}</p>
            <a href="{{ route('profile.edit') }}" title="{{ $signedInRole }}" aria-label="Open profile settings" class="rounded-full bg-orange-100 px-3 py-2 text-sm font-bold text-orange-800">{{ str($signedInUser->name)->initials() }}</a>
        </header>
        {{ $slot }}
    </div>
</div>
@livewireScripts
</body>
</html>
