<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_the_login_page(): void
    {
        $response = $this->get(route('dashboard'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_users_can_visit_the_dashboard(): void
    {
        $user = User::factory()->create([
            'name' => 'Volunteer Ada',
            'account_type' => 'volunteer',
        ]);
        $this->actingAs($user);

        $response = $this->get(route('dashboard'));
        $response
            ->assertOk()
            ->assertSeeText('Volunteer')
            ->assertSeeText('Prepare to serve with purpose')
            ->assertSeeText('Volunteer opportunities');
    }

    public function test_staff_category_is_shown_as_awaiting_verification(): void
    {
        $user = User::factory()->create([
            'account_type' => 'staff',
        ]);

        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSeeText('Glow Health staff')
            ->assertSeeText('Awaiting staff verification')
            ->assertSeeText('Your staff request is being reviewed');
    }
}
