<?php
include('session.php');
include('config.php');
$msg = '';
$errors = array();
  if (isset($_POST['submit'])) {
    $allow = array('pdf','docs','txt','png','jpg','jpeg');
    $temp = explode(".",$_FILES['permit']['name']);
    $temp1 = explode(".",$_FILES['license']['name']);
    $temp2 = explode(".",$_FILES['trainingCert']['name']);
    $temp3 = explode(".",$_FILES['passport']['name']);

    $extension = end($temp);
    $extension1 = end($temp1);
    $extension2 = end($temp2);
    $extension3 = end($temp3);
    $permit = $_FILES['permit']['name'];
    $license  = $_FILES['license']['name'];
    $trainingcert = $_FILES['trainingCert']['name'];
    $passport = $_FILES['passport']['name'];

    move_uploaded_file($_FILES['permit']['name'],"uploads/".$_FILES['permit']['name']);
    move_uploaded_file($_FILES['license']['name'],"uploads/".$_FILES['license']['name']);
    move_uploaded_file($_FILES['passport']['name'],"uploads/".$_FILES['passport']['name']);
    move_uploaded_file($_FILES['trainingCert']['name'],"uploads/".$_FILES['trainingCert']['name']);

    if (count($errors) == 0) {
      $sql = "INSERT INTO users(permit, passport, DL, trainingCert) VALUES ('$permit','$passport','$license','$trainingcert') WHERE 'email' ='$user_check')";
//      $run = $db->query($sql);
      if (mysqli_query($db,$sql)) {
        $msg = '<div class="alert alert-success">documents received</div>';
//        $_SESSION['user'] = $username;
        header("Location:welcome.php");
        exit();
      }else{
        $msg = '<div class="alert alert-danger">files not uploaded</div>';
      }
    }else {
      $msg = '<div class="alert alert-danger">Errors</div>';
    }
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
     shrink-to-fit=no, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="minutiae.css">
  </head>
  <body>
    <div class="card bg-secondary text-black">
      <div class="card-title">
        <img class="image-responsive center" src="tj3logo.png" alt="Card image">
        <form class="form-control" action="" method="post" enctype="multipart/form-data">
          <fieldset><legend class="text-center">Upload the following documents<br />(<span class="req">
          <strong>all are required *</strong></span> )</legend>
              <div class="alert">
                  <?php
                    echo $msg;
                  ?>
              </div>
          <div class="form-group">
              <div class="col-sm-8">
                  <label for="file">Upload <strong> Work Permit</strong> : </label>
                  <input type="file" name="permit" class="btn btn-secondary" style="width:50vh;" acceptable="application/pdf"/>
              </div>
          </div>
          <div class="form-group">
              <div class="col-sm-8">
                  <label for="file">Upload <strong> Passport</strong> : </label>
                  <input type="file" name="passport" class="btn btn-secondary" style="width:45vh;"/>
              </div>
          </div>
          <div class="form-group">
              <div class="col-sm-8">
                  <label for="file">Upload <strong> Driving-License</strong> : </label>
                  <input type="file" name="license" class="btn btn-secondary" style="width:45vh;" acceptable="application/pdf"/>
              </div>
          </div>
          <div class="form-group">
              <div class="col-sm-8">
                  <label for="file">Upload <strong> Training Cert.</strong> : </label>
                  <input type="file" name="trainingCert" class="btn btn-secondary" style="width:45vh;" acceptable="application/pdf"/>
              </div>
          </div>
          <div class="form-group">
            <input class="btn btn-success" type="submit" name="submit" value="upload">
          </div>
        </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>
