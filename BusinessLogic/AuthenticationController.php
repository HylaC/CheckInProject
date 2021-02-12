<?php

    class Authentication{

        //Verify Sign In
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $namePattern = '^[A-Za-z\s]+$';
        $passwordPattern = '^[a-zA-Z0-9!@#$%^&*]{6,16}$';

        public function regexValidation($name, $password){
            if(preg_match(namePattern, $name) && preg_match(passwordPattern, $password)){
                return true;
            }else{
                return false;
            }
        }

        public function signInUser($name, $password){
            return header('Location: ./Home.php');
        }

        if (isset($_POST['submitted'])) {
            if (regexValidation($name, $password)) {
                return header('Location: ./SignIn.php');
            }else if(signInUser($name, $password)){
                return header('Location: ./Home.php');
            }else{
                header("Location:./Index.php");
            }
        }
    }
?>