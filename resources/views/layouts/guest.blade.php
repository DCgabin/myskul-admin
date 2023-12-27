<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'MySkul') }} | {{ $pageTitle }}</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="/css/app.css">

        <link rel="stylesheet" href="/vendors/feather/feather.css">
        <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">

        <link rel="stylesheet" href="/css/vertical-layout-light/style.css">

        <link rel="shortcut icon" href="/assets/images/favicon.png" />
        <!-- Scripts -->
    </head>
    <body>
        <div class="container-scroller">
            {{ $slot }}
        </div>

        <script src="/vendors/js/vendor.bundle.base.js"></script>
        <!-- inject:js -->
        <script src="/js/off-canvas.js"></script>
        <script src="/js/hoverable-collapse.js"></script>
        <script src="/js/template.js"></script>
        <script src="/js/settings.js"></script>
        <script src="/js/todolist.js"></script>
    </body>


</html>
