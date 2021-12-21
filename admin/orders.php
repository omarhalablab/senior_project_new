<?php
include 'Config/config.php';
$pageName = "Orders";

include 'Includes/sections/header.php';

if ( isset($_GET['task']))
    $task = $_GET['task'];
else 
    $task = "manage";

    if ( $task == "manage")
    {
        ?>
<div class="container">

    <div class="card mt-2">
        <div class="card-header">
            <h1>Games Orders</h1>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th><i class="fas fa-user"></i> Buyer Info:</th>
                    <th><i class="fas fa-gamepad"></i> Games:</th>
                    <th><i class="fas fa-coins"></i> Total Price:</th>
                    <th><i class="fas fa-calendar"></i> Created at:</th>
                </tr>

                <?php 
                
                $query = "select * from users_before_admin";
                $result = mysqli_query($con, $query);

                while($row = $result->fetch_assoc())
                {    

                    $gameId1 = $row['game_id'];
                    $query2 = "select * from games where id ='$gameId1';";
                    $result2 = mysqli_query($con, $query2);
                    $roww = $result2 -> fetch_assoc();

                    ?>
                <tr>
                    <td>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="fas fa-user"></i> Full name:  <?php echo $row['username'] ?>
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-map"></i> Email  <?php echo $row['email'] ?>
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-at"></i> Phone Number:  <?php echo $row['phoneNumber'] ?>
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-phone"></i> Age:  <?php echo $row['phone_number'] ?>
                            </li>
                        </ul>
                    </td>
                    <td>
                    <ul class="list-group list-group-flush">
                        <?php 
                        
                        $query2 = "select * from order_games , games where order_games.order_id = " . $row['id'] . " AND games.id = order_games.game_id " ;
                        $result2 = mysqli_query($con, $query2);

                        $totalPrice = 0;
                        
                        while($row2 = $result2->fetch_assoc())
                        {

                            $totalPrice += $row2['price'];
                        ?>
                        <li class="list-group-item">
                            <i class="fas fa-gamepad"></i> <?php echo $row2['name'] ?>
                        </li>
                        <?php 
                        }
                        ?>
                    </ul>
                    </td>
                    <td>
                        $<?php echo $totalPrice ?>
                    </td>
                    <td>
                        <a href="?task=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" >Delete</a>
                    </td>
                </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php
    }
    elseif ( $task == "create" )
    {
?>
<div class="card m-2">
    <div class="card-header">
        <h3>Create new game</h3>
    </div>
    <div class="card-body">
        <form action="games.php?task=insert" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Game Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter a name of game">
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Enter the price of game">
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="mb-3">
                <button class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>
<?php
    }
    elseif ( $task == "insert")
    {
        if ( isset($_POST['name']))
        {
            $name = $_POST['name'];
            $price = $_POST['price'];


            // Image Upload
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $file_ext=strtolower(explode('.',$file_name)[1]);
            $imageName = $name . time() . "." . $file_ext;
            move_uploaded_file($file_tmp,"images/".$imageName);
            $query = "insert into games(name,price, image_name, created_at) values('$name','$price', '$imageName',CURRENT_TIME) ";

            if ( mysqli_query($con, $query))
            {
                ?>
                    <div class="alert alert-success"> Created successfully! <a href="?task=manage"> Go back </a></div>
                <?php
            }
            else {
                ?>
                    <div class="alert alert-danger"> Failed to Create! <a href="?task=manage"> Go back </a></div>
                <?php
            }


        }
    }
    elseif ( $task == "delete")
    {
        $id = $_GET['id'];

        $query = "DELETE FROM games WHERE id = $id";

        if ( mysqli_query($con, $query))
        {
            ?>
                <div class="alert alert-success"> Deleted successfully! <a href="?task=manage"> Go back </a></div>
            <?php
        }
        else {
            ?>
                <div class="alert alert-danger"> Failed to Delete! <a href="?task=manage"> Go back </a></div>
            <?php
        }
    }
include 'Includes/sections/footer.php';