<x-app-layout>
    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">

            <div class="title pb-20">
                <h2 class="h3 mb-0" style="color: "> {!! $greeting !!}, {{ Auth::user()->othername }}</h2>
            </div>

            <div class="row pb-10">
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">{{ $appointments ?? 0 }}</div>
                                <div class="font-14 text-secondary weight-500">Appointments this month</div>
                            </div>
                            <div class="widget-icon"style="background-color: #673466;" >
                                <div class="icon" data-color="#ffffff"><i class="icon-copy dw dw-calendar1"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">{{ $enquiry ?? 0 }}</div>
                                <div class="font-14 text-secondary weight-500">Enquiries this month</div>
                            </div>
                            <div class="widget-icon" style="background-color:#673466">
                                <div class="icon" data-color="#ffffff"><span class="icon-copy ti-heart"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">{{ $users ?? 0 }}</div>
                                <div class="font-14 text-secondary weight-500">Total Users</div>
                            </div>
                            <div class="widget-icon" style="background-color:#673466">
                                <div class="icon"><i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">GHs 0.00</div>
                                <div class="font-14 text-secondary weight-500">Total Earning</div>
                            </div>
                            <div class="widget-icon" style="background-color: #673466;">
                                <div class="icon" data-color="#ffffff"><i class="icon-copy fa fa-money" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pb-10">
                <div class="col-md-8 mb-20">
                    <div class="card-box height-100-p pd-20">
                        <div class="d-flex flex-wrap justify-content-between align-items-center pb-0 pb-md-3">
                            <div class="h5 mb-md-0">Hospital Activities</div>
                            <div class="form-group mb-md-0">
                                <select class="form-control form-control-sm selectpicker">
                                    <option value="">Last Week</option>
                                    <option value="">Last Month</option>
                                    <option value="">Last 6 Month</option>
                                    <option value="">Last 1 year</option>
                                </select>
                            </div>
                        </div>
                        <div id="activities-chart"></div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#673466">
                        <div class="d-flex justify-content-between pb-20 text-white">
                            <div class="icon h1 text-white">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <!-- <i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i> -->
                            </div>
                            <div class="font-14 text-right">
                                <div><i class="icon-copy ion-arrow-up-c"></i> 2.69%</div>
                                <div class="font-12">Since last month</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="text-white">
                                <div class="font-14">Total Appointment</div>
                                <div class="font-24 weight-500">{{ $total_appointments ?? 0 }}</div>
                            </div>
                            <div class="max-width-150">
                                <div id="appointment-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-box min-height-200px pd-20" data-bgcolor="#265ed7">
                        <div class="d-flex justify-content-between pb-20 text-white">
                            <div class="icon h1 text-white">
                                <i class="fa fa-stethoscope" aria-hidden="true"></i>
                            </div>
                            <div class="font-14 text-right">
                                <div><i class="icon-copy ion-arrow-down-c"></i> 3.69%</div>
                                <div class="font-12">Since last month</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="text-white">
                                <div class="font-14">Surgery</div>
                                <div class="font-24 weight-500">250</div>
                            </div>
                            <div class="max-width-150">
                                <div id="surgery-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-20">
                    <div class="card-box height-100-p pd-20 min-height-200px">
                        <div class="d-flex justify-content-between pb-10">
                            <div class="h5 mb-0">Users</div>
                            <div class="dropdown">
                                <!-- <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a> -->
                               <!--  <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                </div> -->
                            </div>
                        </div>
                        <div class="user-list">
                            <ul>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="name-avatar d-flex align-items-center pr-2">
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <img src="{{ asset('portal/vendors/images/photo1.jpg') }}" class="border-radius-100 box-shadow" width="50" height="50" alt="">
                                        </div>
                                        <div class="txt">
                                            <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">4.9</span>
                                            <div class="font-14 weight-600">Dr. Neil Wagner</div>
                                            <div class="font-12 weight-500" data-color="#b2b1b6">Pediatrician</div>
                                        </div>
                                    </div>
                                    <div class="cta flex-shrink-0">
                                        <a href="#" class="btn btn-sm btn-outline-primary">Schedule</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="name-avatar d-flex align-items-center pr-2">
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <img src="{{ asset('portal/vendors/images/photo2.jpg') }}" class="border-radius-100 box-shadow" width="50" height="50" alt="">
                                        </div>
                                        <div class="txt">
                                            <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">4.9</span>
                                            <div class="font-14 weight-600">Dr. Ren Delan</div>
                                            <div class="font-12 weight-500" data-color="#b2b1b6">Pediatrician</div>
                                        </div>
                                    </div>
                                    <div class="cta flex-shrink-0">
                                        <a href="#" class="btn btn-sm btn-outline-primary">Schedule</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="name-avatar d-flex align-items-center pr-2">
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <img src="{{ asset('portal/vendors/images/photo3.jpg') }}" class="border-radius-100 box-shadow" width="50" height="50" alt="">
                                        </div>
                                        <div class="txt">
                                            <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">4.9</span>
                                            <div class="font-14 weight-600">Dr. Garrett Kincy</div>
                                            <div class="font-12 weight-500" data-color="#b2b1b6">Pediatrician</div>
                                        </div>
                                    </div>
                                    <div class="cta flex-shrink-0">
                                        <a href="#" class="btn btn-sm btn-outline-primary">Schedule</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="name-avatar d-flex align-items-center pr-2">
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <img src="{{ asset('portal/vendors/images/photo4.jpg') }}" class="border-radius-100 box-shadow" width="50" height="50" alt="">
                                        </div>
                                        <div class="txt">
                                            <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">4.9</span>
                                            <div class="font-14 weight-600">Dr. Callie Reed</div>
                                            <div class="font-12 weight-500" data-color="#b2b1b6">Pediatrician</div>
                                        </div>
                                    </div>
                                    <div class="cta flex-shrink-0">
                                        <a href="#" class="btn btn-sm btn-outline-primary">Schedule</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-20">
                    <div class="card-box height-100-p pd-20 min-height-200px">
                        <div class="d-flex justify-content-between">
                            <div class="h5 mb-0">Diseases Report</div>
                            <!-- <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div> -->
                        </div>

                        <div id="diseases-chart"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-20">
                    <div class="card-box height-100-p pd-20 min-height-200px">
                        <div class="max-width-300 mx-auto">
                            <img src="{{ asset('portal/vendors/images/upgrade.svg') }}" alt="">
                        </div>
                        <div class="text-center">
                            <div class="h5 mb-1">Book New Appointment</div>
                            <div class="font-14 weight-500 max-width-200 mx-auto pb-20" data-color="#a6a6a7">
                                You can enjoy all our features by upgrading to pro.
                            </div>
                            <a href="#" class="btn btn-primary btn-lg" style="background-color: ;">New Appointment</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-box pb-10">
                <div class="h5 pd-20 mb-0">Recent Enquiries</div>
                <table class="data-table table nowrap">
                    <thead>
                        <tr>
                            <th>Sn</th>
                            <th class="table-plus">Fullname</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Read</th>
                            <th>Status</th>
                            <th>Enquiry Type</th>
                            <th class="datatable-nosort">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                            
                            $counter = 1;
                            
                            @endphp
                            @foreach($recent_enquiry as $app_list)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td class="table-plus">
                                    <div class="txt">
                                        <div class="weight-600">
                                             {{ Str::ucfirst($app_list->fullname)  }}</div>
                                    </div>
                            </td>
                            <td>{{ $app_list->telephone }}</td>
                            <td>{{ $app_list->email }}</td>
                            <td>
                                    @if($app_list->read_status === 'Yes')
                                     <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">{{ $app_list->read_status }}</span>
                                    @elseif ($app_list->read_status === 'No')
                                     <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">{{ $app_list->read_status }} </span>
                                    @endif
                            </td>
                            <td>
                                    @if($app_list->status === 'Active')
                                     <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">{{ $app_list->status }}</span>
                                    @elseif ($app_list->status === 'Inactive')
                                     <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">{{ $app_list->status }} </span>
                                    @endif
                            </td>
                            <td><span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">{{ $app_list->page_type }}</span>
                            </td>
                            <td>
                                <div class="table-actions">
                                    <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                    <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                                </div>
                            </td>
                        </tr>
                          @endforeach
                    </tbody>
                </table>
            </div>

            <div class="title pb-20 pt-20">
                <h2 class="h3 mb-0">Quick Start</h2>
            </div>

            <div class="row">
                <div class="col-md-4 mb-20">
                    <a href="#" class="card-box d-block mx-auto pd-20 text-secondary">
                        <div class="img pb-30">
                            <img src="{{ asset('portal/vendors/images/services.svg') }}" style="width: 70%; height: 50%" alt="Services">
                        </div>
                        <div class="content">
                            <h3 class="h4">Services</h3>
                            <!-- <p class="max-width-200 ">We provide superior health care with compassionate</p> -->
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-20">
                    <a href="#" class="card-box d-block mx-auto pd-20 text-secondary">
                        <div class="img pb-30">
                            <img src="{{ asset('portal/vendors/images/login.svg') }}"  style="width: 70%; height: 50%;"alt="Medications">
                        </div>
                        <div class="content">
                            <h3 class="h4">Medications</h3>
                            <!-- <p class="max-width-200 ">Look for prescription information.</p> -->
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-20">
                    <a href="#" class="card-box d-block mx-auto pd-20 text-secondary">
                        <div class="img pb-30">
                            <img src="{{ asset('portal/vendors/images/locations.svg') }}" style="width: 80%; height: 50%" alt="Locations">
                        </div>
                        <div class="content">
                            <h3 class="h4">Locations</h3>
                            <!-- <p class="max-width-200 ">Convenient locations when and where you need them.</p> -->
                        </div>
                    </a>
                </div>
            </div>
             @include('layouts.appfooter')
        </div>
    </div>
</x-app-layout>
