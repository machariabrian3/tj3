<?php
include('config.php');
session_start();
$user_check = $_SESSION['user'];
$sess_sql = mysqli_query($db,"SELECT username,userID,email from users WHERE username='$user_check'");
$row = mysqli_fetch_assoc($sess_sql);
$login_session =$row['username'];
$login_id = $row['userID'];
$login_email = $row['email'];
if (!isset($login_session) || !isset($login_id)) {
  $msq = '<div class="alert alert-dander">Failed</div>';
}
