<?php

class EmailModel extends Model
{

    public function send($data)
    {
        require_once DOCUMENT_ROOT . '/app/vendors/phpmailer/PHPMailerAutoload.php';

        $mail = new PHPMailer;

        $mail->addAddress($data['to'], 'Michael Ball');

        $mail->From     = $data['from'];
        $mail->FromName = 'n50 Customer Service';

        $mail->Subject = $data['subject'];

        $mail->isHTML(true);
        $mail->Body    = $data['body'];

        if ( !$mail->send() )
        {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;

            echo "<pre>"; print_r($mail); echo "</pre><hr>"; die();
        }
        else
        {
            echo 'Message has been sent';
        }
    }

}