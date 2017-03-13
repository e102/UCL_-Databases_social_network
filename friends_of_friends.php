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
            <?php include("template/Main/user_details.php") ?>
        </div>
        <!-- user timeline ends -->
        <!-- content timeline starts -->
        <div id="content_timeline">

            <form method="get" action="results.php" id="form1">
                <input type="text" name="user_query" placeholder="Search for friends"/>
                <a href='functions/add_group_member.php?group_id=$group_id&user_name=$user_name&user_id=$user_id'>
                    <button>Search</button>
                </a>
            </form>

            <div id="posts">


                <?php

                $u_id = $_GET['u_id'];

                $user = $_SESSION['user_email'];
                $get_user = "select * from users where user_email = '$user'";
                $run_user = mysqli_query($con,$get_user);
                $row = mysqli_fetch_array($run_user);
                $user_id = $row['user_id'];

                $select = "select * from friends where verified='yes' and requestSenderID='$user_id' and requestReceiverID='$u_id'";
                $run = mysqli_query($con,$select);

                $row_user = mysqli_fetch_array($run);

                if ($row_user){
                    include ("functions/get_friends_of_friends.php");
                } else {
                    userProfile();
                }

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