<!DOCTYPE html>

<head>

    <!-- <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css"> -->

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
    <!-- <script type="text/javascript" src="index.js"></script> -->
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
                        echo "<li class='nav-item'><a class='nav-link' href='request.php'> <i class='fas fa-home'></i> Requests</a></li>";
                        
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





    <!--if
	this is commment
	-->


    <?php
    $username = $_SESSION['name'];


    $query123 = "SELECT * FROM orders_bfore_admin WHERE username = '$username';";

    $query = "select * from orders_before_admin where username ='$username'  ";
    $result = mysqli_query($con, $query);

    echo  "      <div class='card'>
								
								<div class='card-body'>
									<table class='table table-hover'>
										<thead>
											<tr>
												<th scope='col'>Game</th>
												<th scope='col'>Price</th>
												<th scope='col'>Status</th>
												<th scope='col'>Time Created</th>
											</tr>
										</thead>
										<tbody>";


    while ($row = $result->fetch_assoc()) {

        $gameId1 = $row['game_id'];
        $query2 = "select * from games where id ='$gameId1';";
        $result2 = mysqli_query($con, $query2);
        $roww = $result2 -> fetch_assoc();

        // echo '<td>' . $row['username'] . "</td>";
        echo '<td>' . $roww['name'] . "</td>";
        echo '<td>' . $roww['price'] . " $ </td>";
        // echo '<td>' . $row[''] . "</td>";
        echo '<td>' . $row['status'] . "</td>";
        echo '<td>' . $row['date_created'] . "</td>";
        echo "</tr>";
    }

    // 			</tbody>
    // 		</table>
    // 	</div>
    // </div>

    // ";

    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script>
        function function_delete() {
            alert("hello");
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



    </script>
</body>

</html>