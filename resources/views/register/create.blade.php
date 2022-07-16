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
                        <h4 class="mb-0 redial-font-weight-400">Register</h4>
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
                        <form action="{{route('register.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name" name="name"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="E-Mail" name="email"/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="password" name="password"/>
                            </div>
                            <button
                                type="submit" class="btn btn-warning btn-md redial-rounded-circle-50 btn-block">
                                Register
                            </button>
                        </form>
                        <a href="{{route('login')}}" class="btn btn-xs btn-outline-primary mt-2" style="width: 100%;">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End main-content-->

<!-- jQuery -->
<script src="{{asset('template/admin/js/plugins.min.js')}}"></script>
<script src="{{asset('template/admin/js/common.min.js')}}"></script>
@include('layouts.toastr')
</body>

</html>

