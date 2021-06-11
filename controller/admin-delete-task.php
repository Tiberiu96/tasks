<?php
session_start();
include '../model/model.class.php';

if(isset($_SESSION['admin']) && isset($_POST['delete'])){
    $obj = new Model();
    $taskID = $_POST['taskID'];
    $obj->delete_task($taskID);
}else{
    header("location: ../view/index.php");
}

?>