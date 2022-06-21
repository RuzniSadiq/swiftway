<?php
require('fpdf17/fpdf.php');

//db connection
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'swiftway');



//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();


$pdf->SetFont('Arial','B',24);
//Cell(width , height , text , border , end line , [align] )
// Page header
 // Move to the right
 $pdf->Cell(80);
 // Title
 $pdf->Cell(30,15,'Swiftway',0,0,'C');
 $pdf->Image('../../img/logo.png',65,7,20);
 // Line break
 $pdf->Ln(30);
 $pdf->SetFont('Arial','B',12);
 $pdf->Cell(130);
 $pdf->Cell(100	,7,'Sri Lanka Railways',0,1);//end of line
 $pdf->Cell(130);
 $pdf->Cell(100	,7,'Olcott Mawatha, Colombo 01000',0,1);//end of line
 $pdf->Cell(130);
 $pdf->Cell(100	,7,'gmr@railway.gov.lk',0,1);//end of line
 $pdf->Cell(130);
 $pdf->Cell(100	,7,'+94 11 4 600 111',0,1);//end of line
 $pdf->Cell(130);
 $pdf->Cell(100	,7,'+94 11 2 446490',0,1);//end of line
 $date=date_create($_GET['date']);
 $hi = date_format($date,"M/Y");
 //make a dummy empty cell as a vertical spacer
// $pdf->Cell(189	,10,'',0,1);//end of line

//$cat = $_GET['category'];


if(isset($_GET['trainyo'])){
	
	$pdf->Ln(10);
	$pdf->SetFont('Arial','U',14);
	$pdf->Cell(30,15,'Details of trains that ran on '.$hi.'',0,0,'U');
	//invoice contents
	$pdf->Ln(20);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(-0.5);
	$pdf->Cell(30	,5,'Train ID',1,0);
	$pdf->Cell(40	,5,'Train Number',1,0);
	$pdf->Cell(40	,5,'Train Name',1,0);// last 1 means end of line
	$pdf->Cell(60	,5,'Train Type',1,1);
	

$res=mysqli_query($con, "SELECT DISTINCT train.tr_id,tr_number,tr_name,tr_type,tr_source,tr_destination,tr_arrivaldt,tr_departuredt,ticket.ti_fare,ti_no_passengers,ti_id,cus_id,ti_payment_type,ti_status,trainclass.cl_name,cl_price,cl_seatcap FROM train inner join trainclass ON train.tr_id = trainclass.tr_id inner join ticket on trainclass.cl_id = ticket.cl_id WHERE ti_reserveddate like '%$_GET[date]%' && ti_payment_status='Paid'");
while($row= mysqli_fetch_assoc($res))
			{
				$pdf->Cell(-0.5);
$pdf->Cell(30,5,$row['tr_id'],1,0);
$pdf->Cell(40,5,$row['tr_number'],1,0);
$pdf->Cell(40,5,$row['tr_name'],1,0);
$pdf->Cell(60,5,$row['tr_type'],1,1);
			}


}
//customer start
if(isset($_GET['customeryo'])){
	$pdf->Ln(10);
	$pdf->SetFont('Arial','U',14);
	$pdf->Cell(30,15,'Customers that joined SwiftWay as at '.$hi.'',0,0,'U');
	//invoice contents
	$pdf->Ln(20);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(-0.5);
	$pdf->Cell(30	,5,'Customer ID',1,0);
	$pdf->Cell(30	,5,'Name',1,0);
	$pdf->Cell(30	,5,'Number',1,0);
	$pdf->Cell(20	,5,'Gender',1,0);
	$pdf->Cell(30	,5,'Username',1,0);// last 1 means end of line
	$pdf->Cell(55	,5,'Email',1,1);

$res=mysqli_query($con, "SELECT * FROM customer WHERE cus_joineddate like '%$_GET[date]%'");
while($row= mysqli_fetch_assoc($res))
			{
				$pdf->Cell(-0.5);
$pdf->Cell(30,5,$row['cus_id'],1,0);
$pdf->Cell(30,5,$row['cus_name'],1,0);
$pdf->Cell(30,5,$row['cus_no'],1,0);
$pdf->Cell(20,5,$row['cus_gender'],1,0);
$pdf->Cell(30,5,$row['cus_username'],1,0);
$pdf->Cell(55,5,$row['cus_email'],1,1);

			}
}

//ticket start
if(isset($_GET['ticketyo'])){
	$pdf->Ln(10);
	$pdf->SetFont('Arial','U',14);
	$pdf->Cell(30,15,'Tickets reservation details as at '.$hi.'',0,0,'U');
	//invoice contents
	$pdf->Ln(20);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(-0.5);
	$pdf->Cell(30	,5,'Ticket ID',1,0);
	$pdf->Cell(30	,5,'Customer ID',1,0);
	$pdf->Cell(40	,5,'Number of Tickets',1,0);// last 1 means end of line
	$pdf->Cell(30	,5,'Payment Type',1,0);
	$pdf->Cell(30	,5,'Ticket Price',1,0);
	$pdf->Cell(30	,5,'Ticket Fare',1,1);//end of line
	

$res=mysqli_query($con, "SELECT train.tr_number,tr_type,tr_source,tr_destination,tr_arrivaldt,tr_departuredt,ticket.ti_fare,ti_no_passengers,ti_id,cus_id,ti_payment_type,ti_status,trainclass.cl_name,cl_price,cl_seatcap FROM train inner join trainclass ON train.tr_id = trainclass.tr_id inner join ticket on trainclass.cl_id = ticket.cl_id WHERE ti_reserveddate like '%$_GET[date]%' && ti_payment_status='Paid'");
while($row= mysqli_fetch_assoc($res))
			{
				$pdf->Cell(-0.5);
$pdf->Cell(30,5,$row['ti_id'],1,0);
$pdf->Cell(30,5,$row['cus_id'],1,0);
$pdf->Cell(40,5,$row['ti_no_passengers'],1,0);
$pdf->Cell(30,5,$row['ti_payment_type'],1,0);
$pdf->Cell(30,5,$row['cl_price'],1,0);
$pdf->Cell(30,5,$row['ti_fare'],1,1);

			}
			$result = mysqli_query($con, "SELECT SUM(ti_fare) AS value_sum FROM ticket WHERE ti_payment_status='Paid' && ti_reserveddate like '%$_GET[date]%'"); 
	$row = mysqli_fetch_assoc($result);
	$pdf->Ln(5);
	$pdf->Cell(102);
	$pdf->Cell(50,5,"Total Revenue Earned: Rs.",0,0);
	$pdf->Cell(7);
	$pdf->SetFont('Arial','U',14);
	$pdf->Cell(50,5,$row['value_sum'],0,1);
}


$pdf->Output();

?>
