<?php

class CheckoutModel extends Model
{

    public function isValidShippingAddress($shipping_address)
    {
        $request = '<?xml version="1.0"?>
            <AccessRequest xml:lang="en-US">
                <AccessLicenseNumber>' . UPS_ACCESS_LICENSE_NUMBER . '</AccessLicenseNumber>
                <UserId>' . UPS_USER_ID . '</UserId>
                <Password>' . UPS_PASSWORD . '</Password>
            </AccessRequest>
            <?xml version="1.0"?>
            <AddressValidationRequest xml:lang="en-US">
                <Request>
                    <TransactionReference>
                        <CustomerContext>Your Test Case Summary Description</CustomerContext>
                        <XpciVersion>1.0</XpciVersion>
                    </TransactionReference>
                    <RequestAction>XAV</RequestAction>
                    <RequestOption>3</RequestOption>
                </Request>
                <AddressKeyFormat>
                    <AddressLine>' . trim($shipping_address['address_1'] . ' ' . $shipping_address['address_2']) . '</AddressLine>
                    <PoliticalDivision2>'. $shipping_address['city'] . '</PoliticalDivision2>
                    <PoliticalDivision1>' . $shipping_address['state'] . '</PoliticalDivision1>
                    <PostcodePrimaryLow>' . $shipping_address['zip'] . '</PostcodePrimaryLow>
                    <CountryCode>US</CountryCode>
                </AddressKeyFormat>
            </AddressValidationRequest>';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.ups.com/ups.app/xml/XAV');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3600);

        $response = curl_exec($ch);
        $xml = simplexml_load_string($response);

        return ( isset($xml->NoCandidatesIndicator) ) ? false : true;
    }


    public function getOrderTotals($shipping_address)
    {
        $return_array = array();

        $return_array['subtotal']   = number_format($this->getOrderSubtotal(), 2);

        $return_array['tax_rate']   = 7;
        $return_array['tax_amount'] = number_format($return_array['subtotal'] * $return_array['tax_rate']/100, 2);

        $shipping = $this->calculateShipping($shipping_address);
        $return_array['shipping_method'] = $shipping['method'];
        $return_array['shipping_amount'] = number_format($shipping['amount'], 2);

        $return_array['grand_total'] = number_format($return_array['subtotal'] + $return_array['tax_amount'] + $return_array['shipping_amount'], 2);

        return $return_array;
    }


    public function getOrderSubtotal()
    {
        $visitor_id = $this->getVisitorId();

        $sql = "SELECT *
                FROM `" . self::CART . "`
                WHERE `visitor_id` = '" . $visitor_id . "'";
        $items = $this->db->query($sql);

        if ( !$items )
            return false;

        $subtotal = 0;

        foreach ( $items as $item )
        {
            $sql = "SELECT `price`
                    FROM `" . self::PRODUCTS . "`
                    WHERE `id` = '" . $item['product_id'] . "'
                    LIMIT 1";
            $result = $this->db->query($sql);

            $product = $result[0];

            $subtotal += $product['price'] * $item['quantity'];
        }

        return $subtotal;
    }


    public function calculateShipping($shipping_address)
    {
        return array('amount' => 14.73, 'method' => 'UPS Ground');
    }


    public function saveOrderData($order_data)
    {
        $visitor_id = $this->getVisitorId();

        $sql = "SELECT `id`
                FROM `" . self::ORDERS . "`
                WHERE `visitor_id` = '" . $visitor_id . "'
                LIMIT 1";
        $result = $this->db->query($sql);

        if ( !empty($result) )
        {
            $sql = "DELETE
                    FROM `" . self::ORDERS . "`
                    WHERE `visitor_id` = '" . $visitor_id . "'";
            $result = $this->db->query($sql);
        }

        $order_data['visitor_id']        = $visitor_id;
        $order_data['timestamp_created'] = date('Y-m-d H:i:s');

        $sql = "INSERT INTO `" . self::ORDERS . "` " .
                $this->prepareInsertString($order_data);
        $id = $this->db->query($sql);
    }


    public function getOrderId()
    {
        $visitor_id = $this->getVisitorId();

        $sql = "SELECT `id`
                FROM `" . self::PAYMENTS . "`
                WHERE `visitor_id` = '" . $visitor_id . "'
                LIMIT 1";
        $result = $this->db->query($sql);

        return ( !empty($result) ) ? $visitor_id : false;
    }

}