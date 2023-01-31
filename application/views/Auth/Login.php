
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log-in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/backend/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-info">
    <div class="card-header text-center">
      <a href="" class="h1" style="color:RGB(40, 178, 170);"><b style="color:RGB(40, 178, 170);">NOBBY</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg" style="color:RGB(40, 178, 170);">LOGIN TERLEBIH DAHULU</p>
       <?php $this->load->view('messages') ?>
      <form  action="<?=site_url('Auth/inprocess')?>" method="post">
      <small class="text-danger" style="font-style: italic "><span class="badge badge-warning text-dark"><?=form_error('username')?></span></small>
        <div class="input-group mb-3 <?=form_error('username') ? 'has-error' : null?>">
          <input type="text" name="username" class="form-control" value="<?=set_value('username')?>" placeholder="username" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>
       
        <small class="text-danger" style="font-style: italic "><span class="badge badge-warning text-dark"><?=form_error('password')?></span></small>
        <div class="input-group mb-3  <?=form_error('password') ? 'has-error' : null?>">
          <input type="password" name="password" class="form-control" value="<?=set_value('password')?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <!-- <input type="checkbox" id="remember"> -->
              <label for="remember">
                <!-- Remember Me -->
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block" style="background-color:RGB(40, 178, 170);">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="<?=base_url()?>assets/backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/backend/dist/js/adminlte.min.js"></script>
<script>
  var input = document.getElementsByTagName("input")[0] // just your input element

input.oninput = function() {
  input.value = input.value.toLowerCase()
}
</script>
</body>
</html>


