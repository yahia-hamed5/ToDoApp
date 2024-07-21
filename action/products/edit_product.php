<?php
session_start();
require_once('../../helpers/validation.php');
require_once('../../helpers/functions.php');
if (isset($_POST["submit"])) {
    // echo"Hello You Are Welcome";
    $post=[
    'id'=>$_POST['id'],
    'name'=>$_POST["name"],
    'price'=>$_POST['price'],

    ];


    $errors=[
        'name'=>vali_name( $post['name']),
        'price'=> vali_price($post['price']),
    ]; 


    if (bag_error_isempty($errors)) {
        // $products=[
        //     'name'=>$post['name'],
        //     'price'=>$post['price'],
        //     'image'=>$newname,
        //     'user_id'=>$_SESSION['user']['id'],
        // ];

$products=json_decode(file_get_contents('../../data/product.json'),true);

foreach ($products as &$product) {
    if ($product['id']==$post['id']) {
        $product['name']=$post['name'];
        $product['price']=$post['price'];
    }
}
file_put_contents('../../data/product.json',json_encode($products));
         header('location: ../../view/Product/product.php');
    }else {
        echo'بطيييييييييييييييييييخ';
    }
    



}else {
    echo "Get Out Mf";
}

