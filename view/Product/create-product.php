<?php
session_start();
if (!$_SESSION['is_logged_in']===true) {
  return header('location: ../Home/index.php');
}
$errors=[];
$old=[];
if (isset($_SESSION["errors"])) {
  $errors=$_SESSION["errors"];
}

if (isset($_SESSION["old"])) {
  $old=$_SESSION["old"];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <?php require_once("../../include/css/css.php") ?>
</head>
<body>
<?php require_once("../../include/nav/nav.php") ?>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add Product</p>

                <form action="../../action/products/add_product.php" class="mx-1 mx-md-4" method="post" enctype="multipart/form-data" >

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Name</label>
                      <input type="text" name="name"  <?php if (isset($old['name'])) {?> value="<?php echo $old['name'] ?>" <?php } ?> id="form3Example1c" class="form-control" />
                     <?php if (isset($errors["name"]) && !empty($errors['name'])) { ?>
                        <p class="text-danger"><?php echo  $errors['name'] ; ?></p>                        
                     <?php } ?>
                    
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">price</label>
                      <input type="text" name="price" <?php if (isset($old['price'])) {?> value="<?php echo $old['price'] ?>" <?php } ?> id="form3Example3c" class="form-control" />
                      <?php if (isset( $errors['price']) && !empty($errors['price'])) { ?>
                          <p class="text-danger" ><?php echo $errors['price'] ?></p>
                      <?php }?>
                    </div>
                  </div>


                  
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="mb-3">
                      <label for="formFile" class="form-label">Image</label>
                      <input class="form-control  " name="image" type="file" id="formFile">
                      <?php if (isset($errors['image'])&& !empty($errors['image'])) {?>
                        <p class="text-danger" ><?php echo $errors['image'] ?> </p>
                      <?php } ?>
                  </div>
                  </div>

  


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button  type="submit" name="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Submit</button>
                  </div>

                </form>
                <?php unset($_SESSION['errors']) ?>
                <?php unset($_SESSION['old']) ?>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="../../public/assets/form/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require_once("../../include/js/js.php") ?>
</body>
</html>