<?php

namespace App\Mail;


use Log;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GoogleLoginNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $productImage;
    // public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct($order)
    // {
    //     $this->order = $order;
    // }
    public function __construct(Order $order)
    {
        $this->order = $order;

        // Assuming you want the first product image
        if ($order->orderItems->isNotEmpty() && $order->orderItems[0]->product->productImages->isNotEmpty()) {
            $this->productImage = asset($order->orderItems[0]->product->productImages[0]->image);
        } else {
            $this->productImage = null; // Fallback if no image exists
        }

        Log::info('Product Image URL: ' . $this->productImage);
    }
    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Google Login Notification',
    //     );
    // }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }

    // public function build()
    // {
    //     return $this->subject('Your Order Status has been Updated')
    //                 ->view('admin.emails.order-status-updated');
    // }
    public function build()
    {
        return $this->view('admin.emails.order-status-updated')
                    ->subject('Your Order Status has been Updated')
                    ->with(['order' => $this->order, 'productImage' => $this->productImage]);
    }
}
