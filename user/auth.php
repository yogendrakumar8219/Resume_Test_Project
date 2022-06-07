<?php 
session_start();
ob_start();
//print_r($_SESSION);

/// redirecting 
if(!isset($_SESSION['iSESS_USER_ID']) && !isset($_SESSION['SESS_FIRST_NAME']))
{
    echo '<center> <button class="btn btn-light btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> You are not Authorized Redirecting ...</button> </center><meta http-equiv="refresh" content="2;URL=../login.php" /><style> #show { display: none; }  </style>';                       
}

////////////////

?>