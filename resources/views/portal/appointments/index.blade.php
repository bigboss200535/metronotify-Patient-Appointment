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
									<td class="table-plus">{{ strtoupper($appointments->fullname) }}</td>
									<td>{{ $appointments->telephone }}</td>
									<td>{{ $appointments->email }}</td>
									<td>{{ $appointments->service }} </td>
									<td>{{ \Carbon\Carbon::parse($appointments->appointment_date)->format('d-m-Y') }}</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="{{ route('appointment.show', $appointments->appointment_id) }}"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="{{ route('appointment.edit', $appointments->appointment_id) }}"><i class="dw dw-edit2"></i> Edit</a>
												<form action="{{ route('appointment.destroy', $appointments->appointment_id) }}" method="POST" style="display: inline;">
													@csrf
													@method('DELETE')
													<button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this appointment?')">
														<i class="dw dw-delete-3"></i> Delete
													</button>
												</form>
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
										
												<form id="appointment_form" method="POST" onsubmit="return false">
													@csrf
													<div class="row g-3">
														<!-- <div class="col-12">
															<input type="text" class="form-control bg-light border-0" name="fullname" id="fullname" placeholder="Your Name" style="height: 55px;">
															 <input class="form-control" value="password" type="password"> 
														</div> -->
														<div class="col-sm-12 col-md-12">
															<input type="text" class="form-control"  placeholder="Name" name="fullname" id="fullname" >
														</div>
														<div class="col-12 col-md-12">
															<input type="email" class="form-control" name="email" id="email" placeholder="Email">
														</div>
														<div class="col-12 col-md-12">
															<input type="text" class="form-control" name="telephone" id="telephone" placeholder="Telephone">
														</div>
														<div class="col-12 col-md-12">
															<input type="date" class="form-control" name="appointment_date" id="appointment_date" placeholder="Email">
														</div>
														<div class="col-12 col-md-12">
															<input type="time" class="form-control" name="appointment_time" id="appointment_time" placeholder="Telephone">
														</div>
														<div class="col-12 col-md-12">
															<select class="form-control" style="height: 55px;" name="service" id="service">
																<option selected disabled>Select A Service</option>
																@include('includes.in_services_option') 
															</select>
														</div>
														<div class="col-12 col-md-12">
															<textarea class="form-control" rows="3" name="message" id="message" placeholder="Message"></textarea>
														</div>
														<!-- <div class="col-12">
															<button class="btn metro-fill-gold text-white w-100 py-3" name="save_appointment_form" id="save_appointment_form" type="submit">Book Appointment</button>
														</div> -->
													
												</form>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary" id="save_appointment_form">Save</button>
										</div>
									</div>
								</div>
							</div>
						
<!-- Large modal -->
	</x-app-layout>

<script>
document.getElementById('save_appointment_form').addEventListener('click', function(e) {
    e.preventDefault();
    
    const form = document.getElementById('appointment_form');
    const formData = new FormData(form);
    
    fetch('{{ route("appointment.store") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Appointment created successfully!');
            location.reload();
        } else {
            alert('Error creating appointment. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error creating appointment. Please try again.');
    });
});
</script>
	