@php
    $user = auth()->user();
    $roleLabel = $user->is_super_admin
        ? 'Super administrator'
        : ($user->account_type === 'other'
        ? ($user->account_type_other ?: 'Other participant')
        : (\App\Models\User::accountTypes()[$user->account_type] ?? 'Community member'));
    $assignedTasks = \App\Models\DelegatedTask::query()->where('assigned_to', $user->id)->latest()->limit(6)->get();

    $roleProfiles = [
        'community_member' => [
            'icon' => 'fa-house-medical',
            'eyebrow' => 'Community access',
            'headline' => 'Your healthcare outreach hub',
            'description' => 'Stay prepared for free medical outreaches, understand available care, and keep your account ready for registration updates.',
            'purpose' => 'Use your local knowledge and participation to help your household access the right care at the right time.',
            'responsibilities' => ['Follow verified outreach information', 'Register honestly and arrive prepared', 'Share health information responsibly', 'Give useful feedback after receiving care'],
            'activities' => [['fa-calendar-check', 'Check upcoming outreaches', 'Review dates, locations, eligibility, and services before attending.', 'Before every outreach'], ['fa-clipboard-list', 'Prepare for your visit', 'Bring requested documents, medication details, and relevant health history.', 'Before attending'], ['fa-bullhorn', 'Share verified information', 'Help family and neighbours find official outreach details without spreading rumours.', 'When updates are published']],
            'steps' => ['Review the next outreach schedule', 'Check services and what to bring', 'Keep your contact details current'],
            'actions' => [['outreach', 'View next outreach', 'fa-calendar-check'], ['services', 'Explore care services', 'fa-stethoscope'], ['profile.edit', 'Update my profile', 'fa-user-pen']],
        ],
        'volunteer' => [
            'icon' => 'fa-hand-holding-medical',
            'eyebrow' => 'Volunteer pathway',
            'headline' => 'Prepare to serve with purpose',
            'description' => 'Explore field roles, understand outreach expectations, and keep your profile ready for volunteer coordination.',
            'purpose' => 'Support safe, organised outreach delivery by serving participants with compassion and following the assigned field structure.',
            'responsibilities' => ['Confirm availability before accepting an assignment', 'Attend orientation and safety briefings', 'Work within the assigned team and role', 'Protect participant privacy and dignity'],
            'activities' => [['fa-user-check', 'Confirm your availability', 'Tell the coordination team when and where you can serve.', 'Before assignment'], ['fa-people-group', 'Attend volunteer orientation', 'Learn the outreach flow, safeguarding rules, and escalation contacts.', 'Before deployment'], ['fa-clipboard-check', 'Complete your field assignment', 'Support registration, logistics, crowd guidance, or follow-up as assigned.', 'Outreach day']],
            'steps' => ['Review available volunteer roles', 'Confirm your availability and skill area', 'Prepare for orientation and assignment'],
            'actions' => [['volunteer', 'Volunteer opportunities', 'fa-users'], ['outreach', 'Upcoming outreach', 'fa-calendar-check'], ['profile.edit', 'Update my profile', 'fa-user-pen']],
        ],
        'healthcare_professional' => [
            'icon' => 'fa-user-doctor',
            'eyebrow' => 'Clinical participation',
            'headline' => 'Bring professional care closer',
            'description' => 'See clinical service areas, prepare your professional information, and follow the pathway for safe outreach participation.',
            'purpose' => 'Provide ethical, evidence-based care within your verified competence and the outreach clinical protocol.',
            'responsibilities' => ['Submit valid professional credentials', 'Practise only within your licensed scope', 'Document care accurately and confidentially', 'Escalate emergencies and referrals promptly'],
            'activities' => [['fa-id-card', 'Prepare your credentials', 'Keep licence, speciality, and professional contact information ready for verification.', 'Before approval'], ['fa-notes-medical', 'Review clinical protocols', 'Understand available services, referral pathways, documentation, and medicine controls.', 'Before outreach'], ['fa-stethoscope', 'Serve at your assigned station', 'Assess, treat, counsel, document, and refer according to the clinical plan.', 'Outreach day']],
            'steps' => ['Review clinical volunteer roles', 'Prepare professional credentials', 'Understand care stations and field flow'],
            'actions' => [['volunteer', 'Clinical volunteer roles', 'fa-user-doctor'], ['services', 'Review service areas', 'fa-notes-medical'], ['security.edit', 'Secure my account', 'fa-shield-halved']],
        ],
        'partner_sponsor' => [
            'icon' => 'fa-handshake',
            'eyebrow' => 'Partnership pathway',
            'headline' => 'Turn support into measurable care',
            'description' => 'Explore priority needs, understand accountability, and start a focused conversation about sponsorship or partnership.',
            'purpose' => 'Provide resources, expertise, or access that expands care while preserving transparency and community benefit.',
            'responsibilities' => ['Align support with documented outreach needs', 'Agree on scope, timelines, and accountability', 'Provide resources through approved channels', 'Review impact and reporting after delivery'],
            'activities' => [['fa-magnifying-glass-chart', 'Review priority needs', 'Identify the service area, community, supplies, or expertise your organisation can support.', 'Planning stage'], ['fa-file-signature', 'Define the partnership', 'Agree on objectives, responsibilities, recognition, safeguarding, and reporting.', 'Before commitment'], ['fa-chart-line', 'Review supported impact', 'Follow delivery updates and assess the outcomes connected to your contribution.', 'After outreach']],
            'steps' => ['Review current partnership needs', 'Explore reported community impact', 'Start a partnership conversation'],
            'actions' => [['partner', 'Partnership opportunities', 'fa-handshake'], ['impact', 'View community impact', 'fa-chart-line'], ['contact', 'Contact the partnership desk', 'fa-envelope']],
        ],
        'community_representative' => [
            'icon' => 'fa-people-roof',
            'eyebrow' => 'Community coordination',
            'headline' => 'Help bring care to your community',
            'description' => 'Share local health needs, understand outreach requirements, and coordinate responsibly with the Glow Health team.',
            'purpose' => 'Connect Glow Health with trusted local structures so outreach planning reflects genuine community needs.',
            'responsibilities' => ['Represent needs accurately and inclusively', 'Coordinate with recognised community leaders', 'Support safe mobilisation and venue readiness', 'Report concerns and feedback to the outreach team'],
            'activities' => [['fa-clipboard-question', 'Gather community needs', 'Identify priority health concerns, access barriers, and groups needing focused support.', 'Planning stage'], ['fa-map-location-dot', 'Support local preparation', 'Help confirm a suitable venue, directions, accessibility, and local contacts.', 'Before outreach'], ['fa-people-arrows', 'Mobilise responsibly', 'Share approved information and help residents understand attendance expectations.', 'Before outreach']],
            'steps' => ['Document priority community needs', 'Review outreach planning information', 'Connect with the outreach desk'],
            'actions' => [['contact', 'Request community outreach', 'fa-bullhorn'], ['outreach', 'Review outreach model', 'fa-calendar-check'], ['partner', 'Explore local partnerships', 'fa-people-group']],
        ],
        'staff' => [
            'icon' => 'fa-id-badge',
            'eyebrow' => 'Staff access request',
            'headline' => 'Your staff request is being reviewed',
            'description' => 'Your selected category is visible, but internal staff permissions are never granted automatically. An administrator must verify and approve access.',
            'purpose' => 'Coordinate Glow Health operations responsibly after identity, employment, and access permissions have been verified.',
            'responsibilities' => ['Complete staff identity and access verification', 'Protect participant and operational data', 'Follow approval and reporting procedures', 'Use only permissions assigned by an administrator'],
            'activities' => [['fa-address-card', 'Complete staff verification', 'Ensure your profile matches your official Glow Health staff record.', 'Required first'], ['fa-shield-halved', 'Secure your account', 'Use a strong password and enable available account security controls.', 'Required first'], ['fa-user-lock', 'Wait for assigned access', 'An administrator will grant tools and operational duties appropriate to your position.', 'After verification']],
            'steps' => ['Keep your profile information accurate', 'Secure your account', 'Wait for staff verification'],
            'actions' => [['profile.edit', 'Review my profile', 'fa-user-pen'], ['security.edit', 'Secure my account', 'fa-shield-halved'], ['contact', 'Contact the initiative', 'fa-envelope']],
        ],
        'other' => [
            'icon' => 'fa-compass',
            'eyebrow' => 'Custom participation',
            'headline' => 'Let’s find the right way to participate',
            'description' => 'Your stated interest helps the team understand where you fit within the initiative and which next step will be most useful.',
            'purpose' => 'Describe how you want to participate so the team can direct you to the safest and most useful pathway.',
            'responsibilities' => ['Keep your participation description specific', 'Review the initiative before requesting access', 'Use official contact channels for guidance', 'Follow the requirements of any role you later choose'],
            'activities' => [['fa-user-pen', 'Clarify your interest', 'Explain your skills, organisation, community link, or intended contribution in your profile.', 'Start here'], ['fa-compass', 'Explore participation options', 'Review services, volunteer work, partnerships, and community outreach pathways.', 'Next step'], ['fa-comments', 'Speak with the team', 'Ask the outreach desk to help place your interest in the right category.', 'When ready']],
            'steps' => ['Keep your participation description current', 'Explore current services and opportunities', 'Contact the team for guidance'],
            'actions' => [['contact', 'Talk to the outreach desk', 'fa-comments'], ['services', 'Explore the initiative', 'fa-stethoscope'], ['profile.edit', 'Update my profile', 'fa-user-pen']],
        ],
    ];

    $profile = $roleProfiles[$user->account_type] ?? $roleProfiles['community_member'];
    $accountStatus = $user->is_super_admin ? 'Full platform authority' : ($user->account_type === 'staff' ? 'Awaiting staff verification' : 'Active member');
    $statusClasses = $user->account_type === 'staff' && ! $user->is_super_admin
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
                <a href="{{ route('profile.edit') }}" class="inline-flex w-fit items-center gap-2 rounded-xl bg-orange-700 px-5 py-3 text-sm font-bold text-white transition hover:bg-orange-800"><i class="fa-solid fa-user-pen" aria-hidden="true"></i>Manage profile</a>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[0.72fr_1.28fr]">
            <aside class="grid gap-6">
                <article class="rounded-3xl border border-sky-100 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-6">
                    <div class="flex items-center gap-4">
                        <span class="flex size-14 items-center justify-center rounded-2xl bg-sky-950 text-xl text-white"><i class="fa-solid {{ $profile['icon'] }}" aria-hidden="true"></i></span>
                        <div class="min-w-0"><p class="text-xs font-bold uppercase tracking-wider text-slate-500">My participation role</p><h2 class="mt-1 truncate text-xl font-extrabold text-sky-950 dark:text-white">{{ $roleLabel }}</h2></div>
                    </div>
                    <div class="mt-6 rounded-2xl border border-sky-100 bg-sky-50 p-4 dark:border-slate-700 dark:bg-slate-800">
                        <p class="text-xs font-bold uppercase tracking-wide text-sky-700 dark:text-sky-300">Why this role matters</p>
                        <p class="mt-2 text-sm leading-6 text-slate-700 dark:text-slate-200">{{ $profile['purpose'] }}</p>
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
                @if ($assignedTasks->isNotEmpty())
                    <article class="rounded-3xl border border-orange-200 bg-orange-50 p-5 dark:border-orange-900/40 dark:bg-orange-950/20 sm:p-6">
                        <div class="flex items-center justify-between gap-4"><div><p class="text-xs font-bold uppercase tracking-[0.14em] text-orange-700">Assigned work</p><h2 class="mt-2 text-2xl font-extrabold text-sky-950 dark:text-white">Tasks delegated to you</h2></div><span class="rounded-full bg-orange-700 px-3 py-1 text-sm font-bold text-white">{{ $assignedTasks->count() }}</span></div>
                        <div class="mt-5 grid gap-3 sm:grid-cols-2">
                            @foreach ($assignedTasks as $task)
                                <div class="rounded-2xl border border-orange-200 bg-white p-4 dark:border-orange-900/40 dark:bg-slate-900"><div class="flex justify-between gap-3"><h3 class="font-extrabold">{{ $task->title }}</h3><span class="h-fit rounded-full bg-sky-100 px-2 py-1 text-[0.65rem] font-bold uppercase text-sky-800">{{ $task->status }}</span></div>@if ($task->description)<p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">{{ $task->description }}</p>@endif @if ($task->due_at)<p class="mt-3 text-xs font-bold text-orange-700">Due {{ $task->due_at->format('M j, Y') }}</p>@endif</div>
                            @endforeach
                        </div>
                    </article>
                @endif
                <article class="rounded-3xl border border-sky-100 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-6">
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.14em] text-orange-700">Your role guide</p>
                            <h2 class="mt-2 text-2xl font-extrabold text-sky-950 dark:text-white">What you are responsible for</h2>
                            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-600 dark:text-slate-300">These are the core expectations for a {{ str($roleLabel)->lower() }} participating in Glow Health.</p>
                        </div>
                        <span class="flex size-11 items-center justify-center rounded-2xl bg-sky-950 text-white"><i class="fa-solid fa-list-check" aria-hidden="true"></i></span>
                    </div>
                    <div class="mt-6 grid gap-3 sm:grid-cols-2">
                        @foreach ($profile['responsibilities'] as $responsibility)
                            <div class="flex items-start gap-3 rounded-2xl border border-slate-200 p-4 dark:border-slate-700">
                                <span class="mt-0.5 flex size-7 shrink-0 items-center justify-center rounded-full bg-orange-100 text-xs text-orange-700 dark:bg-orange-950/40 dark:text-orange-300"><i class="fa-solid fa-check" aria-hidden="true"></i></span>
                                <p class="text-sm font-semibold leading-6">{{ $responsibility }}</p>
                            </div>
                        @endforeach
                    </div>
                </article>

                <article class="rounded-3xl border border-sky-100 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-6">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-sky-700">Role activities</p>
                        <h2 class="mt-2 text-2xl font-extrabold text-sky-950 dark:text-white">What you should be doing</h2>
                        <p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">Use these activities as your practical participation checklist.</p>
                    </div>
                    <div class="mt-6 grid gap-4 lg:grid-cols-3">
                        @foreach ($profile['activities'] as [$icon, $title, $description, $timing])
                            <div class="group rounded-2xl border border-slate-200 p-5 transition hover:-translate-y-0.5 hover:border-orange-200 hover:shadow-lg hover:shadow-orange-950/5 dark:border-slate-700">
                                <div class="flex items-center justify-between gap-3">
                                    <span class="flex size-11 items-center justify-center rounded-2xl bg-sky-950 text-white"><i class="fa-solid {{ $icon }}" aria-hidden="true"></i></span>
                                    <span class="rounded-full bg-orange-50 px-3 py-1.5 text-[0.68rem] font-bold uppercase tracking-wide text-orange-800 dark:bg-orange-950/30 dark:text-orange-200">{{ $timing }}</span>
                                </div>
                                <h3 class="mt-5 font-extrabold text-sky-950 dark:text-white">{{ $title }}</h3>
                                <p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">{{ $description }}</p>
                            </div>
                        @endforeach
                    </div>
                </article>

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
                                <a href="{{ route($routeName) }}" class="group flex items-center justify-between rounded-2xl border border-slate-200 px-4 py-3.5 font-semibold transition hover:border-orange-200 hover:bg-orange-50 dark:border-slate-700 dark:hover:bg-orange-950/20"><span class="flex items-center gap-3"><i class="fa-solid {{ $icon }} w-5 text-sky-700" aria-hidden="true"></i>{{ $label }}</span><i class="fa-solid fa-arrow-right text-xs text-slate-400 transition group-hover:translate-x-1 group-hover:text-orange-700" aria-hidden="true"></i></a>
                            @endforeach
                        </div>
                    </article>

                    <article class="overflow-hidden rounded-3xl bg-sky-950 text-white shadow-sm">
                        <div class="border-b border-white/10 p-5 sm:p-6"><p class="text-xs font-bold uppercase tracking-[0.14em] text-orange-300">Next outreach</p><h2 class="mt-2 text-xl font-extrabold">Akure Community Outreach</h2></div>
                        <div class="grid gap-3 p-5 text-sm sm:p-6">
                            <p class="flex items-center gap-3"><i class="fa-solid fa-calendar-days w-5 text-orange-300" aria-hidden="true"></i>Saturday, July 18, 2026</p>
                            <p class="flex items-center gap-3"><i class="fa-solid fa-clock w-5 text-orange-300" aria-hidden="true"></i>9:00 AM – 3:00 PM</p>
                            <p class="flex items-center gap-3"><i class="fa-solid fa-location-dot w-5 text-orange-300" aria-hidden="true"></i>Akure South, Ondo State</p>
                            <a href="{{ route('outreach') }}" class="mt-2 inline-flex items-center justify-center rounded-xl bg-orange-700 px-4 py-3 font-bold transition hover:bg-orange-800">View outreach details</a>
                        </div>
                    </article>
                </div>

                <article class="rounded-3xl border border-sky-100 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-6">
                    <div class="flex flex-wrap items-end justify-between gap-4"><div><p class="text-xs font-bold uppercase tracking-[0.14em] text-sky-700">Initiative-wide impact</p><h2 class="mt-2 text-2xl font-extrabold text-sky-950 dark:text-white">Care made possible together</h2></div><a href="{{ route('impact') }}" class="text-sm font-bold text-orange-700 hover:underline">See full impact</a></div>
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
