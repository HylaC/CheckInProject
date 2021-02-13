<?php
    require_once 'PersonClass.php';

    class AdminUser extends Person
    {
        public function __construct($userid, $name, $email, $password, $role)
        {
            parent::__construct($userid, $name, $email, $password, $role);
        }

        public function setSession()
        {
            $_SESSION["role"] = '1';
            $_SESSION['roleName'] = "Administrator";
        }

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