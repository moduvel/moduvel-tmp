<?php

namespace Moduvel\Core\Tests\Feature\Core;

use Moduvel\Core\Tests\TestCase;

class LocaleTest extends TestCase
{
    public function test_it_can_see_login_page_in_default_locale()
    {
        $this->withoutExceptionHandling();

        $this->get(locale_route('backend.login'))
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

        $this->get(locale_route('backend.login', [], 'bn'))
            ->assertSee('লগইন');
    }
}