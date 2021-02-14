<?php

    abstract class Person
    {
        //protected $userid;
        protected $name;
        protected $email;
        protected $password;
        protected $role;

        function __construct($name, $email, $password, $role)
        {
            // $this->userid = $userid;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->role = $role;
        }

        abstract protected function setSession();
        abstract protected function setCookie();
    }
?>