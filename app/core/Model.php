<?php

abstract class Model
{

    const PRODUCTS   = 'catalog_products';
    const CATEGORIES = 'catalog_categories';
    const CART       = 'sales_cart';
    const ORDERS     = 'sales_orders';
    const PAYMENTS   = 'sales_payments';
    const NEWLSETTER = 'users_newsletter';


    public function __construct()
    {
        $this->db = new Db();
    }


    public function loadModel($model)
    {
        $model = ucfirst($model) . 'Model';

        require_once DOCUMENT_ROOT . '/app/models/' . $model . '.php';

        return new $model;
    }


    public function getBaseUrl()
    {
        return ( $_SERVER['SERVER_NAME'] == 'local.n50.com' ) ? 'http://local.n50.com' : 'http://XXXXXX';
    }


    public function getVisitorId()
    {
        return $_SESSION['visitor_id'];
    }


    public function prepareInsertString($data)
    {
        $columns = $values = '(';

        foreach ( $data as $column => $value )
        {
            $columns .= "`" . $column . "`,";
            $values .= htmlspecialchars($this->db->dbh->quote($value)) . ",";
        }

        return trim($columns, ',') . ') VALUES ' . trim($values, ',') . ')';
    }


    public function prepareUpdateString($data)
    {
        $string = '';

        foreach ( $data as $column => $value )
        {
            $string .= "`" . $column . "` = " . htmlspecialchars($this->db->dbh->quote($value)) . ",";
        }

        return trim($string, ',');
    }

}