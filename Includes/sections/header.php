<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameStore | <?php echo $pageName  ?></title>
    <link rel="stylesheet" href="Layout/css/bootstrap.css">
    <link rel="stylesheet" href="Layout/css/main.css">
    <link rel="stylesheet" href="Layout/css/all.css">
    

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
        <li class="nav-item">
          <a class="nav-link" href="cart.php" > <i class="fas fa-shopping-cart"></i> Cart
          <span class="badge bg-primary"><?php echo $cartItemsCount ?></span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="user_requests.php"> <i class="fas fa-receipt"></i> Requests</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-0" href="index.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>