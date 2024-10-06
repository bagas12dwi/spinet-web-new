<!doctype html>
<html lang="en">

<head>
    <title>Spinet - {{ $title }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ URL::asset('assets/img/logo-large.png') }}" type="image/x-icon">


    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
    @stack('style')
</head>

<body>
    <header>
        @include('users.components.navbar')
    </header>
    <main>
        @yield('konten')
    </main>
    @include('users.components.footer')
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    @stack('script')
</body>

</html>
