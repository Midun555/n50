<?php

class ContactModel extends Model
{

    public function submitForm($data)
    {
        list($name, $email, $message) = array_values($data);

        $subject = 'Contact Form';
        $headers = 'From: ' . $name . ' <' . $email . '>';

        // mail($author_email, $subject, $message, $headers);
    }

}