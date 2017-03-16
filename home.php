<!DOCTYPE html>
<html>
<head>
    <title>My Social Network</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css">
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
              <div class="field" style="margin-top:20px;">
                <label class="label">What's on your mind</label>
                <article class="media">
                  <div class="media-content">
                    <div class="content" style="width: 800px;">
                      <input class="input" type="text" name="title" placeholder="Write a Title" required="required"/><br>
                      <textarea class="textarea" cols="72" rows="4" name="content" required="required" placeholder="Write Description"></textarea><br>
                    </div>
                  </div>
                  </div>
                  <div class="media-bottom">
                    <label class="label">Visibility</label>
                  <div class="field" style="width: 800px;">
                  <span class="select" name="is_private">
                    <select>
                      <!--Goes into is_private field in database. 1 = true. 0 = false-->
                      <option value="1">Private</option>
                      <option value="0">Public</option>
                  </select><br><br>
                </div>
                  </div>

                  <div class="field">
                    <label class="label" style="width: 800px;">Image Upload</label>
                <input class="input" type="file" name="optional_image"/>
              </div>
              <div class="field">
                <input type="submit" class="submit" class="button-is-light" value="Post to Timeline"/>
              </div>
              </article>

            </form>
            <br></br>
            <?php
                include ("functions/insert_post.php")
            ?>
            <div id="posts">
                <h3 style="margin: 10px; border: none;">Most Recent Discussions </h3>
                <?php
                    include("functions/get_all_posts.php");
                ?>
            </div>
        </div>
        <!-- content timeline ends -->

    </body>
    </html>
<?php } ?>
