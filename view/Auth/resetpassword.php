<?php 
session_start();
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']===true) {
  return header('location: ../Home/index.php');
}
$error=null;
if (isset($_SESSION['error'])) {
    $error=$_SESSION['error'];
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
        <form action="../../action/users/act_resetpassword.php" method="post">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" name="email" <?php if (isset($_SESSION['email'])) {?> value="<?php echo $_SESSION['email'] ?>"  <?php }?> id="form1Example13" class="form-control form-control-lg" />
            <label class="form-label"  for="form1Example13">Email address</label>
            <?php if (isset($_SESSION['error']['email']) && !empty($_SESSION['error']['email'])) { ?>
                        <p class="text-danger"><?php echo  $_SESSION['error']['email'] ; ?></p>                        
                     <?php } ?>
          </div>

          <!-- Password input -->


          <!-- Submit button -->
          <button type="submit" name="send"  class="btn btn-primary btn-lg btn-block">Send</button>
        </form>
        <?php unset($_SESSION['error']) ?>
        <?php unset($_SESSION['email']) ?>
        <?php ?>
      </div>
    </div>
  </div>
</section>
<?php require_once("../../include/js/js.php") ?>
</body>
</html>