<?php

include("../includes/connection.php");

if (isset($_GET['photo_id'])) {
    global $con;

    $photo_id = $_GET['photo_id'];
    $get_photo_owner = "select owner_id from photo_albums where album_id = '$photo_id'";
    $photo_owner_id = mysqli_query($con, $get_photo_owner);

    if (is_owner($photo_owner_id)) {
        $delete_photo = "delete from photo_albums where album_id='$photo_id'";
        $run_delete = mysqli_query($con, $delete_photo);

        if ($run_delete) {
            echo "<script>alert('This photo has been deleted!')</script>";
            echo "<script>window.open('../my_photos.php','_self')</script>";
        }
        else {
            echo "<script>alert('Could not contact server')</script>";
        }
    }
    else {
        echo "<script>alert('You cannot delete another users photo!')</script>";
    }
}

function is_owner($photo_owner_id)
{
    $user = $_SESSION['user_email'];
    $get_user = "select * from users where user_email = '$user'";
    $run_user = mysqli_query($con, $get_user);
    $row = mysqli_fetch_array($run_user);
    $user_id = $row['user_id'];

    return $user_id == $photo_owner_id ? true : false;
}

?>
