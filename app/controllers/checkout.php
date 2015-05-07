<?php

class Checkout extends Controller
{

    public function index()
    {
        $cart_count = $this->loadModel('cart')->getCount();

        if ( $cart_count === 0 )
            header('Location: /cart/');

        $this->states = $this->loadModel('helper')->getStateAbbreviations();

        $this->loadView('checkout/index');
    }


    public function shipping_save()
    {
        if ( !empty($_POST) )
        {
            $shipping_address = $_POST;


            if ( !$this->loadModel('shipping')->isValidShippingAddress($shipping_address) )
            {
                echo json_encode(array('status' => 0, 'message' => 'The address you entered could not be found.'));
            }
            else
            {
                $_checkout = $this->loadModel('checkout');

                $totals = $_checkout->getOrderTotals($shipping_address);

                $_checkout->saveOrderData(array_merge($shipping_address, $totals));

                $totals['status'] = 1;

                echo json_encode($totals);
            }
        }
    }


    public function charge()
    {
        if ( empty($_POST) )
            header('Location: /checkout/');

        $status = $this->loadModel('payment')->charge($_POST);

        if ( $status['status'] )
        {
            header('Location: /checkout/success/');
        }
        else
        {
            header('Location: /checkout/error/');
        }
    }


    public function success()
    {
        $this->order_id = $this->loadModel('checkout')->getOrderId();

        if ( $this->order_id === false )
            header('Location: /');

        unset($_SESSION['visitor_id']);
        // session_unset();
        // session_destroy();

        $_SESSION['visitor_id'] = time() + mt_rand();

        $this->loadView('checkout/success');
    }


    public function error()
    {
        // $this->order_error = $this->loadModel('checkout')->getOrderError();

        // if ( $this->order_data === false )
        //     header('Location: /checkout/');

        $this->loadView('checkout/error');
    }

}