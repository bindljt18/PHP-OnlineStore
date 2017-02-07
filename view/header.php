<!doctype html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <!-- Set the viewport so this responsive site displays correctly on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digital Store </title>
    <link rel='stylesheet' href='css/styles.css' > 
    <!-- Include bootstrap CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script>

$(document).ready(function(){
// Define an event handler
});

</script>

 </head>
 <body>
 <!-- page header -->

<div  class='row' id='outer-box' ><!-- outer box -->
        <div class='col-xs-12' id='header'>
                <h2>Digital Store</h2>
                <div class='col-xs-4'><a class='a-menu' href="index.php">Home</a></div>
		<?php if (isset($_SESSION['user'])){
                      echo "<div class='col-xs-4'>You are logged in as ".$_SESSION['user']."</div>";
                      echo "<div class='col-xs-4'><a class='a-menu' href=\"index.php?mode=logout\">Sign out</a></div>";
                     }
                ?>

        </div>
 <!-- top image -->
 <img src='images/computer.jpg' alt='logo' id='banner' />

 </div>

<div id='content'><!-- page content -->

