
<!DOCTYPE html>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="Layout/css/bootstrap.css">
    <link rel="stylesheet" href="Layout/css/main.css">
    <link rel="stylesheet" href="Layout/css/all.css">




<?php
include 'Config/config.php';
$pageName = "My Cart";

// include 'Includes/sections/header.php';
?>
 
<style>
    


</style>
<script src="index.js"></script>
<script type="text/javascript" src="index.js"></script>
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
              Categories
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
              <a class='dropdown-item' href='new_games.php'>NEW</a>
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
                        echo "<li class='nav-item'><a class='nav-link' href='user_requests.php'> <i class='fas fa-home'></i> Requests</a></li>";
                        
                        // echo "<li class='nav-item'><a class='nav-link' href='index.php'> <i class='fas fa-home'></i> LOGOUT</a></li>";
                        echo '</ul>';
                        echo "<div class='ml-auto'>";
                        echo "<div class='btn btn-link mr-4'>Welcome " . $_SESSION['name'] . "</div>";
                        // echo "<div class='btn btn-primary'><a class='href='logout.php'>Logout</a></div>";
                        echo "<a class='btn btn-primary' onclick='logout()' role='button'>Logout</a>";
                        echo '</div>';
                    } ?>












            </div>
        </div>
    </nav>


    <div class="container p-2">
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header p-2">
                <h3><i class="fas fa-shopping-cart"></i> Reviews</h3>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush  " style="list-style: none;"  id="table123">

                    <?php
                    if(isset($_GET['gameId'])){
                        $id = $_GET['gameId'];
                        $query = "select * from reviews where gameId = '$id' ;";
                        $result = mysqli_query($con, $query);
                        while($row = $result->fetch_assoc()) {
                            $userId = $row['userId'];
                            $query2 = "select * from users where id = ' $userId' ;";
                            $result2 = mysqli_query($con, $query2);
                            $roww = $result2 -> fetch_assoc();

                           echo " <li class=;list-group-item' style='decoration:none;'>
                           ";

                            echo '<div style="display: flex;;" ><div class="m-2">'. $roww['username'] . '</div> <div class="m-2">:</div>  <div class="m-2">' . $row['review'].'</div></div>';
                               
                            

                    
                        }
                       
                            
                     echo"</li> ";
                        

                    }
                    else {
                        header("location:index.php");
                        exit();
                    }

                    
                        
  
                        ?> 
                            
                            
                      
                    
                </ul>
            
                <br>
               
            </div>

            <div class="card">
								<div class="card-header">
									<div class="card-title">Add Review</div>
								</div>
								<div class="card-body">
									<div class="form-group">
										<div class="input-group">
											<!-- <div class="input-group-prepend">
												<span class="input-group-text">With textarea</span>
											</div> -->
											<textarea class="form-control" aria-label="With textarea" id="review"></textarea>
										</div>
									</div>
									
									
								</div>
								<div class="card-action">
									<button class="btn btn-success m-2" onclick="submitReview()"  >Submit</button>
									<!-- <button class="btn btn-danger m-2">Cancel</button> -->
								</div>
							</div>



            </div>
        </div>
    </div>
</div>



    


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




<script>


function submitReview(){
  //alert("hello");
  var review = document.querySelector('#review').value;
  //var review = document.getElementById("review").value;
  //alert(review);
  if(review == ""){
    swal({
         title: 'Please enter your review',
         text: '',
         icon: 'warning'
     });
  }
  <?php
  if(isset($_GET['gameID'])){
    $gameId = $_GET['gameID'];
  
   
  }


  ?>

var url = new URL(window.location.href);
var c = url.searchParams.get("gameId");
  window.location = "reviewsManagement.php?review="+review+"&gameId="+c;

}

function logout(){


swal({
title: 'Do you want to log out?',
background: 'red',
showDenyButton: true,
showCancelButton: true,
confirmButtonText: 'Yes',
denyButtonText: 'No',
buttons: [
    'No, cancel it!',
    'Yes, I am sure!'
  ]
}).then(function(isConfirm) {
  if (isConfirm) {
    swal({
      title: 'LOG OUT!',
      text: 'HOPE TO SEE YOU SOON!',
      // icon: 'success'
    }).then(function() {
      window.location.href = "logout.php";

    });
  } else {
    // swal("", "Your imaginary file is safe :)", "error");
  }

});

}




function removeAll(){
    // alert("removeAll");
    window.location = "?removeAll=ture";
}
function confirm(){
    // alert("confirm");
    // window.location = "?confirm=ture";


    swal({
  title: 'Comfirm Order?',
  background: 'red',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: 'Yes',
  denyButtonText: 'No',
  buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ]
}).then(function(isConfirm) {
      if (isConfirm) {
        swal({
          title: 'Order Submitted',
          text: 'Thank you for your order',
          // icon: 'success'
        }).then(function() {
            window.location = "?confirm=ture";

        });
      } else {
        // swal("", "Your imaginary file is safe :)", "error");
      }
   
});



}
function printHello(){
    // alert("hello");
}


// function hhh(){
//     alert("hello");
//    
//     reload = location.reload();
// }

    function deleteRow(id){
        // alert(id);
        
        
      

        // document.getElementById("table123").deleteRow(0);
        // var i = r.parentNode.parentNode.rowIndex;
        // document.getElementById("table123").deleteRow(i);
    //    var i =  link.parentNode.parentNode.removeChild(link.parentNode);
    window.location = "?item_remove="+id;
        
    }


</script>

<?php

include 'Includes/sections/footer.php';
?>
</body>
</html>
