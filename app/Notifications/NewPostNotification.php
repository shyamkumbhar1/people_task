<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewPostNotification extends Notification
{
    use Queueable;
    protected $post;

    public function __construct( $post)
    {
        $this->post = $post;
    }

    public function via($notifiable)

    {

        return ['database'];
    }

    public function toDatabase($notifiable,)
    {

        return [
            'title' => 'New Post Notification',
            'content' => 'A new post has been created.',
            'post_id' => $this->post['id'],
        ];
    }
}
