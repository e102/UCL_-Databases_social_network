<?php

if(isset($_GET['post_id'])) {
    global $con;
    $get_id = $_GET['post_id'];
    $get_posts = "select * from posts where post_id='$get_id'";
    $run_posts = mysqli_query($con, $get_posts);

    $row_posts = mysqli_fetch_array($run_posts);
    $post_id = $row_posts['post_id'];
    $user_id = $row_posts['user_id'];
    $post_title = $row_posts['post_title'];
    $content = $row_posts['post_content'];
    $post_date = $row_posts['post_date'];

    $user = "select * from users where user_id='$user_id' and posts='yes'";
    $run_user = mysqli_query($con, $user);
    $row_user = mysqli_fetch_array($run_user);
    $user_name = $row_user['user_name'];
    $user_image = $row_user['user_image'];

    $user_com = $_SESSION['user_email'];
    $get_com = "select * from users where user_email = '$user_com'";
    $run_com = mysqli_query($con,$get_com);
    $row_com = mysqli_fetch_array($run_com);
    $user_com_name = $row_com['user_name'];

    echo "
    <div id='posts'>
    
    <p><img src='user/user_images/$user_image' width='50' height='50'></p>
    <h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
    <h3>$post_title</h3>
    <p>$post_date</p>
    <p>$content</p>
    
    
    </div></br>
    ";
    include("comments.php");
    echo "
    <form action='' method='post' id='reply'>
    <textarea cols='60' rows='10' name='comment' placeholder='Write your reply...'></textarea>
    <input type='submit' name='reply' value='Reply'/>
    </form>
    ";

    if(isset($_POST['reply'])){

        $comment = $_POST['comment'];

        $insert = "insert into comments (post_id,user_id,comment,comment_author,date) VALUES 
                    ('$post_id','$user_id','$comment','$user_com_name',NOW())";

        $run = mysqli_query($con,$insert);

        if ($run){
            $get_id = $_GET['post_id'];
            echo "<script>window.open('single.php?post_id=$get_id','_self')</script>";
        }
    }

}

?>