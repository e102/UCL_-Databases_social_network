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
                <input type="text" name="topic" placeholder="What's it about" required="required"/><br>
                <textarea cols="72" rows="4" name="content" required="required" placeholder="Write Description"></textarea><br>
                <input type="file" name="optional_image"/>
                <input type="submit" name="sub" value="Post to Timeline"/>
            </form>
            <?php
                include ("functions/insert_post.php")
            ?>
            <div id="posts">
                <h3>Most Recent Discussions</h3>
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
