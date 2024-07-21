<?php
session_start();
if (!$_SESSION['is_logged_in']===true) {
  return header('location: ../Home/index.php');
}
$file_json=file_get_contents('../../data/product.json');
$all_product=json_decode($file_json,true);
if (!empty($all_product)) {
  $products=[];
foreach ($all_product as  $value) {
  if ($value['user_id']==$_SESSION['user']['id']) {
    $products[]=$value;
  }
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <?php require_once('../../include/css/css.php'); ?>

</head>
<body>
    <?php require_once("../../include/nav/nav.php") ?>
    <form action="create-product.php">
    <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
    <div class="container " >

        <div class="row " >
          <?php if (!empty($products)) {?>
            <?php foreach ($products as $product) { ?>
              <div class="col-3" >
                  <div class="card " style="width: 18rem;">
                      <img src="../../public/assets/product/<?php echo $product['image']; ?>" class="card-img-top "   alt="...">
                          <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name'] ?></h5>
                            <p class="card-text"><?php echo "$".$product['price'] ?></p>
                            <a href="edit-product.php?id=<?php echo $product['id'] ?>" class="btn btn-primary">Edit</a>
                            <a href="../../action/products/delete.php?id=<?php echo $product['id'] ?>" class="btn btn-danger" >Delete</a>
                          </div>
                  </div>
              </div>
         <?php } ?>
          <?php } ?>

        </div>

    </div>


   


    <?php require_once('../../include/js/js.php'); ?>

</body>
</html>