<?php
session_start();
include("includes/connection.php");
include("functions/functions.php");
include("template/Main/header.php");

if (!isset($_SESSION['user_email'])) {
    header("location: index.php");
}
else {

    ?>


    <!-- Content area starts -->
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
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_country = $row['user_country'];
                $register_date = $row['register_date'];
                $last_login = $row['last_login'];


                echo "
                      <center><img src='user/user_images/$user_image' width='200px' height='200px'/></center>
                      <p><strong>Name: $user_name</strong></p>
                      <p><strong>Country: $user_country</strong></p>
                      <p><strong>Last Login: $last_login</strong></p>
                      <p><strong>Member Since: $register_date</strong></p>
                      
                      <p><a href='my_messages.php'>Messages</a></p>
                      <p><a href='my_posts.php'>My Posts</a></p>
                      <p><a href='edit_account.php'>Edit My Account</a></p>
                      <p><a href='logout.php'>Logout</a></p>
                      ";
                ?>
            </div>
        </div>
        <!-- user timeline ends -->
        <!-- content timeline starts -->
        <div id="content_timeline">
            <form action="home.php?id=<?php echo $user_id; ?>" method="post" id="f">
                <h2>What's on your mind?</h2>
                <input type="text" name="title" placeholder="Write a Title" required="required"/><br></br>
                <textarea cols="72  " rows="4" name="content" placeholder="Write Description"></textarea><br></br>
                <select name="topic">
                    <option>Select Topic</option>
                    <?php
                    getTopics();
                    ?>
                </select>
                <input type="submit" name="sub" value="Post to Timeline"/>
            </form>
            <?php
            insertPost();
            ?>
            <div id="posts">
                <h3>All Category posts</h3>
                <?php
                getSingleTopic();
                ?>
            </div>
        </div>
        <!-- content timeline ends -->
    </div>
    <!-- content area ends -->
    </div>
    <!-- container ends -->

    </body>
    </html>
<?php } ?>