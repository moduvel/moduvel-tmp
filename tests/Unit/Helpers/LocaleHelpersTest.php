<?php

namespace Moduvel\Core\Tests\Unit\Helpers;

use Moduvel\Core\Exceptions\UnsupportedLocaleException;
use Moduvel\Core\Tests\TestCase;

class LocaleHelpersTest extends TestCase
{
    public function test_it_cannot_set_unsupported_locale()
    {
        $this->expectException(UnsupportedLocaleException::class);
        locale('de');
    }

    public function test_it_can_set_n_get_supported_locale()
    {
        locale('bn');
        $this->assertEquals('bn', locale());

        locale('es');
        $this->assertEquals('es', locale());

        locale('en');
        $this->assertEquals('en', locale());
    }

    public function test_it_cannot_get_unsupported_locale_config_info()
    {
        $this->expectException(UnsupportedLocaleException::class);
        locale_info('de');
    }

    public function test_it_can_get_a_locale_config_info()
    {
        locale('en');
        $info = locale_info();
        $this->assertEquals(config('moduvel-locales.supportedLocales.en'), $info);

        $info = locale_info('bn');
        $this->assertEquals(config('moduvel-locales.supportedLocales.bn'), $info);
    }

    public function test_it_can_get_supported_locales_list()
    {
        $this->assertEquals(['en','es','bn'], locales());
    }

    public function test_it_can_all_supported_locales_config_info()
    {
        $this->assertEquals($this->locales_config, locales_info());
    }

    public function test_it_can_localize_route()
    {
        locale('en');
        $this->assertEquals('http://localhost/en/backend', locale_route('backend.login'));

        locale('bn');
        $this->assertEquals('http://localhost/bn/backend', locale_route('backend.login'));
    }

    public function test_it_can_localize_current_route()
    {
        $this->get(locale_route('backend.login'));
        $this->assertEquals('http://localhost/en/backend', \URL::current());

        $this->assertEquals('http://localhost/bn/backend', localize_current_route('bn'));
    }

    public function test_it_can_redirect_to_locale_route()
    {
        $route = locale_route_redirect('backend.dashboard');

        $this->assertEquals(locale_route('backend.dashboard'), $route->getTargetUrl());
    }
}