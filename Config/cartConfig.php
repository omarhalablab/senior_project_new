<?php

if (!isset($_SESSION['cart_items'])) {
    $_SESSION['cart_items'] = [];
}

if (isset($_GET['addToCart'])) {
    $gameID = $_GET['addToCart'];
    $_SESSION['cart_items'][] = $gameID;
     header('REFRESH:0;' . $_SERVER['PHP_SELF']);
     exit();
}

if(isset($_GET['item_remove'])){


    $ss = in_array($_GET['item_remove'],$_SESSION['cart_items']);
    if($ss !== false){


        echo "<script type='text/javascript'>
        alert('item found'`);
       
       </script>";
    }
// $id_get = $_GET['item_remove'];
//     header('REFRESH:0;' . $_SERVER['PHP_SELF']);
//     exit();

    // $key=array_search($_GET['item_remove'],$_SESSION['cart_items']);
    // if($key!==false){
    //     echo "<script type='text/javascript'>
    //     alert(".$id_get.");
    //     alert(".$key.");
    //    </script>";
    //    $_SESSION['cart_items']=array_diff($_SESSION['cart_items'],$id_get);
      //  unset($_SESSION['cart_items'][$key]);
  //  $_SESSION["cart_items"] = array_values($_SESSION["cart_items"]);
    // }
    
}

if (isset($_GET['clearCart'])) {
    $_SESSION['cart_items'] = [];
}

if (isset($_GET['buy'])) {
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $query = "insert into orders(fullname,email, address, phone_number, created_at) values('$fullname','$email', '$address','$phonenumber',CURRENT_TIME) ";

    $result = mysqli_query($con, $query);
    $order_id = mysqli_insert_id($con);
    foreach ($_SESSION['cart_items'] as $game_id) {
        $query = "insert into order_games(game_id,order_id) values('$game_id','$order_id') ";
        mysqli_query($con, $query);
    }

    $_SESSION['cart_items'] = [];
    header('REFRESH:0;' . $_SERVER['PHP_SELF']);
}

$cartItemsCount = count($_SESSION['cart_items']);
