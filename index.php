<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesion</title>
    <?php include "includes/navLogin.php" ?>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="img/Logo-uc.png"
  </head>
  <body>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  
                  <h4 class="mt-1 mb-5 pb-1"></h4>
                </div>

                <form method="post" action="">
                  <p>Please login to your account</p>
                  <?php
                  include('loginController.php');
                  ?>

                  <div class="form-outline mb-4">
                    <input type="email" name="correo" id="form2Example11" class="form-control" placeholder="Phone number or email address" />
                    <label class="form-label" for="form2Example11">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example22" class="form-control" name="password" />
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <input name="btnlogin" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" value="Login">
                    <a class="text-muted" href="recuperarContrasenia.php">Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button type="button" class="btn btn-outline-danger">Create new</button>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4"></h4>
                <p class="small mb-0"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  </body>
</html>