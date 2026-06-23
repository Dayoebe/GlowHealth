<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.public')]
#[Title('Glow FM Free Medical Initiative')]
class Home extends Component
{
    /**
     * @var list<array{value: string, label: string, detail: string}>
     */
    #[Locked]
    public array $heroStats = [
        [
            'value' => '5,000+',
            'label' => 'Residents Reached',
            'detail' => 'Community members engaged through medical outreaches and health education.',
        ],
        [
            'value' => '1,500+',
            'label' => 'Free Consultations',
            'detail' => 'Consultations delivered through volunteer clinicians and outreach partners.',
        ],
        [
            'value' => '800+',
            'label' => 'Medications Distributed',
            'detail' => 'Essential medication support provided where clinically appropriate.',
        ],
        [
            'value' => '100+',
            'label' => 'Volunteers',
            'detail' => 'Medical and community volunteers supporting organized field care.',
        ],
    ];

    /**
     * @var list<array{title: string, description: string, icon: string}>
     */
    #[Locked]
    public array $trustFeatures = [
        [
            'title' => 'Licensed Medical Team',
            'description' => 'Outreaches are supported by qualified doctors, nurses, pharmacists, laboratory personnel, and allied health professionals.',
            'icon' => 'shield-check',
        ],
        [
            'title' => 'Community Impact',
            'description' => 'The initiative begins in Akure and expands through Ondo State with community leaders, volunteers, and host organizations.',
            'icon' => 'user-group',
        ],
        [
            'title' => 'Free Healthcare Access',
            'description' => 'Residents receive consultations, screenings, medication support, and health education without paying consultation fees.',
            'icon' => 'heart',
        ],
        [
            'title' => 'Transparent Operations',
            'description' => 'Registration, triage, screening, pharmacy support, referrals, and follow-up guidance are organized clearly for every outreach.',
            'icon' => 'clipboard-document-check',
        ],
    ];

    /**
     * @var list<array{title: string, description: string, icon: string}>
     */
    #[Locked]
    public array $services = [
        [
            'title' => 'Medical Consultation',
            'description' => 'One-on-one consultation with qualified medical professionals for common health concerns.',
            'icon' => 'user-group',
        ],
        [
            'title' => 'Blood Pressure Screening',
            'description' => 'Early detection and counseling for hypertension risk and lifestyle adjustments.',
            'icon' => 'heart',
        ],
        [
            'title' => 'Blood Sugar Testing',
            'description' => 'Point-of-care checks and guidance for diabetes risk and follow-up care.',
            'icon' => 'beaker',
        ],
        [
            'title' => 'Malaria Testing',
            'description' => 'Malaria risk assessment, testing support, prevention education, and treatment guidance.',
            'icon' => 'plus-circle',
        ],
        [
            'title' => 'Eye Screening',
            'description' => 'Basic vision checks and referral guidance for residents who need further eye care.',
            'icon' => 'eye',
        ],
        [
            'title' => 'Health Education',
            'description' => 'Practical talks on prevention, sanitation, nutrition, medication use, and family wellness.',
            'icon' => 'academic-cap',
        ],
        [
            'title' => 'Medication Support',
            'description' => 'Essential medications and pharmacy counseling where prescriptions and supplies permit.',
            'icon' => 'clipboard-document-check',
        ],
        [
            'title' => 'Referral Services',
            'description' => 'Clear referral notes and follow-up guidance for conditions requiring advanced care.',
            'icon' => 'shield-check',
        ],
    ];

