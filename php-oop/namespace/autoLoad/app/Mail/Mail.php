<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use App\Interfaces\Notification;
class Mail implements Notification{
    public function send (){
        $mail = new PHPMailer(true);
    }
}