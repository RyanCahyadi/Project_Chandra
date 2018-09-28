<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Page Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style media="screen">
      body{
        background-image: url('../assets/img/bg-login.jpg');
        /* background-repeat: no-repeat; */
        /* width: 1280px;
        height: 720px; */
      }
      .wrapper-login {
        margin: 80px auto;
      }
      .img-wrapper{margin-bottom: 10px; text-align: center;}
      input[type=username]{
        width: 30%;
        margin: 0 auto;
        padding: 10px;
      }
      input[type=password]{
        width: 30%;
        margin: 0 auto;
        padding: 10px;
      }
      button[type=submit]{
        width: 30%;
        background-color: #48D1CC;
        border: none;
        padding: 10px;
      }
      button[type=submit]:hover{ color: white;}
    </style>
  </head>
  <body>

    <!-- Form Login -->
    <form class="" action="" method="post">
      <div class="container wrapper-login">
        <div class="img-wrapper">
          <img src="../assets/img/avatar.png" alt="" class="img-circle" width="200" height="200">
        </div>
        <div class="form-group">
          <input type="username" name="username" class="form-control" placeholder="Please Input Your Username Here . . ." autofocus="">
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Please Input Your Password Here . . .">
        </div>
        <div class="form-group" style="text-align:center;">
          <button type="submit" name="btn-login" class="btn btn-primary">Login</button>
        </div>
      </div>
    </form>
    <!-- End Form Login -->

    <script type="text/javascript" src="../asset/js/jquery.min.js"></script>
    <script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
  </body>
</html>

<?php 
  
  include "koneksi.php";
  session_start();

  if (isset($_POST['btn-login'])) {
    $username     = htmlspecialchars($_POST['username']);
    $password     = htmlspecialchars(sha1($_POST['password']));

    $sql      = mysql_query("SELECT * FROM tbl_login WHERE username = '$username' AND password = '$password'");
    $nums       = mysql_num_rows($sql);
    $row      = mysql_fetch_assoc($sql);

    if ($nums > 0) {
      $_SESSION['username'] = $row['username'];
      header("location:dashboard.php");
    } 
    else {
      echo "<script> alert('Username atau Password Salah !'); window.location = 'index.php'; </script>";
    } 
  }
?>