<!DOCTYPE html>
<html>
<head>
    <title>My Social Network</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css">
</head>


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
        </div>
        <!-- user timeline ends -->
        <!-- content timeline starts -->
        <div id="content_timeline">
            <?php
            if (isset($_GET['post_id'])) {

                $get_id = $_GET['post_id'];
                $get_posts = "select * from posts where post_id='$get_id'";
                $run_posts = mysqli_query($con, $get_posts);
                $row_posts = mysqli_fetch_array($run_posts);

                $post_title = $row_posts['post_title'];
                $content = $row_posts['post_content'];
                $post_date = $row_posts['post_date'];
            }

            ?>

            <form action="" method="post" id="f">
                <h2>Edit post:</h2>
                <input type="text" name="title" placeholder="Write a Title" required="required"
                       value="<?php echo $post_title; ?>"/><br></br>
                <textarea cols="72" rows="4" name="content"
                          placeholder="Write Description"><?php echo $content; ?></textarea><br></br>
                <select name="topic">
                    <option>Select Topic</option>
                    <?php
                    getTopics();
                    ?>
                </select>
                <input type="submit" name="update" value="Update post"/>
            </form>
            <?php
            include("functions/update_post.php");
            ?>

        </div>
        <!-- content timeline ends -->
    </div>
    <!-- content area ends -->
    </div>
    <!-- container ends -->

    </body>
    </html>
<?php } ?>
