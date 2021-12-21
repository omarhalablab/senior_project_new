
<body>
  
  </body>
  </html>
  
  <!DOCTYPE html>
  <html lang="en">
  <head><meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome </title>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
          <link rel="stylesheet" href="Layout/css/bootstrap.css">
      <link rel="stylesheet" href="Layout/css/main.css">
      <link rel="stylesheet" href="Layout/css/all.css">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
          
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"> <i class="fas fa-gamepad text-primary"></i> PC <b class="text-primary">B</b>est</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-0 mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="index.php"> <i class="fas fa-home"></i> Home</a>
          </li>
        
        </ul>
      </div>
    </div>
  </nav>
  
      
<!-- <section class="hh"> -->
         <div class="container rounded border border-info mt-5">
       <h1 class="font-weight-bold text-capitalize text-center"> sign up </h1>
    <form action="signup-inc.php" method="post">


        <div class="form-group"> 
        <input class="form-control form-control-lg" type="text" name="username_1" placeholder="UserName... " class="form-group"/>
        </div>

        <div class="form-group"> 
        <input type="email" name="email" placeholder="Email.." class="form-control form-control-lg"/>
        </div>

        <div class="form-group"> 
        <input type="password" name="password_1" placeholder="PassWord... " class="form-control form-control-lg"/>
        </div>


        <div class="form-group"> 
        <input type="password" name="confirm_pass_1" placeholder="Confirm PassWord..." class="form-control form-control-lg"/>
        </div>

       
  <div class="row">
    <div class="col">
      <input type="text" class="form-control form-control-lg" name="phoneNumber" placeholder="Phone # ">
    </div>
    <div class="col">
      <input type="text" class="form-control form-control-lg"  name="age" placeholder="Age">
    </div>
  </div>


          <div class="d-flex justify-content-between">
          <button class="btn btn-outline-dark mt-3  "  name="submit" type="submit" >Submit</button>
         

          </div>
      

        </form>
</div>
<!-- </section>  -->
<br/>

<!-- <center><img src="/ceng420/project/img/12.png" width="450" height="350"  title="shop" alt="hhh"/></center> -->


    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



</body>


<?php

if(isset($_GET["error"])){
    if ($_GET["error"]=="empty_inputs_SignUP")
    {
        echo "<p class='font-weight-bold text-capitalize text-center'>PLease Fill ALl The Fields </p>";
        echo "<script type='text/javascript'>
    
    swal({
           title: 'Empty Field',
           text: 'Please Fill All The Fields',
           icon: 'error'
       });
 </script>";

    }
    else if  ($_GET["error"]=="Invalid username"){
        echo "<p>Please Choose a Proper Username </p>";
    }

    
    else if  ($_GET["error"]=="username or email is taken"){
        echo "<p> Email Or Username Already Taken! </p>";
    
}

else if  ($_GET["error"]==" stmt failed"){
    echo "<p> Something Went Wrong! Please Try Again </p>";

}
else if  ($_GET["error"]=="none"){
   echo "  <center><p> You Have Signed Up! </p> </center>";

}else if($_GET['error']=="no such user"){
    echo "<script type='text/javascript'>
    
    swal({
           title: 'No Such User',
           text: 'Please Sign Up',
           icon: 'error'
       });
 </script>";
}else if($_GET["error"] =="Pass_No_Match"){
    echo "<script type='text/javascript'>
    
    swal({
           title: 'PassWords do not match',
           text: 'Please try again',
           icon: 'error'
       });
 </script>";
}else if($_GET["error"] =="no_error_signup_success"){
  echo "<script type='text/javascript'>
  swal({
         title: 'WOHOO!!',
         text: 'sign up success',
         icon: 'success'
     });
</script>";
}
}
?>
     
</html>




    </html>

    
