<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ListingRequestAccepted extends Notification
{
    use Queueable;

    protected $listingRequest;

    public function __construct($listingRequest)
    {
        $this->listingRequest = $listingRequest;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database']; // store notification into DB
    }

    public function toDatabase($notifiable)
    {
        return [
            'listing_request_id' => $this->listingRequest->id,
            'title'              => 'Permintaan listing Anda telah diterima!',
            'message'            => 'Agen telah menerima permintaan listing Anda: ' . $this->listingRequest->property_title,
            'created_at'         => now(),
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
