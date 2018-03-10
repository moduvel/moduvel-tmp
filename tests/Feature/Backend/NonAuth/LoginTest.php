<?php

namespace Moduvel\Core\Tests\Feature\Backend\NonAuth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Moduvel\Core\Entities\BackendUser;
use Moduvel\Core\Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_invalid_login_will_show_error_message()
    {
        $this->withHeaders([
                'HTTP_REFERER' => locale_route('backend.login'),
            ])
            ->followingRedirects()
            ->post(locale_route('backend.login'))
            ->assertSee('Invalid Credentials');

        $this->withHeaders([
                'HTTP_REFERER' => locale_route('backend.login'),
            ])
            ->followingRedirects()
            ->post(locale_route('backend.login'), [
                'email' => 'invalid',
                'password' => 'invalid',
            ])
            ->assertSee('Invalid Credentials');
    }

    public function test_valid_login_will_redirect_to_dashboard()
    {
        $this->withoutExceptionHandling();

        factory(BackendUser::class)->create([
            'email' => 'admin@mail.com',
            'password' => Hash::make('123456'),
        ]);

        $this->withHeaders([
                'HTTP_REFERER' => locale_route('backend.login'),
            ])
            ->followingRedirects()
            ->post(locale_route('backend.login'), [
                'email' => 'admin@mail.com',
                'password' => '123456',
            ])
            ->assertSee('Dashboard');
    }
}