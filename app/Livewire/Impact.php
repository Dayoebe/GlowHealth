<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.public')]
#[Title('Community Health Impact')]
class Impact extends Component
{
    /**
     * @var list<array{key: string, value: int, suffix: string, label: string, description: string, icon: string, color: string}>
     */
    #[Locked]
    public array $metrics = [
        [
            'key' => 'residents',
            'value' => 5000,
            'suffix' => '+',
            'label' => 'Residents Reached',
            'description' => 'Community members reached through medical outreach, screening, education, and referral activities.',
            'icon' => 'fa-people-group',
            'color' => 'text-sky-700 bg-sky-50 border-sky-100',
        ],
        [
            'key' => 'consultations',
            'value' => 1500,
            'suffix' => '+',
            'label' => 'Free Consultations',
            'description' => 'Clinical reviews supported by doctors, nurses, pharmacists, and allied health volunteers.',
            'icon' => 'fa-user-doctor',
            'color' => 'text-emerald-700 bg-emerald-50 border-emerald-100',
        ],
        [
            'key' => 'medications',
            'value' => 800,
            'suffix' => '+',
            'label' => 'Medications Distributed',
            'description' => 'Essential medication support provided with counseling where clinically appropriate.',
            'icon' => 'fa-pills',
            'color' => 'text-amber-700 bg-amber-50 border-amber-100',
        ],
        [
            'key' => 'volunteers',
            'value' => 100,
            'suffix' => '+',
            'label' => 'Active Volunteers',
            'description' => 'Medical, logistics, media, student, and community volunteers supporting organized field care.',
            'icon' => 'fa-hand-holding-medical',
            'color' => 'text-cyan-700 bg-cyan-50 border-cyan-100',
        ],
    ];

    /**
     * @var list<array{name: string, status: string, focus: string}>
     */
    #[Locked]
    public array $communities = [
        ['name' => 'Akure South', 'status' => 'Active outreach zone', 'focus' => 'Consultations, screening, medication support'],
        ['name' => 'Akure North', 'status' => 'Community engagement', 'focus' => 'Health education and volunteer mobilization'],
        ['name' => 'Oba-Ile', 'status' => 'Resident registration', 'focus' => 'Blood pressure and blood sugar awareness'],
        ['name' => 'Oda', 'status' => 'Local partner mapping', 'focus' => 'Malaria prevention and family wellness'],
        ['name' => 'Ijoka', 'status' => 'Follow-up support', 'focus' => 'Referral guidance and health talks'],
        ['name' => 'Isikan', 'status' => 'Community health education', 'focus' => 'Prevention, hygiene, and medication safety'],
        ['name' => 'Oke-Aro', 'status' => 'Volunteer coordination', 'focus' => 'Registration flow and elderly resident support'],
        ['name' => 'Alagbaka', 'status' => 'Stakeholder engagement', 'focus' => 'Partnership and sponsorship coordination'],
    ];

    /**
     * @var list<array{title: string, description: string, result: string, icon: string}>
     */
    #[Locked]
    public array $outcomes = [
        [
            'title' => 'Earlier Risk Detection',
            'description' => 'Screening helps residents identify hypertension, diabetes risk, malaria symptoms, and other common concerns before complications become severe.',
            'result' => 'More residents leave with clear next steps for care.',
            'icon' => 'fa-heart-pulse',
        ],
        [
            'title' => 'Lower Cost Barriers',
            'description' => 'Free consultation, screening, and selected medication support reduce the immediate cost that keeps families from seeking timely help.',
            'result' => 'Care becomes easier to access for low-income households.',
            'icon' => 'fa-hand-holding-dollar',
        ],
        [
            'title' => 'Better Health Literacy',
            'description' => 'Short health talks translate medical advice into practical daily habits for families, market women, elderly residents, and young people.',
            'result' => 'Residents understand prevention, medication use, and warning signs.',
            'icon' => 'fa-person-chalkboard',
        ],
        [
            'title' => 'Referral Continuity',
            'description' => 'Residents with conditions that require advanced care receive referral direction and follow-up guidance after the outreach.',
            'result' => 'Serious cases are guided toward appropriate facilities.',
            'icon' => 'fa-notes-medical',
        ],
    ];

    /**
     * @var list<array{quote: string, name: string, role: string}>
     */
    #[Locked]
    public array $stories = [
        [
            'quote' => 'The blood pressure check helped me understand why I had been feeling weak. The nurse explained the result and what I should do next.',
            'name' => 'Mrs. Funke A.',
            'role' => 'Resident, Akure South',
        ],
        [
            'quote' => 'The structure matters. People are registered, screened, counseled, and referred instead of being left confused after the outreach.',
            'name' => 'Tosin Adeyemi',
            'role' => 'Volunteer coordinator',
        ],
        [
            'quote' => 'Community outreach works best when prevention, treatment guidance, and follow-up are handled together. This initiative is building that culture.',
            'name' => 'Dr. K. Oladimeji',
            'role' => 'Medical volunteer',
        ],
    ];

    /**
     * @var list<array{label: string, value: string}>
     */
    #[Locked]
    public array $reporting = [
        ['label' => 'Primary coverage', 'value' => 'Akure and surrounding communities'],
        ['label' => 'Core services tracked', 'value' => 'Consultation, screening, medication support, education, referral'],
        ['label' => 'Data sources', 'value' => 'Registration desk, clinical stations, pharmacy records, volunteer reports'],
        ['label' => 'Reporting focus', 'value' => 'Reach, service volume, referral needs, community feedback'],
    ];
}
