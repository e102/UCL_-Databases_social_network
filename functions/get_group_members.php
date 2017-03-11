<?php


$select_members = "select * from group_members where group_id = '$group_id'";
$run = mysqli_query($con, $select_members);

while ($row = mysqli_fetch_array($run)) {

    $user_id = $row['user_id'];

    $member = "select * from users where user_id = '$user_id'";
    $run_member = mysqli_query($con, $member);
    $row_member = mysqli_fetch_array($run_member);

    $user_image = $row_member['user_image'];
    $user_id = $row_member['user_id'];
    $user_name = $row_member['user_name'];

    echo "
        <p><img src='user/user_images/$user_image' width='50' height='50'><a href='user_profile.php?u_id=$user_id'>$user_name</a></p>
    ";
}

?>