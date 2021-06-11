<?php 
include '../model/model.class.php';
if(isset($_POST['taskID'])){
    $taskID = $_POST['taskID'];
    $obj = new Model();

    $obj->set_check($taskID);
    
}else{
    header("location: ../view/all-task-page.php");
}