<?php


if(isset($_POST['submit-registration'])){
        include '../model/model.class.php';
        include 'validation-register.php';
        
        $obj = new Model();
        $db = $obj->db_connect();

        $email = mysqli_real_escape_string($db,$_POST["email"]);
        $name = mysqli_real_escape_string($db,$_POST["name"]);
        $password = mysqli_real_escape_string($db,$_POST["password"]);
        $password2 = mysqli_real_escape_string($db,$_POST["password2"]);

        $array = [$email, $name];
        $details = serialize($array);
        
        if(invalid_username($name)){
            header("location: ../view/register-page.php?error=name&details=$details");
        }elseif(invalid_email($email)){
            header("location: ../view/register-page.php?error=email&details=$details");
        }elseif(invalid_password($password)){
            header("location: ../view/register-page.php?error=password&details=$details");
        }elseif(invalid_passwords($password, $password2)){
            header("location: ../view/register-page.php?error=password2&details=$details");
        }else{ // Dupa ce am verificat validarea trecem la interogarea in baza de date
            if($obj->is_user_exist($email)){
                header("location: ../view/register-page.php?error=userExists");
                echo"salut";
            }else{
                $obj-> add_user_to_db($email,$name,$password);
                header("location: ../view/login-page.php");
            }
        }
    
}else{
    header("location: ../view/index.php");
}