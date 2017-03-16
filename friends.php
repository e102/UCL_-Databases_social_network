<!DOCTYPE html>
<html>
<head>
    <title>My Social Network</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css">
</head>

<?php
session_start();
include ("includes/connection.php");
include ("functions/functions.php");
include ("template/Main/header.php");

if(!isset($_SESSION['user_email'])){
    header("location: index.php");
} else {

    ?>
    <!-- Content area starts -->
        <div class="content">
            <!-- user timeline starts -->

            <div id="user_timeline">
                <div id="user_timeline">
                    <?php include ("template/Main/user_details.php");?>
                </div>
            </div>
            <!-- user timeline ends -->
            <!-- content timeline starts -->
            <section>
            <div id="content_timeline">

              <div class="field"  style="margin-top:40px">
                <center><h1>FRIENDS</h1></center>
              </div>
                <?php
                    include ("functions/get_friends.php")
                ?>
            </div>
          </section>
            <!-- content timeline ends -->
        </div>
        <!-- content area ends -->
    </div>
    <!-- container ends -->

    </body>
    </html>
<?php } ?>
