<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Magazine Clinic | Contact Us</title>
    @include('includes.in_favicon') 
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Librari{es Stylesheet -->
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
            <a href="{{ url('/') }}" class="navbar-brand p-0">
               <h1 class="m-0"><img src="{{ asset('images/logo_1.png') }}" alt=""></i></h1>
            </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
           <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link ">Home</a>
                    <a href="{{ url('/about') }}" class="nav-item nav-link ">About Us</a>
                  <div class="nav-item dropdown">
                        <a href="{{ url('/services') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown active">Our Services</a>
                        <div class="dropdown-menu m-0">
                             @include('includes.in_service_list') 
                        </div>
                    </div>
                    <!-- <a href="blogpost.php" class="nav-item nav-link">Blog</a> -->
                    <a href="{{ url('/contact') }}" class="nav-item nav-link active">Contact Us</a>
                    <a href="{{ url('/appointments') }}" class="nav-item nav-link">Appointments</a>
                    <a href="{{ url('/selfservice/portal') }}" class="nav-item nav-link">Portal <sup style="color:red">New</sup></a>
                </div>
                <!-- <button type="button" class="btn text-white ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button> -->
                <!-- <a href="appointment.php" class="btn metro-fill metro-text py-2 px-4 ms-3">Book Appointment</a> -->
            </div>
        </nav>

        <div class="container-fluid metro-fill py-5 bg-header page-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Contact Us</h1>
                    <a href="{{ url('/') }}" class="h5 text-white">Home</a>
                    <i class="far fa-hospital text-white px-2"></i>
                    <a href="{{ url('/contact') }}" class="h5 text-white">Contact</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Full Screen Search Start -->
     @include('includes.in_search') 
    <!-- Full Screen Search End -->

    <!-- Contact Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold magazine-main-text text-uppercase">Contact Us</h5>
                <h1 class="mb-0">For more information, do not hesitate to contact us</h1>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                        <div class="metro-fill d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2"> Call us on</h5>
                            <a href="#"><h6 class="magazine-main-text mb-1">+233 (0)3220 89675</h6></a>
                            <!-- <h6 class="metro-main-text mb-0">+233 (0) 509760659</h6> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                        <div class="metro-fill d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Email</h5>
                            <h6 class="magazine-main-text mb-1">metrohealthgh@gmail.com</h6>
                            <h6 class="magazine-main-text mb-1">frontdesk@metrohealthgh.com</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="metro-fill d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-comment text-white "></i>
                        </div>
                        <div class="ps-4">
                        <h5 class="mb-2">Kindly WhatsApp us on</h5>
                            <a href="https://wa.me/+233599642520"><h6 class="magazine-main-text mb-1">+233 (0)3220 89675</h6></a>
                            <!-- <a href="https://wa.me/+233509760659"><h6 class="text-primary mb-0">+233 (0) 509760659</h6></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="metro-fill d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Visit our Facility</h5>
                            <h6 class="magazine-main-text mb-1">4 Barekese Road, Abrepo Junction Near Angel Fm</h6>
                            <h6 class="magazine-main-text mb-1">Kumasi, Ghana.</h6>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row g-5">
                <!-- form response -->
                <div id="form_response" class="mt-3"></div>

                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <!-- <form action="https://getform.io/f/ayvkmjob" method="POST"> -->
                    <form id="info_page" data-url="{{ route('enquiry.store') }}" method="POST" onsubmit="return false">
                          @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" placeholder="Your Name" name="fullname" id="fullname" required style="height: 55px;">
                                <input type="text" name="page_type" id="page_type" value="contact" hidden>
                                <input type="text" name="page_name" id="page_name" value="contact" hidden>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control border-0 bg-light px-4" placeholder="Your Email" name="email" id="email" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" placeholder="Your Telephone" name="telephone" id="telephone" minlength="10" maxlength="15" required style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" placeholder="Subject" name="subject" id="subject" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="Message" name="message" id="message"></textarea>
                            </div>
                            <div class="col-12">
                                 <button class="btn metro-fill-gold text-white w-100 py-3" name="save_contact_form" id="save_contact_form" type="submit">Submit</button>
                                <!-- <button class="btn metro-fill text-white w-100 py-3" name="save_contact_form" id="save_contact_form" type="submit">Send Message</button> -->
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    <!-- <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/place/Magazine+Clinic/@6.6936439,-1.6357169,19z/data=!4m6!3m5!1s0xfdb96e2cabe2adb:0xdd4a3d8f84996c88!8m2!3d6.6931064!4d-1.6359353!16s%2Fg%2F11bzx19vqq?entry=ttu&g_ep=EgoyMDI1MDkyMS4wIKXMDSoASAFQAw%3D%3D"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe> -->

                        <iframe class="position-relative rounded w-100 h-100"
                        src="https://maps.google.com/maps?width=150%60&amp;height=600&amp;hl=en&amp;q=4%20Barekese%20Road,%20Abrepo%20Junction%20+(Metro%20Health%20Services)&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
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
                        responseBox.innerHTML = `<div class="alert alert-success">Message submitted successfully</div>`;
                        
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