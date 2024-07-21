<?php 
require_once('functions.php');
function vali_name($name){
    $error=null;
    if (empty($name)) {
    $error='Name Is Required';
    }elseif (!is_string($name) || is_numeric($name)) {
        $error= 'Name Must Be String';
    }elseif (strlen($name) <4 || strlen($name) > 50) {
        $error='Name Consists Of Between 12->50 characters';
    }
    return $error;
}

function vali_email(string $email){
    $error=null;
    if (empty($email)) {
        $error= 'Email Is Required';
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error='Valid Email';
    }elseif (!uniqe_email($email)) {
        $error= 'Email Must Be Uniqe';
    }
    return $error;
}

function vali_emails_login(string $email){
    $error=null;
    if (empty($email)) {
        $error= 'Email Is Required';
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error='Valid Email';
    }
    return $error;
}

function vali_password(string $password,$confirm_password){
    $error=null;
    if (empty($password)) {
        $error= 'Password Is Required';
    }elseif (!is_string($password)|| is_numeric($password)) {
        $error='Password Must Be String And Number';
    }elseif (strlen($password)<8|| strlen($password) >50) {
        $error= 'Password Must be More 8 Chatcters';
    }elseif ($confirm_password!== $password) {
        $error= 'Password Must Be Confirmed';
    }
    return $error;
}
function vali_pass_login(string $password){
    $error=null;
    if (empty($password)) {
        $error= 'Password Is Required';
    }elseif (!is_string($password)|| is_numeric($password)) {
        $error='Password Must Be String And Number';
    }elseif (strlen($password)<8|| strlen($password) >50) {
        $error= 'Password Must be More 8 Chatcters';
    }
    return $error;
}

function vali_image(array $image): ?string {
    $error=null;
    $imagetype=explode('/',$image['type']);
    $type=$imagetype[0];
    $size=$image['size'];
    $sizeMb=$size/(1024**2);
    if ($image['error']!==0) {
        $error= 'Image Is Required';
    }elseif ($type!=='image') {
        $error= 'File Must Be Image';
    }elseif ($sizeMb > 1) {
        $error= 'Image Size <= 1Mb';
    }
    return $error;
}

function vali_price($price): ?string {
    $error=null;
    if (empty($price)) {
        $error= 'Price Is Required';
    }elseif (!is_numeric($price) ) {
        $error= 'Price Must Be Integer';
    }elseif ($price <0) {
        $error= 'Valid Price';
    }
    return $error;

}

// function vali_email_login($email): ?string{
//     $error=null;
//     if (empty($email)) {
//         $error='Email Is Required';
//     }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
//         $error='valid Email';
//     }elseif (!email_is_here($email)) {
//         $error='Email Not Found';
//     }
//     return $error;
// }

// function vali_password_login(string $password){
//     $error=null;
//     if (empty($password)) {
//         $error= 'Password Is Required';
//     }elseif (!password_is_here($password)) {
//         $error='Valid Cradenial';
//     }
//     return $error;
// }
