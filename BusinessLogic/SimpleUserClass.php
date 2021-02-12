<?php
    require_once 'PersonClass.php';

    class SimpleUser extends Person
    {

        public function __construct($name, $email, $password, $role)
        {
            parent::__construct($name, $email, $password, $role);
        }

        public function setSession()
        {
            $_SESSION["role"] = "0";
            $_SESSION['roleName'] = "SimpleUser";
        }

        public function setCookie()
        {
            setcookie("name", $this->getName(), time() + 2 * 24 * 60 * 60);
        }
        public function getName()
        {
            return $this->username;
        }
        public function getEmail()
        {
            return $this->age;
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