<?php

$con = mysqli_connect("localhost", "root", "", "social_network") or die("Connection was not established");

$group_id = $_GET['group_id'];
$user_id = $_GET['user_id'];
$user_name = $_GET['user_name'];

$add_members = "insert into group_members (group_id,user_id,user_name) values ('$group_id','$user_id','$user_name')";
$run = mysqli_query($con, $add_members);

if ($run) {
    echo "
              <script>alert('Member added!')</script>
              echo \"<script>window.open('../user_posts.php','_self')</script>\";
        ";
}


?>