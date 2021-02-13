<?php

    require_once 'UserMapper.php';
    include_once 'SimpleUserClass.php';
    include_once 'AdminUserClass.php';

    session_start(); //me fillu me rujt sesionin

    if(isset($_POST['submitted'])) {
        $obj = new SignInController($_POST);
        $obj->verify();
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

        // //Verify Sign In form
        // public function verify(){
 
        //     $email = $this->formData['email'];
        //     $password = $this->formData['password'];
              
        //     if($this->regexValidation($email, $password)) 
        //     {
        //         if($this->verifySignIn($email, $password))
        //         {
        //             return header('Location: ../Home.php');
        //         }else{
        //            return header("Location: ../Index.php");
        //         }
        //     }else{
        //         return header("Location: ../Index.php");
        //     }
        // }

        private $formData;
        
        function __construct($formData){
            $this->formData = $formData;
        }

        private function regexValidation($email, $password){
            //return true;
            // $namePattern = '^[A-Za-z\s]+$';
            // $emailPattern = '^[A-Za-z\d\._]+@[A-Za-z\d\._]+\.[A-Za-z\d]{3,}+$';
            // $passwordPattern = '^[a-zA-Z0-9!@#$%^&*]{6,16}$';

            $name = $this->formData['name'];
            $email = $this->formData['email'];
            $password = $this->formData['password'];

            //metoda preg_match bene vertetimin e RegEx-it
            if(preg_match("/^[A-Za-z\s]+$/", $name) && preg_match("/^[A-Za-z\d\._]+@[A-Za-z\d\._]+\.[A-Za-z\d]{3,}+$/", $email) && preg_match("/^[a-zA-Z0-9!@#$%^&*]{6,16}$/", $password)){
                return true;
            }else{
                return false;
            }
        }
    }
?>