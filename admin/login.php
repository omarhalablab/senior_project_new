<?php 

include 'Config/connection.php';

session_start();

    if ( isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($con, $query);

        // Check if the rows count is greater than 0
        if ( mysqli_num_rows($result) > 0)
        {
            // succeed
            $_SESSION['is_logged_in'] = true;
            echo "Redireting...";
            header('REFRESH:3;index.php');
            exit();
        }
        else 
        { 
            //  failed
            echo "Failed to login please make sure that username and password are correct";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Layout/css/bootstrap.css">
</head>
<body class="p-2">

<div class="container m-auto">
<div class="card m-auto">
        <div class="card-body">
            <form action="login.php" method="post">
                <h1>Login to website</h1>
                <input type="text" class="form-control m-1" name="username" placeholder="Enter username">
                <input type="password" class="form-control m-1"  name="password" placeholder="Enter password">
                <button class="btn btn-primary m-1">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>