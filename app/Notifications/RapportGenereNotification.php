<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RapportGenereNotification extends Notification
{
    use Queueable;

    public $rapport; // <- On ajoute la propriété pour stocker le rapport

    /**
     * Create a new notification instance.
     */
    public function __construct($rapport)
    {
        $this->rapport = $rapport; // <- On passe le rapport au constructeur
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database']; // <- On envoie par mail et base de données
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nouveau rapport généré')
            ->line("Un nouveau rapport a été généré : {$this->rapport->nom_fichier}")
            ->action('Voir le rapport', url('/rapports/' . $this->rapport->id))
            ->line('Merci d’utiliser notre application !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'rapport_id' => $this->rapport->id,
            'nom_fichier' => $this->rapport->nom_fichier,
            'projet_id' => $this->rapport->projet_id,
            'message' => 'Un nouveau rapport a été généré.'
        ];
    }
}
