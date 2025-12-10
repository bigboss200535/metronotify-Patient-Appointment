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
									<th>Blocked</th>
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
									<td>
										<span class="badge badge-{{ $user->status == 'Active' ? 'success' : 'secondary' }}">
                                          {{ $user->status }}
                                        </span>
									</td>
									<td>
										<span class="badge badge-{{ $user->is_blocked == '0' ? 'primary' : 'warning' }}">
                                          {{ $user->is_blocked== '0' ? 'Not Blocked' : 'Blocked' }}
                                        </span>
									</td>
									<td>{{ Carbon\Carbon::parse($user->added_date)->format('d-m-Y') }}</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item js-view-user" href="#"
                              						 data-user='@json($user)'>
                                					<i class="dw dw-eye"></i> Details
                            					</a>
												<!-- <a class="dropdown-item js-view-user" href="#" data-bs-toggle="modal" data-bs-target="#viewUserModal"
													data-user-id="{{ $user->user_id }}"
													data-firstname="{{ $user->firstname }}"
													data-othername="{{ $user->othername }}"
													data-email="{{ $user->email }}"
													data-telephone="{{ $user->telephone }}"
													data-gender="{{ $user->gender }}"
													data-status="{{ $user->status }}"
													data-added-date="{{ \Carbon\Carbon::parse($user->added_date)->format('d-m-Y') }}"
													data-user-role="{{ $user->user_role }}"
													data-is-blocked="{{ $user->is_blocked ? 'Yes' : 'No' }}">
													<i class="dw dw-eye"></i> Details</a> -->
												<a class="dropdown-item js-edit-user" href="#"
   													data-user='@json($user)'>
    												<i class="dw dw-edit2"></i> Edit
												</a>
													<a class="dropdown-item js-toggle-block" href="#" 
														data-user-id="{{ $user->user_id }}"
														data-fullname="{{ $user->firstname }} {{ $user->othername }}"
														data-is-blocked="{{ $user->is_blocked }}">
															<i class="dw dw-shield"></i>
															<span class="block-text">{{ $user->is_blocked ? 'Unblock' : 'Block' }}</span>
														</a> 
												<a class="dropdown-item js-delete-user" href="#" data-toggle="modal" data-target="#deleteUserModal"
													data-user-id="{{ $user->user_id }}"
													data-fullname="{{ $user->firstname }} {{ $user->othername }}">
													<i class="dw dw-delete-3"></i> Delete</a>
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
									<th>Blocked</th>
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

	<!-- View User Modal -->
	<div class="modal fade" id="viewUserModal" tabindex="-1" role="dialog" aria-labelledby="viewUserLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editUserLabel">User Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<tbody>
								<tr>
									<td>Full Name</td>
									<td id="view_fullname"></td>
								</tr>
								<tr>
									<td>Email</td>
									<td id="view_email"></td>
								</tr>
								<tr>
									<td>Telephone</td>
									<td id="view_telephone"></td>
								</tr>
								<tr>
									<td>Gender</td>
									<td id="view_gender"></td>
								</tr>
								<tr>
									<td>Status</td>
									<td id="view_status"></td>
								</tr>
								<tr>
									<td>Role</td>
									<td id="view_role"></td>
								</tr>
								<tr>
									<td>Blocked</td>
									<td id="view_blocked"></td>
								</tr>
								<tr>
									<td>Added Date</td>
									<td id="view_added_date"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Edit User Modal -->
	<div class="modal fade" id="editUserModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="editUserForm" method="POST">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_user_id">
                    <div class="mb-3">
                        <label>First Name</label>
                        <input type="text" name="firstname" id="edit_firstname" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Other Name</label>
                        <input type="text" name="othername" id="edit_othername" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" id="edit_email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Telephone</label>
                        <input type="text" name="telephone" id="edit_telephone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" id="edit_status" class="form-control" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

	<!-- Block/Unblock Confirmation Modal -->
<div class="modal fade" id="blockUserModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="blockUserForm" method="POST">
            @csrf
            <input type="hidden" name="_method" id="block_method">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="blockModalTitle">Block User</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to <strong id="block_action_text">block</strong> <span id="block_username"></span>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>

	<!-- Delete User Modal -->
	<div class="modal fade" id="deleteUserModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="deleteUserForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to <strong>delete</strong> <span id="delete_name" class="text-danger"></span>?</p>
                    <small class="text-muted">This will delete the user permanently.</small>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // View User
    document.querySelectorAll('.js-view-user').forEach(btn => {
        btn.addEventListener('click', function () {
            const user = this.dataset.user ? JSON.parse(this.dataset.user) : {};
            $('#v_firstname').text(user.firstname || '');
			$('#v_othername').text(user.othername || '');
            $('#v_email').text(user.email || '');
            $('#v_telephone').text(user.telephone || '—');
            $('#v_gender').text(user.gender || '—');
            $('#v_role').text(user.user_role || '—');
            $('#v_status').text(user.status || '');
            $('#v_blocked').text(user.is_blocked ? 'Yes' : 'No');
            $('#v_added').text(user.added_date ? new Date(user.added_date).toLocaleDateString('en-GB') : '');
			$('#viewUserModal').attr('action', '/selfservice/users/' + user.user_id);
            $('#viewUserModal').modal('show');
        });
    });

    // Edit User
    document.querySelectorAll('.js-edit-user').forEach(btn => {
        btn.addEventListener('click', function () {
            const user = JSON.parse(this.dataset.user);
            $('#edit_user_id').val(user.user_id);
            $('#edit_firstname').val(user.firstname);
            $('#edit_othername').val(user.othername);
            $('#edit_email').val(user.email);
            $('#edit_telephone').val(user.telephone);
            $('#edit_status').val(user.status);

            $('#editUserForm').attr('action', '/selfservice/users/' + user.user_id);
            $('#editUserModal').modal('show');
        });
    });

    // Delete User
    document.querySelectorAll('.js-delete-user').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.userId;
            const name = this.dataset.name;
            $('#delete_name').text(name);
            $('#deleteUserForm').attr('action', '/selfservice/users/' + id);
            $('#deleteUserModal').modal('show');
        });
    });

    // Block / Unblock
    document.querySelectorAll('.js-toggle-block').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.userId;
            const name = this.dataset.name;
            const blocked = this.dataset.blocked == '1' || this.dataset.blocked === true;

            const action = blocked ? 'unblock' : 'block';
            const actionText = blocked ? 'unblock' : 'block';

            $('#blockModalTitle').text((blocked ? 'Unblock' : 'Block') + ' User');
            $('#block_action').text(actionText);
            $('#block_name').text(name);

            $('#blockUserForm')
                .attr('action', '/selfservice/users/' + id + '/' + action)
                .find('input[name="_method"]').remove(); // Remove if exists

            if (action === 'block') {
                $('#blockUserForm').append('<input type="hidden" name="_method" value="POST">');
            }

            $('#blockUserModal').modal('show');
        });
    });
});
</script>
	</x-app-layout>
	