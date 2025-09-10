<x-app-layout>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Users</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Users</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				    
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						
						  <a href="#" class="btn-block pull-right">
						  	<h4 class="text-blue h4">System Users</h4>
							<input type="button" name="app_button" data-toggle="modal" data-target="#appointment_register" id="app_button" class="btn btn-primary pull-right" value="Add User">
						</a>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>S/N</th>
									<th class="table-plus datatable-nosort">Name</th>
									<th>Email</th>
									<th>Status</th>
									<th>Date Added</th>
									<!-- <th>Start Date</th> -->
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
							@php
                              $counter = 1;
                            @endphp

                             @foreach($users as $user)
								<tr>
									<td>{{ $counter++ }}</td>
									<td class="table-plus">{{ $user->firstname }} {{ $user->othername }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->status }}</td>
									<td>{{ \Carbon\Carbon::parse($user->added_date)->format('d-m-Y') }}</td>
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
									<th>S/N</th>
									<th class="table-plus datatable-nosort">Name</th>
									<th>Email</th>
									<th>Status</th>
									<th>Date Added</th>
									<!-- <th>Start Date</th> -->
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
	</x-app-layout>
	