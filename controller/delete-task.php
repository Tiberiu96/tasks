<?php
if(isset($_POST['submit'])){
    include '../model/model.class.php';
    $obj = new Model();
    $db = $obj->db_connect();

   $taskID = $_POST['taskID'];

   $obj->delete_task($taskID);


}else{
    header("location: ../view/index.php");
}


?>