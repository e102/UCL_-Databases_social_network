<!DOCTYPE html>
<html>
<head>
    <title>My Social Network</title>
    <link rel="stylesheet" href="styles/home_style.css" media="all"/>
</head>
<body>

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

    <div class="content">
        <!-- user timeline starts -->
        <div id="user_timeline">
            <?php include("template/Main/user_details.php"); ?>
          </br>
            <div id="recommend">
              <h3>People you may know:</h3>
            </br>
              <?php recommendedFriends(); ?>
            </div>
        </div>
        <!-- user timeline ends -->
        <!-- content timeline starts -->
        <div id="content_timeline">
            <form action="" method="post" id="f" enctype="multipart/form-data">
                <h2>What's on your mind?</h2>
                <input type="text" name="title" placeholder="Write a Title" required="required"/><br>
                <textarea cols="72" rows="4" name="content" required="required" placeholder="Write Description"></textarea><br>
                <p style="font-family: sans-serif">visibility:</p><select name="is_private">
                    <!--Goes into is_private field in database. 1 = true. 0 = false-->
                    <option value="1">Private</option>
                    <option value="0">Public</option>
                </select><br><br>
                <input type="file"  name="optional_image"/>
                <input type="submit"     class="btn-white btn-small" value="Post to Timeline"/>
            </form>
            <?php
                include ("functions/insert_post.php")
            ?>
            <div id="posts" style="padding: 10px;">
                <h3 style="margin: 10px;" >Most Recent Discussions </h3>
                <?php
                    include("functions/get_all_posts.php");
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
