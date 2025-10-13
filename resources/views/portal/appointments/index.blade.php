<x-app-layout>

 <div class="mobile-menu-overlay"></div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Appointments</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Appointments</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						  <a href="#" class="btn-block pull-right">
						  	<h4 class="text-blue h4">Patient Appointments</h4>
							<input type="button" name="app_button" data-toggle="modal" data-target="#bd-example-modal-lg" id="app_button" class="btn btn-primary pull-right" value="Add Appointment">
						  </a>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>Sn</th>
									<th class="table-plus datatable-nosort">Name</th>
									<th>Telephone</th>
									<th>Email</th>
									<th>Service Type</th>
									<th>Message</th>
									<th>Added Date</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@php
                                 $counter = 1;
                            	@endphp

                                @foreach($appointment as $appointments)
								<tr>
									<td>{{ $counter++ }}</td>
									<td class="table-plus">{{ $appointments->fullname }}</td>
									<td>{{ $appointments->telephone }}</td>
									<td>{{ $appointments->email }}</td>
									<td>{{ $appointments->service }} </td>
									<td>{{ substr($appointments->message , 0, 20) . "..."}}</td>
									<td>{{ $appointments->appointment_date }}</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								 @endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>Sn</th>
									<th class="table-plus datatable-nosort">Name</th>
									<th>Telephone</th>
									<th>Email</th>
									<th>Service Type</th>
									<th>Message</th>
									<th>Added Date</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
			</div>
		</div>
	</div>	

<!-- Large modal -->
					<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg modal-dialog-centered">
								<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel"><b>New Appointment</b></h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
											proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										   </p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary">Save changes</button>
										</div>
									</div>
								</div>
							</div>
						
<!-- Large modal -->
	</x-app-layout>
	