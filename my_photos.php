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

            <div id="posts">
                <h3>All Albums</h3>
                <form action="" method="post" id="album_form" enctype="multipart/form-data">
                    <input type="text" name="album_name" required="required">
                    <input type="submit" name="submit_album" value="Create Album"/>
                </form>
                <?php
                include("functions/insert_album.php");
                include("functions/user_albums.php");
                ?>
                <br>

                <h3>All Photos</h3>
                <form action="" method="post" id="photo_form" enctype="multipart/form-data">
                    <input type="file" name="photo" required="required"/>
                    <input type="submit" name="submit_photo" value="Upload photo"/>
                </form>
                <?php
                include("functions/insert_photo.php");
                include("functions/user_photos.php");
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