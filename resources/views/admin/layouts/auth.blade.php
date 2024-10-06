<!DOCTYPE html>
<html lang="en">

<head>
    <title>Spinet - {{ $title }}</title>


    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Spinet Web">
    <meta name="author" content="Spinet">
    <link rel="icon" href="{{ URL::asset('assets/img/logo-large.png') }}" type="image/x-icon">


    <!-- FontAwesome JS-->
    <script defer src="{{ URL::asset('admin/assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ URL::asset('admin/assets/css/portal.css') }}">

</head>

@yield('content')

</html>
