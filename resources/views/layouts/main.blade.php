<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    <link rel="icon" href="dist/images/favicon.ico"/>
    <!--Plugin CSS-->
    <link href="{{asset('template/admin/css/plugins.min.css')}}" rel="stylesheet">

    <!--main Css-->
    <link href="{{asset('template/admin/css/main.min.css')}}" rel="stylesheet">
</head>
<body>
<!-- header-->
<div id="header-fix" class="header py-4 py-lg-2 fixed-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-3 col-xl-2 align-self-center">
                <div class="site-logo">
                    <a href="/"><img width="150px" src="{{asset('template/admin/images/logo.png')}}" alt=""
                                     class="img-fluid"/></a>
                </div>
                <div class="navbar-header">

                </div>
            </div>
            <div class="col-12 col-lg-3 align-self-center d-none d-lg-inline-block">
                <form>

                </form>
            </div>
            <div class="col-12 col-lg-6 col-xl-7 d-none d-lg-inline-block">
                <nav class="navbar navbar-expand-lg p-0">
                    <ul class="navbar-nav notification ml-auto d-inline-flex">
                        <li class="nav-item dropdown user-profile align-self-center">
                            <a class="nav-link" data-toggle="dropdown" aria-expanded="false">
                                <span class="float-right pl-3 text-white"><i class="fa fa-angle-down"></i></span>
                                <div class="media">
                                    <img src="{{asset('template/admin/images/user_logo.png')}}" alt=""
                                         class="d-flex mr-3 img-fluid redial-rounded-circle-50" width="45"/>
                                    <div class="media-body align-self-center">
                                        <p class="mb-2 text-white text-uppercase font-weight-bold">{{auth()->user()->name}}</p>
                                        <small class="redial-primary-light font-weight-bold text-white">{{auth()->user()->email}} </small>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu border-bottom-0 rounded-0 py-0">

                                <li>
                                    <form id="logout_form" method="post" action="{{route('logout')}}">
                                        @csrf
                                        <button type="submit" class="dropdown-item py-2"><i
                                                class="fa fa-sign-out pr-2"></i>
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End header-->

<!-- Main-content Top bar-->
<div class="redial-relative mt-80">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-2 align-self-center my-3 my-lg-0">
                <h6 class="text-uppercase redial-font-weight-700 redial-light mb-0 pl-2"></h6>
            </div>
            <div class="col-12 col-md-6">
                <div class="clearfix d-none d-md-inline">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main-content Top bar-->

<!-- main-content-->
<div class="wrapper">
{{--    @include('layouts.sidebar')--}}
    <div id="content">
        @if(session()->has('exception-helper'))
            <div class="alert alert-danger alert-dismissible fade show" style="font-size: 20px" role="alert">
                <ul>
                    @foreach(session()->pull('exception-helper') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="">
            @yield('content')
        </div>
    </div>
</div>
<!-- End main-content-->

<!-- Top To Bottom-->
<a href="#" class="scrollup text-center redial-bg-red redial-rounded-circle-50 ">
    <h4 class="text-white mb-0"><i class="icofont icofont-long-arrow-up"></i></h4>
</a>
<!-- End Top To Bottom-->


<!-- jQuery -->
<script src="{{asset('template/admin/js/plugins.min.js')}}"></script>

<script src="{{asset('template/admin/js/common.js')}}"></script>
@include('layouts.toastr')
@yield('scripts')
</body>

</html>
