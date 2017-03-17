<?php

include("includes/connection.php");

if (isset($_POST['sign_up'])) {

    $name = mysqli_real_escape_string($con, $_POST['u_name']);
    $pass = mysqli_real_escape_string($con, $_POST['u_pass']);
    $email = mysqli_real_escape_string($con, $_POST['u_email']);
    $country = mysqli_real_escape_string($con, $_POST['u_country']);
    $gender = mysqli_real_escape_string($con, $_POST['u_gender']);
    $b_day = mysqli_real_escape_string($con, $_POST['u_birthday']);
    $status = "unverified";
    $posts = "No";

    $get_email = "select * from users where user_email='$email'";
    $run_email = mysqli_query($con, $get_email);
    $check = mysqli_num_rows($run_email);

    if ($check == 1) {
        echo "<script>alert('Email is already registered, please try another one!') </script>";
        exit();
    }

    if (strlen($pass) < 8) {
        echo "<script>alert('Password should be minimum of 8 characters!') </script>";
        exit();
    }
    else {

        $insert = "insert into users (user_name,user_pass,user_email,user_country,user_gender,user_bday,
                        user_image,register_date,last_login,status,posts, profile_is_private) values ('$name','$pass','$email','$country','$gender'
                        ,'$b_day','default.jpg',NOW(),NOW(),'$status','$posts',0)";
        $run_insert = mysqli_query($con, $insert);
        if ($run_insert) {
            $_SESSION['user_email'] = $email;
            $_SESSION['friend_user_id'] = '';
            echo "<script>alert('Registration successful!') </script>";
            echo "<script>window.open('home.php','_self')</script>";
        }
        else {
            echo "<script>alert('Registration unsuccessful!')</script>";
        }
    }

}

?>