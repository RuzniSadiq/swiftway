
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<!-- Responsive meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" href="img/logo.png">

    
      <!-- <link id="theme" rel="stylesheet" type="text/css" href="../css/light-theme.css" /> -->

<!-- Bootstrap CSS -->

<script src="jquery-3.3.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
	.swal2-popup {
  font-size: 1.6rem !important;
}
	.swal2-container {
  zoom: 0.8;
}
	.swal2-icon {
  width: 5em !important;
  height: 5em !important;
  border-width: .25em !important;
}
	</style>


</head>
<?php
include_once("../../connect.php");
if(isset($_GET['btn180'])){
	

    $id = $_GET['cusid'];
    $credits = $_GET['180credits'];
    $price = $_GET['100points'];

    $cus = mysqli_query($conn, "SELECT * FROM customer where cus_id='$id'");
        $row= mysqli_fetch_assoc($cus);

        $balance=$row['cus_travelpoints'] - $price;
        $finalcuscredit = $row['cus_credit'] + $credits;
    
    // $sqly = mysqli_query($conn, "INSERT INTO creditcoupon(credit_amount,coupon_code,coup_status,purchasecus_id)
    // VALUES('$price','sdfghjkl','Reedemable','$id')");
    $sql = mysqli_query($conn, "UPDATE customer SET cus_travelpoints='$balance',cus_credit='$finalcuscredit' WHERE cus_id='$id'");
            $num = mysqli_affected_rows($conn);
            if($num>0)
            {
                echo '<script>
                setTimeout(function() {
                    Swal.fire({
                      icon: "success",
                      title: "Success",
                      showConfirmButton: false,
                      text: "Redeemed Successfully!"
                        
                    }).then(function() {
                        window.location = "../member-travelpoints.php";
                      });
                }, 1000);
            </script>';
                
                // $em= '<script>alert("Redeemed Successfully")</script>';
                        
                //         header("Location: ../member-travelpoints.php?pass=$em");
            
            }
            else{
                echo '<script>
                setTimeout(function() {
                    Swal.fire({
                      icon: "error",
                      title: "Error",
                      showConfirmButton: false,
                      text: "We encountered a problem. Please try again."
                        
                    }).then(function() {
                        window.location = "../member-travelpoints.php";
                      });
                }, 1000);
            </script>';
                // $em= '<script>alert("We encountered a problem. Please try again.")</script>';
                        
                //         header("Location: ../member-travelpoints.php?fail=$em");
            }
    
    
    }


    if(isset($_GET['btn400'])){
	

        $id = $_GET['cusid'];
        $credits = $_GET['400credits'];
        $price = $_GET['200points'];
    
        $cus = mysqli_query($conn, "SELECT * FROM customer where cus_id='$id'");
            $row= mysqli_fetch_assoc($cus);
    
            $balance=$row['cus_travelpoints'] - $price;
            $finalcuscredit = $row['cus_credit'] + $credits;
        
        // $sqly = mysqli_query($conn, "INSERT INTO creditcoupon(credit_amount,coupon_code,coup_status,purchasecus_id)
        // VALUES('$price','sdfghjkl','Reedemable','$id')");
        $sql = mysqli_query($conn, "UPDATE customer SET cus_travelpoints='$balance',cus_credit='$finalcuscredit' WHERE cus_id='$id'");
                $num = mysqli_affected_rows($conn);
                if($num>0)
                {
                    
                    // $em= '<script>alert("Redeemed Successfully")</script>';
                            
                    //         header("Location: ../member-travelpoints.php?pass=$em");

                    echo '<script>
                    setTimeout(function() {
                        Swal.fire({
                          icon: "success",
                          title: "Success",
                          showConfirmButton: false,
                          text: "Redeemed Successfully!"
                            
                        }).then(function() {
                            window.location = "../member-travelpoints.php";
                          });
                    }, 1000);
                </script>';
                
                }
                else{
                    // $em= '<script>alert("We encountered a problem. Please try again.")</script>';
                            
                    //         header("Location: ../member-travelpoints.php?fail=$em");

                    echo '<script>
                    setTimeout(function() {
                        Swal.fire({
                          icon: "error",
                          title: "Error",
                          showConfirmButton: false,
                          text: "We encountered a problem. Please try again."
                            
                        }).then(function() {
                            window.location = "../member-travelpoints.php";
                          });
                    }, 1000);
                </script>';
                }
        
        
        }


        if(isset($_GET['btn800'])){
	

            $id = $_GET['cusid'];
            $credits = $_GET['800credits'];
            $price = $_GET['390points'];
        
            $cus = mysqli_query($conn, "SELECT * FROM customer where cus_id='$id'");
                $row= mysqli_fetch_assoc($cus);
        
                $balance=$row['cus_travelpoints'] - $price;
                $finalcuscredit = $row['cus_credit'] + $credits;
            
            // $sqly = mysqli_query($conn, "INSERT INTO creditcoupon(credit_amount,coupon_code,coup_status,purchasecus_id)
            // VALUES('$price','sdfghjkl','Reedemable','$id')");
            $sql = mysqli_query($conn, "UPDATE customer SET cus_travelpoints='$balance',cus_credit='$finalcuscredit' WHERE cus_id='$id'");
                    $num = mysqli_affected_rows($conn);
                    if($num>0)
                    {
                        
                        // $em= '<script>alert("Redeemed Successfully")</script>';
                                
                        //         header("Location: ../member-travelpoints.php?pass=$em");

                        echo '<script>
                        setTimeout(function() {
                            Swal.fire({
                              icon: "success",
                              title: "Success",
                              showConfirmButton: false,
                              text: "Redeemed Successfully!"
                                
                            }).then(function() {
                                window.location = "../member-travelpoints.php";
                              });
                        }, 1000);
                    </script>';
                    
                    }
                    else{
                        // $em= '<script>alert("We encountered a problem. Please try again.")</script>';
                                
                        //         header("Location: ../member-travelpoints.php?fail=$em");

                        echo '<script>
                        setTimeout(function() {
                            Swal.fire({
                              icon: "error",
                              title: "Error",
                              showConfirmButton: false,
                              text: "We encountered a problem. Please try again."
                                
                            }).then(function() {
                                window.location = "../member-travelpoints.php";
                              });
                        }, 1000);
                    </script>';
                    }
            
            
            }


            if(isset($_GET['btn1000'])){
	

                $id = $_GET['cusid'];
                $credits = $_GET['1000credits'];
                $price = $_GET['480points'];
            
                $cus = mysqli_query($conn, "SELECT * FROM customer where cus_id='$id'");
                    $row= mysqli_fetch_assoc($cus);
            
                    $balance=$row['cus_travelpoints'] - $price;
                    $finalcuscredit = $row['cus_credit'] + $credits;
                
                // $sqly = mysqli_query($conn, "INSERT INTO creditcoupon(credit_amount,coupon_code,coup_status,purchasecus_id)
                // VALUES('$price','sdfghjkl','Reedemable','$id')");
                $sql = mysqli_query($conn, "UPDATE customer SET cus_travelpoints='$balance',cus_credit='$finalcuscredit' WHERE cus_id='$id'");
                        $num = mysqli_affected_rows($conn);
                        if($num>0)
                        {
                            
                            // $em= '<script>alert("Redeemed Successfully")</script>';
                                    
                            //         header("Location: ../member-travelpoints.php?pass=$em");

                            echo '<script>
                            setTimeout(function() {
                                Swal.fire({
                                  icon: "success",
                                  title: "Success",
                                  showConfirmButton: false,
                                  text: "Redeemed Successfully!"
                                    
                                }).then(function() {
                                    window.location = "../member-travelpoints.php";
                                  });
                            }, 1000);
                        </script>';
                        
                        }
                        else{
                            // $em= '<script>alert("We encountered a problem. Please try again.")</script>';
                                    
                            //         header("Location: ../member-travelpoints.php?fail=$em");

                            echo '<script>
                            setTimeout(function() {
                                Swal.fire({
                                  icon: "error",
                                  title: "Error",
                                  showConfirmButton: false,
                                  text: "We encountered a problem. Please try again."
                                    
                                }).then(function() {
                                    window.location = "../member-travelpoints.php";
                                  });
                            }, 1000);
                        </script>';
                        }
                
                
                }


    ?>