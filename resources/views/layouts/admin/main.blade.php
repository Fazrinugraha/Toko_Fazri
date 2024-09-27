<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/modules/fontawesome/css/all.min.css') }}">
    
    <!-- CSS Libraries -->
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/css/components.css') }}">
    
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-94034622-3');
    </script>

    <title>@yield('title')</title>
</head>
<body>
    @include('sweetalert::alert')
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layouts.admin.navbar')
            @include('layouts.admin.sidebar')
            @yield('content')
            @include('layouts.admin.footer')
        </div>
    </div>
    @include('layouts.admin.script')
</body>
</html>
