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
                userProfile();
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

<?php
function userProfile()
{
    global $con;

    if (isset($_GET['u_id'])) {

        $user_id = $_GET['u_id'];

        $select = "select * from users where user_id='$user_id'";
        $run = mysqli_query($con, $select);
        $row = mysqli_fetch_array($run);

        $id = $row['user_id'];
        $country = $row['user_country'];
        $name = $row['user_name'];
        $image = $row['user_image'];
        $gender = $row['user_gender'];
        $last_login = $row['last_login'];
        $register_date = $row['register_date'];

        if ($gender == 'Male') {
            $msg = "Send him a message";
        }
        else {
            $msg = "Send her a message";
        }

        echo "
<div id='user_profile'>

    <p><img src='user/user_images/$image' width='50' height='50'></p><br/>
    <p><strong>Name: $name</strong></p><br/>
    <p><strong>Name: $gender</strong></p><br/>
    <p><strong>Country: $country</strong></p><br/>
    <p><strong>Last Login: $last_login</strong></p><br/>
    <p><strong>Member Since: $register_date</strong></p><br/>
    <a href='messages.php?u_id=$id'><button>$msg</button></a>
    <a href='add_friend.php?u_id=$id'><button>Send friend request</button></a>
</div>
";
    }
}
?>
