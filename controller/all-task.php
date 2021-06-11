<?php
    if(isset($_POST['submit-all-task'])){
        include '../model/model.class.php';
        $obj = new Model();
        $db = $obj->db_connect();

        $userID = mysqli_real_escape_string($db,$_GET['userID']);
        $data = $obj->show_all_tasks($userID);
        session_start();
        $_SESSION['tasks'] = $data;
        header("location: ../view/all-task-page.php");

    }else{
        header("location: ../view/index.php");
    }

?>