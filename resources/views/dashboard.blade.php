@php
    $user = auth()->user();
    $roleLabel = $user->account_type === 'other'
        ? ($user->account_type_other ?: 'Other participant')
        : (\App\Models\User::accountTypes()[$user->account_type] ?? 'Community member');

    $roleProfiles = [
        'community_member' => [
            'icon' => 'fa-house-medical',
            'eyebrow' => 'Community access',
            'headline' => 'Your healthcare outreach hub',
            'description' => 'Stay prepared for free medical outreaches, understand available care, and keep your account ready for registration updates.',
            'steps' => ['Review the next outreach schedule', 'Check services and what to bring', 'Keep your contact details current'],
            'actions' => [['outreach', 'View next outreach', 'fa-calendar-check'], ['services', 'Explore care services', 'fa-stethoscope'], ['profile.edit', 'Update my profile', 'fa-user-pen']],
        ],
        'volunteer' => [
            'icon' => 'fa-hand-holding-medical',
            'eyebrow' => 'Volunteer pathway',
            'headline' => 'Prepare to serve with purpose',
            'description' => 'Explore field roles, understand outreach expectations, and keep your profile ready for volunteer coordination.',
            'steps' => ['Review available volunteer roles', 'Confirm your availability and skill area', 'Prepare for orientation and assignment'],
            'actions' => [['volunteer', 'Volunteer opportunities', 'fa-users'], ['outreach', 'Upcoming outreach', 'fa-calendar-check'], ['profile.edit', 'Update my profile', 'fa-user-pen']],
        ],
        'healthcare_professional' => [
            'icon' => 'fa-user-doctor',
            'eyebrow' => 'Clinical participation',
            'headline' => 'Bring professional care closer',
            'description' => 'See clinical service areas, prepare your professional information, and follow the pathway for safe outreach participation.',
            'steps' => ['Review clinical volunteer roles', 'Prepare professional credentials', 'Understand care stations and field flow'],
            'actions' => [['volunteer', 'Clinical volunteer roles', 'fa-user-doctor'], ['services', 'Review service areas', 'fa-notes-medical'], ['security.edit', 'Secure my account', 'fa-shield-halved']],
        ],
        'partner_sponsor' => [
            'icon' => 'fa-handshake',
            'eyebrow' => 'Partnership pathway',
            'headline' => 'Turn support into measurable care',
            'description' => 'Explore priority needs, understand accountability, and start a focused conversation about sponsorship or partnership.',
            'steps' => ['Review current partnership needs', 'Explore reported community impact', 'Start a partnership conversation'],
            'actions' => [['partner', 'Partnership opportunities', 'fa-handshake'], ['impact', 'View community impact', 'fa-chart-line'], ['contact', 'Contact the partnership desk', 'fa-envelope']],
        ],
        'community_representative' => [
            'icon' => 'fa-people-roof',
            'eyebrow' => 'Community coordination',
            'headline' => 'Help bring care to your community',
            'description' => 'Share local health needs, understand outreach requirements, and coordinate responsibly with the Glow Health team.',
            'steps' => ['Document priority community needs', 'Review outreach planning information', 'Connect with the outreach desk'],
            'actions' => [['contact', 'Request community outreach', 'fa-bullhorn'], ['outreach', 'Review outreach model', 'fa-calendar-check'], ['partner', 'Explore local partnerships', 'fa-people-group']],
        ],
        'staff' => [
            'icon' => 'fa-id-badge',
            'eyebrow' => 'Staff access request',
            'headline' => 'Your staff request is being reviewed',
            'description' => 'Your selected category is visible, but internal staff permissions are never granted automatically. An administrator must verify and approve access.',
            'steps' => ['Keep your profile information accurate', 'Secure your account', 'Wait for staff verification'],
            'actions' => [['profile.edit', 'Review my profile', 'fa-user-pen'], ['security.edit', 'Secure my account', 'fa-shield-halved'], ['contact', 'Contact the initiative', 'fa-envelope']],
        ],
        'other' => [
            'icon' => 'fa-compass',
            'eyebrow' => 'Custom participation',
            'headline' => 'Let’s find the right way to participate',
            'description' => 'Your stated interest helps the team understand where you fit within the initiative and which next step will be most useful.',
            'steps' => ['Keep your participation description current', 'Explore current services and opportunities', 'Contact the team for guidance'],
            'actions' => [['contact', 'Talk to the outreach desk', 'fa-comments'], ['services', 'Explore the initiative', 'fa-stethoscope'], ['profile.edit', 'Update my profile', 'fa-user-pen']],
        ],
    ];

    $profile = $roleProfiles[$user->account_type] ?? $roleProfiles['community_member'];
    $accountStatus = $user->account_type === 'staff' ? 'Awaiting staff verification' : 'Active member';
    $statusClasses = $user->account_type === 'staff'
        ? 'border-orange-200 bg-orange-50 text-orange-800'
        : 'border-emerald-200 bg-emerald-50 text-emerald-800';
