<?php

global $con;

if(isset($_GET['u_id'])) {

    $u_id = $_GET['u_id'];
    $get_posts = "select * from posts where user_id='$u_id'";
    $run_posts = mysqli_query($con, $get_posts);

    while ($row_posts = mysqli_fetch_array($run_posts)) {

        $post_id = $row_posts['post_id'];
        $user_id = $row_posts['user_id'];
        $photo_path = $row_posts['post_photo_path'];

        if($photo_path != ''){
            echo "
            <div id='posts'>
                <p><img src='user/user_images/$photo_path' width='50' height='50'></p>
            </div>
            ";
        }
    }
}

?>