<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        $notifications = Notification::all();
        $unread_notifications = Notification::whereNull('read_at')->get();

        $notifications = Notification::all();
        return view('home',compact('users','notifications','unread_notifications'));
    }
}
