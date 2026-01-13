<x-app-layout>

 <div class="mobile-menu-overlay"></div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Appointment Details</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('appointment.index') }}">Appointments</a></li>
									<li class="breadcrumb-item active" aria-current="page">Details</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<a href="{{ route('appointment.index') }}" class="btn btn-secondary">
								<i class="dw dw-arrow-left"></i> Back to List
							</a>
							<a href="{{ route('appointment.edit', $appointment->appointment_id) }}" class="btn btn-primary">
								<i class="dw dw-edit2"></i> Edit
							</a>
						</div>
					</div>
				</div>

				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Patient Information</h4>
						<div class="row">
							<div class="col-md-6">
								<p><strong>Full Name:</strong> {{ $appointment->fullname }}</p>
								<p><strong>Email:</strong> {{ $appointment->email ?? 'N/A' }}</p>
								<p><strong>Telephone:</strong> {{ $appointment->telephone ?? 'N/A' }}</p>
							</div>
							<div class="col-md-6">
								<p><strong>Service Type:</strong> {{ $appointment->service ?? 'N/A' }}</p>
								<p><strong>Status:</strong> <span class="badge badge-{{ $appointment->status == 'Active' ? 'success' : 'secondary' }}">{{ $appointment->status }}</span></p>
								<p><strong>Appointment Status:</strong> {{ $appointment->appointment_status ?? 'N/A' }}</p>
							</div>
						</div>
					</div>
				</div>

				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Appointment Details</h4>
						<div class="row">
							<div class="col-md-6">
								<p><strong>Appointment Date:</strong> {{ $appointment->appointment_date ? \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') : 'N/A' }}</p>
								<p><strong>Appointment Time:</strong> {{ $appointment->appointment_time ? \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') : 'N/A' }}</p>
							</div>
							<div class="col-md-6">
								<p><strong>Doctor ID:</strong> {{ $appointment->doctor_id ?? 'N/A' }}</p>
								<p><strong>Confirmation:</strong> {{ $appointment->confirmation ?? 'N/A' }}</p>
							</div>
						</div>
					</div>
				</div>

				@if($appointment->message)
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Message</h4>
						<p>{{ $appointment->message }}</p>
					</div>
				</div>
				@endif

				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">System Information</h4>
						<div class="row">
							<div class="col-md-6">
								<p><strong>Added Date:</strong> {{ $appointment->added_date ? \Carbon\Carbon::parse($appointment->added_date)->format('d M Y h:i A') : 'N/A' }}</p>
								<p><strong>Added By:</strong> {{ $appointment->added_id ?? 'N/A' }}</p>
							</div>
							<div class="col-md-6">
								<p><strong>Updated By:</strong> {{ $appointment->updated_by ?? 'N/A' }}</p>
								<p><strong>Archived:</strong> <span class="badge badge-{{ $appointment->archived == 'No' ? 'success' : 'danger' }}">{{ $appointment->archived }}</span></p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>	

</x-app-layout>
