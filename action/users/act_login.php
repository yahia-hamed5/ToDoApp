<?php
session_start();
require_once('../../helpers/functions.php');
require_once('../../helpers/validation.php');
if (isset($_POST['login'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $errors=[
        'email'=>vali_emails_login($email),
        'password'=>vali_pass_login($password)
    ];
    
    if (bag_error_isempty($errors)) {
        $allData=json_decode(file_get_contents('../../data/user.json'),true);
        $i=null;
        foreach ($allData as $data) {
            if ($data['email']==$email && $data['password']==$password) {
                $i=1;
                $user=store_in_session($data);
                header("location: ../../view/Home/index.php");
            } 
        }

        if ($i==null) {
            $errors['email']="Wrong Email";
            $errors['password']="Wrong Password";
            $_SESSION['error']=$errors;
            return header('location: ../../view/Auth/login.php');
        }
    }else {
        $_SESSION['error']=$errors;
        return header('location: ../../view/Auth/login.php');
    }

}else {
    echo 'اطلع بره ي مسكر';
}







