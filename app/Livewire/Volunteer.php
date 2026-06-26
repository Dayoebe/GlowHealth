<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.public')]
#[Title('Volunteer With Glow Health')]
class Volunteer extends Component
{
    /**
     * @var list<array{title: string, description: string, icon: string, color: string}>
     */
    #[Locked]
    public array $roles = [
        [
            'title' => 'Doctors and Clinical Officers',
            'description' => 'Lead consultation desks, review screening results, identify urgent cases, and guide referrals.',
            'icon' => 'fa-user-doctor',
            'color' => 'text-sky-700 bg-sky-50 border-sky-100',
        ],
        [
            'title' => 'Nurses and Midwives',
            'description' => 'Support triage, vitals, patient education, women and family health guidance, and care flow.',
            'icon' => 'fa-user-nurse',
            'color' => 'text-emerald-700 bg-emerald-50 border-emerald-100',
        ],
        [
            'title' => 'Pharmacists',
            'description' => 'Manage available medications, dosage counseling, safety checks, and pharmacy station records.',
            'icon' => 'fa-pills',
            'color' => 'text-cyan-700 bg-cyan-50 border-cyan-100',
        ],
        [
            'title' => 'Laboratory Scientists',
            'description' => 'Coordinate point-of-care checks such as blood sugar, malaria testing, and result documentation.',
            'icon' => 'fa-vial',
            'color' => 'text-amber-700 bg-amber-50 border-amber-100',
        ],
        [
            'title' => 'Students and Interns',
            'description' => 'Assist with registration, station support, patient movement, documentation, and health talks.',
            'icon' => 'fa-graduation-cap',
            'color' => 'text-blue-700 bg-blue-50 border-blue-100',
        ],
        [
            'title' => 'Media and Documentation',
            'description' => 'Capture consent-based stories, community announcements, field updates, and partner reporting.',
            'icon' => 'fa-camera',
            'color' => 'text-teal-700 bg-teal-50 border-teal-100',
        ],
        [
            'title' => 'Community Mobilisers',
            'description' => 'Help residents understand registration, outreach timing, queues, eligibility, and follow-up guidance.',
            'icon' => 'fa-bullhorn',
            'color' => 'text-orange-700 bg-orange-50 border-orange-100',
        ],
        [
            'title' => 'Logistics Volunteers',
            'description' => 'Support venue setup, crowd flow, supplies, water points, elderly support, and orderly close-out.',
            'icon' => 'fa-people-carry-box',
            'color' => 'text-slate-700 bg-slate-50 border-slate-100',
        ],
    ];

    /**
     * @var list<array{title: string, description: string, icon: string}>
     */
    #[Locked]
    public array $steps = [
        [
            'title' => 'Submit Interest',
            'description' => 'Tell us your role, availability, professional background, and preferred support area.',
            'icon' => 'fa-clipboard-list',
        ],
        [
            'title' => 'Join Orientation',
            'description' => 'Receive briefing on outreach flow, patient dignity, safety, reporting, and escalation rules.',
            'icon' => 'fa-person-chalkboard',
        ],
        [
            'title' => 'Receive Assignment',
            'description' => 'Team leads assign volunteers to stations before the outreach day based on skill and need.',
            'icon' => 'fa-people-arrows',
        ],
        [
            'title' => 'Serve on Outreach Day',
            'description' => 'Work with the field team to deliver organized, respectful, and measurable community care.',
            'icon' => 'fa-hand-holding-medical',
        ],
    ];

    /**
     * @var list<string>
     */
    #[Locked]
    public array $expectations = [
        'Licensed professionals should volunteer within their scope of practice.',
        'All volunteers must respect patient dignity, privacy, and informed consent.',
        'Clinical decisions remain under qualified medical supervision.',
        'Volunteers should arrive early for briefing, station setup, and role confirmation.',
        'Post-outreach records and feedback are treated as part of responsible community care.',
    ];
}
