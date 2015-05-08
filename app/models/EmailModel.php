<?php

/**
 * USAGE:
 *
 * $email = array(
 *     'to'      => 'michael.b@530medialab.com',
 *     'from'    => EMAIL_CUSTOMER_SERVICE,
 *     'subject' => 'testing subject',
 *     'body'    => '<h1>testing body</h1><hr>'
 * );
 *
 * $this->loadModel('email')->send($email);
 *
 */

class EmailModel extends Model
{

    public function send($data)
    {
        require_once DOCUMENT_ROOT . '/app/vendors/phpmailer/PHPMailerAutoload.php';

        try {

            $mail = new PHPMailer;

            $mail->addAddress($data['to'], 'Michael Ball');

            $mail->From     = $data['from'];
            $mail->FromName = 'n50';

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

        } catch ( Exception $e ) {}
    }


    public function generateOrderHtml($order_id)
    {
        $order_data = $this->loadModel('admin')->getOrderData($order_id);

        $order_data = urldecode(http_build_query($order_data));

        $url = 'http://local.n50.com/email/order/';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $order_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec ($ch);

        curl_close ($ch);

        return $result;
    }

}