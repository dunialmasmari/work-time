<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use validator;
use App\Models\tender;
use App\Models\Major;
use Carbon\Carbon;
use App\Models\job;
use App\Models\Advertising;
use App\Models\service;
use App\Models\blog;
use App\Events\StatusLiked;







class NotificationController extends Controller
{
    public function viewNotifications()
    {
        return view('admin.Notifications.notifications_list');

    }

    public function viewMessages()
    {
        return view('admin.Notifications.messages_list');

    }

    public function viewTender(Type $var = null)
    {
        return view('admin.Notifications.postTender');
    }

    public function viewJob(Type $var = null)
    {
        return view('admin.Notifications.postJob');
    }
}
