<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>

    <!--Plugin CSS-->
    <link href="{{asset('template/admin/css/plugins.min.css')}}" rel="stylesheet">

    <!--main Css-->
    <link href="{{asset('template/admin/css/main.min.css')}}" rel="stylesheet">

</head>
<body>

<!-- main-content-->
<div class="wrapper">
    <div class="w-100">
        <div class="row d-flex justify-content-center  pt-5 mt-5">
            <div class="col-12 col-xl-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="mb-0 redial-font-weight-400">Please Sign In</h4>
                    </div>
                    <div class="col-md-12">
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first()}}
                            </div>
                        @endif
                    </div>
                    <div class="redial-divider"></div>
                    <div class="card-body py-4 text-center">
                        <form action="{{route('login')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="E-Mail" name="email"/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="password" name="password"/>
                            </div>
                            <div class="form-group text-left">
                                <input type="checkbox" id="checkbox11">
                                <label for="checkbox11">Remember Me</label>
                            </div>
                            <div class="col-md-6">
                                <button
                                    type="submit" class="btn btn-primary btn-md redial-rounded-circle-50 btn-block">
                                    Login
                                </button>
                            </div>
                            <div class="col-md-6">
                                <a
                                    href="{{route('register.create')}}"
                                    class="btn btn-outline-warning btn-md redial-rounded-circle-50 btn-block">Register
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End main-content-->

<!-- jQuery -->
<script src="{{asset('template/admin/js/plugins.min.js')}}"></script>
<script src="{{asset('template/admin/js/common.js')}}"></script>
@include('layouts.toastr')
</body>

</html>
