<?php

include("includes/connection.php");

if (isset($_POST['update'])) {

    $name = $_POST['u_name'];
    $pass = $_POST['u_pass'];
    $email = $_POST['u_email'];
    $image = $_FILES['u_image']['name'];
    $image_tmp = $_FILES['u_image']['tmp_name'];

    move_uploaded_file($image_tmp,"user/user_images/$image");

    $update = "update users set user_name='$name',user_pass='$pass',user_email='$email',user_image='$image' where user_id='$user_id'";
    $run_update = mysqli_query($con, $update);

    if($run_update){
        echo "<script>alert('Your profile is updated!)</script>";
        echo "<script>open.window('home.php','_self')</script>";
    }


}

?>