@endphp

<x-layouts::app :title="__('My Dashboard')">
<div class="gh-page min-w-0 flex-1">
    <section class="mx-auto flex w-full max-w-7xl flex-col gap-6 px-4 py-6 sm:px-6 sm:py-8 lg:px-8">
        <div class="relative isolate overflow-hidden rounded-[2rem] bg-sky-950 px-5 py-7 text-white shadow-2xl shadow-sky-950/15 sm:px-8 sm:py-9">
            <div class="absolute -right-16 -top-20 size-64 rounded-full bg-orange-500/20 blur-3xl" aria-hidden="true"></div>
            <div class="absolute bottom-0 left-1/3 size-52 rounded-full bg-sky-500/20 blur-3xl" aria-hidden="true"></div>
            <div class="relative grid gap-7 lg:grid-cols-[1fr_auto] lg:items-end">
                <div>
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-2 text-xs font-bold uppercase tracking-[0.12em] text-orange-200"><i class="fa-solid {{ $profile['icon'] }}" aria-hidden="true"></i>{{ $profile['eyebrow'] }}</span>
                        <span class="rounded-full border px-3 py-2 text-xs font-bold {{ $statusClasses }}">{{ $accountStatus }}</span>
                    </div>
                    <p class="mt-7 text-sm text-sky-200">Welcome back, {{ str($user->name)->before(' ') }}</p>
                    <h1 class="mt-2 max-w-3xl text-3xl font-extrabold leading-tight sm:text-4xl">{{ $profile['headline'] }}</h1>
                    <p class="mt-4 max-w-3xl text-sm leading-7 text-sky-100 sm:text-base">{{ $profile['description'] }}</p>
                </div>
                <a href="{{ route('profile.edit') }}" wire:navigate class="inline-flex w-fit items-center gap-2 rounded-xl bg-orange-700 px-5 py-3 text-sm font-bold text-white transition hover:bg-orange-800"><i class="fa-solid fa-user-pen" aria-hidden="true"></i>Manage profile</a>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[0.72fr_1.28fr]">
            <aside class="grid gap-6">
                <article class="rounded-3xl border border-sky-100 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-6">
                    <div class="flex items-center gap-4">
                        <span class="flex size-14 items-center justify-center rounded-2xl bg-sky-950 text-xl text-white"><i class="fa-solid {{ $profile['icon'] }}" aria-hidden="true"></i></span>
                        <div class="min-w-0"><p class="text-xs font-bold uppercase tracking-wider text-slate-500">My participation role</p><h2 class="mt-1 truncate text-xl font-extrabold text-sky-950 dark:text-white">{{ $roleLabel }}</h2></div>
                    </div>
                    <dl class="mt-6 grid gap-4 text-sm">
                        <div class="rounded-2xl bg-sky-50 p-4 dark:bg-slate-800"><dt class="text-xs font-bold uppercase tracking-wide text-slate-500">Account status</dt><dd class="mt-1 font-bold">{{ $accountStatus }}</dd></div>
                        <div class="rounded-2xl bg-slate-50 p-4 dark:bg-slate-800"><dt class="text-xs font-bold uppercase tracking-wide text-slate-500">Email</dt><dd class="mt-1 break-all font-medium">{{ $user->email }}</dd></div>
                        <div class="rounded-2xl bg-slate-50 p-4 dark:bg-slate-800"><dt class="text-xs font-bold uppercase tracking-wide text-slate-500">Member since</dt><dd class="mt-1 font-medium">{{ $user->created_at->format('F Y') }}</dd></div>
                    </dl>
                </article>

                <article class="rounded-3xl border border-orange-100 bg-orange-50 p-5 dark:border-orange-900/40 dark:bg-orange-950/20 sm:p-6">
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-orange-700">Account readiness</p>
                    <div class="mt-4 grid gap-3 text-sm">
                        <p class="flex items-center gap-3"><i class="fa-solid fa-circle-check text-emerald-600" aria-hidden="true"></i>Participation role selected</p>
                        <p class="flex items-center gap-3"><i class="fa-solid {{ $user->hasVerifiedEmail() ? 'fa-circle-check text-emerald-600' : 'fa-circle-exclamation text-orange-600' }}" aria-hidden="true"></i>{{ $user->hasVerifiedEmail() ? 'Email verified' : 'Email verification pending' }}</p>
                        <p class="flex items-center gap-3"><i class="fa-solid fa-shield-halved text-sky-700" aria-hidden="true"></i>Security settings available</p>
                    </div>
                </article>
            </aside>

            <div class="grid content-start gap-6">
                <article class="rounded-3xl border border-sky-100 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-6">
                    <div class="flex items-center justify-between gap-4"><div><p class="text-xs font-bold uppercase tracking-[0.14em] text-orange-700">Recommended for you</p><h2 class="mt-2 text-2xl font-extrabold text-sky-950 dark:text-white">Your next steps</h2></div><span class="hidden size-11 items-center justify-center rounded-2xl bg-orange-50 text-orange-700 sm:flex"><i class="fa-solid fa-route" aria-hidden="true"></i></span></div>
                    <div class="mt-6 grid gap-3">
                        @foreach ($profile['steps'] as $step)
                            <div class="flex items-center gap-4 rounded-2xl border border-slate-200 p-4 dark:border-slate-700"><span class="flex size-8 shrink-0 items-center justify-center rounded-full bg-sky-950 text-xs font-bold text-white">{{ $loop->iteration }}</span><p class="font-semibold">{{ $step }}</p></div>
                        @endforeach
                    </div>
                </article>

                <div class="grid gap-6 lg:grid-cols-2">
                    <article class="rounded-3xl border border-sky-100 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-6">
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-sky-700">Quick actions</p>
                        <div class="mt-4 grid gap-3">
                            @foreach ($profile['actions'] as [$routeName, $label, $icon])
                                <a href="{{ route($routeName) }}" wire:navigate class="group flex items-center justify-between rounded-2xl border border-slate-200 px-4 py-3.5 font-semibold transition hover:border-orange-200 hover:bg-orange-50 dark:border-slate-700 dark:hover:bg-orange-950/20"><span class="flex items-center gap-3"><i class="fa-solid {{ $icon }} w-5 text-sky-700" aria-hidden="true"></i>{{ $label }}</span><i class="fa-solid fa-arrow-right text-xs text-slate-400 transition group-hover:translate-x-1 group-hover:text-orange-700" aria-hidden="true"></i></a>
                            @endforeach
                        </div>
                    </article>

                    <article class="overflow-hidden rounded-3xl bg-sky-950 text-white shadow-sm">
                        <div class="border-b border-white/10 p-5 sm:p-6"><p class="text-xs font-bold uppercase tracking-[0.14em] text-orange-300">Next outreach</p><h2 class="mt-2 text-xl font-extrabold">Akure Community Outreach</h2></div>
                        <div class="grid gap-3 p-5 text-sm sm:p-6">
                            <p class="flex items-center gap-3"><i class="fa-solid fa-calendar-days w-5 text-orange-300" aria-hidden="true"></i>Saturday, July 18, 2026</p>
                            <p class="flex items-center gap-3"><i class="fa-solid fa-clock w-5 text-orange-300" aria-hidden="true"></i>9:00 AM – 3:00 PM</p>
                            <p class="flex items-center gap-3"><i class="fa-solid fa-location-dot w-5 text-orange-300" aria-hidden="true"></i>Akure South, Ondo State</p>
                            <a href="{{ route('outreach') }}" wire:navigate class="mt-2 inline-flex items-center justify-center rounded-xl bg-orange-700 px-4 py-3 font-bold transition hover:bg-orange-800">View outreach details</a>
                        </div>
                    </article>
                </div>

                <article class="rounded-3xl border border-sky-100 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-6">
                    <div class="flex flex-wrap items-end justify-between gap-4"><div><p class="text-xs font-bold uppercase tracking-[0.14em] text-sky-700">Initiative-wide impact</p><h2 class="mt-2 text-2xl font-extrabold text-sky-950 dark:text-white">Care made possible together</h2></div><a href="{{ route('impact') }}" wire:navigate class="text-sm font-bold text-orange-700 hover:underline">See full impact</a></div>
                    <div class="mt-6 grid grid-cols-2 gap-3 lg:grid-cols-4">
                        @foreach ([['5,000+','Residents reached'],['1,500+','Consultations'],['800+','Medications'],['100+','Volunteers']] as [$value,$label])
                            <div class="rounded-2xl bg-sky-50 p-4 dark:bg-slate-800"><p class="text-2xl font-extrabold text-sky-800 dark:text-sky-200">{{ $value }}</p><p class="mt-1 text-xs font-semibold text-slate-600 dark:text-slate-300">{{ $label }}</p></div>
                        @endforeach
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
</x-layouts::app>
