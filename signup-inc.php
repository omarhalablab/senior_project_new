<?php

if(isset($_POST["submit"])){
    $userName_1=$_POST["username_1"];
    $Pass_1=$_POST["password_1"];
    $confirm_Pass_1=$_POST["confirm_pass_1"];
   

 require_once 'Config/config.php';
 require_once 'functions.php';

 if(emptyInput_sginUp($userName_1,$Pass_1,$confirm_Pass_1) !== false){
    header("location:signup.php?error=empty_inputs_SignUP");
    exit();
}


 
    if($Pass_1 != $confirm_Pass_1){
        header("location:signup.php?error=Pass_No_Match&uid=".$userName_1);
        exit();
    }

    if(InvalidUsername($userName_1) !== false){
        header("location:signup.php?error=Invalid username");
        exit();
    }

    if(UsernameExists_From_SignIN($con, $userName_1,$Pass_1) !== false){
        header("location:signup.php?error=username or email is taken");
        exit();
    }

   

}
else{
    header("location:signup.php?you_dont_have_access");   
}