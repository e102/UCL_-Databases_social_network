<?php

if (isset($_POST['submit_group_message'])) {

    if(isset($_GET['group_id'])) {
        $group_id = $_GET['group_id'];
    }

    $user = $_SESSION['user_email'];
    $get_user = "select * from users where user_email = '$user'";
    $run_user = mysqli_query($con,$get_user);
    $row = mysqli_fetch_array($run_user);
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];

    $message = $_POST['group_message'];

    $insert = "insert into group_messages (group_id,user_id,user_name,message,timestamp) values ('$group_id','$user_id','$user_name','$message',NOW())";

    $run_insert = mysqli_query($con, $insert);

    if ($run_insert) {
        echo "<script>location.reload()</script>";
    } else {
        //echo "<script>alert('Message not sent!') </script>";
    }


}

?>