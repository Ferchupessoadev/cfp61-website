<?php

namespace App\Services;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    /**
     * Server settings
     * @param PHPMailer $mail
     */
    private static function configureMailer(PHPMailer $mail): void
    {
        $mail->isSMTP();  // Enable SMTP
        $mail->Host = $_ENV['MAIL_HOST'];  // Set the SMTP server to send through
        $mail->SMTPAuth = true;  // Enable SMTP authentication
        $mail->Username = $_ENV['MAIL_USER'];  // SMTP username
        $mail->Password = $_ENV['MAIL_PASS'];  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // Enable implicit TLS encryption
        $mail->Port = $_ENV['MAIL_PORT'];  // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->CharSet = 'UTF-8';  // Set the charset
        $mail->setFrom($_ENV['MAIL_USER'], $_ENV['MAIL_NAME']);  // Set who the message is to be sent from
    }

    /**
     * Send email
     * @param string $to
     * @param string $subject
     * @param string $body
     * @return string
     * Returns a message of success or failure
     */
    public static function send(string $to, string $subject, string $body): string
    {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            self::configureMailer($mail);

            // Recipients
            $mail->addAddress($_ENV['MAIL_RECEIVER'], $_ENV['MAIL_NAME_RECEIVER']);  // Add a recipient

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = 'Email: ' . $to . '<br>' . $body;

            // Send email
            $mail->send();
            return 'Correo enviado con éxito';
        } catch (Exception) {
            return 'Error al enviar el correo, vuelva a intentarlo en unos minutos';
        }
    }
}
