<?php 
include_once("../connect.php");

session_start();

error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:member-login.php');
}
else{
    //getting id from url
$ti_id = $_GET['ti_id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT train.tr_name,tr_number,tr_departuredt,tr_arrivaldt,tr_source,tr_destination,ticket.ti_id,cus_id,ti_fare,ti_no_passengers,ti_payment_type,ti_status,trainclass.cl_id,cl_name,cl_price FROM train inner join trainclass ON train.tr_id = trainclass.tr_id inner join ticket on trainclass.cl_id = ticket.cl_id WHERE ti_id=$ti_id");
$row= mysqli_fetch_assoc($result);
  
  $width = "250";
  $height = "250";

$url = "https://chart.googleapis.com/chart?cht=qr&chs={$width}x{$height}&chl=
Customer ID = {$row['cus_id']}%0A
Customer Username = {$_SESSION['login']}%0A
Train No. = {$row['tr_number']}%0A
Train Name = {$row['tr_name']}%0A
Train Source = {$row['tr_source']}%0A
Train Destination = {$row['tr_destination']}%0A
Train Departure Date = {$row['tr_departuredt']}%0A
Train Arrival Date = {$row['tr_arrivaldt']}%0A
Class Price = {$row['cl_price']}%0A
No. of tickets = {$row['ti_no_passengers']}%0A
Ticket fare = {$row['ti_fare']}%0A
";

$output["img"] = $url;
}
?>
<?php if (isset($output)) { ?>
                <div style="width:250px;height:250px;">
                    <img src="<?php echo $output["img"] ?>" alt="QR Code" width="100%" height="100%">
                </div>
                <?php } ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>