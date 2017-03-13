<?php

include("includes/connection.php");

if(isset($_GET['post_id'])){

    $post_id = $_GET['post_id'];

    $delete_post = "delete from posts where post_id='$post_id'";
    $run_delete = mysqli_query($con,$delete_post);

    if($run_delete){

        echo "<script>alert('This post has been deleted!')</script>";
        echo "<script>window.open('../user_posts.php','_self')</script>";

    }
}

?>