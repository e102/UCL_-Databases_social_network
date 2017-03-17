<!DOCTYPE html>
<html>
<head>
    <title>My Social Network</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css">
</head>
<body>

<nav class="nav has-shadow">
  <div class="container">
    <div class="nav-left">
      <img src="images/logo.png" id="ucl_logo" style="height: 40px; margin-top:10px"/>

      <a class="nav-item is-tab is-hidden-mobile is-active" href="home.php">
          Home></a>
      <a class="nav-item is-tab is-hidden-mobile" href="friends.php">
          Friends></a>
      <a class="nav-item is-tab is-hidden-mobile" href="create_group.php">
          Create Group></a>
    </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    <div class="nav-right nav-menu">
      <div class="column">
      <form method="get" action="results.php" id="form1">
        <div class="field">
          <p class="control">
            <input class="input" type="text" name="user_query" placeholder="Search for friends"/>
          </p>
        </div>
        </div>
        <div class="column">
          <div class="field">
            <p class="control">
          <input type="submit" name="search" class="input" class="button-is-light" value="Search" style="margin-top:3px; width:100px;"/>
        </p>
        </div>
      </div>
      </form>
    </div>
</nav>
