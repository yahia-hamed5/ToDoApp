<?php
session_start();
   require_once ("../../helpers/functions.php");
    require_once ("../../helpers/validation.php");
if (isset($_POST["register"])) {
    $get=[
    'name'=>$_POST['name'],
    'email'=>$_POST['email'],
    'password'=>$_POST['password'],
    'confirm_password'=>$_POST['confirm_password'],
    ];

$errors=[
    'name'=>vali_name($get['name']),
    'email'=>vali_email($get['email']),
    'password'=>vali_password($get['password'],$get['confirm_password']),
];

if (bag_error_isempty($errors)) {
$users=[
    'name'=>$get['name'],
    'email'=>$get['email'],
    'password'=>$get['password'],
];
$user_json=storejson($users,'../../data/user.json');
store_in_session($user_json);
var_dump($_SESSION['is_logged_in']);
header('location: ../../view/Home/index.php');
}else{

    $_SESSION['errors']=$errors;
    $_SESSION['old']=[
                        'name'=> $get['name'],
                        'email'=> $get['email'],
                    ];
    header('location: ../../view/Auth/register.php') ;
}
// storejson($user,'../../data/user.json');
// print_pre($user);


}else {
    echo "get out MF";
}




// function print_pre(array $data) {
//     foreach ($data as $key => $value) {
//         print $key ." Is ". $value ."<br>";
//     }
// } 