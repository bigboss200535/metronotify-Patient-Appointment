<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Magazine Clinic | Our Services</title>
    @include('includes.in_favicon') 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Spinner Start -->
       @include('includes.in_spinner') 
    <!-- Spinner End -->
    <!-- Topbar Start -->
        @include('includes.in_topbar') 
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="{{ url('/') }}" class="navbar-brand p-0">
               <h1 class="m-0"><img src="{{ asset('images/logo_1.png') }}" alt=""></i></h1>
            </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                    <a href="{{ url('/about') }}" class="nav-item nav-link">About Us</a>
                  <div class="nav-item dropdown">
                        <a href="{{ url('/services') }}" class="nav-link active dropdown-toggle" data-bs-toggle="dropdown active">Our Services</a>
                        <div class="dropdown-menu m-0">
                              @include('includes.in_service_list') 
                        </div>
                    </div>
                    <!-- <a href="blogpost.php" class="nav-item nav-link">Blog</a> -->
                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact Us</a>
                     <a href="{{ url('/appointments') }}" class=" nav-item nav-link">Appointment</a>
                    <a href="{{ url('/selfservice/portal') }}" class="nav-item nav-link">Portal <sup style="color:red">New</sup></a>
                </div>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 bg-header page-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Services</h1>
                   <a href="{{ url('/') }}" class="h5 text-white">Home</a>
                    <i class="far fa-hospital text-white px-2"></i>
                    <a href="{{ url('/services') }}" class="h5 text-white">Our Services</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Full Screen Search Start -->
   <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn metro-fill btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-metro p-3" placeholder="Type search keyword">
                        <button class="btn metro-fill px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->
        <!-- service Start -->
    @include('includes.in_service_sum') 
    <!-- service Start -->
    <!-- Vendor Start -->
    @include('includes.in_accredited') 
    <!-- Vendor End -->
     <!-- Footer Start -->
   @include('includes.in_footer') 
    <!-- Footer End -->
    <!-- Back to Top -->
    @include('includes.to_top') 
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>