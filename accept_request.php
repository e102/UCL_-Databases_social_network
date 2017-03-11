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

                <?php

                if(isset($_GET['u_id'])) {

                    $id = $_GET['u_id'];

                    $user = $_SESSION['user_email'];
                    $get_user = "select * from users where user_email = '$user'";
                    $run_user = mysqli_query($con,$get_user);
                    $row = mysqli_fetch_array($run_user);
                    $user_id = $row['user_id'];

                    $insert = "update friends set verified='yes' where requestSenderID='$id' and requestReceiverID='$user_id'";
                    $run = mysqli_query($con,$insert);

                    $insert = "insert into friends (requestSenderID, requestReceiverID, verified) values ('$user_id','$id','yes')";
                    $run = mysqli_query($con,$insert);

                    echo "<script>alert('friend added!')</script>";
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