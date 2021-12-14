<?php
 require_once 'Config/config.php';
 require_once 'functions.php';


if(isset($_POST["submit"])){
    $username = $_POST["Username"];
    $password= $_POST["password"];

    if(emptyuserlogin($username,$password) !== false){
            header("location:login.php?error=empty input");
            exit();
        }
        
        loginUser($con, $username,$password);
        header("location:login.php");
    
   

}
else {
    header("location:index.php");
    exit();
}