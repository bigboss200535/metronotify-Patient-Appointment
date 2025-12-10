<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazine Clinic, Kumasi | Clinic & Medical Services, Pine Avenue</title>
    @include('includes.in_favicon') 
</head>
<body>
    <!-- Spinner Start -->
     @include('includes.in_spinner') 
    <!-- Spinner End -->
    <!-- Topbar Start -->
     @include('includes.in_topbar') 
    <!-- Topbar End -->
    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0" >
        <!-- <div id="snow-container" title="Click anywhere to remove snow"></div> -->
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="{{ url('/') }}" class="navbar-brand p-0">
               <h1 class="m-0"><img src="{{ asset('img/logo_1.png') }}" alt="Magazine Clinic Logo"></i></h1>
            </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ url('/about') }}" class=" nav-item nav-link">About Us</a>
                  <div class="nav-item dropdown">
                        <a href="{{ url('/services') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown active">Our Services</a>
                        <div class="dropdown-menu m-0">
                            @include('includes.in_service_list') 
                        </div>
                    </div>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact Us</a>
                     <!-- <a href="{{ url('/selfservice/portal') }}" class="nav-item nav-link">Portal <sup style="color:red">New</sup></a> -->
                </div>
                <button type="button" class="btn text-white ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
                <a href="{{ url('/appointments') }}" class="btn metro-fill metro-text py-2 px-4 ms-3">Book Appointment</a>
            </div>
        </nav>
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('img/carousel-1.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-lowercase mb-3 animated slideInDown"></h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Trusted by families for Generations</h1>
                            <a href="" class="btn metro-fill metro-text py-md-3 px-md-5 me-3 animated slideInLeft">Get in touch</a>
                            <a href="{{ url('/contact') }}" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-lowercase mb-3 animated slideInDown"></h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">“Caring Hands, Experts Minds”</h1>
                            <a href="{{ url('/contact') }}" class="btn metro-fill metro-text py-md-3 px-md-5 me-3 animated slideInLeft">Get in touch</a>
                            <a href="{{ url('/contact') }}" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/carousel-3.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-lowercase mb-3 animated slideInDown"></h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">“Excellence in Healthcare, Every Step of the Way"</h1>
                            <a href="" class="btn metro-fill metro-text py-md-3 px-md-5 me-3 animated slideInLeft">Get in touch</a>
                            <a href="{{ url('/contact') }}" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/carousel-4.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-lowercase mb-3 animated slideInDown"></h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">“Innovative Medicine, Compassionate Touch”</h1>
                            <a href="" class="btn metro-fill metro-text py-md-3 px-md-5 me-3 animated slideInLeft">Get in touch</a>
                            <a href="{{ url('/contact') }}" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/carousel-5.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-lowercase mb-3 animated slideInDown"></h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">“Your Health, Our Priority”</h1>
                            <a href="" class="btn metro-fill metro-text py-md-3 px-md-5 me-3 animated slideInLeft">Get in touch</a>
                            <a href="{{ url('/contact') }}" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
                 <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/carousel-7.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-lowercase mb-3 animated slideInDown"></h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Healing Hearts, Saving Lives</h1>
                            <a href="{{ url('/contact') }}" class="btn metro-fill metro-text py-md-3 px-md-5 me-3 animated slideInLeft">Get in touch</a>
                            <a href="{{ url('/contact') }}" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->

    <!-- Full Screen Search Start -->
    @include('includes.in_search') 
    <!-- Full Screen Search End -->

    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold light-color text-uppercase heading-text-color" style="font-size: 40px;">WELCOME TO <strong>MAGAZINE CLINIC</strong></h5>
                        <h1 class="mb-0"></h1>
                    </div>
                    <h1 class="mb-1" style="color: black;">We care for you, with compassion and respect at every visit.</h1>
                    <p class="mb-0"></p>
                    <div class="row g-0 mb-3">
                    <p class="mb-0"></p>
                    
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check light-color me-3"></i>High Expertise</h5>
                            <h5 class="mb-3"><i class="fa fa-check light-color me-3"></i>Professional Staff</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check light-color me-3"></i>24/7 Service</h5>
                            <h5 class="mb-3"><i class="fa fa-check light-color me-3"></i>Top-class facilities</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="metro-fill-gold d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question.</h5>
                            <a href="#"><h4 class="light-color"><strong>@include('includes.in_telephone')</strong></h4></a>
                        </div>
                    </div>
                    <a href="{{ url('/contact') }}" class="btn metro-fill-gold  text-white py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Get in touch</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{asset('img/about.jpg') }}" alt="Welcome To Magazine Clinic" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-uppercase light-color"> Why choose <strong>Magazine Clinic</strong></h5>
                <h1 class="mb-0" style="color: black">We are proud to offer these services everyday.</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon metro-fill">
                            <i class="fa fa-clock text-white"></i>
                        </div>
                        <h4 class="mb-3">24/7 Services</h4>
                        <p class="m-0">Available 24 hours a day, 7 days a week, 365 days a year.</p>
                        <a class="btn btn-lg metro-fill text-white rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon metro-fill">
                            <i class="fas fa-stethoscope text-white"></i>
                        </div>
                        <h4 class="mb-3">Highly Experience Experts</h4>
                        <p class="m-0">Our team has a proven track record of resolving complex medical issues with cost-effective care.</p>
                        <a class="btn btn-lg metro-fill text-white rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon metro-fill">
                            <i class="fas fa-medkit text-white"></i>
                        </div>
                        <h4 class="mb-3">Connected Care</h4>
                        <p class="m-0">Every visit to Magazine Clinic begins with a warm, refreshing welcome, thanks to the thoughtful systems our team has built.</p>
                        <a class="btn btn-lg metro-fill text-white rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon metro-fill">
                            <i class="fab fa-accessible-icon text-white"></i>
                        </div>
                        <h4 class="mb-3">Convenience Care</h4>
                        <p class="m-0">Our user-friendly facilities come with complimentary phone consultations from committed professionals..</p>
                        <a class="btn btn-lg metro-fill text-white rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon metro-fill" >
                            <i class="far fa-hospital text-white"></i>
                        </div>
                        <h4 class="mb-3">Insurance Accredited</h4>
                        <p class="m-0">We accept quite a number of insurance which include; NHIS, Premier, GAB, Apex, Ace, etc.</p>
                        <a class="btn btn-lg metro-fill text-white rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div class="position-relative metro-fill rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">
                        <h3 class="text-white mb-3">Call us for more information.</h3>
                        <p class="text-white mb-3">Feel free to reach us at these contacts:</p>
                        <h3 class="text-white">@include('includes.in_telephone')</h3>
                        <h3 class="text-white">+233 (0) 509760659</h3>
                        <!-- <h3 class="text-white mb-0">+233 (0) 208119125</h3>
                        <h3 class="text-white mb-0">+233 (0) 208904060</h3>
                        <h3 class="text-white mb-0">+233 (0) 246453708</h3> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!--  Purpose -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase"></h5>
                <h5 class="fw-bold light-color text-uppercase">What We are</h5>
                <h1 class="mb-0 ">Our purpose, Mission, and Vision</h1>
            </div>
            <div class="row g-0">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="bg-light rounded">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class=" mb-1 light-color">Purpose</h4>
                            <small class="text-sentencecase" style="font-size: 17px;">Why We are here</small>
                        </div>
                        <div class="p-5 pt-0">
                            <p class="m-0">Our purpose is to make standardized medical services accessible to all regardless of location or background. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded shadow position-relative" style="z-index: 1;">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class=" mb-1 light-color">Our Mission</h4>
                            <small class="text-sentencecase" style="font-size: 17px;">How we operate</small>
                        </div>
                        <div class="p-5 pt-0">
                            <p class="m-0">
                               Our mission is to improve the health of our client through the efficient delivery of excellent health care</p>
                               <!-- <p>We strive to inspire hope and build a healthier, brighter future for Ghana.</p> -->
                              <p align="center"> <a href="{{ url('/contact') }}" class="btn text-white light-color-fill py-md-3 px-md-5 me-3 animated slideInLeft">Get in touch</a></p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class=" mb-1 light-color">Our Vision</h4>
                            <small class="text-sentencecase" style="font-size: 17px;">How You Will See It</small>
                        </div>
                        <div class="p-5 pt-0">
                            <p class="m-0">
                               Our Vision is to be the medical facility of choice by prioritizing patient's health care needs.
                              
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Purpose End -->
    <!-- services Start -->
        @include('includes.in_service_sum') 
    <!-- services Start -->

    <!-- Pricing Plan Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold light-color text-uppercase">Our Specialist Days</h5>
                <h1 class="mb-0" style="color: black">We provide specialised cases so support our clients schedules</h1>
            </div>
            <div class="row g-0">
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.6s">
                    <div class="bg-light rounded">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="light-color mb-1" style="color: black; font-size: 20px;">OBSTETRICS & GYNAE</h4>
                            <small class="text-uppercase text-dark">MONDAYS, WEDNESDAYS & FRIDAYS</small>
                        </div>
                        <div class="p-5 pt-0">
                            <h1 class="display-5 mb-3">
                                <small class="align-top" style="font-size: 6; line-height: 45px;"></small>8:00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">AM</small> -
                                    <small class="align-top" style="font-size: 6; line-height: 45px;"></small>5:00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">PM</small>
                            </h1>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded shadow position-relative" style="z-index: 1;">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="light-color mb-1" style="color: black; font-size: 20px;"> DENTAL CLINIC</h4>
                            <small class="text-uppercase text-dark">MONDAYS TO FRIDAY</small>
                        </div>
                        <div class="p-5 pt-0">
                            <h1 class="display-5 mb-3">
                                <small class="align-top" style="font-size: 6; line-height: 45px;"></small>8:00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">AM</small> -
                                    <small class="align-top" style="font-size: 6; line-height: 45px;"></small>4:00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">PM</small>
                            </h1>
                            <!-- <div class="border-bottom py-4 px-5 mb-4"> -->
                            <small class="text-uppercase text-dark">SATURDAYS</small>
                            <!-- </div> -->
                            <h1 class="display-5 mb-3">
                                <small class="align-top" style="font-size: 20px; line-height: 45px;"></small>10:00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">AM</small> -
                                    <small class="align-top" style="font-size: 20px; line-height: 45px;"></small>1:00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">PM</small>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="light-color mb-1" style="color: black; font-size: 20px;">EYE CLINIC</h4>
                            <small class="text-uppercase text-dark">MONDAYS TO FRIDAYS</small>
                        </div>
                        <div class="p-5 pt-0">
                            <h1 class="display-5 mb-3">
                                <small class="align-top" style="font-size: 20px; line-height: 45px;"></small>8:00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">AM</small> -
                                    <small class="align-top" style="font-size: 20px; line-height: 45px;"></small>4:00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">PM</small>
                            </h1>
                            <hr>
                            <!-- <div class="border-bottom py-4 px-5 mb-4"> -->
                            <small class="text-uppercase text-dark">SATURDAYS</small>
                            <h1 class="display-5 mb-3">
                                <small class="align-top" style="font-size: 20px; line-height: 45px;"></small>9:00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">AM</small> -
                                    <small class="align-top" style="font-size: 20px; line-height: 45px;"></small>1:00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">PM</small>
                            </h1>
                        </div>
                    </div>
                </div>

                 <div class="col-lg-3 wow slideInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded shadow position-relative" style="z-index: 1;">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="light-color mb-1" style="color: black; font-size: 20px;"> PAEDIATRIC CLINIC</h4>
                            <small class="text-uppercase text-dark">SATURDAYS</small>
                        </div>
                        <div class="p-5 pt-0">
                            <h1 class="display-5 mb-3">
                                <small class="align-top" style="font-size: 20px; line-height: 45px;"></small>8:00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">AM</small> -
                                    <small class="align-top" style="font-size: 20px; line-height: 45px;"></small>2:00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">PM</small>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing Plan End -->

 <!-- Quote Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold light-color text-uppercase">MAKE AN ENQUIRY</h5>
                        <h1 class="mb-0" style="color: black">Please contact us for all your enquiries</h1>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="fa fa-reply light-color me-3"></i>Reply within 24 hours</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-4 "><i class="fa fa-phone-alt light-color me-3"></i>24-hour telephone support</h5>
                        </div>
                    </div>
                    <p class="mb-4">We are pleased to announce our readiness to serve you with high-quality medical services. Our facility operates 24 hours a day, 7 days a week, with fully staffed and resourced units to ensure reliable care.
                    </p>
                    <p class="mb-4">Our services are inclusive, accommodating both private patients and those affiliated with NHIS. To arrange a prompt and personalised consultation, please reach out to our front desk team.
                    </p>
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="metro-fill-gold d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="light-color">@include('includes.in_telephone')</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- form response -->
                     <div id="form_response" class="mt-3"></div>

                    <div class="metro-fill rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        <!-- <div class="col-12"> -->
                               
                        <!-- </div> -->
                        <form id="info_page" method="POST" onsubmit="return false">
                            @csrf
                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Your Name" name="fullname" id="fullname" required style="height: 55px;">
                                    <input type="text" name="page_type" id="page_type" value="enquiry" hidden>
                                    <input type="text" name="page_name" id="page_name" value="home_page" hidden>
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control bg-light border-0" placeholder="Your Email" name="email" required style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="number" class="form-control bg-light border-0" placeholder="Your Telephone" name="telephone" id="telephone" minlength="10" maxlength="15" required style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <select class="form-select bg-light border-0" name="service" id="service" required style="height: 55px;">
                                        <option selected disabled>Select A Service</option>
                                        @include('includes.in_services_option') 
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-light border-0" rows="3" placeholder="Message" name="message" id="message" required></textarea>
                                </div>
                                <div class="col-12">
                                    <!-- <button class="btn metro-fill-gold w-100 py-3 text-white" type="submit">Submit </button> -->
                                    <button class="btn metro-fill-gold text-white w-100 py-3" name="save_contact_form" id="save_contact_form" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->

    <!-- Team Start -->

    <!-- Team End -->

        <!-- Testimonial 2 Start -->
   <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold light-color text-uppercase">Testimonial</h5>
                <h1 class="mb-0">Hear From Our Happy Clients</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0">
                           I wholeheartedly recommend Magazine Clinic to anyone seeking top-notch healthcare. The facility is spotless, and the staff is incredibly professional. When I had a medical emergency at 10 PM, I called them, and by the time I arrived at the hospital, the medical team was already there, ready to assist and save both my daughter and me. I’m forever grateful for their care and quick response. You’ve definitely gained a lifelong client.
                        </p>
                    </div>
                    <div class="mb-2">
                        <small class="fa fa-star light-color"></small>
                        <small class="fa fa-star light-color"></small>
                        <small class="fa fa-star light-color"></small>
                        <small class="fa fa-star light-color"></small>
                        <small class="fa fa-star light-color"></small>
                    </div>
                    <h5 class="mb-1">Alhassan Mohammed</h5>
                    <p class="m-0">Claims Officer</p>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0">Calling all women who have fertility issues to come to the hospital because they’re really best at it. 
                        The attention the doctors and nurses give to their patients is unmatched. God bless them.</p>
                    </div>
                    <div class="mb-2">
                        <small class="fa fa-star light-color"></small>
                        <small class="fa fa-star light-color"></small>
                        <small class="fa fa-star light-color"></small>
                        <small class="fa fa-star light-color"></small>
                        <small class="fa fa-star light-color"></small>
                    </div>
                    <h5 class="mb-1">Alberta Aboagye</h5>
                    <p class="m-0">Businesswoman</p>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0"><strong>Magazine Clinic</strong> is the best hospital I will recommend for their serene environment, excellent human relations, best doctors, nurses who are always at your service, top notch customer service and state of art facilities.</p>
                    </div>
                    <div class="mb-2">
                        <small class="fa fa-star light-color"></small>
                        <small class="fa fa-star light-color"></small>
                        <small class="fa fa-star light-color"></small>
                        <small class="fa fa-star light-color"></small>
                        <small class="fa fa-star light-color"></small>
                    </div>
                    <h5 class="mb-1">Mary Owusu Twum</h5>
                    <p class="m-0">Teacher</p>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0">My experience with Magazine Clinic has always been the best all these years, 
                            they are always on top of issues.
                        </p>
                    </div>
                    <div class="mb-2">
                        <small class="fa fa-star light-color"></small>
                        <small class="fa fa-star light-color"></small>
                        <small class="fa fa-star light-color"></small>
                        <small class="fa fa-star light-color"></small>
                        <small class="fa fa-star light-color"></small>
                    </div>
                    <h5 class="mb-1">Francis Nkansah</h5>
                    <p class="m-0">Teacher</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial 2 End -->
    <p></p>
    <p></p>
    <p></p>
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
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
          document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('info_page');
            const submitBtn = document.getElementById('save_contact_form');
            const responseBox = document.getElementById('form_response');
            // const actionUrl = form.dataset.url; // Get the route from data-url attribute

            form.addEventListener('submit', async function (e) {
                e.preventDefault();

                // Clear previous messages
                responseBox.innerHTML = '';

                // Disable submit button to prevent multiple clicks
                submitBtn.disabled = true;
                submitBtn.textContent = 'Submitting...';

                try {
                    // Collect form data
                    const formData = new FormData(form);

                    // Send AJAX request
                    const response = await fetch("{{ route('enquiry.store') }}", {
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        },
                        body: formData
                    });

                    const result = await response.json();

                    // Handle validation or server errors
                    if (!response.ok) {
                        if (result.errors) {
                            let errorList = '<div class="alert alert-danger"><ul>';
                            for (const key in result.errors) {
                                errorList += `<li>${result.errors[key][0]}</li>`;
                            }
                            errorList += '</ul></div>';
                            responseBox.innerHTML = errorList;
                        } else {
                            responseBox.innerHTML = `<div class="alert alert-danger">${result.message || 'Something went wrong. Please try again.'}</div>`;
                        }
                    } else {
                        // Success response
                        responseBox.innerHTML = `<div class="alert alert-success">${result.message}</div>`;
                        
                        // Reset form after success
                        form.reset();
                    }
                } catch (error) {
                    console.error('Submission error:', error);
                    responseBox.innerHTML = `<div class="alert alert-danger">An unexpected error occurred. Please try again.</div>`;
                } finally {
                    // Re-enable the submit button
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Submit';
                }
            });
        });
    </script>
</body>

</html>