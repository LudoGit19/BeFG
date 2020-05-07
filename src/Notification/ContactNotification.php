<?php

namespace App\Notification;

use App\Entity\Contact;
use Swift_Mailer;

class ContactNotification {

    public function __construct(\Swift_Mailer $mailer)
    {
        
    }

    public function notify(Contact $contact) {
        
    }
}