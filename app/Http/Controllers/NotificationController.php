<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\NewPostNotification;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function sendNotification()
    {
        $post =
            [
                'id' => 1,
                'title' => 'First Post',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ];

        $userToNotify = User::first();

        if ($userToNotify) {
            Notification::send($userToNotify, new NewPostNotification($post));

            return "Notification Send Successfully";
        } else {
            echo "User Not Found";
        }
        
    }
}
