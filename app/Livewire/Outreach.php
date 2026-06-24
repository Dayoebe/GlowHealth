<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.public')]
#[Title('Next Medical Outreach')]
class Outreach extends Component
{
    /**
     * @var array{status: string, date: string, time: string, venue: string, area: string, capacity: string, note: string}
     */
    #[Locked]
    public array $outreach = [
        'status' => 'Sample schedule',
        'date' => 'Saturday, July 18, 2026',
        'time' => '9:00 AM - 3:00 PM',
        'venue' => 'Akure Community Health Outreach Centre',
        'area' => 'Akure, Ondo State',
        'capacity' => '300 residents',
        'note' => 'This is dummy data for layout planning. The actual date, venue, and capacity will be replaced when confirmed by the initiative team.',
    ];

    /**
     * @var list<array{label: string, value: string, icon: string, color: string}>
     */
    #[Locked]
    public array $quickFacts = [
        [
            'label' => 'Sample Date',
            'value' => 'Jul 18, 2026',
            'icon' => 'fa-calendar-days',
            'color' => 'text-sky-700 bg-sky-50 border-sky-100',
        ],
        [
            'label' => 'Service Window',
            'value' => '9 AM - 3 PM',
            'icon' => 'fa-clock',
            'color' => 'text-emerald-700 bg-emerald-50 border-emerald-100',
        ],
        [
            'label' => 'Target Area',
            'value' => 'Akure',
            'icon' => 'fa-location-dot',
            'color' => 'text-cyan-700 bg-cyan-50 border-cyan-100',
        ],
        [
            'label' => 'Sample Capacity',
            'value' => '300 residents',
            'icon' => 'fa-users',
            'color' => 'text-amber-700 bg-amber-50 border-amber-100',
        ],
    ];

    /**
     * @var list<array{time: string, title: string, description: string}>
     */
    #[Locked]
    public array $agenda = [
        [
            'time' => '8:00 AM',
            'title' => 'Volunteer briefing and station setup',
            'description' => 'Team leads confirm registration desks, triage points, screening flow, pharmacy support, and referral documentation.',
        ],
        [
            'time' => '9:00 AM',
            'title' => 'Resident registration opens',
            'description' => 'Residents are checked in, assigned queue numbers, and directed to triage according to age, symptoms, and priority needs.',
        ],
        [
            'time' => '10:00 AM',
            'title' => 'Screening and consultation stations begin',
            'description' => 'Blood pressure, blood sugar, malaria checks, eye screening, and clinician consultations run in organized batches.',
        ],
        [
            'time' => '12:30 PM',
            'title' => 'Community health education session',
            'description' => 'Short talks cover hypertension, malaria prevention, diabetes awareness, medication use, nutrition, and family wellness.',
        ],
        [
            'time' => '2:00 PM',
            'title' => 'Medication support and referral review',
            'description' => 'Residents receive available medication support, usage counseling, referral guidance, and follow-up instructions.',
        ],
    ];

    /**
     * @var list<array{title: string, description: string, icon: string}>
     */
    #[Locked]
    public array $stations = [
        [
            'title' => 'Registration Desk',
            'description' => 'Captures basic resident details, assigns queue numbers, and manages first-contact information.',
            'icon' => 'fa-clipboard-list',
        ],
        [
            'title' => 'Vitals and Triage',
            'description' => 'Checks vital signs and identifies residents who should be seen quickly by the clinical team.',
            'icon' => 'fa-heart-pulse',
        ],
        [
            'title' => 'Testing Point',
            'description' => 'Handles available blood sugar, malaria, and other point-of-care checks based on supplies.',
            'icon' => 'fa-vial',
        ],
        [
            'title' => 'Clinical Consultation',
            'description' => 'Doctors and nurses review symptoms, history, screening results, and next care steps.',
            'icon' => 'fa-user-doctor',
        ],
        [
            'title' => 'Pharmacy Support',
            'description' => 'Dispenses available medications where appropriate and explains safe usage to residents.',
            'icon' => 'fa-pills',
        ],
        [
            'title' => 'Referral and Follow-Up',
            'description' => 'Prepares referral notes, health advice, and post-outreach guidance for residents who need more care.',
            'icon' => 'fa-notes-medical',
        ],
    ];

    /**
     * @var list<string>
     */
    #[Locked]
    public array $whatToBring = [
        'Any current medication or prescription record',
        'Previous test result or clinic card, if available',
        'A phone number for follow-up communication',
        'Comfortable clothing for basic screening checks',
        'Water and light refreshment, especially for elderly residents',
    ];
}
