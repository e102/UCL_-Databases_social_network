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
        <div id="msg">
            <?php
            $select_groups = "select * from group_members where user_id = '$user_id'";
            $run = mysqli_query($con, $select_groups);
            if ($run == null) {
                $count_msg = 0;
            }
            else {
                $count_msg = mysqli_num_rows($run);

                while ($row = mysqli_fetch_array($run)) {

                    $group_id = $row['group_id'];

                    $get_group = "select * from groups where group_id ='$group_id'";
                    $run_group = mysqli_query($con, $get_group);
                    $row = mysqli_fetch_array($run_group);

                    $group_name = $row['group_name'];
                    echo "                    
                    <tr align='center'>
                        <td>
                            <a href='group_messages.php?group_id=$group_id'>$group_name</a>
                            <a href='delete_group.php?group_id=$$group_id'>
                                <button class='btn-white btn-small'>Delete</button>
                            </a>
                            <br>
                        </td>
                    </tr>";
                }
            }
            ?>
            
            <?php
            if (isset($_GET['msg_id'])) {
                $get_id = $_GET['msg_id'];

                $sel_message = "select * from messages where msg_id='$msg_id'";
                $run_message = mysqli_query($con, $sel_message);

                $row = mysqli_fetch_array($run_message);

                $msg_subject = $row['msg_sub'];
                $msg_topic = $row['msg_topic'];

                echo "
                    <br/><hr>
                    <h2>$msg_subject:</h2>
                    <h3>$sender_name:</h3>
                    <p></p>
                    ";
            }
            ?>

        </div>
        <!-- content area ends -->
    </div>
    <!-- container ends -->

    </body>
    </html>
<?php } ?>