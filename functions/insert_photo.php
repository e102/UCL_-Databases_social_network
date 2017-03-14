<?php

global $con;
global $user_id;

if (isset($_POST['submit_photo'])) {

    $image = $_FILES['photo']['name'];
    $image_tmp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($image_tmp, "user/user_images/$image");

    $insert = "insert into photos (photo_path, photo_owner) 
                   values ('$image','$user_id')";

    $run = mysqli_query($con, $insert);

    if ($run) {
        echo "<script>alert('Photo Uploaded')</script>";
        $update = "update users set posts = 'yes' where user_id='$user_id'";
        $run_update = mysqli_query($con, $update);
    }

    else {
        echo "<script>alert('Could not contact database')</script>";
    }
}

?>