    /**
     * @var list<array{step: string, title: string, description: string}>
     */
    #[Locked]
    public array $steps = [
        [
            'step' => '01',
            'title' => 'Register Online',
            'description' => 'Submit your basic details so the team can plan attendance, triage flow, and outreach supplies.',
        ],
        [
            'step' => '02',
            'title' => 'Receive Confirmation',
            'description' => 'Get the outreach date, time, venue details, and what to bring for a smoother visit.',
        ],
        [
            'step' => '03',
            'title' => 'Attend the Outreach',
            'description' => 'Arrive at the venue in Akure or your host community and follow the registration desk guidance.',
        ],
        [
            'step' => '04',
            'title' => 'Get Screened and Treated',
            'description' => 'Move through consultation, screening, counseling, pharmacy support, and health education stations.',
        ],
        [
            'step' => '05',
            'title' => 'Receive Follow-Up Guidance',
            'description' => 'Leave with referral notes, medication instructions, and practical advice for ongoing care.',
        ],
    ];

    /**
     * @var list<array{key: string, value: int, suffix: string, label: string, detail: string}>
     */
    #[Locked]
    public array $impactMetrics = [
        [
            'key' => 'patients',
            'value' => 5000,
            'suffix' => '+',
            'label' => 'Patients Served',
            'detail' => 'Residents reached through outreach services and health education.',
        ],
        [
            'key' => 'communities',
            'value' => 12,
            'suffix' => '+',
            'label' => 'Communities Reached',
            'detail' => 'Starting from Akure and expanding across Ondo State.',
        ],
        [
            'key' => 'volunteers',
            'value' => 100,
            'suffix' => '+',
            'label' => 'Medical Volunteers',
            'detail' => 'Clinicians, students, media professionals, and community workers.',
        ],
        [
            'key' => 'medications',
            'value' => 800,
            'suffix' => '+',
            'label' => 'Free Medications Distributed',
            'detail' => 'Essential medication support provided through outreach partners.',
        ],
    ];

    /**
     * @var list<array{name: string, role: string, quote: string}>
     */
    #[Locked]
    public array $testimonials = [
        [
            'name' => 'Mrs. Funke A.',
            'role' => 'Community resident, Akure',
            'quote' => 'The screening helped me discover my blood pressure was high. The team explained what it meant and guided me on the next steps.',
        ],
        [
            'name' => 'Tosin Adeyemi',
            'role' => 'Volunteer coordinator',
            'quote' => 'What stands out is the organization. Residents are received with respect, screened properly, and referred when they need more care.',
        ],
        [
            'name' => 'Dr. K. Oladimeji',
            'role' => 'Medical volunteer',
            'quote' => 'This initiative meets people where they are. It combines consultation, prevention education, and practical referral support.',
        ],
    ];

    /**
     * @var list<array{name: string, initials: string}>
     */
    #[Locked]
    public array $partners = [
        ['name' => 'Glow FM', 'initials' => 'GFM'],
        ['name' => 'Licensed Medical Volunteers', 'initials' => 'LMV'],
        ['name' => 'Community Health Leaders', 'initials' => 'CHL'],
        ['name' => 'Pharmacy Support Partners', 'initials' => 'PSP'],
        ['name' => 'Diagnostic Support Teams', 'initials' => 'DST'],
        ['name' => 'Youth Health Volunteers', 'initials' => 'YHV'],
    ];

    /**
     * @var list<array{title: string, category: string, excerpt: string}>
     */
    #[Locked]
    public array $articles = [
        [
            'title' => 'Understanding High Blood Pressure',
            'category' => 'Prevention',
            'excerpt' => 'Simple signs, risk factors, and daily choices that help families take hypertension seriously.',
        ],
        [
            'title' => 'Malaria Prevention Tips',
            'category' => 'Family Health',
            'excerpt' => 'Practical steps for protecting children, older adults, and households during mosquito season.',
        ],
        [
            'title' => 'Healthy Living for Families',
            'category' => 'Wellness',
            'excerpt' => 'Nutrition, hygiene, movement, sleep, and routine checks that strengthen community health.',
        ],
        [
            'title' => 'Diabetes Awareness',
            'category' => 'Screening',
            'excerpt' => 'Why blood sugar testing matters and when residents should seek medical guidance.',
        ],
    ];
}
