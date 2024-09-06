<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $booking;
    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $user=$this->booking->user;

        return (new MailMessage)
                    ->subject('You have a new booking')
                    ->line('Details of the booking:')
                    ->line('Booking ID: '.$this->booking->booking_id)
                    ->line('User Name: '.$user->name)
                    ->line('User Email: '.$user->email)
                    ->line('User Phone: '.$user->phone)
                    ->line('Car: '.$this->booking->car->name)
                    ->line('Pickup At: '.$this->booking->pickup_date_time)
                    ->line('Return At: '.$this->booking->return_date_time)
                    ->line('Request: '.$this->booking->request)
                    ->action('View Details', route('admin.bookings.index'))
                    ->line('Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
