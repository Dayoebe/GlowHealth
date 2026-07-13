<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    public function test_public_pages_can_be_rendered(): void
    {
        $pages = [
            ['home', 'Quality Healthcare Should Not Be a Privilege'],
            ['services', 'Free Healthcare Services'],
            ['outreach', 'Next Medical Outreach'],
            ['impact', 'Community Health Impact'],
            ['volunteer', 'Volunteer Your Skill'],
            ['partner', 'Partner With a Trusted'],
            ['contact', 'Reach the Outreach Desk'],
        ];

        foreach ($pages as [$route, $expectedText]) {
            $response = $this->get(route($route))
                ->assertOk()
                ->assertSeeText($expectedText)
                ->assertSeeInOrder(['<header', '<main', '<footer'], false);

            $this->assertSame(1, substr_count($response->getContent(), '<header'));
            $this->assertSame(1, substr_count($response->getContent(), '<footer'));
        }
    }
}
