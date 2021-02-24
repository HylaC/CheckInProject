<?php

    require_once 'UserMapper.php';
    include_once 'SimpleUserClass.php';
    include_once 'AdminUserClass.php';
    include_once 'DataBaseConfig.php';

    session_start(); //me fillu me rujt sesionin

    if(isset($_POST['signin-submitted'])) {
        $signin = new SignInController($_POST);
        $signin->verify();
    }else if(isset($_POST['signup-submitted'])){
        $signup = new SignUpController($_POST);
        $signup->signupUser();
    }else{
        return header("Location: ../Index.php");
    }
    
    class SignInController{

        private $formData;
        
        public function __construct($formData)
        {
            $this->formData = $formData;  
        }

        //Verify Sign In form
        public function verify(){
 
            $email = $this->formData['email'];
            $password = $this->formData['password'];
              
            if($this->checkVariables($email, $password)) 
            {
                return header("Location: ../Index.php");
            }
            else if($this->verifySignIn($email, $password))
            {
                return header('Location: ../Home.php');// pasi useri te bohet sign in e bon redirect ne web faqen me url Home.php
            }
            else{
               return header("Location: ../Index.php");
            }
        }

        private function checkVariables($email, $password){
            if (empty($email) || empty($password)){
                return true;
            }
            return false;
        }

        private function verifySignIn($email, $password){
            $mapper = new UserMapper();
            
            $user = $mapper->getUserByEmail($email);
            
            $passwordEncrypted = sha1($password);

            if ($user == null || count($user) == 0) 
               return false;
            if ($passwordEncrypted == $user['password']) {
                if ($user['role'] == 1) {
                    $_SESSION['role'] = user['role'];
                    $person = new AdminUser($user['userid'], $user['name'],$user['email'], $user['password'], $user['role']);
                    $person->setSession();
                }else if($user['role'] == 0){
                    $person = new SimpleUser($user['userid'], $user['name'],$user['email'], $user['password'], $user['role'], "");
                    $person->setSession();
                }
                return true;
            }else return false;
        }
    }

    class SignUpController{
        private $formData;
        
        public function __construct($formData)
        {
            $this->formData = $formData;  
        }

        //Verify Sign Up form
        public function signupUser(){
            $name = $this->formData['name'];
            $email = $this->formData['email'];
            $password = $this->formData['password'];
             
            if($this->registerUser($name, $email, $password))
            {
                return header('Location: ../Index.php');
            }else{
                return header("Location: ../Signup.php");
            }
        }

        private function regexValidation($name, $email, $password){
            //metoda preg_match bene vertetimin e RegEx-it
            if(preg_match("/^[A-Za-z\s]+$/", $name) && preg_match("/^[A-Za-z\d\._]+@[A-Za-z\d\._]+\.[A-Za-z\d]{3,}+$/", $email) && preg_match("/^[a-zA-Z0-9!@#$%^&*]{6,16}$/", $password)){
                return true;
            }else{
                return false;
            }
        }

        public function registerUser($name, $email, $password){

            //e bon insert userin e ri si simple user
            $user = new SimpleUser($name, $email, $password, 0);
            //ketu thirre UserMapper me metoden insert
            $mapper = new UserMapper();
            $mapper->insertUser($user);
        }
    }
?>