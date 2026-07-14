<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <nav class="grid gap-2" aria-label="{{ __('Settings') }}">
            @foreach ([['profile.edit', __('Profile')], ['security.edit', __('Security')], ['appearance.edit', __('Appearance')]] as [$routeName, $label])
                <a href="{{ route($routeName) }}" wire:navigate class="rounded-xl px-4 py-3 text-sm font-semibold {{ request()->routeIs($routeName) ? 'bg-sky-900 text-white' : 'text-slate-700 hover:bg-sky-50 dark:text-slate-200 dark:hover:bg-slate-800' }}">{{ $label }}</a>
            @endforeach
        </nav>
    </div>

    <hr class="w-full border-slate-200 md:hidden dark:border-slate-700">

    <div class="flex-1 self-stretch max-md:pt-6">
        <h2 class="text-xl font-bold text-sky-950 dark:text-white">{{ $heading ?? '' }}</h2>
        <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">{{ $subheading ?? '' }}</p>

        <div class="mt-5 w-full max-w-lg">
            {{ $slot }}
        </div>
    </div>
</div>
