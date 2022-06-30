<?php
require_once 'paypalcode.php';

if(isset($_POST['paypal'])){
    try{
        $response = $gateway->purchase(array(
            'amount' => $_POST['amount'],
            'items' => array(
                array(
                    'name' => 'Player Recruition',
                    'price' => $_POST['amount'],
                    'description' => 'Get recruited @Chelsea FC.',
                    'quantity' => 1
                ),
            ),
            'currency' => PAYPAL_CURRENCY,
            'returnUrl' => PAYPAL_RETURN_URL,
            'cancelUrl' => PAYPAL_CANCEL_URL,
        ))->send();
        if ($response->isRedirect()) {
            $response->redirect(); // this will automatically forward the customer
        } else {
            // not successful
            echo $response->getMessage();
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}

?>