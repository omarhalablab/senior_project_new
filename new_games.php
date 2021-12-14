<?php

include 'Config/config.php';

// $name = $_SESSION['name'];

$pageName = 'Home Page';

// include 'Includes/sections/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameStore | <?php echo $pageName; ?></title>
     <link rel="stylesheet" href="Layout/css/bootstrap.css">
    <link rel="stylesheet" href="Layout/css/main.css">
    <link rel="stylesheet" href="Layout/css/all.css"> 
    
<style>

.my-actions { margin: 0 2em; }
.order-1 { order: 1; }
.order-2 { order: 2; }
.order-3 { order: 3; }

.right-gap {
  margin-right: auto;
}



  </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <i class="fas fa-gamepad text-primary"></i> PC <b class="text-primary">B</b>est</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-0 mb-2 mb-lg-0 ">
          <?php if (!isset($_SESSION['name'])) {
              echo "<li class='nav-item'><a class='nav-link' href='index.php'> <i class='fas fa-home'></i> Home</a></li>";
              echo "<li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              NEW
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
              <a class='dropdown-item' href='index.php'>ALL</a>
              <a class='dropdown-item' href='used_games.php'>USED</a>
            </div>
          </li>";
             // echo "<li class='nav-item '><a class='nav-link' href='login.php'> <i class='fas fa-home'></i> LOGIN</a></li>";
              echo '</ul>';
              echo "<a class='btn btn-secondary ml-auto' href='login.php'>Login</a>";
          } else {
              echo "<li class='nav-item'><a class='nav-link' href='index.php'> <i class='fas fa-home'></i> Home</a></li>";
              echo " <li class='nav-item'>
                <a class='nav-link' href='cart.php' > <i class='fas fa-shopping-cart'></i> Cart
                <span class='badge bg-primary'>$cartItemsCount </span>
                </a>
              </li>";
              echo "<li class='nav-item'><a class='nav-link' href='index.php'> <i class='fas fa-home'></i> Requests</a></li>";
              echo "<li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              NEW
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
              <a class='dropdown-item' href='index.php'>ALL</a>
              <a class='dropdown-item' href='used_games.php'>USED</a>
            </div>
          </li>";
              // echo "<li class='nav-item'><a class='nav-link' href='index.php'> <i class='fas fa-home'></i> LOGOUT</a></li>";
              echo '</ul>';
              echo "<div class='ml-auto'>";
              echo "<div class='btn btn-link mr-4'>Welcome ".$_SESSION['name']."</div>";
              // echo "<div class='btn btn-primary'><a class='href='logout.php'>Logout</a></div>";
              echo "<a class='btn btn-primary' href='logout.php' role='button'>Logout</a>";
              echo '</div>';
          } ?>

     
       
      


        

       

        
      
    </div>
  </div>
</nav>


<div class="container p-2">
    <div class="row">

            <?php
            $query = "select * from games where status='NEW'";
            $result = mysqli_query($con, $query);

            while ($row = $result->fetch_assoc()) { ?>
           <?php $id=$row['id']; ?>
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <img src="admin/images/<?php echo $row[
                        'image_name'
                    ]; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text">
                        <del><?php echo $row['price'] *
                            1.4; ?>$</del> <b><?php echo $row['price']; ?>$</b>
                        </p>
                        <h1 > <?php echo $row['status']." ";
                        if(isset($_SESSION['name'])){
                          echo $_SESSION['name'];
                        }
                                    ?></h1>
                       

                        <!-- <a id="<?php echo $row['id']; ?>" class="btn btn-primary" onclick="function_addToCart(<?php echo $row['id']; ?>,this)" ><i class="fas fa-cart-plus"></i> Add to cart</a> -->
                      <?php if(!isset($_SESSION['name'])){
                        echo"<a class='btn btn-primary' onclick='function_addToCart_noAccess(this)' ><i class='fas fa-cart-plus'></i> Add to cart</a>";
                      }else{echo"<a class='btn btn-primary' onclick='function_addToCart(".$id.",this)' ><i class='fas fa-cart-plus'></i> Add to cart</a>";
                      
                      
                      }
                        ?>
                    </div>
                </div>
            </div>
            <?php }
            ?>
    </div>
</div>








<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php

if(isset($_GET["error"])){
if ($_GET["error"]=="no_error_login_success")
{
  $name =$_SESSION['name'];
  echo "<script type='text/javascript'>
  swal({
         title: 'Welcome ".$name."',
         text: 'Enjoy Our Store!',
         icon: 'success'
     });
</script>";
  
}
}

?>


<script>
  function function_addToCart_noAccess(){
    swal({
    title: "Access denied",
    text: "Log in first!",
    icon: "warning"
}).then(function(){
  window.location = "login.php";
});

  }
  function function_addToCart(id){
  
    // var id2 =document.getElementByClassName('').getAttribute('id');
    // alert(id);
    // alert(id2);
    swal({
    title: "Item Added",
    text: "check your cart!",
    icon: "success"
}).then(function(){
  window.location = "?addToCart="+id;
 
});


  }


  </script>



</body>
<?php include 'Includes/sections/footer.php';
?>