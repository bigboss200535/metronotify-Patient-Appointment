<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> @include('includes.in_facility')  | General Surgery</title>
     @include('includes.in_favicon') 
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Template Stylesheet -->
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
            <a href="index.php" class="navbar-brand p-0">
                <h1 class="m-0"><img src="{{ asset('img/logo2.png') }}" alt=""></i></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                    <a href="{{ url('/about') }}" class="nav-item nav-link">About Us</a>
                    <!--<a href="service.php" class="nav-item nav-link">Services</a>-->
                    <div class="nav-item dropdown">
                        <a href="{{ url('/services') }}" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown active">Our Services</a>
                        <div class="dropdown-menu m-0">
                              @include('includes.in_service_list') 
                        </div>
                    </div>
					<!-- <a href="blogpost.php" class="nav-item nav-link">Blog</a> -->
                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact Us</a>
                     <a href="{{ url('/appointments') }}" class="nav-item nav-link">Appointments</a>
                </div>
                <!-- <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton> -->
                <!-- <a href="appointment.php" class="btn btn-primary py-2 px-4 ms-3">Book Appointment</a> -->
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">General Surgery</h1>
                    <a href="{{ url('/') }}" class="h5 text-white">Home</a>
                    <i class="far fa-hospital text-white px-2"></i>
                    <a href="{{ url('/services') }}" class="h5 text-white">Services</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
     
    <!-- Full Screen Search End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="{{ asset('img/blog-1.jpg') }}" alt="">
                        <h1 class="mb-4">General Surgery</h1>
                        <p>Today’s woman is busier than ever, balancing careers, families, and a myriad of other responsibilities.
						We at @include('includes.in_facility') understand and are committed to bringing smiles to your faces. Our consultants are passionate to
						supply solutions to preconception, antenatal, and postnatal concerns.</p>
                        <p>We offer labour and delivery services. We also offer programmes, classes, and support for our expecting mothers.</p>
                        <p>Subspecialty services supplied include general obstetrics and gynaecology, maternal-fetal medicine, 
						, gynecologic oncology, and family planning.</p>
                        <p>Our doctors are very meticulous when it comes to your gynaecological needs.
						Do not hesitate to call and book an appointment with us anywhere, anytime, any day.</p>
						   
                    </div>
                    <!-- Blog Detail End -->
					
                    <!-- Comment Form Start -->
                    <div class="bg-light rounded p-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Leave a concern</h3>
                        </div>
                         <form action="#" method="POST">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-white border-0" placeholder="Your Name" name="name" required style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-white border-0" placeholder="Contact" name="contact" required style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control bg-white border-0" placeholder="Email" name="email" required style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-white border-0" rows="5" placeholder="Comment" name="comment" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn metro-fill text-white w-100 py-3" type="submit">Leave your concern</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End -->
                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" placeholder="Keyword">
                            <button class="btn metro-fill text-white px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                    <!-- Search Form End -->
    
                
    
                   <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Other Services</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2 gold-text" href="/services/general"><i class="bi bi-arrow-right me-2"></i>General and Family Medicine</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2 gold-text" href="/services/obstetrics"><i class="bi bi-arrow-right me-2"></i>Geriatrics /Elderly Care</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2 gold-text" href="/services/surgery"><i class="bi bi-arrow-right me-2"></i>ENT Care</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2 gold-text" href="/services/obstetrics"><i class="bi bi-arrow-right me-2"></i>Obstetrics & Gynaecology Care</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2 gold-text" href="/services/eye"><i class="bi bi-arrow-right me-2"></i>Eye Care</a>
                            
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2 gold-text" href="/services/pharmacy"><i class="bi bi-arrow-right me-2"></i>Pharmacy Services</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2 gold-text" href="/services/laboratory"><i class="bi bi-arrow-right me-2"></i>Laboratory Services</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2 gold-text" href="/services/ultrasound"><i class="bi bi-arrow-right me-2"></i>Advanced Ultrasound Services</a>
                        </div>
                    </div>
    
                    <!-- Recent Post End -->
					
					<!-- Image Start -->
					<div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <img src="{{ asset('img/blog-2.jpg') }}" alt="" class="img-fluid rounded">
                    </div>
					 <!-- Image End -->
					 
					 
					<!--Blank Space-->
					<p></p>
					<p></p>
					<!--Blank Space-->
					
					<!-- Plain Text Start -->
                    <!-- <div class="wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Appointment Schedule</h3>
                        </div>
                        <div class="bg-light text-center" style="padding: 30px;">
                            <p><strong>Consultation and Assessment</strong></p>
                            <a href="" class="btn metro-fill text-white py-2 px-4">Saturday-Sunday</a>
							<a href="" class="btn metro-fill text-white py-2 px-4">8am-8pm</a>
                        </div>
                    </div> -->
                    <!-- Plain Text End -->
					
					<!--Blank Space-->
					<p></p>
					<p></p>
					<!--Blank Space-->
    
    
         

                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->
	<!-- Testimonial start -->
     @include('includes.in_faq') 
    <!-- Testimonial End -->
    <!-- Footer Start -->
     @include('includes.in_footer') 
    <!-- Footer End -->
    <!-- Back to Top -->
     @include('includes.to_top') 
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }} "></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>