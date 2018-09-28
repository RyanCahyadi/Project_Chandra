<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Page Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style media="screen">
      body{
        background-image: url('assets/img/bg-login.jpg');
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
      input[type=password].login{
        width: 30%;
        margin: 0 auto;
        padding: 10px;
      }
      button[type=submit].login{
        width: 30%;
        background-color: #48D1CC;
        border: none;
        padding: 10px;
      }
      button[type=submit]:hover{ color: ;}
    </style>
  </head>
  <body>

      <div class="container wrapper-login">
        <!-- Form Login -->
        <form action="proses.php?page=proses-login" method="post">
          <div class="img-wrapper">
            <img src="assets/img/avatar.png" alt="" class="img-circle" width="200" height="200">
          </div>
          <div class="form-group">
            <input type="username" name="username" class="form-control" placeholder="Please Input Your Username Here . . ." required="" autofocus="">
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control login" placeholder="Please Input Your Password Here . . ." required="">
          </div>
          <div class="form-group" style="text-align:center;">
            <button type="submit" name="btn-login" class="btn btn-primary login">Login</button>
          </div>
        </form>
        <!-- End Form Login -->

        <!-- Register -->
        <div class="form-group" style="text-align: center;">
          <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="width: 30%; border: none; padding: 10px; background-color: green;">
            Register
          </button>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Form Register</h4>
              </div>
              <div class="modal-body">
                <form action="proses.php?page=proses-register" method="POST">
                  <div class="form-group">
                    <label>Nik</label>
                    <input type="number" name="nik" class="form-control" placeholder="Masukan NIK anda . . ." required="" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama anda . . ." required="" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>No Telepone</label>
                    <input type="number" name="no-telp" class="form-control" placeholder="Masukan No Telp anda . . ." required="" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control" required>
                      <option value="Pria">Pria</option>
                      <option value="Wanita">Wanita</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Masukan Alamat anda . . ."></textarea>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                      <input type="text" name="username" class="form-control" placeholder="Masukan Username anda . . ." required autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukan Password anda . . ." required>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End Register -->

    <!-- End Form Login -->

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
