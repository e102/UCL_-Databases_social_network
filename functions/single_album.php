<?php
include("../includes/connection.php");
if (isset($_GET['album_id'])) {
    global $con;
    $get_id = $_GET['album_id'];
    $get_album = "select * from photo_albums where album_id = '$get_id'";
    $run_album = mysqli_query($con, $get_album);

    $row_posts = mysqli_fetch_array($run_album);
    $album_name = $row_posts['album_id'];
    $album_owner_id = $row_posts['album_owner'];
    $album_photos = $row_posts['album_contents'];

    $user = "select * from users where user_id='$album_owner_id'";
    $run_user = mysqli_query($con, $user);
    $row_user = mysqli_fetch_array($run_user);
    $user_name = $row_user['user_name'];
    $user_image = $row_user['user_image'];

    echo "
    <div id='album'>
    <p><img src='user/user_images/$user_image' width='50' height='50'></p>
    <h3><a href='user_profile.php?u_id=$album_owner_id'>Album Owner: $user_name</a></h3>
    <h3>Album Name: $album_name</h3> 
    </div></br>
    ";

    //echo "
    //<form action='' method='post' id='reply'>
    //<textarea cols='60' rows='10' name='comment' placeholder='Write your reply...'></textarea>
    //<input type='submit' name='reply' value='Reply'/>
    //</form>
    //";
}

?>