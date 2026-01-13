<x-app-layout>

 <div class="mobile-menu-overlay"></div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Edit Appointment</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('appointment.index') }}">Appointments</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<a href="{{ route('appointment.index') }}" class="btn btn-secondary">
								<i class="dw dw-arrow-left"></i> Back to List
							</a>
							<a href="{{ route('appointment.show', $appointment->appointment_id) }}" class="btn btn-info">
								<i class="dw dw-eye"></i> View
							</a>
						</div>
					</div>
				</div>

				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Edit Appointment Details</h4>
						
						@if(session('status'))
							<div class="alert alert-success">
								{{ session('status') }}
							</div>
						@endif

						<form method="POST" action="{{ route('appointment.update', $appointment->appointment_id) }}">
							@csrf
							@method('PATCH')
							
							<div class="row g-3">
								<div class="col-sm-12 col-md-6">
									<label for="fullname" class="form-label">Full Name</label>
									<input type="text" class="form-control" name="fullname" id="fullname" value="{{ old('fullname', $appointment->fullname) }}" required>
								</div>
								<div class="col-12 col-md-6">
									<label for="email" class="form-label">Email</label>
									<input type="email" class="form-control" name="email" id="email" value="{{ old('email', $appointment->email) }}">
								</div>
								<div class="col-12 col-md-6">
									<label for="telephone" class="form-label">Telephone</label>
									<input type="text" class="form-control" name="telephone" id="telephone" value="{{ old('telephone', $appointment->telephone) }}">
								</div>
								<div class="col-12 col-md-6">
									<label for="appointment_date" class="form-label">Appointment Date</label>
									<input type="date" class="form-control" name="appointment_date" id="appointment_date" value="{{ old('appointment_date', $appointment->appointment_date) }}">
								</div>
								<div class="col-12 col-md-6">
									<label for="appointment_time" class="form-label">Appointment Time</label>
									<input type="time" class="form-control" name="appointment_time" id="appointment_time" value="{{ old('appointment_time', $appointment->appointment_time) }}">
								</div>
								<div class="col-12 col-md-6">
									<label for="service" class="form-label">Service Type</label>
									<select class="form-control" name="service" id="service">
										<option value="">Select A Service</option>
										@include('includes.in_services_option') 
									</select>
								</div>
								<div class="col-12 col-md-6">
									<label for="doctor_id" class="form-label">Doctor ID</label>
									<input type="text" class="form-control" name="doctor_id" id="doctor_id" value="{{ old('doctor_id', $appointment->doctor_id) }}">
								</div>
								<div class="col-12 col-md-6">
									<label for="appointment_status" class="form-label">Appointment Status</label>
									<select class="form-control" name="appointment_status" id="appointment_status">
										<option value="">Select Status</option>
										<option value="Scheduled" {{ old('appointment_status', $appointment->appointment_status) == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
										<option value="Confirmed" {{ old('appointment_status', $appointment->appointment_status) == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
										<option value="Completed" {{ old('appointment_status', $appointment->appointment_status) == 'Completed' ? 'selected' : '' }}>Completed</option>
										<option value="Cancelled" {{ old('appointment_status', $appointment->appointment_status) == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
									</select>
								</div>
								<div class="col-12 col-md-6">
									<label for="confirmation" class="form-label">Confirmation</label>
									<select class="form-control" name="confirmation" id="confirmation">
										<option value="">Select Confirmation</option>
										<option value="Pending" {{ old('confirmation', $appointment->confirmation) == 'Pending' ? 'selected' : '' }}>Pending</option>
										<option value="Confirmed" {{ old('confirmation', $appointment->confirmation) == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
										<option value="Rejected" {{ old('confirmation', $appointment->confirmation) == 'Rejected' ? 'selected' : '' }}>Rejected</option>
									</select>
								</div>
								<div class="col-12 col-md-6">
									<label for="status" class="form-label">Record Status</label>
									<select class="form-control" name="status" id="status">
										<option value="Active" {{ old('status', $appointment->status) == 'Active' ? 'selected' : '' }}>Active</option>
										<option value="Inactive" {{ old('status', $appointment->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
									</select>
								</div>
								<div class="col-12">
									<label for="message" class="form-label">Message</label>
									<textarea class="form-control" rows="4" name="message" id="message">{{ old('message', $appointment->message) }}</textarea>
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-primary">Update Appointment</button>
									<a href="{{ route('appointment.index') }}" class="btn btn-secondary">Cancel</a>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>	

</x-app-layout>
