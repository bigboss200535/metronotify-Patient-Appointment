<x-app-layout>

 <div class="mobile-menu-overlay"></div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Contact Groups</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Contact Groups</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createGroupModal">
								<i class="dw dw-plus"></i> Create Group
							</button>
						</div>
					</div>
				</div>

				<!-- Contact Groups Grid -->
				<div class="row" id="groupsContainer">
					@if(count($groups) > 0)
						@foreach($groups as $group)
							<div class="col-md-4 col-sm-6 mb-30">
								<div class="card-box height-100-p">
									<div class="pd-20">
										<div class="d-flex justify-content-between align-items-center mb-3">
											<h5 class="mb-0">{{ $group->group_name }}</h5>
											<div class="dropdown">
												<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
													<i class="dw dw-more"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a href="#" class="dropdown-item" onclick="viewGroup('{{ $group->id }}')">
														<i class="dw dw-eye"></i> View Contacts
													</a>
													<a href="#" class="dropdown-item" onclick="uploadContacts('{{ $group->id }}', '{{ $group->group_name }}')">
														<i class="dw dw-upload"></i> Upload Contacts
													</a>
													<a href="#" class="dropdown-item text-danger" onclick="deleteGroup('{{ $group->id }}', '{{ $group->group_name }}')">
														<i class="dw dw-delete-3"></i> Delete
													</a>
												</div>
											</div>
										</div>
										
										<p class="text-muted mb-3">{{ $group->description ?: 'No description' }}</p>
										
										<div class="d-flex justify-content-between align-items-center">
											<div>
												<span class="badge badge-primary">{{ $group->contact_count }} Contacts</span>
											</div>
											<div>
												<span class="badge badge-{{ $group->status == 'Active' ? 'success' : 'secondary' }}">
													{{ $group->status }}
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					@else
						<div class="col-12">
							<div class="card-box">
								<div class="text-center py-5">
									<i class="dw dw-users" style="font-size: 48px; color: #ccc;"></i>
									<h5 class="mt-3 text-muted">No Contact Groups</h5>
									<p class="text-muted">Create your first contact group to start organizing your contacts.</p>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createGroupModal">
										<i class="dw dw-plus"></i> Create Group
									</button>
								</div>
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>

