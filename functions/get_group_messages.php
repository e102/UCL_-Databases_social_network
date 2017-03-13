<?php
global $con;

if(isset($_GET['group_id'])) {

    $group_id = $_GET['group_id'];

    $get_group_messages = "select * from group_messages where group_id='$group_id'";
    $run_group_messages = mysqli_query($con, $get_group_messages);
    if ($run_group_messages != null) {
        while ($row = mysqli_fetch_array($run_group_messages)) {

            $user_name = $row['user_name'];
            $message = $row['message'];

            echo "
        <div id='posts'>
            <h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
            <p>$message</p>
        </div>
        ";
        }
    }
}

?>