<?php
    require_once 'PersonClass.php';

    class SimpleUser extends Person
    {
        public function __construct($userid, $name, $email, $password, $role)
        {
            parent::__construct($userid, $name, $email, $password, $role); // dergimi i parametrave klases prind permes konstruktorit femije 
        }

        //vendosja e session per ruajtjen e rolit te perdoruesit
        public function setSession()
        {
            $_SESSION["role"] = '0';
            $_SESSION['roleName'] = "SimpleUser";
        }

        //vendosja e cookie per kohen e sign in te perdoruesit
        public function setCookie()
        {
            setcookie("name", $this->getName(), time() + 2 * 24 * 60 * 60);
        }

        public function getUserId()
        {
            return $this->userid;
        }
        public function getName()
        {
            return $this->name;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function getPassword()
        {
            return $this->password;
        }
        public function getRole()
        {
            return $this->role;
        }
    }
?>