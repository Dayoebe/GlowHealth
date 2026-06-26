<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.public')]
#[Title('Contact Glow Health')]
class Contact extends Component
{
    /**
     * @var list<array{title: string, description: string, icon: string, color: string}>
     */
    #[Locked]
    public array $channels = [
        [
            'title' => 'Resident Registration',
            'description' => 'Ask about eligibility, outreach location, arrival time, what to bring, and confirmation steps.',
            'icon' => 'fa-clipboard-check',
            'color' => 'text-sky-700 bg-sky-50 border-sky-100',
        ],
        [
            'title' => 'Volunteer Desk',
            'description' => 'Send your professional role, availability, and preferred station for upcoming medical outreaches.',
            'icon' => 'fa-users',
            'color' => 'text-amber-700 bg-amber-50 border-amber-100',
        ],
        [
            'title' => 'Partnerships',
            'description' => 'Discuss sponsorship, medical supplies, NGO collaboration, venue support, or public health coordination.',
            'icon' => 'fa-handshake',
            'color' => 'text-teal-700 bg-teal-50 border-teal-100',
        ],
        [
            'title' => 'Community Updates',
            'description' => 'Share community health needs, request outreach consideration, or connect local leaders with the team.',
            'icon' => 'fa-bullhorn',
            'color' => 'text-emerald-700 bg-emerald-50 border-emerald-100',
        ],
    ];

    /**
     * @var list<array{label: string, value: string, icon: string}>
     */
    #[Locked]
    public array $details = [
        ['label' => 'Email', 'value' => 'chairman@glowfmhealth.com', 'icon' => 'fa-envelope'],
        ['label' => 'Outreach Desk', 'value' => 'Glow FM Community Health Desk, Akure, Ondo State', 'icon' => 'fa-location-dot'],
        ['label' => 'Response Window', 'value' => 'Monday to Friday, 9:00 AM - 5:00 PM WAT', 'icon' => 'fa-clock'],
        ['label' => 'Coverage Focus', 'value' => 'Akure first, then other Ondo State communities', 'icon' => 'fa-map-location-dot'],
    ];
}
