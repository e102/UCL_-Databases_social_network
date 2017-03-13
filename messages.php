<?php
session_start();
include ("includes/connection.php");
include ("functions/functions.php");
include ("template/Main/header.php");

if(!isset($_SESSION['user_email'])){
    header("location: index.php");
} else {

    ?>

    <div class="content">
        <!-- user timeline starts -->
        <div id="user_timeline">
            <div id="user_details">
                <?php
                $user = $_SESSION['user_email'];
                $get_user = "select * from users where user_email = '$user'";
                $run_user = mysqli_query($con, $get_user);
                $row = mysqli_fetch_array($run_user);
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                $user_pass = $row['user_pass'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_country = $row['user_country'];
                $user_gender = $row['user_gender'];
                $register_date = $row['register_date'];
                $last_login = $row['last_login'];

                $user_posts = "select * from posts where user_id='$user_id'";
                $run_posts = mysqli_query($con,$user_posts);
                $numberPosts = mysqli_num_rows($run_posts);

                echo "
                      <center><img src='user/user_images/$user_image' width='200px' height='200px'/></center>
                      <p><strong>Name: $user_name</strong></p>
                      <p><strong>Country: $user_country</strong></p>
                      <p><strong>Last Login: $last_login</strong></p>
                      <p><strong>Member Since: $register_date</strong></p>
                      
                      <p><a href='my_messages.php?u_id=$user_id'>Messages</a></p>
                      <p><a href='user_posts.php?u_id=$user_id'>My Posts ($numberPosts)</a></p>
                      <p><a href='edit_account.php?u_id=$user_id'>Edit My Account</a></p>
                      <p><a href='logout.php'>Logout</a></p>
                      ";
                ?>
            </div>
        </div>
        <!-- user timeline ends -->
        <!-- content timeline starts -->
        <div id="content_timeline">

            <?php

            if(isset($_GET['u_id'])){
                $u_id = $_GET['u_id'];

                $sel = "select * from users where user_id='$u_id'";
                $run = mysqli_query($con,$sel);
                $row = mysqli_fetch_array($run);

                $user_name = $row['user_name'];
                $user_image = $row['user_image'];
                $reg_date = $row['register_date'];
            }
            ?>

            <h2>Send a message to <span style="color:red;"><?php echo $user_name;?></span></h2>
            <form action="messages.php?u_id=<?php echo $u_id;?>" method="post" id="f">
                <input type="text" name="msg_title" placeholder="Message subject..." size="49">
                <textarea name="msg" cols="50" rows="5" placeholder="Message topic..."></textarea>
                <input type="submit" name="message" value="Send message"/>
            </form>

            <img style="border:2px solid blue; border-radius: 5px;" src="user/user_images/<?php echo $user_image;?>" width="100" height="100"/>
            <p><strong><?php echo $user_name;?></strong> is member of this site since: <?php echo $reg_date;?></p>

        </div>
        <!-- content timeline ends -->
        <?php
        if(isset($_POST['message'])){

            $msg_title = $_POST['msg_title'];
            $msg = $_POST['msg'];

            $insert = "insert into messages (sender,receiver,msg_sub,msg_topic,reply,status,msg_date)
              values ('$user_id','$u_id','$msg_title','$msg','no_reply','unread',NOW())";

            $run_insert = mysqli_query($con,$insert);

            if($run_insert){
                echo "<center><h2>Message was sent to ". $user_name ."successfully</h2></center>";
            } else {
                echo "<center><h2>Message was not sent</h2></center>";
            }
        }
        ?>
    </div>
    <!-- content area ends -->
    </div>
    <!-- container ends -->

    </body>
    </html>
<?php } ?>