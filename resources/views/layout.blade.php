<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
        <meta charset="utf-8" />
        <title>Admin Projects</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="favicon.ico">


        @yield('css')
        <!-- App css -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/bootstrapValidator.css') }}">
        <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

        <!-- PNotify -->
        <link href="{{ asset('plugins/pnotify/pnotify.custom.min.css') }}" rel="stylesheet">

        <script src="{{ asset('js/modernizr.min.js') }}"></script>

    </head>


    <body>


        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <!--<a href="index.html" class="logo">-->
                        <!--UBold-->
                        <!--</a>-->
                        <!-- Image Logo -->
                        <a href="index-2.html" class="logo">
                            <img src="{{ asset('img/logo_dark.png') }}" alt="" height="20" class="logo-lg">
                            {{--<img src="{{ asset('img/logo_sm.png') }}" alt="" height="24" class="logo-sm">--}}
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="list-inline float-right mb-0">

                            <li class="menu-item list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="img/default-user.png"
                                    alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview" style="width:280px;text-align: center;">

                                    <img src="img/default-user.png"
                                    style="z-index:5;
                                    height: 90px;width: 90px;
                                    border: 2px solid;border-radius: 50%;">
                                    <p style="font-size: 17px;">
                                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                        <br>
                                        <small>Member since: {{ Auth::user()->created_at->format('d-m-Y') }}
                                        </small>
                                    </p>
                                     <a href="#"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="dropdown-item notify-item btn btn-default"
                                        style="width:267px;margin:0px 5px;">
                                        <i class="zmdi zmdi-power"></i> <span>Logout</span>
                                    </a>
                                    <form id="logout-form"
                                    action="{{ route('app.logout') }}"
                                    method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper" style="padding-top: 75px;">
            <div class="container-fluid">

                <!-- Page-Title -->
                <!-- end page title end breadcrumb -->
                <div class="row">
                    @yield('container')
                </div>
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        App Project
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


        <!-- jQuery  -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script><!-- Popper for Bootstrap -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!--Bootstrap-->
        <script src="{{ asset('plugins/validator/bootstrapValidator.min.js') }}"></script>
        <script src="{{ asset('js/waves.js') }}"></script>
        <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>

        <!--serialize-->
        <script src="{{ asset('js/jquery.serializeObject.min.js') }}"></script>

        <script src="{{asset('plugins/pnotify/pnotify.custom.min.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('js/jquery.core.js') }}"></script>
        <script src="{{ asset('js/jquery.app.js') }}"></script>
        <script type="text/javascript">
           $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <script src="{{ asset('js/index.js') }}"></script>

        @yield('scripts')
    </body>

</html>
