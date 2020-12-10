<html lang="en">
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
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard-laravel"/>
    <link rel="stylesheet" type="text/css" href="resources/css/support.css">
    <link rel="stylesheet" type="text/css" href="resources/css/util.css">
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
    <link rel="stylesheet" type="text/css" href="resources/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resources/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="resources/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="resources/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="resources/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="resources/vendor/daterangepicker/daterangepicker.css">
    <! -- Sweet Alers -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <!--  Social tags      -->
    <meta name="keywords"
          content="dashboard, bootstrap 4 dashboard, bootstrap 4 design, bootstrap 4 system, bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, argon, argon ui kit, creative tim, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit, argon dashboard">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim">
    <meta itemprop="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta itemprop="image"
          content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim">
    <meta name="twitter:description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image"
          content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="https://demos.creative-tim.com/argon-dashboard/index.html"/>
    <meta property="og:image"
          content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg"/>
    <meta property="og:description" content="Start your development with a Dashboard for Bootstrap 4."/>
    <meta property="og:site_name" content="Creative Tim"/>

    <script>
        function hiddeSupport() {
            $('#contact_form').attr('hidden', true);
            $('#txtMsg').val("");
            $('#topic').val("");
        }

        function showSupport(to_id, from_id) {
            $('#contact_form').attr('hidden', false);
            $('#contact_form').data('data-to', to_id);
        }

        function sendMessage(user_id) {
            jQuery.ajax({
                type: "POST",
                url: 'message/create',
                dataType: 'json',
                data: {'to': $('#contact_form').data('data-to'), 'from':  user_id, 'message': $('#txtMsg').val(), 'topic': $('#topic').val(), "_token": "{{ csrf_token() }}",},
                    error : function (response) {
                        $('#contact_form').attr('hidden', true);
                        $('#txtMsg').val("");
                        $('#topic').val("");
                        Swal.fire({
                            icon: 'success',
                            title: 'Message Sent',
                            text: 'Message has been sent',
                        })
                    },
                });

        }
    </script>
</head>
<body class="clickup-chrome-ext_installed">

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/ul.png" class="navbar-brand-img" alt="..." width="350">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                            </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Settings</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>Activity</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>Support</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/ul.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            @include('layouts.navbars.sidebar')
        </div>
    </div>
</nav>
<div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
               href="{{ route('home') }}">Dashboard</a>
            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                    </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                           <span class="mb-0 text-sm  font-weight-bold">
                            @if (auth()->user()->role == 0)
                                   {{ auth()->user()->name }}, Student
                               @elseif (auth()->user()->role == 1)
                                   {{ auth()->user()->name }}, Supervisor
                               @else
                                   {{ auth()->user()->name }}, Admin
                               @endif
                            </span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>Settings</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Activity</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>Support</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Users</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ count($users)  }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Students</h5>
                                        <span
                                            class="h2 font-weight-bold mb-0">{{ count($users->where('role', 0)) }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="far fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Supervisors</h5>
                                        <span
                                            class="h2 font-weight-bold mb-0">{{ count($users->where('role', 1)) }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Administrators</h5>
                                        <span
                                            class="h2 font-weight-bold mb-0">{{ count($users->where('role', 2)) }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-user-shield"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Users</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <input id="search" class="form-control" type="text" placeholder="Search..." oninput="filterUsers(this)">

                    </div>

                    <div class="table-responsive">
                        <table class="tablealt">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody id="usersTable">
                            <tr>
                            @php($pos = 0)
                            @foreach ($users as $user)
                                @if($pos % 4 == 0)
                                    <tr id="{{$user->id}}">
                                        @endif
                                        <td id="uid_{{$user->id}}">
                                            <div class="card" style="width: 18rem;">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        @switch($user->role)
                                                            @case(0)
                                                            <i class="fa fa-user"></i>
                                                            @break
                                                            @case(1)
                                                            <i class="fa fa-user-graduate"></i>
                                                            @break
                                                            @case(2)
                                                            <i class="fa fa-user-shield"></i>
                                                            @break
                                                        @endswitch
                                                        {{$user->name}}
                                                    </h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">
                                                        @switch($user->role)
                                                            @case(0)
                                                            Student
                                                            @break
                                                            @case(1)
                                                            Supervisor
                                                            @break
                                                            @case(2)
                                                            Administrator
                                                            @break
                                                        @endswitch
                                                    </h6>
                                                    @if($user->role == 0)
                                                        <h6 class="card-subtitle mb-2 text-muted">
                                                            QCA: {{$profiles->where('user_id', $user->id)->first()->qca}}
                                                        </h6>
                                                    @endif
                                                    <p class="card-text wrap"></p>
                                                    <button class="btn btn-outline-primary" onclick="showSupport('{{$user->id}}')"><i
                                                            class="fa fa-envelope"></i> Message
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        @if(++$pos % 4 == 0)
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div id="dropDownSelect1"></div>

                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="contact_form" class="container contact-form" style="position: absolute; top: 30%; left: 10%; background: #fff; border: 2px solid blue;border-radius: 20px;width: 60%;z-index: 99;" hidden>
        <button class="close-button" style="margin-top: 10px;" onclick="hiddeSupport()"><i class="fas fa-times"></i></button>
        <form method="post" >
            <h3></h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="txtUserName" class="form-control" placeholder="{{auth()->user()->name}}" disabled/>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email_support" placeholder="{{auth()->user()->email}}" disabled/>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="topic" placeholder="Enter Topic" required/>
                    </div>
                    <div class="form-group">
                        <input type="button" onclick="sendMessage('{{auth()->user()->id}}')" id="send_message" name="btnSubmit" class="btnContact" value="Send Message" required/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea id="txtMsg" class="form-control" placeholder="Enter your message" style="width: 100%; height: 150px; resize: none;" required></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>



    <div id="dropDownSelect1"></div>

</div>
<script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script>

    function filterUsers() {
        let search = $('#search').val();
        console.log(search);

        $('.tablealt tr').each(function (j) {
            let ele = $(this).text().split('\n');
            let id = $(this).attr('id');
            debugger;
            let hasMatch = false;

            for (let i = 0; i < ele.length; i++) {
                let txt = ele[i].trim();
                if (txt.length > 0) {
                    if (txt.indexOf(search) !== -1) {
                        hasMatch = true;
                        break;
                    }
                }
            }

            if (hasMatch) {
                $('#' + id).show();
            } else {
                $('#' + id).hide();
            }
        });
    }
</script>
<!-- Argon JS -->
<script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
</body>
</html>
