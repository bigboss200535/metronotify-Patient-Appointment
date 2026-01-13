    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
            <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
            <!--  -->
        </div>
        <div class="header-right">
             {{-- <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                        <i class="dw dw-settings2"></i>
                    </a>
                </div>
            </div> --}}
            <div class="user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown" id="notificationDropdown">
                        <i class="icon-copy dw dw-notification"></i>
                        <span class="badge notification-active" id="notificationCount">0</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="notification-list mx-h-350 customscroll" id="notificationList">
                            <div class="text-center p-3">
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <p class="mt-2">Loading notifications...</p>
                            </div>
                        </div>
                        <div class="dropdown-footer text-center p-2">
                            <a href="#" class="btn btn-sm btn-link" id="markAllRead">Mark all as read</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="{{ asset('portal/vendors/images/male.jpg') }}" alt="">
                        </span>
                        <!-- <span class="user-name">Mohammed Alhassan</span> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <!-- -->
                        <a class="dropdown-item" href="#"><i class="dw dw-user1"></i> Profile</a>
                        <!-- <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a> -->
                        <!-- <a class="dropdown-item" href="#"><i class="dw dw-help"></i> Help</a> -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="dw dw-logout"></i> 
                                Log Out
                            </a>
                        </form>
                    </div>
                </div>
            </div>
           <!--  <div class="github-link">
                <a href="#" target="_blank"><img src="{{ asset('portal/vendors/images/github.svg') }}" alt=""></a>
            </div> -->
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let notifications = [];
    let unreadCount = 0;

    // Load notifications on page load
    loadNotifications();
    
    // Load notifications every 30 seconds
    setInterval(loadNotifications, 30000);

    function loadNotifications() {
        fetch('{{ route("notifications.index") }}')
            .then(response => response.json())
            .then(data => {
                notifications = data.notifications || [];
                unreadCount = data.unread_count || 0;
                updateNotificationUI();
            })
            .catch(error => {
                console.error('Error loading notifications:', error);
            });
    }

    function updateNotificationUI() {
        const notificationList = document.getElementById('notificationList');
        const notificationCount = document.getElementById('notificationCount');
        
        // Update count badge
        notificationCount.textContent = unreadCount;
        notificationCount.style.display = unreadCount > 0 ? 'inline-block' : 'none';
        
        // Update notification list
        if (notifications.length === 0) {
            notificationList.innerHTML = `
                <div class="text-center p-3">
                    <p class="text-muted">No notifications</p>
                </div>
            `;
        } else {
            let html = '<ul class="list-unstyled">';
            notifications.forEach(notification => {
                const readClass = notification.is_read ? 'read-notification' : 'unread-notification';
                const iconClass = notification.type === 'appointment' ? 'dw-calendar' : 'dw-mail';
                const timeAgo = formatTimeAgo(notification.created_at);
                
                html += `
                    <li class="notification-item ${readClass}" data-notification-id="${notification.notification_id}">
                        <a href="#" class="notification-link" onclick="handleNotificationClick('${notification.notification_id}', '${notification.type}', '${notification.related_id}'); return false;">
                            <div class="d-flex align-items-center">
                               
                                <div class="notification-content flex-grow-1">
                                    <h6 class="mb-1">${notification.title}</h6>
                                    <p class="mb-1 small">${notification.message}</p>
                                    <small class="text-muted">${timeAgo}</small>
                                </div>
                                ${!notification.is_read ? '<div class="notification-dot"></div>' : ''}
                            </div>
                        </a>
                    </li>
                `;
            });
            html += '</ul>';
            notificationList.innerHTML = html;
        }
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

    window.handleNotificationClick = function(notificationId, type, relatedId) {
        // Mark as read
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
                // Remove notification from list
                const notificationElement = document.querySelector(`[data-notification-id="${notificationId}"]`);
                if (notificationElement) {
                    notificationElement.remove();
                }
                
                // Update unread count
                unreadCount = Math.max(0, unreadCount - 1);
                updateNotificationUI();
                
                // Redirect based on notification type
                if (type === 'appointment') {
                    window.location.href = `{{ route("appointment.show", ":appointment_id") }}`.replace(':appointment_id', relatedId);
                } else if (type === 'enquiry') {
                    window.location.href = '{{ route("enquiry.index") }}';
                }
            }
        })
        .catch(error => {
            console.error('Error marking notification as read:', error);
        });
    };

    // Mark all as read
    document.getElementById('markAllRead').addEventListener('click', function(e) {
        e.preventDefault();
        
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
                unreadCount = 0;
                notifications.forEach(notification => {
                    notification.is_read = true;
                });
                updateNotificationUI();
            }
        })
        .catch(error => {
            console.error('Error marking all notifications as read:', error);
        });
    });
});
</script>

<style>
.notification-item {
    border-bottom: 1px solid #eee;
    padding: 10px 15px;
}

.notification-item.unread-notification {
    background-color: #f8f9fa;
}

.notification-item.read-notification {
    background-color: #fff;
}

.notification-link {
    color: inherit;
    text-decoration: none;
}

.notification-link:hover {
    text-decoration: none;
    background-color: #f0f0f0;
}

.notification-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #007bff;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
}

.notification-content h6 {
    font-weight: 600;
    margin-bottom: 2px;
}

.notification-content p {
    margin-bottom: 2px;
    color: #666;
}

.notification-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #007bff;
    margin-left: 10px;
}

.dropdown-footer {
    border-top: 1px solid #eee;
}
</style>
