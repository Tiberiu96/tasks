<?php
session_start();

if(isset($_SESSION['user'])){
    header("location: ../view/profile-page.php");
}else{
    header("location: ../view/index.php");
}