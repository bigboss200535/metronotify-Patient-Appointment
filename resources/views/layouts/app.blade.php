<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
         @include('includes.in_favicon') 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('portal/vendors/styles/core.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('portal/vendors/styles/icon-font.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('portal/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('portal/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('portal/vendors/styles/style.css') }}">
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-119386393-1');
        </script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
            @include('layouts.loader')
            @include('layouts.topbar')
            @include('layouts.layoutsetting')
            @include('layouts.sidebar')
            <main>
                {{ $slot }}
            </main>
    <script src="{{ asset('portal/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('portal/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('portal/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('portal/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('portal/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('portal/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('portal/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('portal/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('portal/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('portal/vendors/scripts/dashboard3.js') }}"></script>
    

 </body>
</html>
