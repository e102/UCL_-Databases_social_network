<?php

$photo_id = $_GET['photo_id'];
$get_com = "select * from photo_comments where photo_id='$photo_id'";
$run_com = mysqli_query($con, $get_com);

if ($run_com != null) {

    while ($row = mysqli_fetch_array($run_com)) {
        $com = $row['comment'];
        $date = $row['date'];
        $owner_id = $row['user_id'];

        $get_user_name = "select * from users where user_id = '$owner_id'";
        $run_user_name = mysqli_query($con, $get_user_name);
        $row_user_name = mysqli_fetch_array($run_user_name);

        $author_name = $row_user_name['user_name'];

        echo "
    <div id='posts'>
    <p>Author: $author_name</p>
    <span style='color: black'>Posted on $date</span>
    <p>$com</p>
    </div>
    ";

    }
}

?>