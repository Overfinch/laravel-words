<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="{{\Illuminate\Support\Facades\Vite::asset('resources/images/favicon/favicon.ico')}}">
    <link rel="apple-touch-icon" type="image/png" href="{{\Illuminate\Support\Facades\Vite::asset('resources/images/favicon/apple-touch-icon.png')}}">
    <meta name="_token" content="{{csrf_token()}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#007bff">
</head>
