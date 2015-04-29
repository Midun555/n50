<?php

class Cart extends Controller
{

    public function index()
    {
        $this->data = $this->loadModel('cart')->getItems();

        $this->loadView('cart');
    }


    public function add_item()
    {
        if ( !empty($_POST) )
            $this->loadModel('cart')->addItem($_POST);

        header('Location: /cart/');
    }


    public function remove_item($item_id)
    {
        if ( $item_id )
            $this->loadModel('cart')->removeItem($item_id);

        header('Location: /cart/');
    }


    public function update_items()
    {
        if ( !empty($_POST) )
            $this->loadModel('cart')->updateItems($_POST);

        header('Location: /cart/');
    }

}