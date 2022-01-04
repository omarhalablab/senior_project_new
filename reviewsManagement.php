
<?php
include 'Config/config.php';
$username123 = $_SESSION['name'];



if(isset($_GET['review']) && isset($_GET['gameId'])){



    
// echo"
// <script> alert('giii')</script>
// ";

//echo '<script type="text/javascript">alert("'.$username123.'");</script>';
    $review = $_GET['review'];
    $gameId = $_GET['gameId'];
    
    $query2 = "select * from users where username = '$username123' ;";
    $result2 = mysqli_query($con, $query2);
    $roww = $result2 -> fetch_assoc();
    $userid = $roww['id'];
   // echo '<script type="text/javascript">alert("'.$userid.'");</script>';

     $query = "insert into reviews(gameId,userId, review) values('$gameId','$userid', '$review') ";

     $result = mysqli_query($con, $query);
     header("Location:reviews.php?gameId=".$gameId);


}
else{
    //header("location:index.php?errrrrrrrrror");   
}