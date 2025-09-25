<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> @include('includes.in_facility')  | Laboratory Services</title>
     @include('includes.in_favicon') 
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapixs.com">
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
                    <a href="/" class="nav-item nav-link">Home</a>
                    <a href="/about" class="nav-item nav-link">About Us</a>
                    <!--<a href="service.php" class="nav-item nav-link">Services</a>-->
                    <div class="nav-item dropdown">
                        <a href="/services" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown active">Our Services</a>
                        <div class="dropdown-menu m-0">
                             @include('includes.in_service_list') 
                        </div>
                    </div>
                    
                    <a href="/contact" class="nav-item nav-link">Contact Us</a>
                    <a href="/appointments" class="nav-item nav-link">Appointment</a>  
                </div>
                <!-- <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton> -->
                <!-- <a href="appointment.php" class="btn btn-primary py-2 px-4 ms-3">Book Appointment</a> -->
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Laboratory Services</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-hospital text-white px-2"></i>
                    <a href="/services" class="h5 text-white">Services</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <!-- <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Full Screen Search End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="{{ asset('img/serv9-blog-3.jpg') }}" alt="">
                        <h1 class="mb-4">Our Laboratory Services</h1>
                        <p>In the current era of evidence-based medicine, we provide the best solutions to you with the help of our state-of-the-art laboratory, 
						manned by experienced and skilled laboratory scientists. </p>
                        <p> Laboratory services at @include('includes.in_facility')  function 24/7 with an emphasis on
						accuracy, precision, reproducibility, and prompt reporting.</p>
                    </div>
                    <!-- Blog Detail End -->
					
                   <!-- Comment Form Start -->
                    <div class="bg-light rounded p-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Leave a concern</h3>
                        </div>
                        <form action="https://getform.io/f/cfe6b443-94b5-4d67-9ea5-def1031edbb6" method="POST">
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
						    <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="/services/general"><i class="bi bi-arrow-right me-2"></i>General/Family Medicine</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="/services/obstetrics"><i class="bi bi-arrow-right me-2"></i>Obstetrics/Gynaecology</a>
							<!-- <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="serv4.php"><i class="bi bi-arrow-right me-2"></i>In Vitro Fertilization</a> -->
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="serv3.php"><i class="bi bi-arrow-right me-2"></i>Pediatrics</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="serv6.php"><i class="bi bi-arrow-right me-2"></i>Internal Medicine</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="serv7.php"><i class="bi bi-arrow-right me-2"></i>Surgery</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="serv8"><i class="bi bi-arrow-right me-2"></i>Pharmacy</a>
							<a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="serv5.php"><i class="bi bi-arrow-right me-2"></i>Ultrasound Scan Services</a>
							
                        </div>
                    </div>
					
					<!-- Image Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <img src="{{ asset('img/serv9-blog-4.jpg') }}" alt="" class="img-fluid rounded">
                    </div>
                    <!-- Image End -->
					
					
                   <!-- Plain Text Start -->
                    <div class="wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Appointment Schedule</h3>
                        </div>
                        <div class="bg-light text-center" style="padding: 30px;">
                            <p></p>
                            <a href="/appointments" class="btn metro-fill text-white py-2 px-4">24hours Service</a>
                        </div>
                    </div>
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