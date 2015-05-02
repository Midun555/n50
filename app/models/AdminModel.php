<?php

class AdminModel extends Model
{

    public function isAdminLoggedIn()
    {
        return ( isset($_SESSION['admin']) ) ? true : false;
    }


    public function processLogin($data)
    {
        return ( $data['username'] == 'admin' && $data['password'] == '1234' ) ? true : false;
    }


    public function getOrderData($order_id)
    {
        $sql = "SELECT p.*, o.*
                FROM `" . self::PAYMENTS . "` p
                    INNER JOIN `" . self::ORDERS . "` o
                        ON o.`visitor_id` = p.`visitor_id`
                WHERE p.`visitor_id` = '" . $order_id . "'";
        $order = $this->db->query($sql);

        $sql = "SELECT c.`quantity`, p.`id`,p.`name`,p.`sku`,p.`price`,p.`builder`
                FROM `" . self::CART . "` c
                    JOIN `" . self::PRODUCTS . "` p
                        ON c.`product_id` = p.`id`
                WHERE c.`visitor_id` = '" . $order_id . "'";
        $items = $this->db->query($sql);

        $order[0]['items'] = $items;

        return $order[0];
    }

}