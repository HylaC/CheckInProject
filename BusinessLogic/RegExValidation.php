<?php
    $emailPattern = '^[A-Za-z\d\._]+@[A-Za-z\d\._]+\.[A-Za-z\d]{3,}+$';
    $passwordPattern = '^[a-zA-Z0-9!@#$%^&*]{6,16}$';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(isset($_POST['submit'])){
        if(preg_match(emailPattern, $email) && preg_match(passwordPattern, $password)){
            return true;
        }else{
            echo 'Please match the requested format!';
        }
    }
?>