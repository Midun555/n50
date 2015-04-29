<?php

class StripeModel extends model
{

    public function charge($data)
    {
        $visitor_id = $this->getVisitorId();

        $sql = "SELECT `grand_total`
                FROM `" . self::ORDERS . "`
                WHERE `visitor_id` = '" . $visitor_id . "'
                LIMIT 1";
        $result = $this->db->query($sql);

        if ( empty($result) )
            return false;

        $grand_total = $result[0]['grand_total'];

        require_once DOCUMENT_ROOT . '/app/vendors/stripe/init.php';

        \Stripe\Stripe::setApiKey(STRIPE_TEST_SECRET_KEY);

        $token = $data['stripeToken'];

        try {

            $charge = \Stripe\Charge::create(array(
                'amount' => $grand_total * 100,
                'currency' => 'usd',
                'source' => $token,
                'description' => 'n50 charge')
            );

            $payment_data = array();

            $payment_data['visitor_id']        = $visitor_id;
            $payment_data['charge_id']         = $charge->id;
            $payment_data['charge_status']     = $charge->status;
            $payment_data['grand_total']       = $grand_total;
            $payment_data['stripe_token']      = $data['stripeToken'];
            $payment_data['stripe_token_type'] = $data['stripeTokenType'];
            $payment_data['stripe_email']      = $data['stripeEmail'];
            $payment_data['timestamp_created'] = date('Y-m-d H:i:s');

            $this->savePaymentData($payment_data);

            return ( $charge->status == 'succeeded' ) ? true : false;

        } catch ( Exception $e ) {

            $body  = $e->getJsonBody();
            $error = $body['error'];

            echo '<pre>'; print_r($error); echo '</pre><hr>'; die();

        }
    }


    public function savePaymentData($payment_data)
    {
        $visitor_id = $this->getVisitorId();

        $sql = "SELECT `id`
                FROM `" . self::PAYMENTS . "`
                WHERE `visitor_id` = '" . $visitor_id . "'
                LIMIT 1";
        $result = $this->db->query($sql);

        if ( !empty($result) )
        {
            $sql = "DELETE
                    FROM `" . self::PAYMENTS . "`
                    WHERE `visitor_id` = '" . $visitor_id . "'";
            $result = $this->db->query($sql);
        }

        $sql = "INSERT INTO `" . self::PAYMENTS . "` " .
                $this->prepareInsertString($payment_data);
        $id = $this->db->query($sql);
    }

}