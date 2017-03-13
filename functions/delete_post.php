<?php

include("../includes/connection.php");

if (isset($_GET['post_id'])) {

    $post_id = $_GET['post_id'];
    $get_post_owner = "select owner_id from posts where post_id = '$post_id'";
    $post_owner_id = mysqli_query($con, $get_post_owner);

    if (is_owner($post_owner_id)) {
        $delete_post = "delete from posts where post_id='$post_id'";
        $run_delete = mysqli_query($con, $delete_post);

        if ($run_delete) {
            echo "<script>alert('This post has been deleted!')</script>";
            echo "<script>window.open('../home.php','_self')</script>";
        }
        else {
            echo "<script>alert('Could not contact server')</script>";
        }
    }
    else {
        echo "<script>alert('You cannot delete another users post!')</script>";
    }
}

function is_owner($post_owner_id)
{
    $user = $_SESSION['user_email'];
    $get_user = "select * from users where user_email = '$user'";
    $run_user = mysqli_query($con, $get_user);
    $row = mysqli_fetch_array($run_user);
    $user_id = $row['user_id'];

    return $user_id == $post_owner_id ? true : false;
}

?>
