<?php 
session_start();
include '../model/model.class.php';
include 'validation-register.php';

if(isset($_POST['submit-change'])){
    $password = $_POST['password'];
    $id = $_SESSION['user']['id'];

    if(invalid_password($password)){
        header("location: ../view/profile-page.php?wrong");
    }else{
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $obj = new Model();
        $obj->change_password($hashed,$id);
        header("location: ../controller/logout-page.php");
    }
}