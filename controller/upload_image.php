<?php 
session_start();
include '../model/model.class.php';

if(isset($_POST['submit-upload']) && !empty($_FILES['file']['size'] > 0)){
    $id = $_SESSION['user']['id'];
    $obj = new Model();
    $file = $_FILES['file'];
    //print_r($file); 

    $fileError = $file['error'];
    $array = explode(".",$file['name']);
    $fileExtention = $array[1];
    $fileTemporaryLocation = $file['tmp_name'];
    $fileSize = $file['size'];

    if($fileExtention == "jpg"){
        if($fileError == "0" && $fileSize < 2000000){
          $randomLetters = "fdajfahfbhabh223f9fdfhuhb3e2fdsjnk2ufjsdf2dk";
          $random = "";

          for($i=0;$i< 12;$i++){
            $random .= $randomLetters[rand(0, strlen($randomLetters)-1)];
          }

          $uploads = '../uploads/'; 
          move_uploaded_file($fileTemporaryLocation, $uploads.$random.".".$fileExtention);
          $obj->upload_file($random, $id);
          $_SESSION['user']['img'] = $random;
          header("location: ../view/profile-page.php?succes");
        }else{
            header("location: ../view/profile-page.php?error");
        }
    }else{
        header("location: ../view/profile-page.php?error");
    }

}else{
    header("location: ../view/profile-page.php?error");
}