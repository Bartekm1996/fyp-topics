<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid" style="background-color: whitesmoke">
        <!-- Toggler -->
        <div style="-webkit-writing-mode: vertical-lr;">
        <span class="navbar-toggler-icon"></span>
{{--        </button>--}}
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/ul.png" class="navbar-brand-img" alt="..." width="160rem"
                 height="190rem">
        </a>
        </div>
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
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main" style="background-color: whitesmoke">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
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
            <!-- Navigation -->
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        @if (auth()->user()->role == 0) <i class="ni ni-tv-2 text-primary"></i> {{ __('My Final Year Project') }}
                        @endif
                    </a>
                </li>
                @if (auth()->user()->role == 1 || auth()->user()->role == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.edit') }}">
                            {{ __('My profile') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button"
                           aria-expanded="true" aria-controls="navbar-examples">
                            <i class="fab fa-laravel" style="color: #f4645f;"></i>
                            <span class="nav-link-text" style="color: #f4645f;">{{ __('Management') }}</span>
                        </a>
                        @if (auth()->user()->role == 2)
                            <div class="collapse show" id="navbar-examples">
                                <div class="collapse show" id="navbar-examples">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.index') }}">
                                                {{ __('Admin Panel') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('logging') }}">
                                                {{ __('Log Messages') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('tickets') }}">
                                                {{ __('User Tickets') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @elseif (auth()->user()->role == 1)
                            <div class="collapse show" id="navbar-examples">
                                <div class="collapse show" id="navbar-examples">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.index') }}">
                                                {{ __('My Supervisees') }} </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('logging') }}">
                                                {{ __('Messages') }}
                                            </a>
                                        </li>
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link" href="{{ route('topics') }}">--}}
{{--                                                {{ __('My Topics') }}--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('requests') }}">
                                                {{ __('Topic Requests') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                            <i class="fa fa-user" style="color: #f4645f;"></i>
                            <span class="nav-link-text" style="color: #f4645f;">{{ __('User') }}</span>
                        </a>
                        @if (auth()->user()->role == 0)
                           <div class="collapse show" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('profile.edit') }}">
                                        {{ __('Profile') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">
                                        {{ __('Messages') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('progress') }}">
                                        {{ __('My Progress') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('requests') }}">
                                        {{ __('My Requests') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('tickets') }}">
                                        {{ __('My Tickets') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @endif
                    </li>
                @endif
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('topics') }}">
                        <i class="fa fa-book-reader"></i> {{ __('Final Year Topics') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
