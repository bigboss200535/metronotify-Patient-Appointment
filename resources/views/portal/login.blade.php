<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Magazine Clinic - Portal Login</title>
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('portal/vendors/images/apple-touch-icon.png') }}"> -->
    <!-- <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('portal/vendors/images/favicon-32x32.png') }}"> -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('portal/vendors/images/favicon-16x16.png') }}"> -->
    @include('includes.in_favicon') 
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/vendors/styles/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/vendors/styles/style.css') }}">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-119386393-1');
    </script>
</head>
<body class="login-page">
    <!-- <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="{{ asset('portal/vendors/images/deskapp-logo.svg') }}" alt="">
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="register.html">Register</a></li>
                </ul>
            </div>
        </div>
    </div> -->
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{ asset('portal/vendors/images/login.svg') }}" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary" style="text-shadow: 10px;">Login to your session</h2>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                                @csrf
                            <!-- <div class="select-role"> 
                                 <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn active">
                                        <input type="radio" name="options" id="admin">
                                        <div class="icon"><img src="{{ asset('portal/vendors/images/briefcase.svg') }}" class="svg" alt=""></div>
                                        <span>I'm</span>
                                        Manager
                                    </label>
                                    <label class="btn">
                                        <input type="radio" name="options" id="user">
                                        <div class="icon"><img src="{{ asset('portal/vendors/images/person.svg') }}" class="svg" alt=""></div>
                                        <span>I'm</span>
                                        Employee
                                    </label>
                                </div>
                            </div> -->
                             <x-input-error :messages="$errors->get('email')" class="mt-2" style="color:red"/>
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" name="email" :value="old('email')" required autofocus placeholder="Username">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                                 <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" style="color:red"/> -->
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" name="password" required placeholder="**********">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                                 <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <!-- <div class="row pb-30"> -->
                                <!-- <div class="col-6"> -->
                                    <!-- <div class="custom-control custom-checkbox"> -->
                                        <!-- <input type="checkbox" class="custom-control-input" id="customCheck1"> -->
                                        <!-- <label class="custom-control-label" for="customCheck1">Remember</label> -->
                                    <!-- </div> -->
                                <!-- </div> -->
                                <!-- <div class="col-6">
                                    <div class="forgot-password"><a href="{{ url('/selfservice/forgot-password') }}">Forgot Password</a></div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">Or</div>
                                    <div class="col-12" align="center">
                                        <div align="center"><a href="{{ url('/')}}">Back to Website</a></div>
                                    </div>
                                    <!-- <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block " href="{{ url('/')}}">Back to Website</a>
                                    </div> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('portal/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('portal/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('portal/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('portal/vendors/scripts/layout-settings.js') }}"></script>
</body>
</html>