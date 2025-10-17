 <div class="container-fluid metro-fill text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 metro-fill-gold p-4">
                        <a href="{{ url('/') }}" class="navbar-brand">
                            <h1 class="m-0"><img src="{{ asset('images/logo_1.png') }}" alt=""></i></h1>
                        </a>
                        <p class="mt-3 mb-4">
                            We deliver the needed healthcare services across all capabilities.
                            We look forward to your visit. We are readily available for further discussions.
                        </p>
                            <div id="response-message"></div>
                             <form method="POST" id="newsletter_form">
                            @csrf
                            <div class="input-group">
                                <input type="email" class="form-control border-white p-3" placeholder="Subscribe to newsletters" name="email" id="email" required>
                                <button type="submit" name="save_newsletter" id="save_newsletter" class="btn metro-fill text-white">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Get in touch</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt light-color me-2"></i>
                                <p class="mb-0">@include('includes.in_location')</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open light-color me-2"></i>
                                <p class="mb-0">mmagazineclinic@yahoo.com</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone light-color me-2"></i>
                               <a href="#"> <p class="mb-0 white-text">@include('includes.in_telephone')</p></a>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn metro-fill-gold btn-square me-2" href="#"><i class="fab fa-twitter text-white"></i></a>
                                <a class="btn metro-fill-gold btn-square me-2" href="#"><i class="fab fa-facebook-f text-white"></i></a>
                                <!-- <a class="btn metro-fill-gold btn-square me-2" href="#"><i class="fab fa-linkedin-in text-white"></i></a> -->
                                <!-- <a class="btn metro-fill-gold btn-square" href="#"><i class="fab fa-instagram text-white"></i></a> -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Quick Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="{{ url('/') }}"><i class="bi bi-arrow-right light-color me-2"></i>Home</a>
                                <a class="text-light mb-2" href="{{ url('/about') }}"><i class="bi bi-arrow-right light-color  me-2"></i>About Us</a>
                                <a class="text-light mb-2" href="{{ url('/services') }}"><i class="bi bi-arrow-right light-color  me-2"></i>Our Services</a>
                                <a class="text-light mb-2" href="{{ url('/selfservice/portal') }}"><i class="bi bi-arrow-right light-color  me-2"></i>Portal</a>
                                <!-- <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-white  me-2"></i>Latest Blog</a> -->
                                <a class="text-light" href="{{ url('/contact') }}"><i class="bi bi-arrow-right light-color  me-2"></i>Contact Us</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Main Services</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="{{ url('/services/generalmedicine') }}"><i class="bi bi-arrow-right light-color me-2"></i>General/Family Medicine</a>
                                <a class="text-light mb-2" href="{{ url('/services/obstetrics') }}"><i class="bi bi-arrow-right light-color  me-2"></i>Obstetrics and Gynaecology</a>
                                <a class="text-light mb-2" href="{{ url('/services/laboratory') }}"><i class="bi bi-arrow-right light-color  me-2"></i>Laboratory Service</a>
                                <a class="text-light mb-2" href="{{ url('/services/eye') }}"><i class="bi bi-arrow-right light-color  me-2"></i>Eye Care</a>
                                <a class="text-light mb-2" href="{{ url('/services/ent') }}"><i class="bi bi-arrow-right light-color me-2"></i>ENT Care</a>
                                <a class="text-light" href="{{ url('/services/surgery') }}"><i class="bi bi-arrow-right light-color  me-2"></i>Surgery</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background-color:#0C2448">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center" style="height: 75px;">
                        <p class="mb-0">&copy; 
                            <a class="border-bottom" href="#" style="color:#ffffff"> @include('includes.in_facility') </a>. 
                                All rights reserved.
                                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                                Website by <a style="color:#ffffff" class="border-bottom" href="https://webedgetek.com"><b>WebEdge Technologies</b>
                            </a>
                      </p>
                    </div>
                </div>
            </div>
        </div>
    </div>