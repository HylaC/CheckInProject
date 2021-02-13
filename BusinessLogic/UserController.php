<?php

    require_once 'UserMapper.php';
    include_once 'SimpleUserClass.php';
    include_once 'AdminUserClass.php';
    session_start();

    if(isset($_POST['submitted'])) {
        $obj = new SignInController($_POST);
        $obj->verify();
    }
    
    $emailPattern = "^[A-Za-z\d\._]+@[A-Za-z\d\._]+\.[A-Za-z\d]{3,}+$";
    $passwordPattern = "^[a-zA-Z0-9!@#$%^&*]{6,16}$";
    //$namePattern = '^[A-Za-z\s]+$';

    class SignInController{

        private $formData;
        
        function __construct($formData){
            $this->formData = $formData;
        }

        //Verify Sign In form
        public function verify(){
 
            $email = $this->formData['email'];
            $password = $this->formData['password'];
              
            if($this->regexValidation($email, $password)) 
            {
                if($this->verifySignIn($email, $password))
                {
                    return header('Location: ../Home.php');
                }else{
                   return header("Location: ../Index.php");
                }
            }else{
                return header("Location: ../Index.php");
            }
        }

        private function regexValidation($email, $password){
            return true;
            if(preg_match($emailPattern, $email) && preg_match($passwordPattern, $password)){
                return true;
            }else{
                return false;
            }
        }

        private function verifySignIn($email, $password){

            $mapper = new UserMapper();
            
            $user = $mapper->getUserByName($email);
            
            $passwordEncrypted = sha1($password);
            //echo 'password: ' .$password;
            //echo '<br/>passwordEncrypted: ' .$passwordEncrypted;
            //echo '<br/>user: ' .$user['password'];

            if ($user == null || count($user) == 0) 
               return false;
            else if ($passwordEncrypted == $user['password']) {
                if ($user['role'] == 1) {
                    $person = new AdminUser($user['userid'], $user['name'],$user['email'], $user['password'], $user['role']);
                    $person->setSession();
                }else {
                    $person = new SimpleUser($user['userid'], $user['name'],$user['email'], $user['password'], $user['role'], "");
                    $person->setSession();
                }
                return true;
            }else return false;
        }
    }

    // class SignUpController{

    // }
    ?>
