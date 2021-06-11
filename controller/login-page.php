<?php

if(isset($_POST['submit-login'])){
    include '../model/model.class.php';

    $obj = new Model();
    
    $db = $obj->db_connect();

    $email = mysqli_real_escape_string($db, $_POST['email'] );
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if($obj->login_verify($email, $password)){
       $data = $obj->get_user_data($email);
        session_start();
        $_SESSION['user'] = $data;
        header("location: ../view/index.php");
    }else{
        header("location: ../view/login-page.php?error=login");
    }
    
}else{
    header("location: ../view/index.php");
}