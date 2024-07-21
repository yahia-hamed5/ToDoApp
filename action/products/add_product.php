<?php
session_start();
require_once('../../helpers/validation.php');
require_once('../../helpers/functions.php');
if (isset($_POST["submit"])) {
    // echo"Hello You Are Welcome";
    $post=[
    'name'=>$_POST["name"],
    'price'=>$_POST['price'],
    'image'=>$_FILES['image'],
    ];

    $image_name = $post['image']['name'];
    $image_type = $post['image']['type'];
    $image_tmp = $post['image']['tmp_name'];


    $errors=[
        'name'=>vali_name( $post['name']),
        'price'=> vali_price($post['price']),
        'image'=>vali_image( $post['image']),
    ]; 


    if (bag_error_isempty($errors)) {
        $ext=pathinfo($image_name)['extension'];
        $newname='product' . '-' . rand(1,10000) . ".$ext";
        move_uploaded_file($image_tmp,"../../public/assets/product/$newname");
        $products=[
            'name'=>$post['name'],
            'price'=>$post['price'],
            'image'=>$newname,
            'user_id'=>$_SESSION['user']['id'],
        ];
        $products_json=storejson($products,'../../data/product.json');  
         $_SESSION['product']=$products_json;

         header('location: ../../view/Product/product.php');
    }else {
        echo'بطيييييييييييييييييييخ';
    }
    



}else {
    echo "Get Out Mf";
}

