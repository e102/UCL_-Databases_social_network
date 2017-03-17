<?php

if (isset($_GET['u_id'])) {

    $u_id = $_GET['u_id'];
    $get_photos = "select * from photos where photo_owner = '$u_id'";
    $run_photos = mysqli_query($con, $get_photos);

    while ($row_posts = mysqli_fetch_array($run_photos)) {

        $photo_id = $row_posts['photo_id'];
        $user_id = $row_posts['photo_owner'];
        $photo_path = $row_posts['photo_path'];

        echo "
            <div id='photos'>
                <img src='user/user_images/$photo_path' width='50' height='50'>
                <a href='functions/delete_photo.php?photo_id=$photo_id' style='float:right;'>
                    <button>Delete</button>
                </a>
            </div>
         ";
    }
}

?>