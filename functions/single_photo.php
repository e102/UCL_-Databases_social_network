
<?php
include("includes/connection.php");
if (isset($_GET['photo_id'])) {
    global $con;

    $photo_id = $_GET['photo_id'];
    $get_user_photo = "select * from photos where photo_id = '$photo_id'";
    $run_user_photo = mysqli_query($con, $get_user_photo);
    $row_user_photo = mysqli_fetch_array($run_user_photo);
    $photo_path = $row_user_photo['photo_path'];


    $photo_owner_array = mysqli_fetch_array(mysqli_query($con, "select * from photod where photo_id = '$photo_id'"));
    $owner_id = $photo_owner_array['photo_owner'];
    $user = "select * from users where user_id='$owner_id'";
    $run_user = mysqli_query($con, $user);
    $row_user = mysqli_fetch_array($run_user);
    $user_name = $row_user['user_name'];
    $user_image = $row_user['user_image'];
    echo "<br>";
    echo "
    <div id='posts'>
    <img src='user/user_images/$photo_path' width='100' height='100'>
    <p><img src='user/user_images/$user_image' width='50' height='50'></p>
    <h3><a href='user_profile.php?u_id=$owner_id'>Photo Owner: $user_name</a></h3>
    <br>";
}
?>