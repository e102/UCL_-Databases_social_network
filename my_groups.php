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
                echo "<h1>Groups</h1><br>";
                while ($row = mysqli_fetch_array($run)) {

                    $group_id = $row['group_id'];

                    $get_group = "select * from groups where group_id ='$group_id'";
                    $run_group = mysqli_query($con, $get_group);
                    $row = mysqli_fetch_array($run_group);

                    $group_name = $row['group_name'];
                    echo "                    
                    <tr align='center'>
                        <td>
                            <a href='group_messages.php?group_id=$group_id'><h3>$group_name</h3></a>
                            <br>
                        </td>
                    </tr>";
                }
            }
            ?>
        </div>
        <!-- content area ends -->
    </div>
    <!-- container ends -->

    </body>
    </html>
<?php } ?>