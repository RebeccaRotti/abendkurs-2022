<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Style -->
        <link rel="stylesheet" href="{{url('/bootstrap.css')}}">

    </head>
    <body class="font-sans text-gray-900 antialiased">
    @include('layouts.navigation')
        <main class="container-fluid">
            <div>
                <a href="/">
                    {{--<x-application-logo class="img-fluid" />--}}
                </a>
            </div>

            <div class="p-3">
                {{ $slot }}
            </div>
        </main>
        <script src="{{url('bootstrap.js') }}"></script>

    </body>
</html>
