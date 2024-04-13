<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        $notifications = Notification::all();
        $unread_notifications = Notification::whereNull('read_at')->get();

        return view('user_details',compact('users','notifications','unread_notifications'));
    }
    public function unreadNotification(){
        $users = User::all();
        $notifications = Notification::all();
        $unread_notifications = Notification::whereNull('read_at')->get();

        return view('unread_notifications',compact('users','notifications','unread_notifications'));
    }


}
