<!DOCTYPE html>
<html>
<head>
    <title>Moduvel Backend</title>
</head>
<body>

    <h1>Site Name</h1>

    <div class="container">

        @yield('contents')

    </div>

    <footer>
        <ul>
            @foreach (locales_info() as $locale_key => $locale)
            <li>
                <a href="{{ locale_current_route($locale_key) }}">{{ $locale['native'] }}</a>
            </li>
            @endforeach
        </ul>
    </footer>

</body>
</html>