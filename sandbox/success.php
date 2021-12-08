<?php
session_set_cookie_params(3600, '/; samesite=None', $_SERVER['HTTP_HOST'], true, true);
session_start();
error_reporting(1);
include_once("../connect.php");

//Store transaction information into database from PayPal

$cid = $_SESSION['user']['CUSTOMER_REG_ID'];
$cart = $_SESSION['user']['cart']??[];

$payer_id = $_GET['PayerID'];
$sid = $_POST['custom'];
$txn_id = $_POST['txn_id'];
$payment_fee = $_POST['payment_fee'] * 100;
$amt = $_POST['payment_gross'] * 100;

$qry = "INSERT INTO ORDERS (CUSTOMER_REG_ID, SLOT_ID) VALUES ('$cid', '$sid')";
$send = oci_parse($conn, $qry);
oci_execute($send);

$qry = "SELECT SEQ_ORDER_ID.currval AS ID FROM DUAL";
$send = oci_parse($conn, $qry);
oci_execute($send);
$row = oci_fetch_assoc($send);
$oid = $row['ID']; 

$qry = "INSERT INTO PAYMENTS (ORDER_ID, TRANSACTION_ID, AMOUNT, PAYMENT_FEE) VALUES (seq_order_id.currval, '$txn_id', '$amt', '$payment_fee')";
$send = oci_parse($conn, $qry);
oci_execute($send);

foreach ($cart as $product_id=>$product) {    
    $qry = "INSERT INTO ORDER_PRODUCT (ORDER_ID, PRODUCT_ID, QUANTITY) VALUES (seq_order_id.currval,'$product_id','".$product['quantity']."')";
    $send = oci_parse($conn, $qry);
    oci_execute($send); 
    

    $qry="UPDATE PRODUCTS SET PRODUCT_QTY=PRODUCT_QTY-".$product['quantity']."WHERE PRODUCT_ID='$product_id' ";
    $send = oci_parse($conn, $qry);
    oci_execute($send); 
}

$_SESSION['user']['cart']=[];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Thank you</title>
    <link rel="stylesheet" href="success.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <div class="content">
        <div class="header">
            <h2>Payment</h2>
            <label for="click" class="fas fa-times"></label>
        </div>
        <label for="click" class="fas fa-check"></label>
        <p>Payment Sucessful.</p>
        <div class="line"></div>
        <div class="text-center pt-4">
            <a href='../invoice.php?id=<?=$oid?>'; class="close-btn btn-info" target="_blank">Invoice</a>
            <button onclick="window.location.href='../home.php';" class="close-btn">Back to Homepage</button>
        </div>
    </div>
    </div>
</body>
</head>

</html>