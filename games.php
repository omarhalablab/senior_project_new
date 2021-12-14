<?php
include 'Config/config.php';
$pageName = "Games";

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
            <h1>Games Management</h1>
        </div>
        <div class="card-body">
            <a href="?task=create" class="btn btn-primary m-2">Add new</a>
            <table class="table table-striped">
                <tr>
                    <th>Name:</th>
                    <th>Price:</th>
                    <th>Created At:</th>
                    <th>Control:</th>
                </tr>

                <?php 
                
                $query = "select * from games";
                $result = mysqli_query($con, $query);

                while($row = $result->fetch_assoc())
                {    
                    ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td>$<?php echo $row['price']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
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