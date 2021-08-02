<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;

class CommentNotifications extends Notification
{
    use Queueable;

    public $user;
    public $comment_id;
    public $comment_status;
    public $comment;
    public $tweet_body;
    public $tweet_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $comment_id ,$comment_status, $comment , $tweet_id)
    {
        $this->user             = $user;
        $this->comment_id       = $comment_id;
        $this->comment_status   = $comment_status;
        $this->comment          = $comment;
        // $this->tweet_body       = $tweet_body;
        $this->tweet_id          = $tweet_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            
            'user_id'           => $this->user->id,
            'user_name'         => $this->user->name,
            'comment_id'        => $this->comment_id,
            'comment_status'    => $this->comment_status,
            'comment'           => $this->comment,
            'tweet_body'        => $this->tweet_body,
            'tweet_id'          => $this->tweet_id,
        ];
    }
}
