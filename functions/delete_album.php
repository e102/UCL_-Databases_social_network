<?php

include("includes/connection.php");

if (isset($_GET['album_id'])) {
    global $con;

    $album_id = $_GET['album_id'];
    $get_album_owner = "select album_owner from photo_albums where album_id = '$album_id'";
    $album_owner_id = mysqli_query($con, $get_album_owner);

    if (is_owner($album_owner_id)) {
        $delete_album = "delete from photo_albums where album_id='$album_id'";
        $run_delete = mysqli_query($con, $delete_album);

        if ($run_delete) {
            echo "<script>alert('This album has been deleted!')</script>";
            echo "<script>window.open('../my_photos.php','_self')</script>";
        }
        else {
            echo "<script>alert('Could not contact server')</script>";
        }
    }
    else {
        echo "<script>alert('You cannot delete another users album!')</script>";
    }
}

function is_owner($album_owner_id)
{
    global $con;
    global $_SESSION;
    $user_email = $_SESSION['user_email'];
    $get_user = "select * from users where user_email = '$user_email'";
    $run_user = mysqli_query($con, $get_user);
    $row = mysqli_fetch_array($run_user);
    $user_id = $row['user_id'];

    return $user_id == $album_owner_id ? true : false;
}

?>
