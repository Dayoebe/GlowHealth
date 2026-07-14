<!DOCTYPE html>
@php
    $signedInUser = auth()->user();
    $signedInRole = $signedInUser->account_type === 'other'
        ? ($signedInUser->account_type_other ?: 'Other participant')
        : (\App\Models\User::accountTypes()[$signedInUser->account_type] ?? 'Community member');
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ navOpen: false, userOpen: false, notice: '', theme: localStorage.theme || 'system' }" x-init="document.documentElement.classList.toggle('dark', theme === 'dark' || (theme === 'system' && matchMedia('(prefers-color-scheme: dark)').matches)); $watch('theme', value => { localStorage.theme = value; document.documentElement.classList.toggle('dark', value === 'dark' || (value === 'system' && matchMedia('(prefers-color-scheme: dark)').matches)) })" @notify.window="notice = $event.detail.message; setTimeout(() => notice = '', 3500)">
<head>@include('partials.head')</head>
<body class="min-h-screen bg-sky-50 text-slate-950 antialiased dark:bg-slate-950 dark:text-white">
<div x-cloak x-show="notice" x-transition class="fixed right-4 top-4 z-[100] rounded-xl bg-sky-950 px-4 py-3 text-sm font-semibold text-white shadow-xl" x-text="notice"></div>
<div class="min-h-screen lg:flex">
    <div x-cloak x-show="navOpen" class="fixed inset-0 z-40 bg-slate-950/60 lg:hidden" @click="navOpen=false"></div>
    <aside :class="navOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 flex w-72 flex-col border-r border-sky-100 bg-white p-5 transition lg:sticky lg:translate-x-0 dark:border-slate-700 dark:bg-slate-900">
        <div class="flex items-center justify-between"><x-app-logo href="{{ route('dashboard') }}" wire:navigate/><button class="rounded-lg p-2 lg:hidden" @click="navOpen=false" aria-label="Close menu">✕</button></div>
        <nav class="mt-10 grid gap-2">
            <a href="{{ route('dashboard') }}" wire:navigate class="rounded-xl px-4 py-3 font-semibold {{ request()->routeIs('dashboard') ? 'bg-sky-900 text-white' : 'hover:bg-sky-50 dark:hover:bg-slate-800' }}">Dashboard</a>
            <a href="{{ route('profile.edit') }}" wire:navigate class="rounded-xl px-4 py-3 font-semibold {{ request()->routeIs('profile.edit') ? 'bg-sky-900 text-white' : 'hover:bg-sky-50 dark:hover:bg-slate-800' }}">Settings</a>
            <a href="{{ route('home') }}" wire:navigate class="rounded-xl px-4 py-3 font-semibold hover:bg-sky-50 dark:hover:bg-slate-800">Public website</a>
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
            <a href="{{ route('profile.edit') }}" wire:navigate title="{{ $signedInRole }}" aria-label="Open profile settings" class="rounded-full bg-orange-100 px-3 py-2 text-sm font-bold text-orange-800">{{ str($signedInUser->name)->initials() }}</a>
        </header>
        {{ $slot }}
    </div>
</div>
</body>
</html>
