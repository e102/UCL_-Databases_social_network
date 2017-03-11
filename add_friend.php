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

            <div id="posts">

                <?php
                if (isset($_GET['u_id'])) {

                    $target_user_id = $_GET['u_id'];

                    $current_user_email = $_SESSION['user_email'];
                    echo "<script>var email = <?php echo $current_user_email ?>; alert('current user email = ' + email)</script>";
                    $get_user = "select * from users where user_email = '$current_user_email'";
                    $run_user = mysqli_query($con, $get_user);
                    $row = mysqli_fetch_array($run_user);
                    $user_id = $row['user_id'];

                    //A user shouldn't be able to friend themselves
                    if ($target_user_id == $user_id) {
                        echo "<script>alert('You cannot friend yourself!');</script>";
                        echo "<script>window.open('home.php','_self')</script>";
                    }
                    else {
                        $insert = "insert into friends (requestSenderID, requestReceiverID, verified) values ('$user_id','$target_user_id','no')";
                        $run = mysqli_query($con, $insert);
                        echo "<h3>Friend request sent</h3>";
                    }

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