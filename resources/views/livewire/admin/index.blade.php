<div class="gh-page min-w-0 flex-1">
    <section class="mx-auto grid w-full max-w-7xl gap-6 px-4 py-6 sm:px-6 sm:py-8 lg:px-8">
        <header class="overflow-hidden rounded-[2rem] bg-sky-950 p-6 text-white shadow-xl sm:p-8">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-orange-300">Restricted administration</p>
            <h1 class="mt-3 text-3xl font-extrabold sm:text-4xl">{{ auth()->user()->is_super_admin ? 'Super admin control centre' : 'Administration control centre' }}</h1>
            <p class="mt-3 max-w-3xl leading-7 text-sky-100">{{ auth()->user()->is_super_admin ? 'Manage administrators, approve participation-role changes, delegate work, and oversee Glow Health accounts.' : 'Coordinate delegated work and support Glow Health operations from your authorised workspace.' }}</p>
        </header>

        @if (auth()->user()->is_super_admin)
            <article class="rounded-3xl border border-orange-200 bg-gradient-to-br from-orange-50 to-white p-5 shadow-sm dark:border-orange-900/40 dark:from-orange-950/20 dark:to-slate-900 sm:p-6">
                <div class="grid gap-6 xl:grid-cols-[1fr_1.1fr] xl:items-end">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-orange-700">Privilege management</p>
                        <h2 class="mt-2 text-2xl font-extrabold text-sky-950 dark:text-white">Elevate or downgrade a user</h2>
                        <p class="mt-3 max-w-xl text-sm leading-6 text-slate-600 dark:text-slate-300">Administrators can operate the administration workspace. Super administrators can additionally approve role changes and manage other administrators.</p>
                        <div class="mt-4 flex flex-wrap gap-2 text-xs font-bold">
                            <span class="rounded-full bg-slate-100 px-3 py-1.5 text-slate-700 dark:bg-slate-800 dark:text-slate-200">User: normal account access</span>
                            <span class="rounded-full bg-sky-100 px-3 py-1.5 text-sky-800">Admin: operational access</span>
                            <span class="rounded-full bg-orange-100 px-3 py-1.5 text-orange-800">Super admin: full authority</span>
                        </div>
                    </div>
                    <form wire:submit="updatePrivilege" class="grid gap-4 rounded-2xl border border-orange-100 bg-white p-4 dark:border-slate-700 dark:bg-slate-900 sm:grid-cols-2">
                        <label class="grid gap-2 text-sm font-bold sm:col-span-2">Select user
                            <select wire:model="privilege_user" class="rounded-xl border border-slate-300 bg-white px-4 py-3 dark:border-slate-600 dark:bg-slate-800">
                                <option value="">Choose a user</option>
                                @foreach ($privilegeUsers as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }} — {{ $member->email }} ({{ $member->is_super_admin ? 'Super admin' : ($member->is_admin ? 'Admin' : 'User') }})</option>
                                @endforeach
                            </select>
                            @error('privilege_user')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                        </label>
                        <label class="grid gap-2 text-sm font-bold">Privilege level
                            <select wire:model="privilege_level" class="rounded-xl border border-slate-300 bg-white px-4 py-3 dark:border-slate-600 dark:bg-slate-800">
                                <option value="user">User</option>
                                <option value="admin">Administrator</option>
                                <option value="super_admin">Super administrator</option>
                            </select>
                        </label>
                        <button wire:confirm="Apply this privilege change?" class="self-end rounded-xl bg-orange-700 px-5 py-3 font-bold text-white transition hover:bg-orange-800">Update privilege</button>
                    </form>
                </div>
            </article>
        @endif

        <div class="grid gap-6 xl:grid-cols-[1.15fr_.85fr]">
            @if (auth()->user()->is_super_admin)
            <article class="rounded-3xl border border-sky-100 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-6">
                <div class="flex items-center justify-between gap-3">
                    <div><p class="text-xs font-bold uppercase tracking-wider text-orange-700">Approval queue</p><h2 class="mt-2 text-2xl font-extrabold text-sky-950 dark:text-white">Role-change requests</h2></div>
                    <span class="rounded-full bg-orange-100 px-3 py-1 text-sm font-bold text-orange-800">{{ $roleRequests->count() }}</span>
                </div>
                <div class="mt-6 grid gap-3">
                    @forelse ($roleRequests as $request)
                        <div wire:key="role-request-{{ $request->id }}" class="rounded-2xl border border-slate-200 p-4 dark:border-slate-700">
                            <div class="flex flex-wrap items-start justify-between gap-4">
                                <div><p class="font-extrabold">{{ $request->name }}</p><p class="text-sm text-slate-500">{{ $request->email }}</p><p class="mt-2 text-sm"><span class="font-semibold">{{ \App\Models\User::accountTypes()[$request->account_type] ?? $request->account_type }}</span> <i class="fa-solid fa-arrow-right mx-2 text-orange-600"></i> <span class="font-bold text-sky-800 dark:text-sky-200">{{ $request->requested_account_type === 'other' ? $request->requested_account_type_other : (\App\Models\User::accountTypes()[$request->requested_account_type] ?? $request->requested_account_type) }}</span></p></div>
                                <div class="flex gap-2"><button wire:click="approveRoleChange({{ $request->id }})" wire:confirm="Approve this role change?" class="rounded-xl bg-sky-950 px-4 py-2 text-sm font-bold text-white">Approve</button><button wire:click="rejectRoleChange({{ $request->id }})" wire:confirm="Reject this request?" class="rounded-xl border border-slate-300 px-4 py-2 text-sm font-bold">Reject</button></div>
                            </div>
                        </div>
                    @empty
                        <div class="rounded-2xl bg-sky-50 p-6 text-center text-sm text-slate-600 dark:bg-slate-800 dark:text-slate-300">There are no pending role-change requests.</div>
                    @endforelse
                </div>
            </article>
            @endif

            <article class="rounded-3xl border border-orange-100 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-6">
                <p class="text-xs font-bold uppercase tracking-wider text-orange-700">Team coordination</p><h2 class="mt-2 text-2xl font-extrabold text-sky-950 dark:text-white">Delegate a task</h2>
                <form wire:submit="delegateTask" class="mt-6 grid gap-4">
                    <label class="grid gap-2 text-sm font-bold">Assign to<select wire:model="assigned_to" class="rounded-xl border border-slate-300 bg-white px-4 py-3 dark:border-slate-600 dark:bg-slate-800"><option value="">Choose a person</option>@foreach ($users as $member)<option value="{{ $member->id }}">{{ $member->name }} — {{ \App\Models\User::accountTypes()[$member->account_type] ?? $member->account_type }}</option>@endforeach</select>@error('assigned_to')<span class="text-xs text-red-600">{{ $message }}</span>@enderror</label>
                    <label class="grid gap-2 text-sm font-bold">Task title<input wire:model="task_title" class="rounded-xl border border-slate-300 bg-white px-4 py-3 dark:border-slate-600 dark:bg-slate-800" placeholder="e.g. Confirm outreach venue">@error('task_title')<span class="text-xs text-red-600">{{ $message }}</span>@enderror</label>
                    <label class="grid gap-2 text-sm font-bold">Instructions<textarea wire:model="task_description" rows="3" class="rounded-xl border border-slate-300 bg-white px-4 py-3 dark:border-slate-600 dark:bg-slate-800" placeholder="What should be completed?"></textarea></label>
                    <label class="grid gap-2 text-sm font-bold">Due date<input wire:model="due_at" type="date" class="rounded-xl border border-slate-300 bg-white px-4 py-3 dark:border-slate-600 dark:bg-slate-800">@error('due_at')<span class="text-xs text-red-600">{{ $message }}</span>@enderror</label>
                    <button class="rounded-xl bg-orange-700 px-5 py-3 font-bold text-white transition hover:bg-orange-800">Delegate task</button>
                </form>
            </article>
        </div>

        <article class="rounded-3xl border border-sky-100 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-6">
            <div class="flex items-end justify-between gap-4"><div><p class="text-xs font-bold uppercase tracking-wider text-sky-700">Recent activity</p><h2 class="mt-2 text-2xl font-extrabold text-sky-950 dark:text-white">Delegated tasks</h2></div><span class="text-sm font-bold text-slate-500">{{ $tasks->count() }} shown</span></div>
            <div class="mt-6 grid gap-3 md:grid-cols-2 xl:grid-cols-3">
                @forelse ($tasks as $task)<div class="rounded-2xl border border-slate-200 p-4 dark:border-slate-700"><div class="flex justify-between gap-3"><h3 class="font-extrabold">{{ $task->title }}</h3><span class="h-fit rounded-full bg-sky-100 px-2.5 py-1 text-[0.65rem] font-bold uppercase text-sky-800">{{ $task->status }}</span></div><p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Assigned to {{ $task->assignee->name }}</p>@if ($task->due_at)<p class="mt-3 text-xs font-bold text-orange-700"><i class="fa-solid fa-calendar-day mr-1"></i>Due {{ $task->due_at->format('M j, Y') }}</p>@endif</div>@empty<div class="text-sm text-slate-500">No tasks have been delegated yet.</div>@endforelse
            </div>
        </article>
    </section>
</div>
