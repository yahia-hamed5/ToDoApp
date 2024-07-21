<?php 
session_start();
require_once('../../helpers/validation.php');
require_once('../../helpers/functions.php');
if (isset($_POST['reset'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    $error=vali_password($password,$confirm_password);
    if ($error===null) {
        $users=json_decode(file_get_contents('../../data/user.json'),true);
        $i=null;
        foreach ($users as &$user) {
            if ($user['email']==$email && $user['password']!==$password) {
                $i=1;
                $user['password']=$password;
                file_put_contents('../../data/user.json',json_encode($users));
                header("location: ../../view/Auth/login.php");
            }
        }
        if ($i==null  ) {
            $_SESSION['error']="Take Another Password";
            header('location: ../../view/Auth/newpass.php');
        }

    }else {
        $_SESSION['error']=$error;
        header('location: ../../view/Auth/newpass.php');
    }
}else{
    echo "mesh tmm";
}