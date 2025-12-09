<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ItemClaimedNotification extends Notification implements ShouldQueue
{
  use Queueable;

  /**
   * Create a new notification instance.
   */
  public function __construct(
    public string $itemTitle
  ) {
    //
  }

  /**
   * Get the notification's delivery channels.
   *
   * @return array<int, string>
   */
  public function via(object $notifiable): array
  {
    // Check user preferences
    if (!$notifiable->wantsNotification('item_claimed')) {
      return [];
    }

    return ['database', 'mail'];
  }

  /**
   * Get the mail representation of the notification.
   */
  public function toMail(object $notifiable): MailMessage
  {
    return (new MailMessage)
      ->subject("Your Item Has Been Claimed - SACLI FOUNDIT")
      ->greeting("Hello {$notifiable->name}!")
      ->line("Great news! Your item \"{$this->itemTitle}\" has been marked as claimed.")
      ->line("This means the item has been successfully reunited with its owner or claimed by the rightful person.")
      ->line("The item has been removed from the system as it is no longer needed.")
      ->line('Thank you for using SACLI FOUNDIT to help reunite lost items with their owners!')
      ->salutation('Best regards, The SACLI FOUNDIT Team');
  }

  /**
   * Get the array representation of the notification.
   *
   * @return array<string, mixed>
   */
  public function toArray(object $notifiable): array
  {
    return [
      'item_title' => $this->itemTitle,
      'status' => 'claimed',
      'message' => "Your item \"{$this->itemTitle}\" has been claimed and removed from the system.",
    ];
  }
}
