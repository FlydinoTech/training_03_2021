<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('APP_NAME')}}</title>

    <link rel="stylesheet" href="{{asset('/library/bootstrap/dist/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/library/font-awesome/css/font-awesome.min.css')}}" />

    <style>
    body {
        background: #f9f9f9 !important;
    }

    nav a {
        color: #ffffff !important;
    }

    .container {
        background: #ffffff;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    </style>
</head>

<body>
    <!--header-->

    @include('layouts.user.inc.header')


    @yield('content')

    @include('layouts.user.inc.footer')

    <script src="{{asset('/library/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('/library/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    @yield('script')
</body>

</html>