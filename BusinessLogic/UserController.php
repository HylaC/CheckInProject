<?php
   
    include_once "UserMapper.php";

    class UserController{

        //Verify Sign Up
        private $name = "";
        private $email = "";
        private $password = "";

        public function _construct($fromData){
            $this->name = $formData['name'];
            $this->email = $formData['email'];
            $this->password = $formData['password'];
        }
        
        $namePattern = '^[A-Za-z\s]+$';
        $emailPattern = '^[A-Za-z\d\._]+@[A-Za-z\d\._]+\.[A-Za-z\d]{3,}+$';
        $passwordPattern = '^[a-zA-Z0-9!@#$%^&*]{6,16}$';
        
        public function regexValidation($name, $email, $password){
            if(preg_match(namePattern, $name) && preg_match(emailPattern, $email) && preg_match(passwordPattern, $password)){
                return true;
            }else{
                return false;
            }
        }

        public function registerUser(){
            $user = new SimpleUser($this->name, $this->email, $this->password, 0);
            //ketu thirre UserMapper me metoden insert
            $mapper = new UserMapper();
            $mapper->insertUser($user);
            return header('Location: ./SignIn.php');
        }

        if (isset($_POST['submitted'])) {
            if (regexValidation($name, $email, $password)) {
                return header('Location: ./SignUp.php');
            }else if(registerUser($name, $email, $password)){
                return header('Location: ./SignIn.php');
            }else{
                header("Location:./SignUp.php");
            }
        }
    }
?>