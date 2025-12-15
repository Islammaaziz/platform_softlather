<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConnexionNotification extends Notification
{
    use Queueable;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // On ajoute 'database' pour l'enregistrement
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouvelle connexion')
            ->line("Bonjour {$this->user->prenom}, vous vous êtes connecté avec succès.")
            ->line('Si ce n’était pas vous, veuillez contacter le support immédiatement !');
    }

    public function toArray($notifiable)
    {
        return [
            'user_id' => $this->user->id,
            'message' => 'Connexion réussie sur le site',
            'timestamp' => now(),
        ];
    }
}
