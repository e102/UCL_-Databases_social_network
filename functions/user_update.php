<?php

include("includes/connection.php");

if (isset($_POST['update'])) {

    $name = $_POST['u_name'];
    $pass = $_POST['u_pass'];
    $email = $_POST['u_email'];
    $country = $_POST['u_country'];
    $user_gender = $_POST['u_gender'];
    $image = $_FILES['u_image']['name'];
    $image_tmp = $_FILES['u_image']['tmp_name'];
    $profile_is_private = $_POST['profile_is_private'];

    move_uploaded_file($image_tmp, "user/user_images/$image");

    if ($image != null) {
        $update = "update users set user_name='$name',user_pass='$pass',user_email='$email',user_country = '$country',user_gender='$user_gender',user_image='$image', profile_is_private = '$profile_is_private' where user_id='$user_id'";
    }
    else{
        $update = "update users set user_name='$name',user_pass='$pass',user_email='$email',user_country = '$country',user_gender='$user_gender', profile_is_private = '$profile_is_private' where user_id='$user_id'";
    }
    $run_update = mysqli_query($con, $update);

    if ($run_update) {
        echo "<script>alert('Your profile is updated!')</script>";
        echo "<script>window.open('home.php','_self')</script>";
    }
}
?>