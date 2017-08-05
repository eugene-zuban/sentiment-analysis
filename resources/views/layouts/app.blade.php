<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Natural Language Processing: Sentiment Analysis.</title>

        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link rel="icon" type="image/png" href="favicon.png">
    </head>

    <body>
        <div id="app">
            @include('layouts.nav')

            <div class="container">
                @yield('content')

                <hr>
                @include('footer')
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
