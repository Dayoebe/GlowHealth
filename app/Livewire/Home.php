<?php

namespace App\Livewire;

use Livewire\Attributes\Locked;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.public')]
#[Title('Glow Healthcare Outreach Initiative')]
class Home extends Component
{
    /**
     * @var list<array{value: string, label: string, detail: string}>
     */
    #[Locked]
    public array $metrics = [
        [
            'value' => '4',
            'label' => 'Care pillars',
            'detail' => 'Screening, education, referrals, and follow-up.',
        ],
        [
            'value' => '24-48h',
            'label' => 'Referral window',
            'detail' => 'Designed for fast escalation when care cannot wait.',
        ],
        [
            'value' => '3',
            'label' => 'Outreach tracks',
            'detail' => 'Clinics, community education, and partner response.',
        ],
    ];

    /**
     * @var list<array{title: string, description: string, icon: string}>
     */
    #[Locked]
    public array $programs = [
        [
            'title' => 'Community Health Clinics',
            'description' => 'Mobile screening days for blood pressure, glucose, malaria risk, basic vitals, and guided next steps.',
            'icon' => 'clipboard-document-check',
        ],
        [
            'title' => 'Maternal And Family Wellness',
            'description' => 'Practical health sessions for mothers, children, and caregivers with respectful guidance from trained volunteers.',
            'icon' => 'heart',
        ],
        [
            'title' => 'Preventive Health Education',
            'description' => 'Clear, local-language education that helps households recognize risks early and make safer care decisions.',
            'icon' => 'academic-cap',
        ],
        [
            'title' => 'Referral And Follow-Up',
            'description' => 'A structured handoff process that connects community members to clinics, hospitals, and partner support.',
            'icon' => 'shield-check',
        ],
    ];

    /**
     * @var list<array{step: string, title: string, description: string}>
     */
    #[Locked]
    public array $process = [
        [
            'step' => '01',
            'title' => 'Listen locally',
            'description' => 'Meet community leaders, identify health barriers, and shape each outreach around real needs.',
        ],
        [
            'step' => '02',
            'title' => 'Bring care closer',
            'description' => 'Deploy trained teams for screenings, education, counseling, and basic care navigation.',
        ],
        [
            'step' => '03',
            'title' => 'Follow through',
            'description' => 'Track referrals, coordinate partners, and keep vulnerable families from falling through gaps.',
        ],
    ];

    /**
     * @var list<array{label: string, title: string, description: string}>
     */
    #[Locked]
    public array $outreaches = [
        [
            'label' => 'Monthly',
            'title' => 'Primary care screening days',
            'description' => 'Vitals, glucose checks, malaria risk education, and clinician-led referral guidance.',
        ],
        [
            'label' => 'Quarterly',
            'title' => 'Women and family wellness forums',
            'description' => 'Maternal health, child wellness, nutrition, hygiene, and family safety education.',
        ],
        [
            'label' => 'Ongoing',
            'title' => 'Partner response network',
            'description' => 'Volunteer coordination, medicine support, and transport assistance for urgent cases.',
        ],
    ];
}
