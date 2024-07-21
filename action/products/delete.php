<?php

session_start();
if (!isset($_GET['id'])) {
    header('location: ../Error/404.php');
}
$id=$_GET['id'];

$products=json_decode(file_get_contents('../../data/product.json'),true);

$product=null;
foreach ($products as $key=> $value) {
    if ($value['id']==$id) {
        $path="../../public/assets/product/".$value['image'];
        unlink($path);
        unset($products[$key]);


    }
}
if ($product===null) {
    header('location: ../../view/Error/404.php');
}
file_put_contents('../../data/product.json',json_encode($products)); 
       header('location: ../../view/Product/product.php');
