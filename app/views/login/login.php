
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BVWA | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url; ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>BVWA</b> - BHITECH VULNERABLE WEB APPS
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg" id="titleForm"></p>
      <p id="error"></p>
      <form action="<?= base_url; ?>/Auth/prosesLogin" method="POST" id="formLogin">
        <div class="input-group mb-3" id="nama">
          <input type="text" class="form-control" placeholder="Input nama.." name="nama" id="nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Input username.." name="username" id="username">
          <span style="color: red" id="pesanUsername"></span>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Input password.." name="password" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3" id="passwordRegister">
          <input type="password" class="form-control" placeholder="Input password ulang.." name="confirmPassword" id="confirmPassword">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" id="button"></button>
          </div>
          <div class="col-12"> 
            <p style="cursor: pointer; color: lightblue;" id="register">Belum mempunyai akun ?</p>
          </div>
          <div class="col-12"> 
            <p style="cursor: pointer; color: lightblue;" id="login">Sudah mempunyai akun ?</p>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
  <div class="row">
        <div class="col-sm-12">
          <?php
            Flasher::Message();
          ?>
        </div>
      </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url; ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url; ?>/dist/js/adminlte.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script type="text/javascript">
  
  $(document).ready(function() {

    $('#titleForm').text('Silahkan Login Terlebih Dahulu');
    $('#passwordRegister').hide();
    $('#login').hide();
    var button = $('#button');
    $('#nama').hide();
    button.text('Login!');
    var form = $('#formLogin');

    $('#login').on('click', function() {
      $('#nama').hide();
      $('#titleForm').text('Silahkan Login Terlebih Dahulu');
      $('#passwordRegister').hide();
      button.text('Register!');
      $('#akun').show();

      $('#formLogin').validate({
        rules : {
          username: {
            required: false,
            minlength: 6
          },
          password: {
            required: false,
            minlength: 0
          },
          confirmPassword: {
            required: false,
            minlength: 0
          }
        },
      });
      form.attr('action', "<?= base_url; ?>/Auth/prosesLogin");
      button.text('Login!');
    });

    $('#register').on('click', function() {
      $('#titleForm').text('Silahkan Register Terlebih Dahulu');
      $('#passwordRegister').show();
      $('#nama').show();
      $('#register').hide();
      $('#login').show();

      $('#formLogin').validate({
        rules : {
          username: {
            required: true,
            minlength: 6
          },
          password: {
            required: true,
            minlength: 6
          },
          confirmPassword: {
            required: true,
            minlength: 6
          }
        },
        messages: {
          username: {
            required: "Harus diisi",
            minlength : "Harus 6 character atau lebih"
          },
          password: {
            required: "Harus diisi",
            minlength : "Harus 6 character atau lebih"
          },
          confirmPassword: {
            required: "Harus diisi",
            minlength : "Harus 6 character atau lebih"
          }
        }
      });
      form.attr('action', "<?= base_url; ?>/Auth/prosesRegister");
    });

  });
</script>

</body>
</html>
