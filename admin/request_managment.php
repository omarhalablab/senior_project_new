<?php 
    // use PHPMailer\PHPMailer\PHPMailer;
include 'Config/connection.php';

if (isset($_GET['acceptOrder'])) {
    $orderId = $_GET['acceptOrder'];

    
   ///getting username from orders_before_admin using orderId to get the email of the user
    $query1 = "select * from orders_before_admin where id ='".$orderId."';    ";

    $result2 = mysqli_query($con, $query1);
    $row1 = $result2 -> fetch_assoc();
    $username4 = $row1['username'];
    $query3 = "select * from users where username = '$username4'";
    $result3 = mysqli_query($con, $query3);
    $rowww = $result3 -> fetch_assoc();
    $userEmail = $rowww['email'];

     $query = "UPDATE  orders_before_admin SET status='Accepted' where id='".$orderId."';";

    
    
    
    
    if(mysqli_query($con, $query)){
        echo "Updated";
        header("location:index.php");
    }
    else {echo "fail";}
   

    

     header('REFRESH:0;' . $_SERVER['PHP_SELF']);
     exit();

}


if (isset($_GET['rejectOrder'])) {
    $orderId = $_GET['rejectOrder'];

    
   ///getting username from orders_before_admin using orderId to get the email of the user
    $query1 = "select * from orders_before_admin where id ='".$orderId."';    ";

    $result2 = mysqli_query($con, $query1);
    $row1 = $result2 -> fetch_assoc();
    $username4 = $row1['username'];
    $query3 = "select * from users where username = '$username4'";
    $result3 = mysqli_query($con, $query3);
    $rowww = $result3 -> fetch_assoc();
    $userEmail = $rowww['email'];

     $query = "UPDATE  orders_before_admin SET status='Rejected' where id='".$orderId."';";

    
    
    
    
    if(mysqli_query($con, $query)){
        echo "Updated";
        header("location:index.php");
    }
    else {echo "fail";}
   

    

     header('REFRESH:0;' . $_SERVER['PHP_SELF']);
     exit();

}


     ?>