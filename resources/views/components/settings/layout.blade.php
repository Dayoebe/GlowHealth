<div class="grid items-start gap-6 lg:grid-cols-[220px_minmax(0,1fr)] lg:gap-8">
    <div class="w-full">
        <nav class="grid gap-2" aria-label="{{ __('Settings') }}">
            @foreach ([['profile.edit', __('Profile'), 'fa-user'], ['security.edit', __('Security'), 'fa-shield-halved'], ['appearance.edit', __('Appearance'), 'fa-palette']] as [$routeName, $label, $icon])
                <a href="{{ route($routeName) }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold {{ request()->routeIs($routeName) ? 'bg-sky-950 text-white shadow-lg shadow-sky-950/10' : 'text-slate-700 hover:bg-sky-50 dark:text-slate-200 dark:hover:bg-slate-800' }}"><i class="fa-solid {{ $icon }} w-4 text-center {{ request()->routeIs($routeName) ? 'text-orange-300' : 'text-slate-400' }}" aria-hidden="true"></i>{{ $label }}</a>
            @endforeach
        </nav>
    </div>

    <div class="min-w-0 self-stretch">
        <h2 class="text-xl font-bold text-sky-950 dark:text-white">{{ $heading ?? '' }}</h2>
        <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">{{ $subheading ?? '' }}</p>

        <div class="mt-5 w-full">
            {{ $slot }}
        </div>
    </div>
</div>
