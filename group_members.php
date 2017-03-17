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
            <button><a href="add_group_members.php?group_id=
                    <?php
                $group_id = $_GET['group_id'];
                echo $group_id;
                ?>
                ">Add members</a></button>
            <?php

            if (isset($_GET['group_id'])) {


                $group_id = $_GET['group_id'];

                $select_members = "select * from group_members where group_id = '$group_id'";
                $run = mysqli_query($con, $select_members);

                while ($row = mysqli_fetch_array($run)) {

                    $user_id = $row['user_id'];

                    $member = "select * from users where user_id = '$user_id'";
                    $run_member = mysqli_query($con, $member);
                    $row_member = mysqli_fetch_array($run_member);

                    $user_image = $row_member['user_image'];
                    $user_id = $row_member['user_id'];
                    $user_name = $row_member['user_name'];

                    echo "
                        <p><img src='user/user_images/$user_image' width='50' height='50'><a href='user_profile.php?u_id=$user_id'>$user_name</a></p>
                    ";
                }
            }

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