<!-- Create Group Modal -->
<div class="modal fade" id="createGroupModal" tabindex="-1" role="dialog" aria-labelledby="createGroupModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="createGroupModalLabel">Create Contact Group</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="createGroupForm">
				<div class="modal-body">
					<div class="form-group">
						<label for="groupName">Group Name *</label>
						<input type="text" class="form-control" id="groupName" name="group_name" required>
						<small class="form-text text-muted">Enter a unique name for this contact group.</small>
					</div>
					
					<div class="form-group">
						<label for="description">Description</label>
						<textarea class="form-control" id="description" name="description" rows="3" placeholder="Optional description for this group"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary" id="createGroupBtn">
						<i class="dw dw-plus"></i> Create Group
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Upload Contacts Modal -->
<div class="modal fade" id="uploadContactsModal" tabindex="-1" role="dialog" aria-labelledby="uploadContactsModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="uploadContactsModalLabel">Upload Contacts to <span id="uploadGroupName"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="uploadContactsForm" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" id="uploadGroupId" name="group_id">
					
					<div class="form-group">
						<label for="contactFile">Select File (Excel/CSV) *</label>
						<input type="file" class="form-control-file" id="contactFile" name="file" accept=".xlsx,.xls,.csv" required>
						<small class="form-text text-muted">
							Upload an Excel or CSV file with contacts. The file should contain a 'telephone' column (required) and optionally 'name' and 'email' columns.
						</small>
					</div>
					
					<div class="alert alert-info">
						<h6><i class="dw dw-info"></i> File Format Requirements:</h6>
						<ul class="mb-0">
							<li>File must contain a 'telephone' column with phone numbers</li>
							<li>Optional columns: 'name', 'email'</li>
							<li>Supported formats: .xlsx, .xls, .csv</li>
							<li>Maximum file size: 10MB</li>
						</ul>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary" id="uploadBtn">
						<i class="dw dw-upload"></i> Upload Contacts
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Group Details Modal -->
<div class="modal fade" id="groupDetailsModal" tabindex="-1" role="dialog" aria-labelledby="groupDetailsModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="groupDetailsModalLabel">Contacts in <span id="detailsGroupName"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Telephone</th>
								<th>Group</th>
								<th>Added Date</th>
							</tr>
						</thead>
						<tbody id="contactsTableBody">
							<tr>
								<td colspan="3" class="text-center">
									<div class="spinner-border spinner-border-sm" role="status">
										<span class="sr-only">Loading...</span>
									</div>
									<p class="mt-2">Loading contacts...</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Create group form
    document.getElementById('createGroupForm').addEventListener('submit', function(e) {
        e.preventDefault();
        createGroup();
    });
    
    // Upload contacts form
    document.getElementById('uploadContactsForm').addEventListener('submit', function(e) {
        e.preventDefault();
        uploadContacts();
    });
    
    function createGroup() {
        const form = document.getElementById('createGroupForm');
        const formData = new FormData(form);
        
        const btn = document.getElementById('createGroupBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="dw dw-spinner"></i> Creating...';
        
        fetch('{{ route("contact-groups.store") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                group_name: formData.get('group_name'),
                description: formData.get('description')
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                $('#createGroupModal').modal('hide');
                form.reset();
                location.reload(); // Reload to show new group
            } else {
                alert('Error creating group: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(error => {
            console.error('Error creating group:', error);
            alert('Error creating group. Please try again.');
        })
        .finally(() => {
            btn.disabled = false;
            btn.innerHTML = '<i class="dw dw-plus"></i> Create Group';
        });
    }
    
    window.uploadContacts = function(groupId, groupName) {
        document.getElementById('uploadGroupId').value = groupId;
        document.getElementById('uploadGroupName').textContent = groupName;
        $('#uploadContactsModal').modal('show');
    };
    
    function uploadContacts() {
        const form = document.getElementById('uploadContactsForm');
        const formData = new FormData(form);
        
        const btn = document.getElementById('uploadBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="dw dw-spinner"></i> Uploading...';
        
        fetch(`{{ route("contact-groups.upload", ":id") }}`.replace(':id', formData.get('group_id')), {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                $('#uploadContactsModal').modal('hide');
                form.reset();
                alert(data.message);
                location.reload(); // Reload to update contact counts
            } else {
                alert('Error uploading contacts: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(error => {
            console.error('Error uploading contacts:', error);
            alert('Error uploading contacts. Please try again.');
        })
        .finally(() => {
            btn.disabled = false;
            btn.innerHTML = '<i class="dw dw-upload"></i> Upload Contacts';
        });
    }
    
    window.viewGroup = function(groupId) {
        document.getElementById('detailsGroupName').textContent = '';
        document.getElementById('contactsTableBody').innerHTML = `
            <tr>
                <td colspan="3" class="text-center">
                    <div class="spinner-border spinner-border-sm" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <p class="mt-2">Loading contacts...</p>
                </td>
            </tr>
        `;
        
        fetch(`{{ route("contact-groups.contacts", ":id") }}`.replace(':id', groupId))
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    displayGroupContacts(data.contacts);
                } else {
                    document.getElementById('contactsTableBody').innerHTML = `
                        <tr>
                            <td colspan="3" class="text-center text-danger">
                                Error loading contacts
                            </td>
                        </tr>
                    `;
                }
            })
            .catch(error => {
                console.error('Error loading contacts:', error);
                document.getElementById('contactsTableBody').innerHTML = `
                    <tr>
                        <td colspan="3" class="text-center text-danger">
                            Error loading contacts
                        </td>
                    </tr>
                `;
            });
    };
    
    function displayGroupContacts(contacts) {
        const tableBody = document.getElementById('contactsTableBody');
        
        if (!contacts || contacts.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="3" class="text-center text-muted">
                        No contacts found in this group.
                    </td>
                </tr>
            `;
            return;
        }
        
        let html = '';
        contacts.forEach(contact => {
            html += `
                <tr>
                    <td>${contact.telephone}</td>
                    <td>${contact.telephone_group}</td>
                    <td>${contact.added_date ? new Date(contact.added_date).toLocaleDateString() : 'N/A'}</td>
                </tr>
            `;
        });
        
        tableBody.innerHTML = html;
    }
    
    window.deleteGroup = function(groupId, groupName) {
        if (!confirm(`Are you sure you want to delete the group "${groupName}"? This will not delete the contacts, only the group.`)) {
            return;
        }
        
        fetch(`{{ route("contact-groups.destroy", ":id") }}`.replace(':id', groupId), {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Group deleted successfully');
                location.reload();
            } else {
                alert('Error deleting group: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(error => {
            console.error('Error deleting group:', error);
            alert('Error deleting group. Please try again.');
        });
    };
});
</script>
</x-app-layout>
