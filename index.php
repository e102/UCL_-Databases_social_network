<!DOCTYPE html>
<html>
<head>
    <title>My Social Network</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css">
</head>
<body>


<?php
session_start();
include("functions/functions.php");
include("functions/user_insert.php");
include("template/Login/header.php");
include("template/Login/content.php");
include "template/Login/footer.php";
include("login.php");
?>
