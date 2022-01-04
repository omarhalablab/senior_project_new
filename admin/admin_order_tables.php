<?php
include 'Config/config.php';
$pageName = "Games";

include 'Includes/sections/header.php';


// $username = $_SESSION['name'];


$query123 = "SELECT * FROM orders_bfore_admin';";

$query = "select * from orders_before_admin where status='pending'  ";
$result = mysqli_query($con, $query);

echo  "      <div class='card'>
                            
                            <div class='card-body'>
                                <table class='table table-hover'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>Username</th>
                                            <th scope='col'>Game</th>
                                            <th scope='col'>Price</th>
                                            <th scope='col'>Age</th>
                                            <th scope='col'>Time Created</th>
                                            <th scope='col'>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>";


while ($row = $result->fetch_assoc()) {

    /// getting order id to set status
    $orderId = $row['id'];

    ///from game id i get the game name
    $gameId1 = $row['game_id'];
    $query2 = "select * from games where id ='$gameId1';";
    $result2 = mysqli_query($con, $query2);
    $roww = $result2 -> fetch_assoc();

    /// from username i get email and age
    $username0 = $row['username'];
    $query3 = "select * from users where username = '$username0'";
    $result3 = mysqli_query($con, $query3);
    $rowww = $result3 -> fetch_assoc();
    $userEmail = $rowww['email'];


    echo '<td>' . $row['username'] . "</td>";
    echo '<td>' . $roww['name'] . "</td>";
    echo '<td>' . $roww['price'] . " $ </td>";
    echo '<td>' . $rowww['age'] . " </td>";
    // echo '<td>' . $row[''] . "</td>";
    // echo '<td>' . $row['status'] . "</td>";
    echo '<td>' . $row['date_created'] . "</td>";
    echo "<td><a class='btn btn-success mt-2' onclick='accept(".$orderId.")'>Accept</a> <a class='btn btn-danger mt-2'onclick='reject(".$orderId.")'>Reject</a></td>";
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

function accept(id,userEmail){
    alert(id);
    // alert(userEmail);
     window.location.href = "request_managment.php?acceptOrder="+id;
}


function reject(id,userEmail){
    alert(id);
    // alert(userEmail);
     window.location.href = "request_managment.php?rejectOrder="+id;
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

<?php
include 'Includes/sections/footer.php';
