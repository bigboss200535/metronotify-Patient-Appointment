<x-app-layout>

 <div class="mobile-menu-overlay"></div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Notifications</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Notifications</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<button type="button" class="btn btn-sm btn-secondary" id="markAllReadBtn">Mark All as Read</button>
						</div>
					</div>
				</div>

				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">All Notifications</h4>
						
						<div id="notificationsContainer">
							<div class="text-center p-5">
								<div class="spinner-border spinner-border-sm" role="status">
									<span class="sr-only">Loading...</span>
								</div>
								<p class="mt-2">Loading notifications...</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    loadAllNotifications();
    
    function loadAllNotifications() {
        //  fetch('{{ route("notifications.index") }}')
        fetch('{{ route("notifications.data") }}')
            .then(response => response.json())
            .then(data => {
                displayNotifications(data.notifications || []);
            })
            .catch(error => {
                console.error('Error loading notifications:', error);
                document.getElementById('notificationsContainer').innerHTML = `
                    <div class="alert alert-danger">
                        Error loading notifications. Please try again.
					</div>
                `;
            });
    }

    function displayNotifications(notifications) {
        const container = document.getElementById('notificationsContainer');
        
        if (notifications.length === 0) {
            container.innerHTML = `
                <div class="text-center p-5">
					<div class="mb-4">
						<i class="dw dw-notification" style="font-size: 48px; color: #ccc;"></i>
					</div>
					<h5 class="text-muted">No Notifications</h5>
					<p class="text-muted">You don't have any notifications at the moment.</p>
				</div>
            `;
            return;
        }

        let html = '<div class="notification-list">';
        notifications.forEach(notification => {
            const readClass = notification.is_read ? 'read-notification' : 'unread-notification';
            const iconClass = notification.type === 'appointment' ? 'dw-calendar' : 'dw-mail';
            const bgClass = notification.is_read ? 'bg-light' : 'bg-primary';
            const textClass = notification.is_read ? 'text-muted' : 'text-white';
            const timeAgo = formatTimeAgo(notification.created_at);
            
            html += `
                <div class="notification-item ${readClass} mb-3 p-3 border rounded" data-notification-id="${notification.notification_id}">
                    <div class="d-flex align-items-start">
                        <div class="notification-icon mr-3 ${bgClass} ${textClass} rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; flex-shrink: 0;">
                            <i class="dw ${iconClass}"></i>
                        </div>
                        <div class="notification-content flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="mb-0 ${notification.is_read ? 'text-muted' : 'text-dark'}">${notification.title}</h6>
                                <small class="text-muted">${timeAgo}</small>
                            </div>
                            <p class="mb-2 ${notification.is_read ? 'text-muted' : 'text-dark'}">${notification.message}</p>
                            <div class="notification-actions">
                                ${!notification.is_read ? `
                                    <button type="button" class="btn btn-sm btn-primary" onclick="markAsRead('${notification.notification_id}', '${notification.type}', '${notification.related_id}')">
                                        <i class="dw dw-eye"></i> View
                                    </button>
                                ` : `
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="redirectToItem('${notification.type}', '${notification.related_id}')">
                                        <i class="dw dw-arrow-right"></i> View Details
                                    </button>
                                `}
                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteNotification('${notification.notification_id}')">
                                    <i class="dw dw-delete-3"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
        html += '</div>';
        container.innerHTML = html;
    }

    function formatTimeAgo(dateString) {
        const date = new Date(dateString);
        const now = new Date();
        const seconds = Math.floor((now - date) / 1000);
        
        if (seconds < 60) return 'Just now';
        if (seconds < 3600) return Math.floor(seconds / 60) + ' minutes ago';
        if (seconds < 86400) return Math.floor(seconds / 3600) + ' hours ago';
        if (seconds < 604800) return Math.floor(seconds / 86400) + ' days ago';
        
        return date.toLocaleDateString();
    }

    window.markAsRead = function(notificationId, type, relatedId) {
        fetch(`{{ route("notifications.read", ":notification_id") }}`.replace(':notification_id', notificationId), {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to related item
                redirectToItem(type, relatedId);
            }
        })
        .catch(error => {
            console.error('Error marking notification as read:', error);
            alert('Error marking notification as read');
        });
    };

    window.redirectToItem = function(type, relatedId) {
        if (type === 'appointment') {
            window.location.href = `{{ route("appointment.show", ":appointment_id") }}`.replace(':appointment_id', relatedId);
        } else if (type === 'enquiry') {
            window.location.href = '{{ route("enquiry.index") }}';
        }
    };

    window.deleteNotification = function(notificationId) {
        if (!confirm('Are you sure you want to delete this notification?')) {
            return;
        }
        
        fetch(`{{ route("notifications.destroy", ":notification_id") }}`.replace(':notification_id', notificationId), {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove notification from DOM
                const notificationElement = document.querySelector(`[data-notification-id="${notificationId}"]`);
                if (notificationElement) {
                    notificationElement.remove();
                }
            }
        })
        .catch(error => {
            console.error('Error deleting notification:', error);
            alert('Error deleting notification');
        });
    };

    // Mark all as read
    document.getElementById('markAllReadBtn').addEventListener('click', function() {
        fetch('{{ route("notifications.read-all") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadAllNotifications(); // Reload the page
            }
        })
        .catch(error => {
            console.error('Error marking all notifications as read:', error);
            alert('Error marking all notifications as read');
        });
    });
});
</script>

<style>
.notification-item {
    transition: all 0.3s ease;
}

.notification-item:hover {
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.notification-item.unread-notification {
    border-left: 4px solid #007bff;
    background-color: #f8f9ff;
}

.notification-item.read-notification {
    border-left: 4px solid #e9ecef;
    background-color: #fff;
}

.notification-actions {
    margin-top: 10px;
}

.notification-actions .btn {
    margin-right: 8px;
}
</style>
</x-app-layout>
