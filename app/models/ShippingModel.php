<?php

class ShippingModel extends Model
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


    public function calculateShipping($shipping_address)
    {
        return array('amount' => 14.73, 'method' => 'UPS Ground');
    }

}