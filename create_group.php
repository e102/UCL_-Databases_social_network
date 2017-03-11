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
            <form action="" method="post" id="f">
                <input type="text" name="groupName" placeholder="Group name..." required="required"/>

                <input type="submit" name="createGroup" value="Create group"/>
            </form>
            <?php

            if(isset($_POST['createGroup'])){

                $groupName = addslashes($_POST['groupName']);

                $insert = "insert into groups (group_name) values ('$groupName')";
                $run = mysqli_query($con,$insert);

                $select = "select * from groups where group_name = '$groupName'";
                $run = mysqli_query($con,$select);
                $row = mysqli_fetch_array($run);
                $group_id = $row['group_id'];

                $user_com = $_SESSION['user_email'];
                $get_com = "select * from users where user_email = '$user_com'";
                $run_com = mysqli_query($con,$get_com);
                $row_com = mysqli_fetch_array($run_com);
                $user_com_id = $row_com['user_id'];
                $user_com_name = $row_com['user_name'];

                $insert = "insert into group_members (group_id,user_id,user_name) values ('$group_id','$user_com_id','$user_com_name')";
                $run = mysqli_query($con,$insert);

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