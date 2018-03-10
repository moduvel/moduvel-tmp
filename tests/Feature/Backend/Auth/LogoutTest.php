<?php

namespace Moduvel\Core\Tests\Feature\Backend\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Moduvel\Core\Entities\BackendUser;
use Moduvel\Core\Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_logout_of_backend()
    {
        factory(BackendUser::class)->create([
            'email' => 'admin@mail.com',
            'password' => Hash::make('123456'),
        ]);

        $this->actingAs(BackendUser::find(1)->first(), 'backend');

        $this->get(locale_route('backend.dashboard'))
            ->assertSee('Dashboard');

        $this->followingRedirects()
            ->get(locale_route('backend.logout'))
            ->assertSee('Login');
    }
}