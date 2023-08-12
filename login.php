<?php
  require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Sekolah (Sinsek)</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="admin/css/icheck-bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="admin/css/bootstrap.min.css"> 
  <link rel="stylesheet" type="text/css" href="admin/css/font-awesome.css">
  <link rel="stylesheet" href="admin/css/bootstrap-icons.css">  
  <link rel="stylesheet" href="admin/css/bootstrap-icons.scss"> 
  <link rel="stylesheet" href="admin/css/font-awesome.min.css">
  <link rel="stylesheet" href="admin/css/boxicons.min.css">
  <link rel="stylesheet" href="admin/css/adminlte.min.css">
  <link href="admin/images/pnup.png" rel="icon">

</head>
<style>
  #my-icon {
  font-size: 24px;
}
</style>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-dark">
    <div class="card-header text-center">
      <img src="admin/images/pnup.png" width="80" height="80" class="img-fluid" alt="...">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in SINSEK</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" id="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-lock"  id="my-icon"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-dark">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-dark btn-block" name="loginbtn">Sign In</button>
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
<div class="mt-3" style="width: 350px">

<?php

if(isset($_POST['loginbtn']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];

  $cekuser = mysqli_query($conn, "select * from user where username='$username' and password='$password'");
  $hitung = mysqli_num_rows($cekuser);

  if($hitung>0){
    $ambildatarole = mysqli_fetch_array($cekuser);
    $role = $ambildatarole['role'];

      if($role=='admin'){
        $_SESSION['log'] = 'Logged';
        $_SESSION['role'] = 'admin';
        header('location:admin');
  
      }else{
        $_SESSION['log'] = 'Logged';
        $_SESSION['role'] = 'user';
        header('location:user');
  
      }
    
  }else{
    ?>
    <div class="alert alert-warning text-center" role="alert">
    Akun anda tidak tersedia. Pastikan username dan password benar
    </div>            
   <?php
}


};

?>


           
        </div>

<!-- jQuery -->
<script src="admin/js/jquery.min.js"></script>
<script src="admin/js/bootstrap.bundle.min.js"></script>
<script src="admin/js/adminlte.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
