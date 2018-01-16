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

function locale_route($route)
{
    return route(locale().'.'.$route);
}

function locale_direction($locale = null)
{
    if ($locale == null) {
        $locale = locale();
    }

    $locales = config('moduvel-locales.supportedLocales');

    return $locales[$locale]['direction'];
}

function locale_current_route($locale)
{
    return route($locale . substr(\Route::currentRouteName(), 2));
}