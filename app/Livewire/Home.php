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
            'value' => 'Free',
            'label' => 'Community screening',
            'detail' => 'Blood pressure, blood sugar, malaria risk checks, basic vitals, and health counseling.',
        ],
        [
            'value' => 'NGO',
            'label' => 'Outreach model',
            'detail' => 'Volunteer-led field teams supported by clinicians, community leaders, and local partners.',
        ],
        [
            'value' => 'Refer',
            'label' => 'Continuity of care',
            'detail' => 'People who need more help are guided toward clinics, hospitals, and follow-up support.',
        ],
    ];

    /**
     * @var list<array{title: string, description: string, icon: string}>
     */
    #[Locked]
    public array $programs = [
        [
            'title' => 'Free Community Screening Clinics',
            'description' => 'Pop-up medical outreaches in schools, churches, markets, town halls, and rural communities for blood pressure, blood sugar, temperature, weight, and basic health risk checks.',
            'icon' => 'clipboard-document-check',
        ],
        [
            'title' => 'Maternal, Child, And Family Wellness',
            'description' => 'Health talks and counseling for mothers, caregivers, children, and older adults, with attention to nutrition, hygiene, antenatal warning signs, immunization awareness, and home safety.',
            'icon' => 'heart',
        ],
        [
            'title' => 'Disease Prevention And Health Education',
            'description' => 'Plain-language sessions on hypertension, diabetes, malaria prevention, sanitation, medication adherence, mental wellbeing, and when to seek urgent care.',
            'icon' => 'academic-cap',
        ],
        [
            'title' => 'Referral Navigation And Patient Follow-Up',
            'description' => 'Clear referral notes, partner clinic contacts, follow-up calls, and case tracking for people whose screening results suggest they need further medical attention.',
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
            'title' => 'Assess the community need',
            'description' => 'Meet local leaders, schools, faith groups, and health workers to understand common illnesses, access barriers, and the safest outreach location.',
        ],
        [
            'step' => '02',
            'title' => 'Set up the field clinic',
            'description' => 'Register guests, check vitals, run screening stations, provide health education, counsel families, and document people who need urgent attention.',
        ],
        [
            'step' => '03',
            'title' => 'Refer and follow up',
            'description' => 'Give referral guidance, contact partner facilities where needed, and keep vulnerable cases visible after the outreach day.',
        ],
    ];

    /**
     * @var list<array{label: string, title: string, description: string}>
     */
    #[Locked]
    public array $outreaches = [
        [
            'label' => 'Medical outreach',
            'title' => 'Free screening and counseling days',
            'description' => 'Community members receive basic checks, private counseling, health education, and referral advice without paying a consultation fee.',
        ],
        [
            'label' => 'Health education',
            'title' => 'Prevention talks for families',
            'description' => 'Interactive sessions help households understand high blood pressure, diabetes, malaria, sanitation, nutrition, medication use, and warning signs.',
        ],
        [
            'label' => 'Care connection',
            'title' => 'Referral support for vulnerable cases',
            'description' => 'The team documents high-risk findings and works with partner clinics, volunteers, and donors to support next steps where possible.',
        ],
    ];

    /**
     * @var list<array{title: string, detail: string, icon: string}>
     */
    #[Locked]
    public array $fieldStations = [
        [
            'title' => 'Registration and triage',
            'detail' => 'Basic intake, consent, symptoms, medication history, and risk flags before screening.',
            'icon' => 'clipboard-document-check',
        ],
        [
            'title' => 'Screening stations',
            'detail' => 'Blood pressure, blood sugar, temperature, weight, and malaria risk education based on available supplies.',
            'icon' => 'heart',
        ],
        [
            'title' => 'Counseling desk',
            'detail' => 'One-on-one guidance on lifestyle, medication adherence, family health, and when to visit a clinic.',
            'icon' => 'academic-cap',
        ],
        [
            'title' => 'Referral and follow-up',
            'detail' => 'Referral notes, partner contacts, and follow-up lists for people who need further care.',
            'icon' => 'shield-check',
        ],
    ];
}
