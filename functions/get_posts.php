<?php
global $con;

$per_page = 5;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
else {
    $page = 1;
}

$start_from = ($page - 1) * $per_page;
//$get_posts = "select * from posts ORDER BY 1 DESC LIMIT $start_from,$per_page";

$user = $_SESSION['user_email'];
$get_user = "select * from users where user_email = '$user'";
$run_user = mysqli_query($con, $get_user);
$row = mysqli_fetch_array($run_user);
$user_id = $row['user_id'];

$get_posts = "select * from posts where user_id = '$user_id'";
$run_posts = mysqli_query($con, $get_posts);

while ($row_posts = mysqli_fetch_array($run_posts)) {

    $post_id = $row_posts['post_id'];
    $user_id = $row_posts['user_id'];
    $post_title = $row_posts['post_title'];
    $content = $row_posts['post_content'];
    $post_date = $row_posts['post_date'];
    $photo_path = $row_posts['post_photo_path'];

    $user = "select * from users where user_id='$user_id' and posts='yes'";
    $run_user = mysqli_query($con, $user);
    $row_user = mysqli_fetch_array($run_user);
    $user_name = $row_user['user_name'];
    $user_image = $row_user['user_image'];

    if ($photo_path != '') {
        echo "
        <div id='posts'>
        
        <p><img src='user/user_images/$photo_path' width='50' height='50'></p>
        <h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
        <h3>$post_title</h3>
        <p>$post_date</p>
        <p>$content</p>
        <a href='single.php?post_id=$post_id' style='float:right;'>
            <button>View</button>
        </a>
        <a href='edit_post.php?post_id=$post_id' style='float:right;'>
            <button>Edit</button>
        </a>
        <a href='delete_post.php?post_id=$post_id' style='float:right;'>
            <button>Delete</button>
        </a>
        </div>
        ";

    }
    else {

        echo "
        <div id='posts'>
        
        <h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
        <h3>$post_title</h3>
        <p>$post_date</p>
        <p>$content</p>
        <a href='single.php?post_id=$post_id' style='float:right;'>
            <button>View</button>
        </a>
        <a href='edit_post.php?post_id=$post_id' style='float:right;'>
            <button>Edit</button>
        </a>
        <a href='delete_post.php?post_id=$post_id' style='float:right;'>
            <button>Delete</button>
        </a>
        </div>
        ";
    }
}

?>