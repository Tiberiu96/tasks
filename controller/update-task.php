<?php if(isset($_POST['id'])){
    include '../model/model.class.php';

    $obj = new Model();
    $db = $obj->db_connect();

    $title = mysqli_real_escape_string($db, $_POST['title']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $id = mysqli_real_escape_string($db, $_POST['id']);

    if($obj->update_task($title, $description, $id)){
        echo"adevarat"; 
    }



}else{
    header("location: /../view/index.php");
}


?>