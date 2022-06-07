<?php
session_start();

if(!isset($_SESSION['SESS_USER_ID']) && !isset($_SESSION['SESS_FIRST_NAME']))
{
    header("location: index.php");
    exit();
  
}
else
{
    $user_id = $_SESSION['SESS_USER_ID'];
}
?> 