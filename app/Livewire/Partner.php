<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.public')]
#[Title('Partner With Glow Health')]
class Partner extends Component
{
    /**
     * @var list<array{title: string, description: string, icon: string, color: string}>
     */
    #[Locked]
    public array $partnerships = [
        [
            'title' => 'Medical Supplies',
            'description' => 'Support essential medications, consumables, blood pressure cuffs, glucometer strips, malaria test kits, and first-aid supplies.',
            'icon' => 'fa-kit-medical',
            'color' => 'text-sky-700 bg-sky-50 border-sky-100',
        ],
        [
            'title' => 'Corporate Sponsorship',
            'description' => 'Fund outreach logistics, resident registration, volunteer welfare, patient education materials, and post-outreach reporting.',
            'icon' => 'fa-building-circle-check',
            'color' => 'text-emerald-700 bg-emerald-50 border-emerald-100',
        ],
        [
            'title' => 'Healthcare Organizations',
            'description' => 'Deploy licensed professionals, specialist referrals, screening support, pharmacy guidance, or clinical governance.',
            'icon' => 'fa-hospital',
            'color' => 'text-cyan-700 bg-cyan-50 border-cyan-100',
        ],
        [
            'title' => 'NGOs and Foundations',
            'description' => 'Collaborate on maternal health, chronic disease awareness, malaria prevention, disability inclusion, or family wellness.',
            'icon' => 'fa-hands-holding-child',
            'color' => 'text-amber-700 bg-amber-50 border-amber-100',
        ],
        [
            'title' => 'Government and Agencies',
            'description' => 'Coordinate local access, public health alignment, community leadership, referral pathways, and responsible data sharing.',
            'icon' => 'fa-landmark',
            'color' => 'text-blue-700 bg-blue-50 border-blue-100',
        ],
        [
            'title' => 'Venue and Logistics',
            'description' => 'Provide community venues, canopies, chairs, power, water, transport, queue control, and accessible service points.',
            'icon' => 'fa-truck-medical',
            'color' => 'text-teal-700 bg-teal-50 border-teal-100',
        ],
    ];

    /**
     * @var list<array{title: string, description: string}>
     */
    #[Locked]
    public array $accountability = [
        [
            'title' => 'Clear Outreach Plan',
            'description' => 'Partners receive a practical plan covering community focus, expected capacity, service stations, and resource needs.',
        ],
        [
            'title' => 'Responsible Allocation',
            'description' => 'Donated items and funds are mapped to field needs such as screening, medicines, logistics, and patient education.',
        ],
        [
            'title' => 'Field Documentation',
            'description' => 'Attendance, services delivered, referrals, medication support, and volunteer reports are captured during execution.',
        ],
        [
            'title' => 'Impact Brief',
            'description' => 'After each outreach, partners can receive a concise outcome summary with lessons and next-step recommendations.',
        ],
    ];

    /**
     * @var list<array{label: string, value: string, icon: string}>
     */
    #[Locked]
    public array $needs = [
        ['label' => 'Priority communities', 'value' => 'Akure first, then surrounding Ondo State communities', 'icon' => 'fa-location-dot'],
        ['label' => 'Core supply needs', 'value' => 'Medicines, tests, gloves, forms, IEC materials, and referral support', 'icon' => 'fa-boxes-stacked'],
        ['label' => 'Operational needs', 'value' => 'Transport, canopies, power, water, volunteer welfare, and crowd flow', 'icon' => 'fa-van-shuttle'],
        ['label' => 'Reporting needs', 'value' => 'Data tools, consent workflow, field documentation, and partner briefings', 'icon' => 'fa-chart-line'],
    ];
}
