<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link href="{{asset('css/app.css')}}" rel="stylesheet"> --}}
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        <title>{{config('app.name','BlogWeb')}}</title>

    </head>
    <body>
        @include('nav.navbar')
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
