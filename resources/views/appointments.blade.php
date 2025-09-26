<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Magazine Clinic| Appointments</title>
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
            <a href="/" class="navbar-brand p-0">
               <h1 class="m-0"><img src="{{ asset('images/logo_1.png') }}" alt=""></i></h1>
            </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link ">Home</a>
                    <a href="{{ url('/about') }}" class="nav-item nav-link">About Us</a>
                  <div class="nav-item dropdown">
                        <a href="{{ url('/services') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown active">Our Services</a>
                        <div class="dropdown-menu m-0">
                             @include('includes.in_service_list') 
                        </div>
                    </div>
                    <!-- <a href="blogpost.php" class="nav-item nav-link">Blog</a> -->
                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact Us</a>
                    <a href="{{ url('/appointments') }}" class="nav-item nav-link active">Appointment</a>
                    <a href="{{ url('/selfservice/portal') }}" class="nav-item nav-link">Portal <sup style="color:red">New</sup></a>
                </div>
                <!-- <button type="button" class="btn text-white ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button> -->
                <!-- <a href="appointment.php" class="btn metro-fill metro-text py-2 px-4 ms-3">Book Appointment</a> -->
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Appointments</h1>
                    <a href="" class="h5 text-white">Home</a>
                     <i class="far fa-hospital text-white px-2"></i>
                    <a href="{{ url('/appointments') }}" class="h5 text-white">Appointments</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Quote Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold magazine-main-text text-uppercase">Book Appointment</h5>
                        <h1 class="mb-0">Do you want to visit us? Book an appointment with us.</h1>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="fa fa-reply magazine-main-text me-3"></i>Reply within 24 hours</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-4"><i class="fa fa-phone-alt magazine-main-text me-3"></i>24 hrs telephone support</h5>
                        </div>
                    </div>
                    <p class="mb-4">We have fully-manned and equipped units that run 24 hours a day, 7 days a week. Our services are full-option (as we attend to both Health Maintenance Organisation and private patients). Contact our front desk to help facilitate your prompt and personalised consultation.
                    </p> 
                    <p class="mb-4"> It is with much pleasure to open our doors in readiness to offer you quality, efficient, effective, reliable, timely, safe and patient centred healthcare service.
                    </p>
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="metro-fill d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="magazine-main-text">+233 (0)3220 89675</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- form response -->
                    <div id="form_response" class="mt-3"></div>

                    <div class="metro-fill rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        <form id="appointment_form" method="POST" onsubmit="return false">
                             @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <input type="text" class="form-control bg-light border-0" name="fullname" id="fullname" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control bg-light border-0" name="email" id="email" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control bg-light border-0" name="telephone" id="telephone" placeholder="Your Telephone" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <select class="form-select bg-light border-0" style="height: 55px;" name="service" id="service">
                                        <option selected disabled>Select A Service</option>
                                        @include('includes.in_services_option') 
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-light border-0" rows="3" name="message" id="message" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                     <button class="btn metro-fill-gold text-white w-100 py-3" name="save_appointment_form" id="save_appointment_form" type="submit">Book Appointment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->
    @include('includes.in_accredited') 
    <!-- Vendor End -->
    <!-- Footer Start -->
     @include('includes.in_footer') 
    <!-- Footer End -->
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
    <script>
          document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('appointment_form');
            const submitBtn = document.getElementById('save_appointment_form');
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
                    const response = await fetch("{{ route('enquiry.bookappointment') }}", {
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
                    submitBtn.textContent = 'Book Appointment';
                }
            });
        });
    </script>
</body>

</html>