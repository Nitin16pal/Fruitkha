<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Easiest Way to Add Input Masks to Your Forms</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css')?>">
  
    <script>
        $(document).ready(function() {
            $('#birth-date').mask('00/00/0000');
            $('#phone-number').mask('0000-0000');
        })
    </script>
    <?php include "inc-css.php"; ?>
</head>

<body>
    <div class="registration-form">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="username" name="uusername" value="<?php set_value('uusername')?>" placeholder="Username">
                <?php echo form_error('uusername', "<p style='color:red'>", "</p>"); ?>
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" id="email" name="uemail" value="<?php set_value('uemail')?>" placeholder="Email">
                <?php echo form_error('uemail', "<p style='color:red'>", "</p>"); ?>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="mobile" name="umobile" value="<?php set_value('umobile')?>" placeholder="Phone Number">
                <?php echo form_error('umobile', "<p style='color:red'>", "</p>"); ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" name="upassword" placeholder="Password" value="<?php set_value('upassword')?>">
                <?php echo form_error('upassword', "<p style='color:red'>", "</p>"); ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="cpassword" name="ucpassword" placeholder="Confirm Password">
                <?php echo form_error('ucpassword', "<p style='color:red'>", "</p>"); ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Create Account</button>
            </div>
        </form>
        <div class="social-media">
            <h5>Sign up with social media</h5>
            <div class="social-icons">
                <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
                <a href="#"><i class="icon-social-google" title="Google"></i></a>
                <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>