<?php
include('session.php');
 ?>

<!DOCTYPE Html>

<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
     shrink-to-fit=no, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <link rel="stylesheet" href="styled.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

  </head>

  <body>
    <body>
      <div class="container">
        <div class="card bg-secondary text-black">
          <h2>Welcome @ <?php echo $login_session; ?>  </h2>
          <ul class="list-group">
            <?php
            require_once ('session.php');
                include ('config.php');
                $sql = "SELECT * FROM users WHERE username='$user_check'";
                $run = mysqli_query($db,$sql);
            ?>
              <div class="row">
                <?php
                $i = 1;
                while ($view = mysqli_fetch_array($run)) {
                    $firstname = $view['firstname'];
                    $lastname = $view['lastname'];
                    $middlename = $view['middlename'];
                    $phonenumber = $view['phonenumber'];
                    $email = $view['email'];
                    ?>
                <div class="col-sm-11"><li class="list-group-item"><b>First Name :</b>&nbsp;<i><?php echo $firstname; ?></i></div>
                <div class="col-xs-1">

                </div>
                </li>
              </div>

              <div class="row">
                <div class="col-sm-11"><li class="list-group-item"><b>Middle Name : </b><?php echo $middlename;?></div>
                <div class="col-xs-1">

                </div>
                </li>
              </div>

              <div class="row">
                <div class="col-sm-11"><li class="list-group-item"><b>Last Name :   </b><?php echo $lastname;?></div>
                <div class="col-xs-1">

                </div>
                </li>
              </div>

              <div class="row">
                <div class="col-sm-11"><li class="list-group-item"><b>Email address :    </b><?php echo $email;?></div>
                <div class="col-xs-1">

                </div>
                </li>
              </div>

              <div class="row">
                <div class="col-sm-11"><li class="list-group-item"><b>Phone Number :   </b><?php echo $phonenumber;?></div>
                <div class="col-xs-1">

                </div>
                </li>
              </div>
              <div class="success">
                <button name="update" class="btn btn-success">Save</button>
                <a href="logout.php"><button name="logout" class="btn btn-danger" style="float:right; margin-right:100px;">Logout</button></a>
              </div>
              <?php
          }
          $i++;
          ?>
          </ul>

        </div>
      </div>
  </body>
</html>
