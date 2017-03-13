<?php

include("includes/connection.php");

function getTopics()
{
    global $con;
    $get_topics = "SELECT * FROM topics";
    $run_topics = mysqli_query($con, $get_topics);

    while ($row = mysqli_fetch_array($run_topics)) {
        $topic_id = $row['topic_id'];
        $topic_title = $row['topic_title'];

        echo "<option value='$topic_id'>$topic_title</option>";

    }
}

function getSingleTopic()
{
    global $con;


    if(isset($_GET['topic'])){

        $topic_id = $_GET['topic'];

        $get_posts = "select * from posts where topic_id = '$topic_id' ORDER BY 1 DESC";
        $run_posts = mysqli_query($con,$get_posts);

        while ($row_posts = mysqli_fetch_array($run_posts)) {

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

            echo "
            <div id='posts'>
            
            <p><img src='user/user_images/$user_image' width='50' height='50'></p>
            <h3><a href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
            <h3>$post_title</h3>
            <p>$post_date</p>
            <p>$content</p>
            <a href='single.php?post_id=$post_id' style='float:right;'>
                <button>See replies or reply to this</button>
            </a>
            </div>
            ";
        }

    }
}

function insertPost()
{
    global $con;
    global $user_id;
    if (isset($_POST['sub'])) {
        $title = addslashes($_POST['title']);
        $content = addslashes($_POST['content']);
        $topic = $_POST['topic'];

        $insert = "insert into posts (user_id, topic_id,post_title,post_content,post_date) 
                   values ('$user_id','$topic','$title','$content',NOW())";

        $run = mysqli_query($con, $insert);

        if ($run) {
            echo "<h3>Posted to timeline</h3>";
            $update = "update users set posts = 'yes' where user_id='$user_id'";
            $run_update = mysqli_query($con, $update);
        }
    }
}

function userProfile(){
    global $con;

    if (isset($_GET['u_id'])) {

        $user_id = $_GET['u_id'];

        $select = "select * from users where user_id='$user_id'";
        $run = mysqli_query($con, $select);
        $row = mysqli_fetch_array($run);

        $id = $row['user_id'];
        $country = $row['user_country'];
        $name = $row['user_name'];
        $image = $row['user_image'];
        $gender = $row['user_gender'];
        $last_login = $row['last_login'];
        $register_date = $row['register_date'];

        if ($gender == 'Male') {
            $msg = "Send him a message";
        }
        else {
            $msg = "Send her a message";
        }

        echo "
        <div id='user_profile'>
        
        <p><img src='user/user_images/$image' width='50' height='50'></p><br/>
        <p><strong>Name: $name</strong></p><br/>
        <p><strong>Name: $gender</strong></p><br/>
        <p><strong>Country: $country</strong></p><br/>
        <p><strong>Last Login: $last_login</strong></p><br/>
        <p><strong>Member Since: $register_date</strong></p><br/>
        <a href='messages.php?u_id=$id'><button>$msg</button></a>
        <a href='add_friend.php?u_id=$id'><button>Send friend request</button></a>
        </div>
        ";


    }

}

function userPosts()
{
    global $con;

    if (isset($_GET['u_id'])) {

        $u_id = $_GET['u_id'];
        $get_posts = "select * from posts where user_id='$u_id' ORDER BY post_date DESC";
        $run_posts = mysqli_query($con, $get_posts);

        while ($row_posts = mysqli_fetch_array($run_posts)) {

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

            echo "
        <div id='posts'>
        
        <p><img src='user/user_images/$user_image' width='50' height='50'></p>
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
        <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'>
            <button>Delete</button>
        </a>
        </div>
        ";

            include("delete_post.php");
        }

    }
}

function edit_post(){
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
        $run_com = mysqli_query($con, $get_com);
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

        if (isset($_POST['reply'])) {

            $comment = $_POST['comment'];

            $insert = "insert into comments (post_id,user_id,comment,comment_author,date) VALUES 
                        ('$post_id','$user_id','$comment','$user_com_name',NOW())";

            $run = mysqli_query($con, $insert);

            if ($run) {
                echo "<h2>Reply was added!</h2>";
            }
        }
    }
}

function getFriends()
{

    if (isset($_GET['search'])) {

        global $con;

        $friend_name = $_GET['user_query'];

        $get_users = "select * from users where user_name like '%$friend_name%'";

        $run_user = mysqli_query($con, $get_users);

        while ($row_user = mysqli_fetch_array($run_user)) {

            $user_name = $row_user['user_name'];
            $user_image = $row_user['user_image'];
            $user_id = $row_user['user_id'];

            $user_com = $_SESSION['user_email'];
            $get_com = "select * from users where user_email = '$user_com'";
            $run_com = mysqli_query($con, $get_com);
            $row_com = mysqli_fetch_array($run_com);
            $user_com_name = $row_com['user_name'];

            echo "
            <div id='posts'>
            
            <p><img src='user/user_images/$user_image' width='50' height='50'></p>
            <h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
            <h3>$user_name</h3>
            
            
            </div></br>
            ";
        }


    }
}



?>