<?php

global $con;
global $user_id;

if (isset($_POST['sub'])) {

    $title = addslashes($_POST['title']);
    $topic = addslashes($_POST['topic']);
    $content = addslashes($_POST['content']);

    $image = $_FILES['optional_image']['name'];
    $image_tmp = $_FILES['optional_image']['tmp_name'];
    move_uploaded_file($image_tmp, "user/user_images/$image");

    $insert = "insert into posts (user_id,post_title,post_topic,post_content,post_date,post_photo_path) 
                   values ('$user_id','$title','$topic','$content',NOW(),'$image')";

    $run = mysqli_query($con, $insert);

    if ($run) {
        echo "<h3>Posted to timeline</h3>";
        $update = "update users set posts = 'yes' where user_id='$user_id'";
        $run_update = mysqli_query($con, $update);
    }

    else {
        echo "<script>alert('Could not contact database')</script>";
    }
}

?>