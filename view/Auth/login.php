<?php 
session_start();
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']===true) {
  return header('location: ../Home/index.php');
}

$errors=[];
if (isset($_SESSION['error'])) {
  $errors=$_SESSION['error'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once("../../include/css/css.php") ?>
</head>
<body>
<?php require_once("../../include/nav/nav.php") ?>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form action="../../action/users/act_login.php" method="post">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" name="email" id="form1Example13" class="form-control form-control-lg" />
            <label class="form-label" for="form1Example13">Email address</label>

              <?php if (isset( $errors['email']) && !empty($errors['email'])) { ?>
                  <p class="text-danger" ><?php echo $errors['email'] ?></p>
              <?php }?>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" name="password" id="form1Example23" class="form-control form-control-lg" />
            <label class="form-label" for="form1Example23">Password</label>
              <?php if (isset( $errors['password']) && !empty($errors['password'])) { ?>
                  <p class="text-danger" > <?php echo $errors['password']  ?> </p>
              <?php } ?>

          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="form1Example3"
                checked
              />
            </div>
            <a href="resetpassword.php">Forgot password?</a>
          </div>

          <!-- Submit button -->
          <button type="submit" name="login"  class="btn btn-primary btn-lg btn-block">Login</button>
        </form>
        <?php unset($_SESSION['error']) ?>
      </div>
    </div>
  </div>
</section>
<?php require_once("../../include/js/js.php") ?>
</body>
</html>