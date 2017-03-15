<?php

global $con;

if (isset($_GET['u_id'])) {

    $u_id = $_GET['u_id'];
    $get_albums = "select * from photo_albums where album_owner = '$u_id'";
    $run_albums = mysqli_query($con, $get_albums);

    while ($row_posts = mysqli_fetch_array($run_albums)) {

        $album_id = $row_posts['album_id'];
        $album_name = $row_posts['album_name'];
        $owner_owner = $row_posts['album_owner'];
        $album_privacy = $row_posts['is_private'];

        echo "
            <div>
                <a href='functions/single_album.php?album_id=$album_id'><h3>$album_name</h3></a>
            </div>
         ";
    }
}

?>