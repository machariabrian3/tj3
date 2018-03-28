<?php
include('session.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <div class="alert-heading">
      <h3><i>WELCOME <?php echo $login_session; ?>....</i></h3>
  </div>
    <?php
    require_once ('session.php');
        include ('config.php');
        $sql = "SELECT * FROM users WHERE username='$user_check'";
        $run = mysqli_query($db,$sql);
    ?>
  <div class="table-responsive">
      <table border="1" bgcolor="#7fffd4">
          <thead>
              <th>First name</th>
              <th>Last name</th>
              <th>Middle name</th>
              <th>Phone number</th>
              <th>Email</th>
          </thead>
          <tbody>
          <?php
          $i = 1;
          while ($view = mysqli_fetch_array($run)) {
              $firstname = $view['firstname'];
              $lastname = $view['lastname'];
              $middlename = $view['middlename'];
              $phonenumber = $view['phonenumber'];
              $email = $view['email'];
              ?>
              <tr>
                  <td> <?php echo $firstname; ?></td>
                  <td><?php echo $lastname;?></td>
                  <td><?php echo $middlename;?></td>
                  <td><?php echo $phonenumber;?></td>
                  <td><?php echo $email;?></td>
              </tr>
              <?php
          }
          $i++;
          ?>
          </tbody>
      </table>
  </div>
  </body>
</html>
