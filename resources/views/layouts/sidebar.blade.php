    <div class="left-side-bar" style="background-color: ;">
        <div class="brand-logo">
            <a href="/selfservice/dashboard">
                 <img src="{{ asset('images/logo_1.png') }}" alt="" class="dark-logo">
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
                        <a href="{{ url('/selfservice/dashboard') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-calendar1"></span><span class="">Appointments</span>
                        </a>
                        <ul class="submenu">
                            <!-- <li><a href="#">Book Appointment</a></li> -->
                            <li><a href="{{ route('appointment.index') }}">All Appointments</a></li>
                            <!-- <li><a href="#">Upcoming Appointments</a></li> -->
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-calendar1"></span><span class="mtext">Enquiry</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('enquiry.index') }}">All Enquiries </a></li>
                            <!-- <li><a href="#">Contacts</a></li> -->
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-calendar1"></span><span class="mtext">Contacts</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="#">All Contacts </a></li>
                            <!-- <li><a href="#">Contacts</a></li> -->
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-calendar1"></span><span class="mtext">Notifications</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="#">All Enquiries </a></li>
                            <!-- <li><a href="#">Contacts</a></li> -->
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-calendar1"></span><span class="mtext">Users</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ url('/selfservice/users/list') }}">User List</a></li>
                        </ul>
                    </li>
                     <li>
                        <div class="sidebar-small-cap">Report</div>
                    </li>
                    
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-analytics-21"></span><span class="mtext">Appointments</span>
                        </a>
                         <ul class="submenu">
                            <li><a href="#">Appointment</a></li> 
                            <li><a href="#">Enquiry</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">SMS</a></li>
                            <!-- <li><a href="#">503</a></li> -->
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>