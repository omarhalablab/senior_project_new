<?php
 function emptyInput ($name,$last,$Email,$Username,$PAssword){
    $result;

    if( $name=="" || $last=="" || $Email=="" || $Username=="" || $PAssword==""  ){
        $result=true;
    }
    else { 
        $result= false;
    }
    return $result;
}

function emptyInput_sginUp ($name,$pass,$pass_check,$email,$phoneNumber,$age){
    $result;

    if( $name=="" || $pass=="" || $pass_check=="" || $email=="" || $phoneNumber=="" || $age=="" ){
        $result=true;
    }
    else { 
        $result= false;
    }
    return $result;
}


function InvalidUsername($Username){
    $result;

    if( !preg_match("/^[a-z.A-Z0-9 ]*$/",$Username)){
        $result=true;
    }
    else { 
        $result= false;
    }
    return $result;
}




function UsernameExists_From_SignIN($con, $Username,$Pass,$email,$phoneNumber,$age){
    $query= "SELECT * FROM users WHERE  username = ?;";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$query)){
        header("location:signup.php?error=sqlerror");
        exit(); 
    }

mysqli_stmt_bind_param($stmt,"s",$Username);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$resultCheck = mysqli_stmt_num_rows($stmt);

if($resultCheck > 0){

    header("location:signup.php?error=userName taken");
    exit(); 
}
else{
    $query= "INSERT INTO users (username,password,created_at,email,phoneNumber,age) VALUES (?,?,CURRENT_TIME,?,?,?);";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$query)){
        header("location:signup.php?error=sqlerror");
        exit(); 
    }
    else {

        $hashed_Pass = password_hash($Pass,PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"sssss",$Username,$hashed_Pass,$email,$phoneNumber,$age);
        mysqli_stmt_execute($stmt);
        header("location:login.php?error=no_error_signup_success");
        exit(); 
    }

}
mysqli_stmt_close($stmt);
mysqli_close($con);
} 





// function i used 


// function UsernameExists($con, $Username){
//     $query= "SELECT * FROM users WHERE  username = ?;";
//     $stmt = mysqli_stmt_init($con);
//     if(!mysqli_stmt_prepare($stmt,$query)){
//         header("location:signup.php?error=no such user");
//         exit();
//     }

// mysqli_stmt_bind_param($stmt,"s",$Username);
// mysqli_stmt_execute($stmt);

// $resultdata = mysqli_stmt_get_result($stmt);
// if($row=mysqli_fetch_assoc($resultdata)){

//     return $row;

// }
// else{
//     $result=false;
//     return $result;
// }
// mysqli_stmt_close($stmt);

// }




// function CreatUser($dbc_conn,$name,$last,$Email,$Username,$PAssword)
// {
//     //$Pwd = password_hash($PAssword,PASSWORD_DEFAULT);
//    // $query= "INSERT INTO  customer (first,Last,Email,username, Password) VALUES ($name , $last , $Email , $Username ,$PAssword)  ;";
//    // $query= "INSERT INTO  customer (first,Last,Email,username, Password) VALUES ('$name' , '$last' , '$Email' , '$Username' ,'$Pwd')  ;";
//     $query= "INSERT INTO  customer (first,Last,Email,username, Password) VALUES (?, ?, ?, ?, ?)  ;";
//     //$resulteee = mysqli_query($dbc_conn,$query);
//     //die();

//     $stmt = mysqli_stmt_init($dbc_conn);
//     if(!mysqli_stmt_prepare($stmt,$query)){
//         header("location:signup.php?error=stmt failed");
//         exit();
//     }
// //$Pwd = password_hash($PAssword,PASSWORD_DEFAULT);
// $Pwd = md5($PAssword);

// mysqli_stmt_bind_param($stmt,"sssss",$name,$last,$Email,$Username,$Pwd);
// mysqli_stmt_execute($stmt);
// mysqli_stmt_close($stmt);
// header("location:signup.php?error=none");
// }

function emptyuserlogin($username,$password){

    if( $username=="" || $password=="" ){
        $result=true;
    }
    else { 
        $result= false;
    }
    return $result;
}


function loginUser($con, $username,$password){


$sql = "SELECT * FROM users WHERE username=?";
$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:login.php?error=sqlerror");
        exit(); 
    }
    else {
        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row= mysqli_fetch_assoc($result)){
            $pwdCheck = password_verify($password,$row['password']);
            if($pwdCheck==false){
                header("location:login.php?error=wrongPass");
            exit(); 
            }
            else if($pwdCheck==true){


                session_start();
                $_SESSION['name']=$row['username'];
                $_SESSION['id']=$row['id'];

                header("location:index.php?error=no_error_login_success");
                exit(); 
            }
            else{
                header("location:login.php?error=wrongPass");
                exit(); 
            }
        }
        
        else {
            header("location:login.php?error=noUser");
            exit(); 
        }
    }
}






//     $username_exist= UsernameExists($con, $username);
//     $uname = explode('.', $username);
//     $unamenew = strtolower(end($uname));
//     $allowed= array('admin');
    
//     if($username_exist===false){
//         header("location:login.php?error=Login Corrupted");
//         exit();

//     }

    

//     $pass=$username_exist["Password"];
//     $md5pass = md5($password);
//     if( $pass ===$md5pass) {
//         $checkpass=true;
//     }
// else {
//         $checkpass=false;
// }
//     //$checkpass= password_verify($password,$pass);
//     if($checkpass === false){
//     header("location:login.php?error=Wrong Password");
//     exit();
//     }
//     else if($checkpass === true){
//         session_start();
//         $_SESSION["name"] = $username_exist["username"];
//         if(in_array($unamenew,$allowed)){
//             session_start();
//             $_SESSION["admin"] = $username_exist["username"];
            

//         }
//         else {

//             session_start();
//             $_SESSION["customer"] = $username_exist["username"];

//         }

//         header("location:firstpage.php?welcome");
//         exit();
        
        
//     }}



?>