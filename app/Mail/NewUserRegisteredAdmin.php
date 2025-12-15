<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class NewUserRegisteredAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $user; // l'utilisateur qui vient de s'inscrire

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Nouvel utilisateur à valider')
                    ->view('emails.mailNewUser'); // view qu’on va créer
    }
}
