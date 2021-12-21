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
              echo "<li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              Categories
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
              <a class='dropdown-item' href='new_games.php'>NEW</a>
              <a class='dropdown-item' href='used_games.php'>USED</a>
            </div>
          </li>";
              // echo "<li class='nav-item'><a class='nav-link' href='index.php'> <i class='fas fa-home'></i> LOGOUT</a></li>";
              echo '</ul>';
              echo "<div class='ml-auto'>";
              echo "<div class='btn btn-link mr-4'>Welcome ".$_SESSION['name']."</div>";
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
 $username =$_SESSION['name'];

    
$query123 = "SELECT * FROM orders_bfore_admin WHERE username = '$username';";

$query = "select * from orders_before_admin where username ='$username'  ";
$result = mysqli_query($con, $query);
// $result = mysqli_query($con, $query123);




                   echo"      <div class='card'>
								<div class='card-header'>
									<div class='card-title'>Hoverable Table</div>
								</div>
								<div class='card-body'>
									<table class='table table-hover'>
										<thead>
											<tr>
												<th scope='col'>UserName</th>
												<th scope='col'>Game</th>
												<th scope='col'>Price</th>
												<th scope='col'>Date Ordered</th>
												<th scope='col'>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>Mark</td>
												<td>Otto</td>
												<td>@mdo</td>
												<td>
														<div class='form-button-'action'>
															<button type='button' data-toggle='tooltip'  class='btn btn-link btn-lg' data-original-title='Edit Task' onclick='function_delete()' >
															<i class='la la-edit'></i>
															</button>
															<button type='button' data-toggle='tooltip'  class='btn btn-link ' data-original-title='Remove'>
															<i class='la la-times'></i>
															</button>
														</div>
													</td>
											</tr>
											<tr>
												<td>2</td>
												<td>Jacob</td>
												<td>Thornton</td>
												<td>@fat</td>
												<td>
												<div class='form-button-'action'>
												<button type='button' data-toggle='tooltip'  class='btn btn-link btn-primary btn-lg' data-original-title='Edit Task'>
													<i class='la la-edit'></i>
												</button>
												<button type='button' data-toggle='tooltip'  class='btn btn-link btn-danger' data-original-title='Remove'>
													<i class='la la-times'></i>
												</button>
											</div>
													</td>
											</tr>
											<tr>
												<td>3</td>
												<td colspan='2'>Larry the Bird</td>
												<td>@twitter</td>
												<td>
												<div class='form-button-'action'>
												<button type='button' data-toggle='tooltip'  class='btn btn-link btn-primary btn-lg' data-original-title='Edit Task'>
													<i class='la la-edit'></i>
												</button>
												<button type='button' data-toggle='tooltip'  class='btn btn-link btn-danger' data-original-title='Remove'>
													<i class='la la-times'></i>
												</button>
											</div>
													</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>

							";



echo '<table border="1">' . "\r\n";
?>

<tr><th>username</th><th>gameid</th><th>status</th></tr>

<?php
while($row = $result->fetch_assoc()) {
	echo "<tr>\r\n";
	echo '<td>' . $row['username'] . "</td>\r\n";
	echo '<td>' . $row['game_id'] . "</td>\r\n";
	echo '<td>' . $row['status'] . "</td>\r\n";
	echo "</tr>\r\n";
}
echo '</table>';
echo '<br/>';
  

  if(isset($_SESSION['name'])){


    echo'  <div class="itemupload"?>


<form action="deleteCart.php" method="post">




<button type="submit" name="submit" >Confirm</button>






</form>
</div>';
  }

?>


<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Add Row</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="la la-plus"></i>
											Add Row
										</button>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														New</span> 
														<span class="fw-light">
															Row
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Create a new row using this form, make sure you fill them all</p>
													<form>
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Name</label>
																	<input id="addName" type="text" class="form-control" placeholder="fill name">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Position</label>
																	<input id="addPosition" type="text" class="form-control" placeholder="fill position">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Office</label>
																	<input id="addOffice" type="text" class="form-control" placeholder="fill office">
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="modal-footer no-bd">
													<button type="button" id="addRowButton" class="btn btn-primary">Add</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Name</th>
													<th>Position</th>
													<th>Office</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Name</th>
													<th>Position</th>
													<th>Office</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>
												<tr>
													<td>Tiger Nixon</td>
													<td>System Architect</td>
													<td>Edinburgh</td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link  btn-lg" data-original-title="Edit Task">
																<i class="la la-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="la la-times"></i>
															</button>
														</div>
													</td>
												</tr>
												<tr>
													<td>Garrett Winters</td>
													<td>Accountant</td>
													<td>Tokyo</td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link  btn-lg" data-original-title="Edit Task">
																<i class="la la-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="la la-times"></i>
															</button>
														</div>
													</td>
												</tr>
												<tr>
													<td>Ashton Cox</td>
													<td>Junior Technical Author</td>
													<td>San Francisco</td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="la la-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="la la-times"></i>
															</button>
														</div>
													</td>
												</tr>
												<tr>
													<td>Cedric Kelly</td>
													<td>Senior Javascript Developer</td>
													<td>Edinburgh</td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="la la-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="la la-times"></i>
															</button>
														</div>
													</td>
												</tr>
												<tr>
													<td>Airi Satou</td>
													<td>Accountant</td>
													<td>Tokyo</td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="la la-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="la la-times"></i>
															</button>
														</div>
													</td>
												</tr>
												<tr>
													<td>Brielle Williamson</td>
													<td>Integration Specialist</td>
													<td>New York</td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="la la-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="la la-times"></i>
															</button>
														</div>
													</td>
												</tr>
												<tr>
													<td>Herrod Chandler</td>
													<td>Sales Assistant</td>
													<td>San Francisco</td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="la la-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="la la-times"></i>
															</button>
														</div>
													</td>
												</tr>
												<tr>
													<td>Rhona Davidson</td>
													<td>Integration Specialist</td>
													<td>Tokyo</td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="la la-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="la la-times"></i>
															</button>
														</div>
													</td>
												</tr>
												<tr>
													<td>Colleen Hurst</td>
													<td>Javascript Developer</td>
													<td>San Francisco</td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="la la-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="la la-times"></i>
															</button>
														</div>
													</td>
												</tr>
												<tr>
													<td>Sonya Frost</td>
													<td>Software Engineer</td>
													<td>Edinburgh</td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="la la-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="la la-times"></i>
															</button>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>



	function function_delete(){
		alert("hello");
	}

	</script>
	</body>
</html>