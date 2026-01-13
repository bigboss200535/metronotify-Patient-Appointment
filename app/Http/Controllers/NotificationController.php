<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display the notifications page.
     */
    public function index()
    {
        return view('portal.notifications.index');
    }

    /**
     * Get all notifications data for authenticated user.
     */
    public function getAll()
    {
        $notifications = Notification::where('user_id', Auth::user()->user_id)
            ->orderBy('created_at', 'desc')
            ->limit(50)
            ->get();

        $unreadCount = Notification::where('user_id', Auth::user()->user_id)
            ->where('is_read', false)
            ->count();

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $unreadCount,
        ]);
    }

    /**
     * Get unread notifications for dropdown.
     */
    public function unread()
    {
        $notifications = Notification::where('user_id', Auth::user()->user_id)
            ->where('is_read', false)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $unreadCount = Notification::where('user_id', Auth::user()->user_id)
            ->where('is_read', false)
            ->count();

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $unreadCount,
        ]);
    }

    /**
     * Mark a notification as read.
     */
    public function markAsRead($notification_id)
    {
        $notification = Notification::where('notification_id', $notification_id)
            ->where('user_id', Auth::user()->user_id)
            ->firstOrFail();

        $notification->markAsRead();

        return response()->json(['success' => true, 'message' => 'Notification marked as read']);
    }

    /**
     * Mark all notifications as read.
     */
    public function markAllAsRead()
    {
        Notification::where('user_id', Auth::user()->user_id)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json(['success' => true, 'message' => 'All notifications marked as read']);
    }

    /**
     * Delete a notification.
     */
    public function destroy($notification_id)
    {
        $notification = Notification::where('notification_id', $notification_id)
            ->where('user_id', Auth::user()->user_id)
            ->firstOrFail();

        $notification->delete();

        return response()->json(['success' => true, 'message' => 'Notification deleted']);
    }

    /**
     * Get unread notification count.
     */
    public function getUnreadCount()
    {
        $count = Notification::where('user_id', Auth::user()->user_id)
            ->where('is_read', false)
            ->count();

        return response()->json(['count' => $count]);
    }
}
