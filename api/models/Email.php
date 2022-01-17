<?php

namespace api\models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


class Email
{
    public function __construct()
    {
        return null;
    }
    public function send($subject,$message,$to){

        $mail = new PHPMailer(true);
        try {
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = getenv('SMTP_HOST');
            $mail->SMTPAuth   = true;
            $mail->Username   = getenv('SMTP_USER');
            $mail->Password   = getenv('SMTP_PASSWORD');
            $mail->SMTPSecure = "ssl";
            $mail->Port       = 465;
        
            $mail->setFrom(getenv('SMTP_SENDER_MAIL'), getenv('SMTP_SENDER_NAME'));
            $mail->addAddress($to);
        
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->AltBody = "";
        
            $mail->send();
        } catch (Exception $e) {
            error_log("Falha ao enviar email. " . $e->getMessage(), 3, __DIR__ . "/../../errors.log");
        }
    }
}