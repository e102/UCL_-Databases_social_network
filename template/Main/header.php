<!DOCTYPE html>

<html>
<head>
    <title>Interwebz</title>
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
                    <a href="home.php">
                        Home
                    </a>
                    <a href="members.php">
                        Members
                    </a>
                    <a href="create_group.php">
                        Create Group
                    </a>
                </li>
            </ul>
            <form method="get" action="results.php" id="form1">
                <input type="text" name="user_query" placeholder="Search for friends"/>
                <input type="submit" name="search" value="Search"/>
            </form>
        </div>
        <!-- header ends -->
    </div>
