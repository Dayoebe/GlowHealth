@props([
    'title',
    'description',
])

<div class="flex w-full flex-col gap-2 text-center">
    <h1 class="text-2xl font-extrabold text-sky-950 dark:text-white">{{ $title }}</h1>
    <p class="text-sm leading-6 text-slate-600 dark:text-slate-300">{{ $description }}</p>
</div>
