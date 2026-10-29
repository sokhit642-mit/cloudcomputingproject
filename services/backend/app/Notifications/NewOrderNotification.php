<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['database', 'mail']; // Add 'mail' if you want email notifications as well
    }

    public function toArray($notifiable)
    {
        return [
            'order_id' => $this->order->id,
            'message' => 'A new order has been placed!',
            // Add more information as needed
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Order Notification')
            ->line('A new order has been placed with ID: ' . $this->order->id)
            ->action('View Order', url('/admin/orders/' . $this->order->id))
            ->line('Thank you for using our application!');
    }
}
