<?php

session_start();

if (!isset($_SESSION['is_logged_in']))
{
    ?> 
        <span>Sorry you are not logged in! <a href="login.php">Login now</a></span>
    <?php
    exit();
}

include 'connection.php';