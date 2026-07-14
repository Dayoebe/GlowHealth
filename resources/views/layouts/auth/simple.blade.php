@props(['wide' => false])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ theme: localStorage.theme || 'system' }" x-init="$watch('theme', value => { localStorage.theme = value; document.documentElement.classList.toggle('dark', value === 'dark' || (value === 'system' && matchMedia('(prefers-color-scheme: dark)').matches)) })" :class="{ 'dark': theme === 'dark' || (theme === 'system' && matchMedia('(prefers-color-scheme: dark)').matches) }">
<head>@include('partials.head')</head>
<body class="min-h-screen bg-sky-50 text-slate-950 antialiased dark:bg-slate-950 dark:text-white">
    <main class="grid min-h-svh justify-items-center px-4 py-6 sm:place-items-center sm:py-10">
        <section class="w-full {{ $wide ? 'max-w-5xl overflow-hidden' : 'max-w-md p-6 sm:p-8' }} rounded-3xl border border-sky-100 bg-white shadow-2xl shadow-sky-950/10 dark:border-slate-700 dark:bg-slate-900">
            @unless ($wide)
                <a href="{{ route('home') }}" class="mx-auto mb-7 block w-40"><img src="{{ asset('glow-health-logo.png') }}" width="940" height="500" alt="Glow Health Outreach Initiative" class="h-auto w-full"></a>
            @endunless
            {{ $slot }}
        </section>
    </main>
</body>
</html>
