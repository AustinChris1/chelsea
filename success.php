<?php
require_once 'paypalcode.php';
$user_id = $_SESSION['auth_user']['id'];

if(array_key_exists('paymentId', $_GET) && array_key_exists('PayerId', $_GET)){
    $transaction = $gateway->completePurchase(array(
        'payerId' => $_GET['PayerID'],
        'transactionReference' => $_GET['paymentId'],
    ));
    $response = $transaction->send();
    if ($response->isSuccessful()){
        $arr_body = $response->getData();
        $payment_id = $arr_body['id'];
        $payer_id = $arr_body['payer']['payer_info']['payer_id'];
        $payer_email = $arr_body['payer']['payer_info']['email'];
        $amount = $arr_body['transactions'][0]['amount']['total'];
        $currency = PAYPAL_CURRENCY;
        $payment_status = $arr_body['state'];

        $query = $db->query("UPDATE recruits SET status = '1', amount = '$amount' WHERE user_id = '$user_id'");
        if($query){
            echo 'Success';
        
        }
        else{
            echo 'Failed';
        }
    }else{
        echo $response->getMessage();
    }
}
else{
    echo '<h2>Transaction has been declined</h2>';
}

?>