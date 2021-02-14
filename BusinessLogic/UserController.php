<?php

    require_once 'UserMapper.php';
    include_once 'SimpleUserClass.php';
    include_once 'AdminUserClass.php';

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
        
        function __construct($formData){
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
                return header('Location: ../Home.php');
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
            return true;
            $mapper = new UserMapper();
            
            $user = $mapper->getUserByEmail($email);
            
            $passwordEncrypted = sha1($password);

            if ($user == null || count($user) == 0) 
               return false;
            else if ($passwordEncrypted == $user['password']) {
                if ($user['role'] == 1) {
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
        
        function __construct($formData){
            $this->formData = $formData;
        }

        //Verify Sign In form
        public function signupUser(){
            
            $name = $this->formData['name'];
            $email = $this->formData['email'];
            $password = $this->formData['password'];
        
              
            if($this->regexValidation($name, $email, $password)) 
            {
                if($this->registerUser($name, $email, $password))
                {
                    return header('Location: ../Index.php');
                }else{
                    return header("Location: ../Signup.php");
                }
            }else{
                return header("Location: ../Index.php");
            }
        }

        private function regexValidation($name, $email, $password){

            // $name = $this->formData['name'];
            // $email = $this->formData['email'];
            // $password = $this->formData['password'];

            //metoda preg_match bene vertetimin e RegEx-it
            if(preg_match("/^[A-Za-z\s]+$/", $name) && preg_match("/^[A-Za-z\d\._]+@[A-Za-z\d\._]+\.[A-Za-z\d]{3,}+$/", $email) && preg_match("/^[a-zA-Z0-9!@#$%^&*]{6,16}$/", $password)){
                return true;
            }else{
                return false;
            }
        }

        public function registerUser($name, $email, $password){
            $user = new SimpleUser($this->name, $this->email, $this->password, 0);
            //ketu thirre UserMapper me metoden insert
            $mapper = new UserMapper();
            $mapper->insertUser($user);
        }
    }
?>