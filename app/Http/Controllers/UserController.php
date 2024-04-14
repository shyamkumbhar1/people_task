<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $notifications = Notification::all();
        $unread_notifications = Notification::whereNull('read_at')->get();

        return view('user_details', compact('users', 'notifications', 'unread_notifications'));
    }
    public function unreadNotification()
    {
        $users = User::all();
        $notifications = Notification::all();
        $unread_notifications = Notification::whereNull('read_at')->get();

        return view('unread_notifications', compact('users', 'notifications', 'unread_notifications'));
    }

    public function editUserSetting()
    {
        $user = Auth::user();
        $users = User::all();
        $unread_notifications = Notification::whereNull('read_at')->get();
        $notifications = Notification::all();
        return view('user_setting', compact('user','users','notifications','unread_notifications'));
    }

    public function updateUserSetting(Request $request)
    {
        try {
            $user = Auth::user();
            $request->validate([
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'phone_number' => 'nullable|string|max:20', // Adjust validation rules as needed
            ]);

            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->notification_switch = $request->notification_switch;

            // Save the changes
            $user->save();
            // dd($user);

            return redirect()->route('home')->with('success', 'User Setting Update successfully.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Failed to update user settings.');
        }
    }

}
