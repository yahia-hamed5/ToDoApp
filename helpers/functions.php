<?php 
 function print_pre(array $data) {
    foreach ($data as $key => $value) {
        print $key ." => ". $value ."<br>";
    }
} 

function storejson(array $data,string $path) {
    $old_json=file_get_contents($path);
    $new_data=json_decode($old_json,true);
    $id=empty($new_data) ? 1 : end($new_data)['id']+1;
    $data['id']=$id;
    $new_data[]=$data;
    $users=json_encode($new_data);
    file_put_contents($path, $users);
    return $data;
}

function uniqe_email(string $email): bool {
    $users_json=file_get_contents("../../data/user.json");
    $old_data=json_decode($users_json,true);
    foreach ($old_data as $key => $value) {
        if ($email==$value['email']) {
            return false;
        }
    }
    return true;
}
    function bag_error_isempty(array $errors): bool {
        foreach ($errors as  $value) {
            if ($value!==null) {
                return false;
            }
        }
        return true;
    }

    function store_in_session(array $data){
        $_SESSION['user']= $data;
        $_SESSION['is_logged_in']=true;
    }


    function email_is_here(string $email) {
        
        $user_json=file_get_contents('../../data/user.json');
        $old_data=json_decode($user_json,true);
        foreach ($old_data as  $value) {
            if ($email==$value['email']) {
                return true ;
            }
        }
        return false;
    }

    function password_is_here(string $password) {
        
        $user_json=file_get_contents('../../data/user.json');
        $old_data=json_decode($user_json,true);
        foreach ($old_data as  $value) {
            if ($password==$value['password']) {
                return true ;
            }
        }
        return false;
    }

    // function get_json($path):void{
    //     $user_json=file_get_contents($path);
    //     $old_data=json_decode($user_json,true);
    // }
