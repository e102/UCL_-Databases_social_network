<?php

global $con;
global $user_id;

if (isset($_POST['submit_album'])) {

    $album_name = addslashes($_POST['album_name']);

    $insert = "insert into photo_albums (album_name, album_owner) 
                   values ('$album_name','$user_id')";

    $run = mysqli_query($con, $insert);

    if ($run) {
        echo "<script>alert('Album Created')</script>";
        $update = "update users set posts = 'yes' where user_id='$user_id'";
        $run_update = mysqli_query($con, $update);
    }

    else {
        echo "<script>alert('Could not contact database')</script>";
    }
}
?>