<?php

class NewsletterModel extends Model
{

    public function saveEmail($email)
    {
        $sql = "SELECT `id`
                FROM `users_newsletter`
                WHERE `email` = '" . $email . "'";
        $result = $this->db->query($sql);

        if ( $result )
        {
            return json_encode(array(
                'error'  => 1,
                'message' => 'Email already signed up.'
            ));
        }

        $data = array(
            'visitor_id'        => $this->getVisitorId(),
            'email'             => $email,
            'timestamp_created' => date('Y-m-d H:i:s')
        );

        $sql = "INSERT INTO `" . self::NEWLSETTER . "` " .
                $this->prepareInsertString($data);
        $id = $this->db->query($sql);

        return json_encode(array(
            'error'  => 0,
            'message' => 'Thank you for signing up!'
        ));
    }

}