<?php

class CartModel extends Model
{

    public function getCount()
    {
        $visitor_id = $this->getVisitorId();

        $sql = "SELECT `quantity`
                FROM `" . self::CART . "`
                WHERE `visitor_id` = '" . $visitor_id . "'";
        $result = $this->db->query($sql);

        if ( empty($result) )
            return 0;

        $cart_counter = 0;

        foreach ( $result as $_item )
        {
            $cart_counter += $_item['quantity'];
        }

        return $cart_counter;
    }


    public function getItems()
    {
        $visitor_id = $this->getVisitorId();

        $sql = "SELECT *
                FROM `" . self::CART . "`
                WHERE `visitor_id` = '" . $visitor_id . "'";
        $items = $this->db->query($sql);

        if ( !$items )
            return false;

        $return_array = array();

        $subtotal = 0;

        foreach ( $items as $item )
        {
            $sql = "SELECT `name`,`slug`,`sku`,`price`
                    FROM `" . self::PRODUCTS . "`
                    WHERE `id` = '" . $item['product_id'] . "'
                    LIMIT 1";
            $result = $this->db->query($sql);

            $product = $result[0];

            $subtotal += $product['price'] * $item['quantity'];

            $return_array['items'][] = array(
                'id'       => $item['id'],
                'name'     => $product['name'],
                'slug'     => $product['slug'],
                'price'    => $product['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $product['price'] * $item['quantity'],
                'image'    => $this->loadModel('product')->getImages($product['sku'], true)
            );
        }

        $return_array['subtotal'] = $subtotal;

        return $return_array;
    }


    public function addItem($data)
    {
        $visitor_id = $this->getVisitorId();

        $sql = "SELECT `id`
                FROM `" . self::CART . "`
                WHERE
                    `visitor_id` = '" . $visitor_id . "' AND
                    `product_id` = '" . $data['product_id'] . "'";
        $result = $this->db->query($sql);

        if ( empty($result) )
        {
            $data['visitor_id'] = $visitor_id;

            $sql = "INSERT INTO `" . self::CART . "`
                    (`visitor_id`,`product_id`,`quantity`) VALUES
                    ('" . $data['visitor_id'] . "','" . $data['product_id'] . "','" . $data['quantity'] . "')";
        }
        else
        {
            $sql = "UPDATE `" . self::CART . "` SET `quantity` = `quantity` + " . $data['quantity'] . " WHERE `id` = '" . $result[0]['id'] . "'";
        }

        $this->db->query($sql);
    }


    public function removeItem($item_id)
    {
        $sql = "DELETE FROM `" . self::CART . "`
                WHERE `id` = '" . $item_id . "'";
        $this->db->query($sql);
    }


    public function updateItems($data)
    {
        foreach ( $data['quantity'] as $item_id => $quantity )
        {
            if ( $quantity < 1 )
            {
                $this->removeItem($item_id);
            }
            else
            {
                $sql = "UPDATE `" . self::CART . "` SET `quantity` = '" . $quantity . "' WHERE `id` = '" . $item_id . "'";
                $this->db->query($sql);
            }
        }
    }

}