<?php

   function invalid_username($name){
        if(empty($name) || strlen($name)<3){
            return true;
        }   
   }

   function invalid_email($email){
       if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
           return true;
       }
   }

   function invalid_password($password){
        if(empty($password) || strlen($password) <5){
            return true;
        }
   }

   function invalid_passwords($password, $password2){
       if(!($password == $password2)){
           return true;
       }
   }