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
            <h2>Add Members:</h2>

            <?php

            global $con;

            $get_users = "SELECT * FROM users join friends on users.user_id = friends.requestReceiverID and verified='yes'";
            $members = array();

            $run_user = mysqli_query($con, $get_users);
            if (isset($_GET['group_id'])) {
                $group_id = $_GET['group_id'];
            }
            while ($row = mysqli_fetch_array($run_user)) {

                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                $user_image = $row['user_image'];
                $email = $row['user_email'];

                if (!in_array($user_name, $members) && $_SESSION['user_email'] != $email) {
                    array_push($members, $user_name);
                    echo "
                  <div id='members'>
                        <p><a href='user_profile.php?u_id=$user_id'><img src='user/user_images/$user_image' width='50' height='50'></a></p>
                        <h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                        <a href='functions/add_group_member.php?group_id=$group_id&user_name=$user_name&user_id=$user_id' style='float:right;'>
                            <button>Add Member</button>
                        </a>
                  </div></br>
                  ";
                }
            }

            ?>
        </div>
        <?php
        //include ("functions/add_group_member.php");
        if (isset($_POST['add_member'])) {

            $group_id = $_GET['group_id'];
            $user_id = $_GET['user_id'];
            $user_name = $_GET['user_name'];

            $add_members = "insert into group_members (group_id,user_id,user_name) values ('$group_id','$user_id','$user_name')";
            $run = mysqli_query($con, $add_members);

            if ($run) {
                echo "
              <script>alert('Member added!')</script>
        ";
            }
        }
        ?>
        <!-- content timeline ends -->
    </div>
    <!-- content area ends -->
    </div>
    <!-- container ends -->

    </body>
    </html>
<?php } ?>