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
        <nav class="nav has-shadow">
  <div class="container">
    <div class="nav-left">
      <a class="nav-item">
        <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo">
      </a>
      <a class="nav-item is-tab is-hidden-mobile is-active">Home</a>
      <a class="nav-item is-tab is-hidden-mobile" href="friends.php" style="color: white">
          Friends</a>
      <a class="nav-item is-tab is-hidden-mobile">Pricing</a>
      <a class="nav-item is-tab is-hidden-mobile">About</a>
    </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    <div class="nav-right nav-menu">
      <a class="nav-item is-tab is-hidden-tablet is-active" href="home.php" style="color: white">
          Home</a>
      <a class="nav-item is-tab is-hidden-tablet" >Features</a>
      <a class="nav-item is-tab is-hidden-tablet">Pricing</a>
      <a class="nav-item is-tab is-hidden-tablet">About</a>
      <a class="nav-item is-tab">
        <figure class="image is-16x16" style="margin-right: 8px;">
          <img src="http://bulma.io/images/jgthms.png">
        </figure>
        Profile
      </a>
      <a class="nav-item is-tab">Log out</a>
    </div>
  </div>
</nav>


        <div id="header">
            <ul id="menu">
                <li>
                    <a
                    </a>
                    <a href="friends.php" style="color: white">
                        Friends
                    </a>
                    <a
                    </a>
                </li>
            </ul>
            <form method="get" action="results.php" id="form1">
                <input type="text" name="user_query" placeholder="Search for friends"/>
                <input type="submit" name="search" class="btn-white btn-small" value="Search"/>
            </form>
        </div>
        <!-- header ends -->
    </div>
