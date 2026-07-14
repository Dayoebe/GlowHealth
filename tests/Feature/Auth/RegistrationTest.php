<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Fortify\Features;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->skipUnlessFortifyHas(Features::registration());
    }

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get(route('register'));

        $response
            ->assertOk()
            ->assertSeeText('Create your account')
            ->assertSeeText('Community care starts here')
            ->assertSeeText('Log in to your account');
    }

    public function test_new_users_can_register(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'John Doe',
            'email' => 'test@example.com',
            'account_type' => 'volunteer',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasNoErrors()
            ->assertRedirect(route('dashboard', absolute: false));

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'account_type' => 'volunteer',
            'account_type_other' => null,
        ]);
    }

    public function test_other_category_requires_and_stores_a_description(): void
    {
        $this->post(route('register.store'), [
            'name' => 'Community Advocate',
            'email' => 'advocate@example.com',
            'account_type' => 'other',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertSessionHasErrors('account_type_other');

        $this->post(route('register.store'), [
            'name' => 'Community Advocate',
            'email' => 'advocate@example.com',
            'account_type' => 'other',
            'account_type_other' => 'Health education content contributor',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertSessionHasNoErrors();

        $this->assertDatabaseHas('users', [
            'email' => 'advocate@example.com',
            'account_type' => 'other',
            'account_type_other' => 'Health education content contributor',
        ]);
    }

    public function test_unknown_account_category_is_rejected(): void
    {
        $this->post(route('register.store'), [
            'name' => 'Unknown Role',
            'email' => 'unknown@example.com',
            'account_type' => 'administrator',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertSessionHasErrors('account_type');

        $this->assertGuest();
    }
}
