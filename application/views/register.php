<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>LLC Account Management System</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url('resource/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css"/>
  <!-- Custom fonts for this template-->
 <link href="<?php echo base_url('resource/vendor/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css"/>
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('resource/css/sb-admin.min.css');?>" rel="stylesheet" type="text/css"/>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
          <form method="post" action="<?php echo base_url();?>Login/login_info">
          <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input class="form-control" aria-describedby="emailHelp" placeholder="Enter User Id" name="Username" required="required">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" type="password" placeholder="Password" name="Password" required="required">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox">Remember Password</label>
            </div>
          </div>
          <button class="btn btn-info btn-block" name="login">Login</button>
        </form>
      </div>
    </div>
  </div>
      <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('resource/vendor/jquery/jquery.min.js');?>" type="text/javascript"></script>
   <script src="<?php echo base_url('resource/vendor/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
  <!-- Core plugin JavaScript-->
 <script src="<?php echo base_url('resource/vendor/jquery-easing/jquery.easing.min.js');?>" type="text/javascript"></script>
</body>

</html>
