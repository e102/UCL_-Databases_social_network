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


    if (isset($_GET['topic'])) {

        $topic_id = $_GET['topic'];

        $get_posts = "select * from posts where topic_id = '$topic_id' ORDER BY 1 DESC";
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

function edit_post()
{
    if (isset($_GET['post_id'])) {
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
        $user_email = $_SESSION['user_email'];

        if ($_SESSION['friend_user_id'] != '') {
            $user_id = $_SESSION['friend_user_id'];
            $get_users = "SELECT * FROM users join friends on users.user_id = friends.requestReceiverID and verified='yes'
                where friends.requestSenderID = '$user_id' and user_name like '%$friend_name%' AND profile_is_private = 0 and user_email !='$user_email'";
            $run_user = mysqli_query($con, $get_users);

            $_SESSION['friend_user_id'] = '';
        }
        else {
            $get_users = "select * from users where user_name like '%$friend_name%' and user_email !='$user_email'";
            $run_user = mysqli_query($con, $get_users);
        }


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

function recommendedFriends()
{
    global $con;
    global $user_id;

    $get_set = "select * from friends where requestSenderID='$user_id' order by rand()";
    $run_set = mysqli_query($con, $get_set);
    while ($row_set = mysqli_fetch_array($run_set)) {
        $row_id = $row_set['requestReceiverID'];
        $get_random = "SELECT * FROM friends WHERE requestReceiverID!='$user_id' AND requestSenderID='$row_id'";
        $run_random = mysqli_query($con, $get_random);

        while ($row = mysqli_fetch_array($run_random)) {
            $random_id = $row['requestReceiverID'];
            $get_user = "SELECT user_name, user_image, user_id FROM users WHERE user_id='$random_id' LIMIT 5";
            $run_user = mysqli_query($con, $get_user);
            $get_num = "SELECT * FROM users WHERE user_id='$random_id'";
            $run_num = mysqli_query($con, $get_num);
            $num = mysqli_num_rows($run_num);

            while ($row_user = mysqli_fetch_array($run_user)) {
                $user_name = $row_user['user_name'];
                $user_image = $row_user['user_image'];
                $u_id = $row_user['user_id'];

                if ($u_id == $user_id) {
                    echo "<h3></h3>";
                }

                else {
                    echo "
          <div id='recommended'>
          <p><img src='user/user_images/$user_image' width='50' height='50'></p>
          <h3><a href='user_profile.php?u_id=$u_id'>$user_name ($num)</a></h3>
          </div></br>
          ";
                }
            }
        }
    }
}

function getBlogs() {

  if (isset($_GET['search_blog'])) {

      global $con;
      global $user_id;

      $blog_query = $_GET['user_query'];
      $get_friends = "SELECT * FROM friends WHERE requestSenderID = '$user_id'";
      $run_friends = mysqli_query($con, $get_friends);
      $row_friends = mysqli_fetch_array($run_friends);
      $friend_id = $row_friends['requestReceiverID'];

      $get_blog = "SELECT * FROM posts WHERE post_title LIKE '%$blog_query'";
      $run_blog = mysqli_query($con, $get_blog);


      while ($row_blog = mysqli_fetch_array($run_blog)) {

        $post_id = $row_blog['post_id'];
        $user_id = $row_blog['user_id'];
        $post_title = $row_blog['post_title'];
        $content = $row_blog['post_content'];
        $post_date = $row_blog['post_date'];
        $photo_path = $row_blog['post_photo_path'];

        $user = "select * from users where user_id='$user_id' and posts='yes'";
        $run_user = mysqli_query($con, $user);
        $row_user = mysqli_fetch_array($run_user);
        $user_name = $row_user['user_name'];
        $user_image = $row_user['user_image'];

        if ($user_id == $friend_id){
          echo "<div id='posts' style='width: 480px; margin-bottom:10px'>";
          if ($photo_path) {
              echo "<p><img src = 'user/user_images/$photo_path' width = '50' height = '50' ></p >";
          }
          echo "<h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
              <h3>$post_title</h3>
              <p>$post_date</p>
              <p>$content</p>
              <div>
              <a href='single.php?post_id=$post_id'>
                  <button class='btn-white btn-small' >View</button> </a>
              </div>
              </div>";
        }
        else {
          echo "<h2>No posts found</h2>";
        }
      }
  }
}

?>
