<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewPostNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\Notification as UserNotification;

class NotificationController extends Controller
{
    public function sendNotification($id)
    {

        $post =
            [
                'id' => 1,
                'title' => 'First Post',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ];

            $userToNotify = User::where('id', $id)->first();
            // dd( $userToNotify);

        if ($userToNotify) {
            Notification::send($userToNotify, new NewPostNotification($post));

            return back()->with('success', 'Notification sent successfully.');
        } else {
            echo "User Not Found";
        }

    }

    public function markAsRead($id)
    {
        if($id){
            Auth::user()->notifications->where('id',$id)->markAsRead();
        }

     return back();
    }
    public function getAllNotification()
    {
        $notifications = UserNotification::all();
        $unread_notifications = UserNotification::whereNull('read_at')->get();
        // dd($notification);
        return view('getAllNotification',compact('notifications','unread_notifications'));
    }


}
