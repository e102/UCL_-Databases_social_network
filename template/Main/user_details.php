<div id="user_details">
    <?php
    $user = $_SESSION['user_email'];
    $get_user = "select * from users where user_email = '$user'";
    $run_user = mysqli_query($con, $get_user);
    $row = mysqli_fetch_array($run_user);
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_pass = $row['user_pass'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_country = $row['user_country'];
    $user_gender = $row['user_gender'];
    $register_date = $row['register_date'];
    $last_login = $row['last_login'];

    $user_posts = "select * from posts where user_id='$user_id'";
    $run_posts = mysqli_query($con, $user_posts);
    $numberPosts = mysqli_num_rows($run_posts);

    $friend_requests = "select * from friends where requestReceiverID='$user_id' and verified='no' and ignored = '0'";
    $run_requests = mysqli_query($con, $friend_requests);
    if ($run_requests == null) {
        $numberRequests = 0;
    }
    else {
        $numberRequests = mysqli_num_rows($run_requests);
    }

    $groups = "select * from groups where owner_id='$user_id'";
    $run_groups = mysqli_query($con, $groups);
    if ($run_groups == null) {
        $numberGroups = 0;
    }
    else {
        $numberGroups = mysqli_num_rows($run_groups);
    }

    $message = "select * from messages where receiver='$user_id' and status='unread'";
    $run_messages = mysqli_query($con, $message);
    if ($run_messages == null) {
        $numberMessages = 0;
    }
    else {
        $numberMessages = mysqli_num_rows($run_messages);
    }

    echo "
                      <center><img src='user/user_images/$user_image' width='200px' height='200px'/></center>
                      <p><strong>Name: $user_name</strong></p>
                      <p><strong>Country: $user_country</strong></p>
                      <p><strong>Last Login: $last_login</strong></p>
                      <p><strong>Member Since: $register_date</strong></p>

                      <p><a href='my_messages.php?u_id=$user_id'>My Messages ($numberMessages)</a></p>
                      <p><a href='user_posts.php?u_id=$user_id'>My Posts ($numberPosts)</a></p>
                      <p><a href='my_photos.php?u_id=$user_id'>My Photos </a></p>
                      <p><a href='my_groups.php?u_id=$user_id'>My Groups ($numberGroups)</a></p>
                      <p><a href='friend_requests.php?u_id=$user_id'>Friend requests ($numberRequests)</a></p>
                      <p><a href='edit_account.php?u_id=$user_id'>Edit My Account</a></p>
                      <p><a href='logout.php'>Logout</a></p>
                      </br>
                      <h3>People you may know:</h3>
                      ";
                      recommendedFriends();                
    ?>
</div>
