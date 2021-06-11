<?php 
if(isset($_POST['submit-task'])){
    include '../model/model.class.php';

    $obj = new Model();
    
    $db = $obj->db_connect();

    $title = mysqli_real_escape_string($db, $_POST['title']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $id = mysqli_real_escape_string($db, $_GET['id']);
    if(!empty($title) && !empty($description)){
        $obj->add_task($title, $description, $id);
        header("location: ../view/index.php?added");
    }else{
        header("location: ../view/index.php?notAdded");
    }
   

    
}else{
    header("location: ../view/index.php");
}