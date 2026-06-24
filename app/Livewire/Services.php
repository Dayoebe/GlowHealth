<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.public')]
#[Title('Free Healthcare Services')]
class Services extends Component
{
    /**
     * @var list<array{title: string, description: string, icon: string, color: string}>
     */
    #[Locked]
    public array $services = [
        [
            'title' => 'Medical Consultation',
            'description' => 'Residents speak with qualified medical professionals about current symptoms, long-term concerns, medication use, and next steps for care.',
            'icon' => 'fa-user-doctor',
            'color' => 'text-sky-700 bg-sky-50 border-sky-100',
        ],
        [
            'title' => 'Blood Pressure Screening',
            'description' => 'Fast checks help identify hypertension risk early, followed by lifestyle guidance, documentation, and referral where needed.',
            'icon' => 'fa-heart-pulse',
            'color' => 'text-emerald-700 bg-emerald-50 border-emerald-100',
        ],
        [
            'title' => 'Blood Sugar Testing',
            'description' => 'Point-of-care testing supports diabetes awareness and helps residents understand when follow-up monitoring is important.',
            'icon' => 'fa-droplet',
            'color' => 'text-cyan-700 bg-cyan-50 border-cyan-100',
        ],
        [
            'title' => 'Malaria Testing',
            'description' => 'Malaria checks, prevention education, and treatment guidance are provided based on symptoms, test availability, and clinical judgment.',
            'icon' => 'fa-mosquito',
            'color' => 'text-amber-700 bg-amber-50 border-amber-100',
        ],
        [
            'title' => 'Eye Screening',
            'description' => 'Basic vision checks help identify residents who may need further review, corrective support, or specialist referral.',
            'icon' => 'fa-eye',
            'color' => 'text-blue-700 bg-blue-50 border-blue-100',
        ],
        [
            'title' => 'Health Education',
            'description' => 'Short, practical sessions cover prevention, hygiene, nutrition, medication adherence, family wellness, and when to seek urgent care.',
            'icon' => 'fa-person-chalkboard',
            'color' => 'text-teal-700 bg-teal-50 border-teal-100',
        ],
        [
            'title' => 'Medication Support',
            'description' => 'Essential medicines are dispensed when clinically appropriate, with pharmacy counseling on dosage, timing, and safety.',
            'icon' => 'fa-pills',
            'color' => 'text-orange-700 bg-orange-50 border-orange-100',
        ],
        [
            'title' => 'Referral Services',
            'description' => 'Residents who need advanced care receive clear referral guidance and follow-up instructions to reduce confusion after the outreach.',
            'icon' => 'fa-clipboard-check',
            'color' => 'text-slate-700 bg-slate-50 border-slate-100',
        ],
    ];

    /**
     * @var list<array{title: string, description: string, icon: string}>
     */
    #[Locked]
    public array $careFlow = [
        [
            'title' => 'Registration and Triage',
            'description' => 'Basic details are captured, urgent cases are identified, and residents are directed to the right care station.',
            'icon' => 'fa-clipboard-list',
        ],
        [
            'title' => 'Screening Stations',
            'description' => 'Vital signs and available tests are handled by trained volunteers under professional supervision.',
            'icon' => 'fa-stethoscope',
        ],
        [
            'title' => 'Clinical Review',
            'description' => 'Clinicians review symptoms, screening results, and medical history before giving guidance or treatment.',
            'icon' => 'fa-user-nurse',
        ],
        [
            'title' => 'Pharmacy and Referral',
            'description' => 'Medication support, counseling, referral notes, and follow-up guidance are provided before exit.',
            'icon' => 'fa-notes-medical',
        ],
    ];

    /**
     * @var list<string>
     */
    #[Locked]
    public array $whoCanAttend = [
        'Adults seeking basic medical consultation or screening',
        'Elderly residents who need blood pressure or blood sugar checks',
        'Parents and guardians seeking family health education',
        'Community members who need referral guidance for further care',
        'Residents who cannot easily afford private consultation fees',
    ];
}
