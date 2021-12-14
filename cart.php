<!DOCTYPE html>
<head>


<?php
include 'Config/config.php';
$pageName = "My Cart";

include 'Includes/sections/header.php';
?>
 
<style>
    


</style>
<script src="index.js"></script>
<script type="text/javascript" src="index.js"></script>
</head>
<body> 


<!-- 
<button class="hhhh" onclick='printHello()' > press me</button>
<button onclick="myFunction()">Click me</button>
<button onClick="window.location.reload();">Refresh Page</button> -->
<div class="container p-2">
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header p-2">
                <h3><i class="fas fa-shopping-cart"></i> My Cart</h3>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush" id="table123">

                    <?php
                        $totalPrice = 0;
                        foreach ($_SESSION['cart_items'] as $game_id) {
                        ?> 
                            <li class="list-group-item">
                                <i class="fas fa-gamepad"></i>
                                <?php 
                                $query = "select * from games where id = " . $game_id;
                                $result = mysqli_query($con, $query);
                                $row = $result->fetch_assoc();
                                // echo $row['name'] . " , $" . $row['price'];
                                // $totalPrice += $row['price'];

                                 echo '<div style="display: flex;justify-content: space-between;" >'. $row['name'] . ' , $' . $row['price'].'<button onclick="deleteRow('.$row['id'].')" class="btn btn-primary text-right">remove</button></div>';
                               // echo  $row['name'] . ' , $' . $row['price'];
                                $totalPrice += $row['price'];

                            //    echo "<div><button class='btn btn-primary text-right'>remove</button></div>"
                            // echo '<input type="submit" class="btn btn-primary" value="Active">';
                                ?>
                            </li>
                        <?php
                        }
                        // if(sizeof($_SESSION["cart_items"]) != 0){

                        //     echo  ' <div style="display:flex;justify-content:center; margin-top:3px"><div style="margin-right:3px">
                        //    <button onclick="hhh()">remove all </button>
                        //  </div>
                           
                          
                        //     <div>
                        //    <button onclick="hhh()">confirm request  </button>
                        //    </div>
                        //    </div>
                        //    ';
                        // }else{
                        //     echo'<li class="list-group-item">
                            
                        //    </li> ';
                        // }
                    ?>
                    
                    
                </ul>
            
                <br>
                <!-- <h3>Please Fill your information to buy your games:</h3> -->
                <!-- <form action="cart.php?buy" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Full name</label>
                        <input type="text" name="fullname" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phonenumber" class="form-control" >
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary">Buy</button>
                    </div>
                </form> -->
            </div>
            </div>
        </div>
    </div>
</div>

<script>

function printHello(){
    alert("hello");
}


// function hhh(){
//     alert("hello");
//     <?php  $_SESSION['cart_items'] = []; ?>
//     reload = location.reload();
// }

    function deleteRow(id){
        alert(id);
        
        
      

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
