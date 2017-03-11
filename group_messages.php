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
                <textarea cols="72  " rows="4" name="group_message" placeholder="Write Message"></textarea><br></br>
                <input type="submit" name="submit_group_message" value="Post message"/>
                <button><a href="group_members.php?group_id=
                    <?php
                    $group_id = $_GET['group_id'];
                    echo $group_id;
                    ?>
                ">Members</a></button>
            </form>
            <div id="posts">
                <?php
                    include ("functions/get_group_messages.php");
                    include ("functions/insert_group_message.php");
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