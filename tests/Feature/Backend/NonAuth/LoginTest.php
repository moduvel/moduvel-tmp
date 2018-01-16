<?php

namespace Moduvel\Core\Tests\Feature\Backend\NonAuth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Moduvel\Core\Entities\BackendUser;
use Moduvel\Core\Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_see_login_page()
    {
        $this->withoutExceptionHandling();

        $this->get(route('en.backend.login'))
            ->assertSee('Login')
            ->assertSee('</button>')
            ->assertSee('</form>');
    }

    public function test_it_can_see_login_page_in_another_locale()
    {
        $this->withoutExceptionHandling();

        config()->set('moduvel-locales.supportedLocales.bn', [
            'name' => 'Bengali','script' => 'Beng', 'native' => 'বাংলা', 'direction' => 'ltr', 'regional' => 'bn_BD',
        ]);

        $this->get(route('bn.backend.login'))
            ->assertSee('লগইন');
    }

    public function test_invalid_login_will_show_error_message()
    {
        $this->withHeaders([
                'HTTP_REFERER' => route('en.backend.login'),
            ])
            ->followingRedirects()
            ->post(route('en.backend.login'))
            ->assertSee('Invalid Credentials');

        $this->withHeaders([
                'HTTP_REFERER' => route('en.backend.login'),
            ])
            ->followingRedirects()
            ->post(route('en.backend.login'), [
                'email' => 'invalid',
                'password' => 'invalid',
            ])
            ->assertSee('Invalid Credentials');
    }

    public function test_valid_login_will_redirect_to_dashboard()
    {
        factory(BackendUser::class)->create([
            'email' => 'admin@mail.com',
            'password' => Hash::make('123456'),
        ]);

        $this->withHeaders([
                'HTTP_REFERER' => route('en.backend.login'),
            ])
            ->followingRedirects()
            ->post(route('en.backend.login'), [
                'email' => 'admin@mail.com',
                'password' => '123456',
            ])
            ->assertSee('Dashboard');
    }
}