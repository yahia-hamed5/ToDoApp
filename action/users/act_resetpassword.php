<?php
session_start();
require_once('../../helpers/functions.php');
require_once('../../helpers/validation.php');
if (isset($_POST['send'])) {
    $email=$_POST['email'];
    $error=vali_emails_login($email);
    if ($error===null) {
        $users=json_decode(file_get_contents('../../data/user.json'),true);
        $i=null;
        foreach ($users as $user) {
            if ($user['email']===$email) {
                $_SESSION['email']=$email;
                $i=1;
                header('location: ../../view/Auth/newpass.php');
            }
        }

      if ($i==null) {
               $_SESSION['error']['email']="Email Not Found";
        $_SESSION['email']=$email;
        header("location: ../../view/Auth/resetpassword.php");
      }

        
    }else {
        $_SESSION['error']['email']=$error;
        $_SESSION['email']=$email;
        header("location: ../../view/Auth/resetpassword.php");
    }
    
}else {

}

