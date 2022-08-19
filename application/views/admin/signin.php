<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Admin Panel</title>
  <?php include "inc-css.php"; ?>
</head>

<body class="bg-light-gray" id="body">
  <div class="container d-flex flex-column justify-content-between vh-100">
    <div class="row justify-content-center mt-5">
      <div class="col-xl-5 col-lg-6 col-md-10">
        <div class="card">
          <div class="card-header bg-primary">
            <div class="app-brand">
              <a href="/index.html">
                <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
                  <g fill="none" fill-rule="evenodd">
                    <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                  </g>
                </svg>
                <span class="brand-name">Welcome Back</span>
              </a>
            </div>
          </div>
          <div class="card-body p-5">
            <h4 class="text-dark mb-5">Sign In</h4>
            <form method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group col-md-12 mb-4">
                  <input type="email" class="form-control input-lg" id="email" name="email" value="<?= set_value('email') ?>" aria-describedby="emailHelp" placeholder="Username">
                  <?php echo form_error('email', "<p style='color:red'>", "</p>"); ?>
                </div>
                <div class="form-group col-md-12 ">
                  <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password">
                  <?php echo form_error('password', "<p style='color:red'>", "</p>"); ?>
                </div>
                <div class="col-md-12">
                  <div class="d-flex my-2 justify-content-between">
                    <div class="d-inline-block mr-3">
                      <label class="control control-checkbox">Remember me
                        <input type="checkbox" name="iagree" />
                        <div class="control-indicator"></div>
                      </label>
                    </div>
                    <p><a class="text-blue" href="#">Forgot Your Password?</a></p>
                  </div>
                  <?php echo form_error('iagree', "<p style='color:red'>", "</p>"); ?>
                  <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Sign In</button>
                  <!-- <p>Don't have an account yet ?
                    <a class="text-blue" href="#">Sign Up</a>
                  </p> -->
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright pl-0">
      <p class="text-center">&copy; 2018 Copyright
        <a class="text-primary" href="#" target="_blank">FruitKha</a>.
      </p>
    </div>
  </div>
</body>

</html>