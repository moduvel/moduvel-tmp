<?php

function locale()
{
    return app()->getLocale();
}

function locale_info()
{
    return config('moduvel-locales.supportedLocales')[locale()];
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
    if ($locale == null) {
        $locale = locale();
    }

    return route($locale.'.'.$name, $parameters, true);
}

function locale_direction($locale = null)
{
    if ($locale == null) {
        $locale = locale();
    }

    $locales = config('moduvel-locales.supportedLocales');

    return $locales[$locale]['direction'];
}

function localize_current_route($locale)
{
    $name = substr(\Route::currentRouteName(), 3);
    $parameters = request()->route()->parameters();

    return locale_route($name, $parameters, $locale);
}