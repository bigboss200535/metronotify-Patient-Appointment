<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Magazine Clinic | About Us</title>
      @include('includes.in_favicon') 
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
                    <a href="{{ url('/') }}" class="nav-item nav-link ">Home</a>
                    <a href="{{ url('/about') }}" class="nav-item nav-link active">About Us</a>
                  <div class="nav-item dropdown">
                        <a href="{{ url('/services') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown active">Our Services</a>
                        <div class="dropdown-menu m-0">
                             @include('includes.in_service_list') 
                        </div>
                    </div>
                    <!-- <a href="blogpost.php" class="nav-item nav-link">Blog</a> -->
                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact Us</a>
                    <!-- <a href="{{ url('/appointments') }}" class="nav-item nav-link">Appointment</a> -->
                    <a href="{{ url('/selfservice/portal') }}" class="nav-item nav-link">Portal <sup style="color:red">New</sup></a>
                </div>
                <button type="button" class="btn text-white ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
                <a href="{{ url('/appointments') }}" class="btn metro-fill metro-text py-2 px-4 ms-3">Book Appointment</a>
            </div>
        </nav>

        <div class="container-fluid metro-fill py-5 bg-header page-header"  style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">About Us</h1>
                    <a href="{{ url('/') }}" class="h5 text-white">Home</a>
                    <i class="far fa-hospital text-white px-2"></i>
                    <a href="{{ url('/about') }}" class="h5 text-white">About</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Full Screen Search Start -->
     @include('includes.in_search') 
    <!-- Full Screen Search End -->

    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold magazine-main-text text-uppercase">About Us</h5>
                        <h1 class="mb-0">The best health solution</h1>
                    </div>
                        <p class="mb-4">At @include('includes.in_facility'), we are dedicated to providing exceptional, professional healthcare services with a personal touch. Our mission is to deliver world-class medical care right here in Ghana, combining international standards with deep-rooted compassion for our patients.

                        We believe that visiting a clinic shouldn't be stressful. That's why we’ve created a warm, welcoming environment designed to put both young and adult patients at ease. From the moment you walk through our doors, your comfort, care, and well-being are our top priorities.

                        Discover the difference at Magazine Clinic, where quality treatment meets genuine care.

                        
                        </p>
                        <p>Our Mission is to transform the lives of patients by surpassing expectations in healthcare, inspiring hope for a better Ghana.

                        Our vision is to be Ghana's most trusted name in healthcare.
                        </p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check light-color me-3"></i>Skilled Professionals Staff</h5>
                            <h5 class="mb-3"><i class="fa fa-check light-color me-3"></i>Expert Solutions</h5>
                           
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check light-color me-3"></i>Round-the-clock Support</h5>
                            <h5 class="mb-3"><i class="fa fa-check light-color me-3"></i>State-of-the-Art Facilities</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="metro-fill d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="light-color mb-0">@include('includes.in_telephone')</h4>
                        </div>
                    </div>
                    <!-- <a href="{{ url('/contact') }}" class="btn metro-fill text-white py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Get In Touch</a> -->
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{ asset('img/about2.jpg') }}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

 <!-- Features Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold magazine-main-text text-uppercase">Our Guiding Principles</h5>
                <h1 class="mb-0">We are here to serve our patients </h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                            <div class="metro-fill rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-heart text-white"></i>
                            </div>
                            <h4>Compassionate Care</h4>
                            <p class="mb-0">We treat every patient with compassion, understanding, and kindness; recognizing the unique needs, emotions, and experiences of each individual.</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.8s">
                            <div class="metro-fill rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-award text-white"></i>
                            </div>
                            <h4>Dignity & Respect</h4>
                            <p class="mb-0">We value the dignity, rights, and beliefs of every patient and staff member, fostering a supportive and inclusive environment for all.</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="{{ asset('img/feature.jpg') }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                            <div class="metro-fill rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-child text-white"></i>
                            </div>
                            <h4>Privacy & Trust</h4>
                            <p class="mb-0">We protect every patient’s privacy with the highest level of discretion and professionalism. Your personal information and medical history are always handled with the utmost care and security.</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                            <div class="metro-fill rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-handshake text-white"></i>
                            </div>
                            <h4>Clinical Excellence</h4>
                            <p class="mb-0">We are committed to delivering exceptional healthcare through continuous improvement, advanced medical practices, and a dedicated team of professionals focused on quality outcomes.</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Features Start -->

    <!-- Team Start -->
    @include('includes.in_team') 
    <!-- Team End -->

    <!-- faq start -->
      @include('includes.in_faq') 
    <!-- faq End -->
    
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
    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>