<?php

if(isset($_POST['update'])){

    global $con;

    $title = $_POST['title'];
    $content = $_POST['content'];

    $update = "update posts set post_title='$title',post_content='$content' where post_id='$get_id'";
    $run_update = mysqli_query($con, $update);

    if($run_update){

        echo "<script>alert('This post has been updated!')</script>";
        echo "<script>window.open('user_posts.php','_self')</script>";

    }
}

?>

