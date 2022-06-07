
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('user_header.php'); ?>
 
</head>
<body>
 <?php

session_start();
session_destroy();

setcookie("Cooki_id_user", "", time() - 3600);

echo '<center> <button class="btn btn-light btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> Logout ...</button> </center><meta http-equiv="refresh" content="2;URL=../login.php" />'; 

?>
</body>
</html>
