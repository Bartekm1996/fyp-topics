<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Argon Dashboard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">

        <style>
            /* Timeline */
            .timeline,
            .timeline-horizontal {
                list-style: none;
                padding: 20px;
                position: relative;
            }
            .timeline:before {
                top: 40px;
                bottom: 0;
                position: absolute;
                content: " ";
                width: 3px;
                background-color: #eeeeee;
                left: 50%;
                margin-left: -1.5px;
            }
            .timeline .timeline-item {
                margin-bottom: 20px;
                position: relative;
            }
            .timeline .timeline-item:before,
            .timeline .timeline-item:after {
                content: "";
                display: table;
            }
            .timeline .timeline-item:after {
                clear: both;
            }
            .timeline .timeline-item .timeline-badge {
                color: #fff;
                width: 54px;
                height: 54px;
                line-height: 52px;
                font-size: 22px;
                text-align: center;
                position: absolute;
                top: 18px;
                left: 50%;
                margin-left: -25px;
                background-color: #7c7c7c;
                border: 3px solid #ffffff;
                z-index: 100;
                border-top-right-radius: 50%;
                border-top-left-radius: 50%;
                border-bottom-right-radius: 50%;
                border-bottom-left-radius: 50%;
            }
            .timeline .timeline-item .timeline-badge i,
            .timeline .timeline-item .timeline-badge .fa,
            .timeline .timeline-item .timeline-badge .glyphicon {
                top: 2px;
                left: 0px;
            }
            .timeline .timeline-item .timeline-badge.primary {
                background-color: #1f9eba;
            }
            .timeline .timeline-item .timeline-badge.info {
                background-color: #5bc0de;
            }
            .timeline .timeline-item .timeline-badge.success {
                background-color: #59ba1f;
            }
            .timeline .timeline-item .timeline-badge.warning {
                background-color: #d1bd10;
            }
            .timeline .timeline-item .timeline-badge.danger {
                background-color: #ba1f1f;
            }
            .timeline .timeline-item .timeline-panel {
                position: relative;
                width: 46%;
                float: left;
                right: 16px;
                border: 1px solid #c0c0c0;
                background: #ffffff;
                border-radius: 2px;
                padding: 20px;
                -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
                box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            }
            .timeline .timeline-item .timeline-panel:before {
                position: absolute;
                top: 26px;
                right: -16px;
                display: inline-block;
                border-top: 16px solid transparent;
                border-left: 16px solid #c0c0c0;
                border-right: 0 solid #c0c0c0;
                border-bottom: 16px solid transparent;
                content: " ";
            }
            .timeline .timeline-item .timeline-panel .timeline-title {
                margin-top: 0;
                color: inherit;
            }
            .timeline .timeline-item .timeline-panel .timeline-body > p,
            .timeline .timeline-item .timeline-panel .timeline-body > ul {
                margin-bottom: 0;
            }
            .timeline .timeline-item .timeline-panel .timeline-body > p + p {
                margin-top: 5px;
            }
            .timeline .timeline-item:last-child:nth-child(even) {
                float: right;
            }
            .timeline .timeline-item:nth-child(even) .timeline-panel {
                float: right;
                left: 16px;
            }
            .timeline .timeline-item:nth-child(even) .timeline-panel:before {
                border-left-width: 0;
                border-right-width: 14px;
                left: -14px;
                right: auto;
            }
            .timeline-horizontal {
                list-style: none;
                position: relative;
                padding: 20px 0px 20px 0px;
                display: inline-block;
            }
            .timeline-horizontal:before {
                height: 3px;
                top: auto;
                bottom: 26px;
                left: 56px;
                right: 0;
                width: 90%;
                margin-bottom: 20px;
            }
            .timeline-horizontal .timeline-item {
                display: table-cell;
                height: 280px;
                width: 20%;
                min-width: 150px;
                float: none !important;
                padding-left: 0px;
                padding-right: 20px;
                margin: 0 auto;
                vertical-align: bottom;
            }
            .timeline-horizontal .timeline-item .timeline-panel {
                top: auto;
                bottom: 64px;
                display: inline-block;
                float: none !important;
                left: 0 !important;
                right: 0 !important;
                width: 100%;
                margin-bottom: 20px;
            }
            .timeline-horizontal .timeline-item .timeline-panel:before {
                top: auto;
                bottom: -16px;
                left: 28px !important;
                right: auto;
                border-right: 16px solid transparent !important;
                border-top: 16px solid #c0c0c0 !important;
                border-bottom: 0 solid #c0c0c0 !important;
                border-left: 16px solid transparent !important;
            }
            .timeline-horizontal .timeline-item:before,
            .timeline-horizontal .timeline-item:after {
                display: none;
            }
            .timeline-horizontal .timeline-item .timeline-badge {
                top: auto;
                bottom: 0px;
                left: 43px;
            }

        </style>
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth

        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        @stack('js')

        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
    </body>
</html>
