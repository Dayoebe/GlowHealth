<section x-data="{ open: @js($errors->has('password')) }" class="rounded-3xl border border-red-200 bg-white p-5 shadow-sm dark:border-red-900/50 dark:bg-slate-900 sm:p-6">
    <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex items-start gap-4">
            <span class="flex size-11 shrink-0 items-center justify-center rounded-2xl bg-red-50 text-red-700 dark:bg-red-950/40 dark:text-red-300"><i class="fa-solid fa-triangle-exclamation" aria-hidden="true"></i></span>
            <div><p class="text-xs font-bold uppercase tracking-[0.14em] text-red-600">Danger zone</p><h3 class="mt-1 text-lg font-extrabold text-slate-950 dark:text-white">Delete your account</h3><p class="mt-1 max-w-2xl text-sm leading-6 text-slate-600 dark:text-slate-300">Permanently remove your profile, participation category, and account access. This cannot be undone.</p></div>
        </div>
        <x-ui.button variant="danger" class="shrink-0" @click="open = true">Delete account</x-ui.button>
    </div>

    <div x-cloak x-show="open" x-transition.opacity class="fixed inset-0 z-50 grid place-items-center bg-slate-950/75 p-4 backdrop-blur-sm">
        <div @click.outside="open = false" x-transition class="w-full max-w-lg rounded-3xl bg-white p-6 shadow-2xl dark:bg-slate-900 sm:p-7">
            <form wire:submit="deleteUser" class="grid gap-5">
                <div class="flex items-start justify-between gap-4"><div><span class="flex size-11 items-center justify-center rounded-2xl bg-red-50 text-red-700"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></span><h3 class="mt-4 text-xl font-extrabold">Delete this account?</h3><p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">Enter your password to confirm permanent deletion. All account data will be lost.</p></div><button type="button" @click="open = false" class="rounded-xl p-2 text-slate-400 hover:bg-slate-100" aria-label="Close confirmation"><i class="fa-solid fa-xmark" aria-hidden="true"></i></button></div>
                <x-ui.input wire:model="password" label="Current password" type="password" autocomplete="current-password"/>
                <div class="flex flex-col-reverse gap-2 sm:flex-row sm:justify-end"><x-ui.button variant="secondary" @click="open = false">Keep my account</x-ui.button><x-ui.button variant="danger" type="submit">Permanently delete</x-ui.button></div>
            </form>
        </div>
    </div>
</section>
