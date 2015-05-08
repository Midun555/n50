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


    public function getOrderCollection()
    {
        $sql = "SELECT p.*, o.*
                FROM `" . self::PAYMENTS . "` p
                    INNER JOIN `" . self::ORDERS . "` o
                        ON o.`visitor_id` = p.`visitor_id`
                ORDER BY p.`id` DESC";
        $orders = $this->db->query($sql);

        $return_array = array();

        foreach ( $orders as $order )
        {
            $return_array[] = array(
                'id'          => $order['visitor_id'],
                'date'        => date('F j, Y, g:i a', strtotime($order['timestamp_created'])),
                'name'        => $order['first_name'] . ' ' . $order['last_name'],
                'grand_total' => number_format($order['grand_total'], 2, '.', ''),
                'location'    => $order['city'] . ', ' . $order['state']
            );
        }

        return $return_array;
    }


    public function getOrderData($order_id)
    {
        $sql = "SELECT p.*, o.*
                FROM `" . self::PAYMENTS . "` p
                    INNER JOIN `" . self::ORDERS . "` o
                        ON o.`visitor_id` = p.`visitor_id`
                WHERE p.`visitor_id` = '" . $order_id . "'
                LIMIT 1";
        $order = $this->db->query($sql);

        $sql = "SELECT c.`quantity`, p.`id`,p.`name`,p.`sku`,p.`price`,p.`builder`
                FROM `" . self::CART . "` c
                    JOIN `" . self::PRODUCTS . "` p
                        ON c.`product_id` = p.`id`
                WHERE c.`visitor_id` = '" . $order_id . "'";
        $items = $this->db->query($sql);

        foreach ( $items as $key => $item )
        {
            $items[$key]['price']    = number_format($item['price'], 2, '.', '');
            $items[$key]['subtotal'] = number_format($item['price'] * $item['quantity'], 2, '.', '');
        }

        $order[0]['items'] = $items;

        return $order[0];
    }

}