<?php

global $con;

$friend_requests = "select * from friends where requestReceiverID='$user_id' and verified='no'";
$run_requests = mysqli_query($con,$friend_requests);

while($row = mysqli_fetch_array($run_requests)) {

    $user_id = $row['requestSenderID'];
    $user_query = "select * from users where user_id='$user_id'";
    $run_query = mysqli_query($con,$user_query);
    $row_user = mysqli_fetch_array($run_query);

    $user_name = $row_user['user_name'];
    $user_image = $row_user['user_image'];

    echo "
          <div id='members'>
            
            <p><a href='user_profile.php?u_id=$user_id'><img src='user/user_images/$user_image' width='50' height='50'></a></p>
            <h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
            <a href='accept_request.php?u_id=$user_id'><button>Accept request</button></a>
            
          </div></br>
          ";
}


?>