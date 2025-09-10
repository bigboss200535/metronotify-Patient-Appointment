    <div class="left-side-bar" style="background-color: ;">
        <div class="brand-logo">
            <a href="/selfservice/dashboard">
                <!-- <img src="{{ asset('portal/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo"> -->
                <!-- <img src="{{ asset('portal/vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo"> -->
                <img src="{{ asset('images/logo_1.png') }}" alt="" class="light-logo">
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                     <li>
                        <div class="sidebar-small-cap">Menu</div>
                    </li>
                    <li>
                        <a href="/selfservice/dashboard" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-house-1"></span><span class="">Appointments</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="#">Book Appointment</a></li>
                            <li><a href="{{ route('appointment.index') }}">All Appointments</a></li>
                            <li><a href="#">Upcoming Appointments</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-calendar1"></span><span class="mtext">Contacts</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="form-basic.html">Form Basic</a></li>
                            <li><a href="advanced-components.html">Advanced Components</a></li>
                            <li><a href="form-wizard.html">Form Wizard</a></li>
                            <li><a href="html5-editor.html">HTML5 Editor</a></li>
                            <li><a href="form-pickers.html">Form Pickers</a></li>
                            <li><a href="image-cropper.html">Image Cropper</a></li>
                            <li><a href="image-dropzone.html">Image Dropzone</a></li>
                        </ul>
                    </li>
                     <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-library"></span><span class="mtext">Services</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="basic-table.html">Basic Tables</a></li>
                            <li><a href="datatable.html">DataTables</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-library"></span><span class="mtext">Doctors</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="basic-table.html">Basic Tables</a></li>
                            <li><a href="datatable.html">DataTables</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-apartment"></span><span class="mtext"> Notifications </span>
                        </a>
                        <ul class="submenu">
                            <li><a href="ui-buttons.html">SMS</a></li>
                            <li><a href="ui-cards.html">Email</a></li>
                            <!--  -->
                        </ul>
                    </li>
                     <li>
                        <div class="sidebar-small-cap">Setup</div>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-paint-brush"></span><span class="mtext">Doctors</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="#">List</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-analytics-21"></span><span class="mtext">Users</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="/users/list">User List</a></li>
                            <!-- <li><a href="knob-chart.html">jQuery Knob</a></li>
                            <li><a href="jvectormap.html">jvectormap</a></li>
                            <li><a href="apexcharts.html">Apexcharts</a></li> -->
                        </ul>
                    </li>
                     <li>
                        <div class="sidebar-small-cap">Report</div>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-right-arrow1"></span><span class="mtext">Additional Pages</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="video-player.html">Video Player</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="forgot-password.html">Forgot Password</a></li>
                            <li><a href="reset-password.html">Reset Password</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-browser2"></span><span class="mtext">Error Pages</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="400.html">400</a></li>
                            <li><a href="403.html">403</a></li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="500.html">500</a></li>
                            <li><a href="503.html">503</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-copy"></span><span class="mtext">Extra Pages</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="blank.html">Blank</a></li>
                            <li><a href="contact-directory.html">Contact Directory</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="blog-detail.html">Blog Detail</a></li>
                            <li><a href="product.html">Product</a></li>
                            <li><a href="product-detail.html">Product Detail</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="pricing-table.html">Pricing Tables</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-list3"></span><span class="mtext">Multi Level Menu</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="javascript:;">Level 1</a></li>
                            <li><a href="javascript:;">Level 1</a></li>
                            <li><a href="javascript:;">Level 1</a></li>
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon fa fa-plug"></span><span class="mtext">Level 2</span>
                                </a>
                                <ul class="submenu child">
                                    <li><a href="javascript:;">Level 2</a></li>
                                    <li><a href="javascript:;">Level 2</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:;">Level 1</a></li>
                            <li><a href="javascript:;">Level 1</a></li>
                            <li><a href="javascript:;">Level 1</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="sitemap.html" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-diagram"></span><span class="mtext">Sitemap</span>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-chat3"></span><span class="mtext">Chat</span>
                        </a>
                    </li>
                    <li>
                        <a href="invoice.html" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-invoice"></span><span class="mtext">Invoice</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <div class="sidebar-small-cap">Extra</div>
                    </li>
                    <li>
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-edit-2"></span><span class="mtext">Documentation</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="introduction.html">Introduction</a></li>
                            <li><a href="getting-started.html">Getting Started</a></li>
                            <li><a href="color-settings.html">Color Settings</a></li>
                            <li><a href="third-party-plugins.html">Third Party Plugins</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" target="_blank" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-paper-plane1"></span>
                            <span class="mtext">Landing Page <img src="{{ asset('portal/vendors/images/coming-soon.png') }}" alt="" width="25"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>