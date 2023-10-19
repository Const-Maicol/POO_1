
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INICIAR SESION</title>
  
<!-- Incluir estilos CSS -->
<?php require_once('../../view/assets/css/css.php');?>
</head>
<body>
  <div class="container">
  <!-- Header  -->
  <?php require_once('../../view/assets/view/header.php');?>
  <!-- End header -->
  <!--Section-->
  <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

        <form method="POST" action="../../controller/login.php" id="login" autocomplete="off" >
        <p class="lead fw-normal mb-0 me-3 text-center">Iniciar Sesion</p>


          <div class="divider d-flex align-items-center my-4">
            
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="p_username" name="p_username" class="form-control form-control-lg"
              placeholder="Enter a valid username" />
            <label class="form-label" for="p_username">Username</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="p_pass" name="p_pass" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="p_pass">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
          
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login <a href="#" />
            </button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="../../view/login/login.php"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>

 <?php
  include('../assets/view/footer.php');
 ?>
</section>

   <!-- footer  -->

  <!-- End footer -->
  </div>

<!-- Incluir js -->
</body>
</html>





