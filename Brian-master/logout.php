<?php
session_start();
session_destroy();
unset($_SESSION['user']);
$msg = "<div class='alert alert danger'>You are logged out</div>";
header('Location: Index.php');
exit;
 ?>
