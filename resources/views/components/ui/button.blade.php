@props(['variant' => 'primary', 'type' => 'button'])
@php
    $classes = match ($variant) {
        'danger' => 'bg-red-700 text-white hover:bg-red-800 focus:ring-red-300',
        'secondary' => 'border border-slate-300 bg-white text-sky-900 hover:bg-slate-50 focus:ring-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-white',
        'ghost' => 'text-sky-800 hover:bg-sky-50 focus:ring-sky-200 dark:text-slate-200 dark:hover:bg-slate-800',
        default => 'bg-orange-700 text-white hover:bg-orange-800 focus:ring-orange-300',
    };
@endphp
<button type="{{ $type }}" {{ $attributes->class("inline-flex items-center justify-center gap-2 rounded-xl px-4 py-3 text-sm font-semibold shadow-sm transition focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 $classes") }}>{{ $slot }}</button>
