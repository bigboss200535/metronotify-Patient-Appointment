<x-app-layout>

 <div class="mobile-menu-overlay"></div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>SMS Management</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">SMS</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sendSmsModal">
								<i class="dw dw-send"></i> Send SMS
							</button>
						</div>
					</div>
				</div>

				<!-- SMS Statistics Cards -->
				<div class="row">
					<div class="col-md-4 col-sm-12 mb-30">
						<div class="card-box height-100-p d-flex flex-column">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<p class="mb-0 text-small">Total Sent</p>
										<h3 class="mb-0" id="totalSent">0</h3>
									</div>
									<div class="bg-primary text-white rounded-circle p-3">
										{{-- <i class="dw dw-paper-plane-1"></i> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 mb-30">
						<div class="card-box height-100-p d-flex flex-column">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<p class="mb-0 text-small">Delivered</p>
										<h3 class="mb-0 text-success" id="deliveredCount">0</h3>
									</div>
									<div class="bg-success text-white rounded-circle p-3">
										{{-- <i class="dw dw-check"></i> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 mb-30">
						<div class="card-box height-100-p d-flex flex-column">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<p class="mb-0 text-small">Not Delivered</p>
										<h3 class="mb-0 text-danger" id="notDeliveredCount">0</h3>
									</div>
									<div class="bg-danger text-white rounded-circle p-3">
										{{-- <i class="dw dw-close-circle"></i> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- SMS List -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<div class="d-flex justify-content-between align-items-center mb-3">
							<h4 class="text-blue h4 mb-0">SMS History</h4>
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-outline-primary" id="filterAll">All</button>
								<button type="button" class="btn btn-sm btn-outline-success" id="filterDelivered">Delivered</button>
								<button type="button" class="btn btn-sm btn-outline-danger" id="filterNotDelivered">Not Delivered</button>
							</div>
						</div>
						
						<div class="table-responsive">
							<table class="data-table table nowrap">
								<thead>
									<tr>
										<th>Recipient</th>
										<th>Message</th>
										<th>Status</th>
										<th>Date</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody id="smsTableBody">
									<tr>
										<td colspan="5" class="text-center">
											<div class="spinner-border spinner-border-sm" role="status">
												<span class="sr-only">Loading...</span>
											</div>
											<p class="mt-2">Loading SMS data...</p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Send SMS Modal -->
<div class="modal fade" id="sendSmsModal" tabindex="-1" role="dialog" aria-labelledby="sendSmsModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="sendSmsModalLabel">Send SMS</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="sendSmsForm">
				<div class="modal-body">
					<div class="form-group">
						<label for="sendType">Send Type</label>
						<select class="custom-select" id="sendType" name="send_type">
							<option value="individual">Individual</option>
							<option value="bulk">Bulk SMS</option>
						</select>
					</div>
					
					<div id="individualSection">
						<div class="form-group">
							<label for="recipientNumber">Recipient Number</label>
							<input type="text" class="form-control" id="recipientNumber" name="recipient_number" placeholder="Enter phone number">
						</div>
					</div>
					
					<div id="bulkSection" style="display: none;">
						<div class="form-group">
							<label for="group">Contact Group</label>
							<select class="custom-select" id="group" name="group">
								<option value="">Loading groups...</option>
							</select>
							<small class="form-text text-muted">Select a contact group to send SMS to all contacts in that group.</small>
						</div>
					</div>
					
					<div class="form-group">
						<label for="message">Message</label>
						<textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your message" maxlength="160"></textarea>
						<small class="form-text text-muted">Character count: <span id="charCount">0</span>/160</small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary" id="sendSmsBtn">
						<i class="dw dw-paper-plane-1"></i> Send SMS
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- View SMS Modal -->
<div class="modal fade" id="viewSmsModal" tabindex="-1" role="dialog" aria-labelledby="viewSmsModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="viewSmsModalLabel">SMS Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Recipient Number</label>
							<p class="form-control-plaintext" id="viewRecipient"></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Status</label>
							<p class="form-control-plaintext" id="viewStatus"></p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>SMS Type</label>
							<p class="form-control-plaintext" id="viewType"></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Date Sent</label>
							<p class="form-control-plaintext" id="viewDate"></p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label>Message</label>
							<p class="form-control-plaintext" id="viewMessage" style="min-height: 100px; background-color: #f8f9fa; padding: 10px; border-radius: 4px;"></p>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Debug route existence
    // console.log('Available routes check:');
    // console.log('Route contact-groups.all:', '{{ route("contact-groups.all") }}');
    // console.log('Route sms.index:', '{{ route("sms.index") }}');
    // console.log('Route sms.statistics:', '{{ route("sms.statistics") }}');
    
    loadSmsData();
    loadStatistics();
    loadContactGroups();
    
    // Send type toggle
    document.getElementById('sendType').addEventListener('change', function() {
        const individualSection = document.getElementById('individualSection');
        const bulkSection = document.getElementById('bulkSection');
        const groupSelect = document.getElementById('group');
        
        // console.log('Send type changed to:', this.value);
        // console.log('Individual section:', individualSection);
        // console.log('Bulk section:', bulkSection);
        // console.log('Group select:', groupSelect);
        
        if (this.value === 'individual') {
            individualSection.style.display = 'block';
            bulkSection.style.display = 'none';
            // console.log('Showing individual section');
        } else {
            individualSection.style.display = 'none';
            bulkSection.style.display = 'block';
            // console.l/og('Showing bulk section');
        }
    });
    
    // message Character count in textarea
    document.getElementById('message').addEventListener('input', function() {
        document.getElementById('charCount').textContent = this.value.length;
    });
    
    // Send SMS form
    document.getElementById('sendSmsForm').addEventListener('submit', function(e) {
        e.preventDefault();
        sendSms();
    });
    
    // Filter buttons according to all, delivered or nor delivered
    document.getElementById('filterAll').addEventListener('click', () => filterSms('all'));
    document.getElementById('filterDelivered').addEventListener('click', () => filterSms('delivered'));
    document.getElementById('filterNotDelivered').addEventListener('click', () => filterSms('not_delivered'));
    
    function loadContactGroups() {
        // Debug route generation
        const routeUrl = '{{ route("contact-groups.all") }}';
        console.log('Contact groups route URL:', routeUrl);
        
        // console.log('Loading contact groups...');
        fetch(routeUrl)
            .then(response => {
                console.log('Response status:', response.status);
                console.log('Response headers:', response.headers);
                return response.json();
            })
            .then(data => {
                console.log('Contact groups data:', data);
                if (data.status === 'success') {
                    const groupSelect = document.getElementById('group');
                    console.log('Group select element:', groupSelect);
                    groupSelect.innerHTML = '<option value="">Select a Group...</option>';
                    
                    data.groups.forEach(group => {
                        console.log('Adding group:', group);
                        const option = document.createElement('option');
                        option.value = group.group_name;
                        option.textContent = `${group.group_name} (${group.contact_count} contacts)`;
                        groupSelect.appendChild(option);
                    });
                    console.log('Final group select HTML:', groupSelect.innerHTML);
                } else {
                    console.error('Failed to load groups:', data);
                    const groupSelect = document.getElementById('group');
                    groupSelect.innerHTML = '<option value="">Error loading groups</option>';
                }
            })
            .catch(error => {
                console.error('Error loading contact groups:', error);
                console.error('Error details:', error.message);
                const groupSelect = document.getElementById('group');
                groupSelect.innerHTML = '<option value="">Error loading groups</option>';
            });
    }
    
    function loadSmsData() {
        fetch('{{ route("sms.index") }}')
            .then(response => response.text())
            .then(html => {
                
                displaySmsData(@json($items));
            })
            .catch(error => {
                console.error('Error loading SMS data:', error);
                document.getElementById('smsTableBody').innerHTML = `
                    <tr>
                        <td colspan="5" class="text-center text-danger">
                            Error loading SMS data. Please try again.
                        </td>
                    </tr>
                `;
            });
    }
    
    function loadStatistics() {
        console.log('Loading SMS statistics...');
        fetch('{{ route("sms.statistics") }}')
            .then(response => {
                console.log('Statistics response status:', response.status);
                return response.json();
            })
            .then(data => {
                console.log('Statistics data:', data);
                if (data.total_sent !== undefined) {
                    document.getElementById('totalSent').textContent = data.total_sent || 0;
                    document.getElementById('deliveredCount').textContent = data.delivered || 0;
                    document.getElementById('notDeliveredCount').textContent = data.not_delivered || 0;
                } else {
                    console.error('Invalid statistics response:', data);
                }
            })
            .catch(error => {
                console.error('Error loading statistics:', error);
                document.getElementById('totalSent').textContent = '0';
                document.getElementById('deliveredCount').textContent = '0';
                document.getElementById('notDeliveredCount').textContent = '0';
            });
    }
    
    function displaySmsData(items) {
        const tableBody = document.getElementById('smsTableBody');
        
        if (!items || items.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        No SMS records found.
                    </td>
                </tr>
            `;
            return;
        }
        
        let html = '';
        items.forEach(item => {
            const statusClass = getStatusClass(item.status);
            const formattedDate = formatDate(item.added_date);
            
            html += `
                <tr>
                    <td>${item.recipient_number || 'N/A'}</td>
                    <td>${item.sms_content ? (item.sms_content.length > 50 ? item.sms_content.substring(0, 50) + '...' : item.sms_content) : 'N/A'}</td>
                    <td><span class="${statusClass}">${item.status || 'Unknown'}</span></td>
                    <td>${formattedDate}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="viewSms('${item.id}')">
                            <i class="dw dw-eye"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteSms('${item.id}')">
                            <i class="dw dw-delete-3"></i>
                        </button>
                    </td>
                </tr>
            `;
        });
        
        tableBody.innerHTML = html;
    }
    
    function getStatusClass(status) {
        switch(status?.toLowerCase()) {
            case 'delivered':
                return 'sms-status-delivered';
            case 'not delivered':
            case 'failed':
                return 'sms-status-not-delivered';
            case 'pending':
                return 'sms-status-pending';
            default:
                return '';
        }
    }
    
    function formatDate(dateString) {
        if (!dateString) return 'N/A';
        const date = new Date(dateString);
        return date.toLocaleDateString() + ' ' + date.toLocaleTimeString();
    }
    
    function sendSms() {
        const form = document.getElementById('sendSmsForm');
        const formData = new FormData(form);
        const sendType = formData.get('send_type');
        
        const btn = document.getElementById('sendSmsBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="dw dw-spinner"></i> Sending...';
        
        const url = sendType === 'bulk' ? '{{ route("sms.send_all") }}' : '{{ route("sms.store") }}';
        
        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                message: formData.get('message'),
                recipient_number: formData.get('recipient_number'),
                group: formData.get('group'),
                send_type: sendType
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                $('#sendSmsModal').modal('hide');
                form.reset();
                document.getElementById('charCount').textContent = '0';
                loadSmsData();
                loadStatistics();
                  toastr.success(data.message || "SMS sent successfully", "Success");
                // alert(data.message || 'SMS sent successfully!');
            } else {
                 toastr.info(data.message || "Error sending SMS:" + data.message, "Unknown error");
                //  
            }
        })
        .catch(error => {
            // console.error('Error sending SMS:', error);
             toastr.info("Error sending SMS. Please try again.", "Info");
            // alert('Error sending SMS. Please try again.');
        })
        .finally(() => {
            btn.disabled = false;
            btn.innerHTML = '<i class="dw dw-paper-plane-1"></i> Send SMS';
        });
    }
    
    function filterSms(filter) {
        const rows = document.querySelectorAll('#smsTableBody tr');
        rows.forEach(row => {
            if (row.querySelector('.text-center') && row.querySelector('.text-muted')) return;
            
            const statusCell = row.querySelector('td:nth-child(3)');
            const status = statusCell ? statusCell.textContent.trim().toLowerCase() : '';
            
            let show = false;
            switch(filter) {
                case 'all':
                    show = true;
                    break;
                case 'delivered':
                    show = status.includes('delivered');
                    break;
                case 'not_delivered':
                    show = status.includes('not delivered') || status.includes('failed');
                    break;
            }
            
            row.style.display = show ? '' : 'none';
        });
    }
    
    window.viewSms = function(id) {
        // Fetch SMS details
        fetch(`/selfservice/sms/${id}`)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const sms = data.data;
                    document.getElementById('viewRecipient').textContent = sms.recipient_number || 'N/A';
                    document.getElementById('viewStatus').textContent = sms.status || 'Unknown';
                    document.getElementById('viewType').textContent = sms.sms_type || 'N/A';
                    document.getElementById('viewDate').textContent = sms.added_date ? new Date(sms.added_date).toLocaleString() : 'N/A';
                    document.getElementById('viewMessage').textContent = sms.sms_content || 'N/A';
                    
                    // Set status color
                    const statusElement = document.getElementById('viewStatus');
                    statusElement.className = 'form-control-plaintext';
                    if (sms.status === 'delivered') {
                        statusElement.style.color = '#28a745';
                    } else if (sms.status === 'not delivered' || sms.status === 'failed') {
                        statusElement.style.color = '#dc3545';
                    } else if (sms.status === 'pending') {
                        statusElement.style.color = '#ffc107';
                    }
                    
                    $('#viewSmsModal').modal('show');
                } else {
                    toastr.error('Error loading SMS details', 'Error');
                }
            })
            .catch(error => {
                console.error('Error loading SMS:', error);
                toastr.error('Error loading SMS details', 'Error');
            });
    };
    
    window.deleteSms = function(id) {
        if (!confirm('Are you sure you want to delete this SMS?')) {
            return;
        }
        
        fetch(`{{ route("sms.destroy", ":id") }}`.replace(':id', id), {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                loadSmsData();
                loadStatistics();
                  toastr.success("SMS deleted successfully", "Success");
                // alert('SMS deleted successfully');
            } else {
                toastr.error("Error deleting SMS:"+ data.message, "Error");
                // alert('Error deleting SMS: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(error => {
            // console.error('Error deleting SMS:', error);
              toastr.error("Error deleting SMS. Please try again.", "Error");
            // alert('Error deleting SMS. Please try again.');
        });
    };
});
</script>

<style>
.sms-status-delivered {
    color: #28a745;
    font-weight: 600;
}

.sms-status-not-delivered {
    color: #dc3545;
    font-weight: 600;
}

.sms-status-pending {
    color: #ffc107;
    font-weight: 600;
}
</style>
</x-app-layout>
