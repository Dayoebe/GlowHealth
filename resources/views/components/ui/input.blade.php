@props(['label' => null, 'name' => null, 'type' => 'text', 'value' => null])
@php($field = $name ?? $attributes->get('wire:model'))
<label class="grid gap-2 text-sm font-semibold text-slate-700 dark:text-slate-200">
    @if ($label)<span>{{ $label }}</span>@endif
    <input @if ($name) name="{{ $name }}" @endif type="{{ $type }}" value="{{ $value }}" {{ $attributes->merge(['class' => 'w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-950 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 dark:border-slate-700 dark:bg-slate-900 dark:text-white']) }}>
    @if ($field) @error($field)<span class="text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</span>@enderror @endif
</label>
