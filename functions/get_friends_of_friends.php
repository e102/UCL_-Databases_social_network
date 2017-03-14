<?php

global $con;

$get_user = "select * from users where user_id='$u_id'";
$run_user = mysqli_query($con,$get_user);
$row = mysqli_fetch_array($run_user);
$user_id = $row['user_id'];

$get_users = "select * from friends where requestSenderID='$user_id' and verified='yes'";
$run_user = mysqli_query($con, $get_users);

while($row = mysqli_fetch_array($run_user)) {

    $id = $row['requestReceiverID'];

    $get_friend = "select * from users where user_id='$id'";
    $run_friend = mysqli_query($con, $get_friend);
    $row_friend = mysqli_fetch_array($run_friend);

    $user_name = $row_friend['user_name'];
    $user_image = $row_friend['user_image'];

    echo "
      <div id='members'>
        
        <p><a href='user_profile.php?u_id=$id'><img src='user/user_images/$user_image' width='50' height='50'></a></p>
        <h3><a href='user_profile.php?u_id=$id'>$user_name</a></h3>       
      </div></br>
      ";
}



?>