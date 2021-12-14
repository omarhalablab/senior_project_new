<?php 
session_start();
session_unset();
session_destroy();

echo "Redireting...";
header('REFRESH:3;login.php');