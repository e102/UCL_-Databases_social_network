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
            <?php include ("template/Main/user_details.php");?>
        </div>
        <!-- user timeline ends -->
        <!-- content timeline starts -->
        <div id="content_timeline">

            <div id="posts">
                <h3>All posts</h3>
                <?php
                    include ("functions/user_photos.php")
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