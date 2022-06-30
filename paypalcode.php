<?php
require_once 'databases/db_conn.php';
require_once 'vendor/autoload.php';
use Omnipay\Omnipay;

define('CLIENT_ID', 'AZDzDdp-ohTWJinSE8ZZMjq5smGqScKjFsAsgOXD4qGBgoybkG4XMnS3g1lZWSZVd46VhI3DwkumCXnE');
define('CLIENT_SECRET', 'EAcuTZo1gD3osmC6XoWoG5z60wYkhLu-wMUbpTgtBwsjlhkevVKJV9qaPZNYKKYSa2QzD8Uj2nFh_9x1');
define('PAYPAL_RETURN_URL', 'http://localhost/chelsea/success');
define('PAYPAL_CANCEL_URL', 'http://localhost/chelsea/');
define('PAYPAL_CURRENCY', 'USD');


$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true); //set it to 'false' when go live

?>