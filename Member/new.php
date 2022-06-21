<?php
//including the database connection file.
include_once("../connect.php");
session_start();

$merchant_id         = $_POST['merchant_id'];
$order_id             = $_POST['order_id'];
$first_name             = $_POST['first_name'];
$payhere_amount     = $_POST['payhere_amount'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$md5sig                = $_POST['md5sig'];

$merchant_secret = '4OXHE6TpWDQ4OYmCiD6bQu8RkrZqKVECA4joIkiQukRN'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)
$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );
if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
        //TODO: Update your database as payment success
        $date = date("Y-m-d");
        $classid = $_GET['cl_id'];
        $travelpoints = $_GET['travel_points'];
        $payment = $_GET['paymn'];
        $amnt = $_GET['amnt'];
        $creditsused = $_GET['creditsused'];
        $creditsremaining = $_GET['creditsremaining'];
        $totalamntpaid = $_GET['totalamntpaid'];
        $pass = $_GET['pass'];
        $trid = $_GET['tr_id'];
        $tr_departuredt = $_GET['tr_departuredt'];
        $customerid = $_GET['customerid'];
        $totalseatsafteraddition = $_GET['totalseatsafteraddition'];

        $ttravelpoints= $_GET['cus_travelpoints']+$travelpoints;
        $totaltravelpoints= $_GET['cus_totalearnedtp']+$travelpoints;

        $sqly = mysqli_query($conn, "UPDATE customer SET cus_travelpoints='$ttravelpoints',cus_totalearnedtp='$totaltravelpoints',cus_credit = '$creditsremaining' WHERE cus_id='$customerid'");
        $sqlyy = mysqli_query($conn, "UPDATE trainclass SET cl_occupiedseats='$totalseatsafteraddition' WHERE cl_id='$classid'");
        $resulttick = mysqli_query($conn, "INSERT INTO ticket(ti_fare,credits_used,ti_totalamnt_paid,ti_no_passengers,cl_id,cus_id,ti_payment_type,ti_status,ti_payment_status,ti_reserveddate,ti_departuredt,tr_id)
        VALUES('$amnt','$creditsused','$totalamntpaid','$pass','$classid','$customerid','$payment','Confirmed','Paid','$date','$tr_departuredt','$trid')");
      
}
?>