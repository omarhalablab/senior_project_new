

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
            
            <!-- <div class="container">
            <form  class="form"action="login-inc.php" method="post" align="center">
            <input type="text" name="Username" placeholder="Username... " />   
            <input type="password" name="password" placeholder="Password... " />
            <button type="submit" name="submit">Log In </button>

        </form> -->

        <div class="container  rounded border border-secondary mt-5">
        <h1 class="font-weight-bold text-capitalize text-center"> log In </h1>
        <form  action="login-inc.php" method="post" >
            <!-- TEXT FIELD GROUPS -->
           
            <div class="form-group">
                <label for="email">UserName</label>
                <input class="form-control form-control-lg"  type="text"  name="Username" placeholder="Enter username">
                <!-- <small class="form-text text-muted">Your email will not ever be shared</small> -->
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control form-control-lg" name="password" type="password"  placeholder="Password" >
            </div>
           
            <div class="d-flex justify-content-between">
          <button class="btn btn-outline-dark  "  name="submit" type="submit" >Submit</button>
          <!-- <a class="btn btn-outline-success" href="signup.php" value="sign up"> -->
          <a class="btn btn-outline-info" href="signup.php" role="button">sign up</a>

          </div>
        </form>

    
</div>

<?php

if(isset($_GET["error"])){
if ($_GET["error"]=="empty input")
{
  // preg_replace('/\\?.*/', '', $str)
    // echo "<p class='font-weight-bold text-capitalize text-center'>PLease Fill ALl The Fields123 </p>";
    echo "<script type='text/javascript'>
    
     swal({
            title: 'Access denied',
            text: 'please fill both inputs!',
            icon: 'error'
        });
  </script>";
  echo "<p class='font-weight-bold text-capitalize text-center'>PLease Fill ALl The Fields 123123321 </p>";
  }

else if ($_GET["error"]=="sqlerror")
  {
   
      echo "<script type='text/javascript'>
       swal({
              title: 'Error',
              text: 'Please try Agian!',
              icon: 'error'
          });
    </script>";
    // echo "<p class='font-weight-bold text-capitalize text-center'>PLease Fill ALl The Fields 123123321 </p>";
    }
    else if($_GET["error"]=="wrongPass")
    {
     
        echo "<script type='text/javascript'>
         swal({
                title: 'Wrong Password',
                text: 'Please try Agian!',
                icon: 'error'
            });
      </script>";
      echo "<p class='font-weight-bold text-capitalize text-center'>Wrong Password Please Try Again </p>";
      }else if($_GET["error"]=="noUser")
      {
       
          echo "<script type='text/javascript'>
           swal({
                  title: 'NO USER FOUND',
                  text: 'Please try Agian Or Sign UP!',
                  icon: 'error'
              });
        </script>";
        echo "<p class='font-weight-bold text-capitalize text-center'>User Not Found, Try Again Or Sign Up</p>";
        }
        else if($_GET["error"] =="no_error_signup_success"){
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



           
            
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>




    </html>