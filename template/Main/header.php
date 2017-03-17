<!DOCTYPE html>

<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="styles/home_style.css" media="all"/>
</head>
<body>

<!-- container starts -->
<div class="container">
    <!-- header_wrapper starts -->
    <div id="head_wrap">
        <!-- header starts -->
        <div id="header">
            <ul id="menu">
                <li>
                    <a href="home.php" style="color: white">
                        Home
                    </a>
                    <a href="friends.php" style="color: white">
                        Friends
                    </a>
                    <a href="create_group.php" style="color: white">
                        Create Group
                    </a>
                </li>
            </ul>
            <form method="get" action="results.php" id="form1">
                <input type="text" name="user_query" placeholder="Search for friends"/>
                <input type="submit" name="search" class="btn-white btn-small" value="Search"/>
            </form>
            <form method="get" action="blog_results.php" id="form1">
                <input type="text" name="user_query" placeholder="Search your friend's blogs"/>
                <input type="submit" name="search_blog" class="btn-white btn-small" value="Search"/>
            </form>
        </div>
        <!-- header ends -->
    </div>
