<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>

    <!-- icon -->
    <link rel="icon" href="<?= base_url('/assets/icon/favicon.ico'); ?>" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/bower_components/bootstrap/css/bootstrap.min.css'); ?>">

    <link rel="stylesheet" type="text/css" href="<?= base_url('/assets/icon/themify-icons/themify-icons.css'); ?>">

    <link rel="stylesheet" type="text/css" href="<?= base_url('/assets/icon/icofont/css/icofont.css'); ?>">

    <link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/style.css'); ?>">
</head>
<body class="fix-menu">
    
    <section class="login-block">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <!-- alet  -->
            
          <?php if ($message) { ?>
          <div class="alert alert-info" role="alert">
            <strong>Info!</strong> <?php echo $message; ?> 
          </div>
          <?php 
        } ?>
    <!--  -->
              <form action="<?php echo base_url('auther/auth/login'); ?>" class="md-float-material form-material" method="POST">
                  <div class="text-center">
                      <img src="<?= base_url('/assets/images/logo11.png') ?>" alt="logo.png">
                  </div>
                  <div class="auth-box card">
                      <div class="card-block">
                          <div class="row m-b-20">
                              <div class="col-md-12">
                                  <h3 class="text-center">Sign In</h3>
                              </div>
                          </div>
                          <div class="form-group form-primary">
                              <input type="text" id="identity" name="identity" class="form-control" placeholder="Your Username" value="" autocomplete="off">
                              <span class="form-bar"></span>
                          </div>
                          <div class="form-group form-primary">
                              <input type="password" name="password" class="form-control" placeholder="Password">
                              <span class="form-bar"></span>
                          </div>
                          <div class="row m-t-25 text-left">
                          <div class="col-12">
                            <div class="checkbox-fade fade-in-primary d-">
                              <label>
                              <input type="checkbox" value="">
                              <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                              <span class="text-inverse">Remember me</span>
                              </label>
                            </div>
                            <div class="forgot-phone text-right f-right">
                              <a href="auth-reset-password.html" class="text-right f-w-600"> Forgot Password?</a>
                            </div>
                          </div>
                          </div>
                          <div class="row m-t-30">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
                        </div>
                        </div>
                      </div>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </section>
</body>
</html>