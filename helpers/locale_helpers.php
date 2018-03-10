<?php

use Moduvel\Core\Exceptions\UnsupportedLocaleException;

function locale($locale = null)
{
    if (empty($locale)) {
        return app()->getLocale();
    }

    if ( ! in_array($locale, locales())) {
        throw new UnsupportedLocaleException("The locale value '{$locale}' is not supported in this app.");
    }

    return app()->setLocale($locale);
}

function locale_info($locale = null)
{
    if (empty($locale)) {
        $locale = locale();
    }

    if ( ! in_array($locale, locales())) {
        throw new UnsupportedLocaleException("The locale value '{$locale}' is not supported in this app.");
    }

    return config('moduvel-locales.supportedLocales')[$locale];
}

function locales()
{
    return array_keys(config('moduvel-locales.supportedLocales'));
}

function locales_info()
{
    return config('moduvel-locales.supportedLocales');
}

function locale_route($name, $parameters = [], $locale = null)
{
    if (empty($locale)) {
        $locale = locale();
    }

    if ( ! in_array($locale, locales())) {
        throw new UnsupportedLocaleException("The locale value '{$locale}' is not supported in this app.");
    }

    $parameters['locale'] = $locale;

    return route($name, $parameters, true);
}

function localize_current_route($locale)
{
    $name = \Route::currentRouteName();
    $parameters = request()->route()->parameters();

    return locale_route($name, $parameters, $locale);
}

function locale_route_redirect($name, $parameters = [], $locale = null)
{
    return \Redirect::to(locale_route($name, $parameters, $locale));
}
