
<?php
include("includes/connection.php");
if (isset($_GET['album_id'])) {
    global $con;
    $album_id = $_GET['album_id'];
    $get_album = "select * from photo_albums where album_id = '$album_id'";
    $run_album = mysqli_query($con, $get_album);

    $row_posts = mysqli_fetch_array($run_album);
    $album_name = $row_posts['album_name'];
    $album_owner_id = $row_posts['album_owner'];

    $user = "select * from users where user_id='$album_owner_id'";
    $run_user = mysqli_query($con, $user);
    $row_user = mysqli_fetch_array($run_user);
    $user_name = $row_user['user_name'];
    $user_image = $row_user['user_image'];

    echo "<br>";

    echo "
    <div id='posts'>
    <p><img src='user/user_images/$user_image' width='50' height='50'></p>
    <h3><a href='user_profile.php?u_id=$album_owner_id'>Album Owner: $user_name</a></h3>
    <h3>Album Name: $album_name</h3>";


    //Album image adder
    $get_user_photos = "select * from photos where photo_owner = '$album_owner_id'";
    $run_user_photos = mysqli_query($con, $get_user_photos);
    $user_photos_array = array();
    while ($row_user_photos = mysqli_fetch_array($run_user_photos)) {
        $user_photo_id = $row_user_photos['photo_id'];
        $user_photos_array[] = $user_photo_id;
    }

    echo "<h3>Add an image</h3>";
    echo"<form action='' method='post'>";
    echo "<select name='select_photo' id='country_dropdown_box' style='width: auto;''>";
    foreach ($user_photos_array as $a_photo) {
        echo "<option value='$a_photo'>$a_photo</option>";
    }
    echo "</select>";
    echo "<button name='upload_photo' class='btn-white btn-small'>Upload Photo</button>";
    echo"</form>";
    echo "<br>";


    $photos_query = "select * from photo_album_contents where album_id='$album_id'";
    $run_photos = mysqli_query($con, $photos_query);
    while ($row_photos = mysqli_fetch_array($run_photos)) {
        $single_photo_id = $row_photos['photo_id'];
        echo "<script>console.log('photo id = ' + $single_photo_id)</script>";
        $get_single_photo = "select * from photos where photo_id = '$single_photo_id'";
        $run_single_photo = mysqli_query($con, $get_single_photo);
        $single_photo_row = mysqli_fetch_array($run_single_photo);

        $single_photo_path = $single_photo_row['photo_path'];

        echo "<p><img src='user/user_images/$single_photo_path' width='50' height='50'></p>";
        echo "</br>";
    }
}

if (isset($_POST['upload_photo'])) {
    global $con;
    $photo_id = $_POST['select_photo'];
    $album_id = $_GET['album_id'];
    $insert_photo = "insert into photo_album_contents (photo_id,album_id) VALUES ('$photo_id','$album_id')";
    echo "<script>console.log($insert_photo)</script>";
    $run_insert = mysqli_query($con, $insert_photo);
    if ($run_insert) {
        echo "<script>alert('Photo added to album')</script>";
    }
    else {
        echo "<script>alert('Could not establish connection to server')</script>";
    }
}
?>