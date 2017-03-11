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
        <div id="msg">

            <table width="600" align="center">
                <tr>
                    <th>Sender:</th>
                    <th>Subject:</th>
                    <th>Date:</th>
                    <th>Reply:</th>
                </tr>

                <?php
                $select_messages = "select * from messages where receiver = '$user_id'";
                $run = mysqli_query($con,$select_messages);
                $count_msg = mysqli_num_rows($run);

                while ($row = mysqli_fetch_array($run)) {

                    $msg_id = $row['msg_id'];
                    $sender = $row['sender'];
                    $receiver = $row['receiver'];
                    $msg_sub = $row['msg_sub'];
                    $msg_topic = $row['msg_topic'];
                    $msg_date = $row['msg_date'];

                    $get_sender = "select * from users where user_id ='$sender' ORDER BY 1 DESC ";
                    $run_sender = mysqli_query($con,$get_sender);
                    $row=mysqli_fetch_array($run_sender);

                    $sender_name = $row['user_name'];

                ?>

                <tr align="center">
                    <td><a href="user_profile.php?u_id=<?php echo $sender;?>"> <?php echo $sender_name;?></a></td>
                    <td>
                        <a href="my_messages.php?msg_id=<?php echo $msg_id;?>"> <?php echo $msg_sub;?></a>
                    </td>
                    <td><?php echo $msg_date;?></td>
                    <td><a href="my_messages.php?msg_id=<?php echo $msg_id;?>">Reply</a></td>
                </tr>

                <?php  } ?>
            </table>

            <?php
                if(isset($_GET['msg_id'])){
                    $get_id = $_GET['msg_id'];

                    $sel_message = "select * from messages where msg_id='$msg_id'";
                    $run_message = mysqli_query($con,$sel_message);

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