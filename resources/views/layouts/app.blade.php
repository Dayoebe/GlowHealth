<x-layouts::app.sidebar :title="$title ?? null">
    <main class="min-w-0 flex-1">
        {{ $slot }}
    </main>
</x-layouts::app.sidebar>
