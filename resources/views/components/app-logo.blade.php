@props([
    'sidebar' => false,
])

<a {{ $attributes->class('flex items-center gap-3 rounded-xl') }}>
    <span class="flex size-10 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-white shadow-sm"><x-app-logo-icon class="size-9" /></span>
    <span class="font-extrabold text-sky-950 dark:text-white">Glow Health</span>
</a>
