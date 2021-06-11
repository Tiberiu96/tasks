<?php 
session_start();
include '../model/model.class.php';

if(isset($_SESSION['user']) && $_SESSION['user']['admin']=="1"){
    $obj = new Model();
    $data = $obj->show_all_users();
    $_SESSION['admin'] = $data;
    header("location: ../view/admin-page.php");
    //$json = json_encode($data);
    //echo $json;

    
}else{
    header("location: ../view/login-page.php");
}

