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
            <div id="user_timeline">
                <?php include("template/Main/user_details.php"); ?>
            </div>
        </div>
        <!-- user timeline ends -->
        <!-- content timeline starts -->
        <div id="content_timeline">
            <h2>Friend Requests:</h2>
            <?php
            include("functions/friend_requests.php");
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