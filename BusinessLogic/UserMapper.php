<?php
    include_once "DataBaseConfig.php";
    include_once "SimpleUserClass.php";

    class UserMapper extends DatabasePDOConfiguration
    {
    
        private $conn;
        private $query;
    
        public function __construct()
        {
            $this->conn = $this->getConnection();
        }
    
        public function getUserByName($email)
        {
            $this->$query = "select * from users where email=:email";
            $statement = $this->conn->prepare($this->$query);
            $statement->bindParam(":email", $email);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    
        public function insertUser($user)
        {
            $query = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
            $statement = $this->conn->prepare($query);

            $name = $user->getName();
            $email = $user->getEmail();
            $password = $user->getPassword();
            $role = $user->getRole();

            //enkriptimi i passwordit
            $passwordEncrypted = sha1($password); //password_hash($password, PASSWORD_BCRYPT);

            $statement->bindParam(":name", $name);
            $statement->bindParam(":email", $email);
            $statement->bindParam(":password", $passwordEncrypted);
            $statement->bindParam(":role", $role);
            
            $statement->execute();
        }
    
        public function deleteUser($userId)
        {
        }

        // //listimi i te gjithe usereve nga databaza
        // public function getAllUsers()
        // {
        //     $query = "select * from users";
        //     $statement = $this->conn->prepare($query);
        //     return $users = $statement->fetchAll();
        // }

        // public function getUserByID($userId)
        // {
        //     $this->$query = "select * from users where userid=:id";
        //     $statement = $this->conn->prepare($this->$query);
        //     $statement->bindParam(":id", $userId);
        //     $statement->execute();
        //     $result = $statement->fetch(PDO::FETCH_ASSOC);
        //     return $result;
        // }
    }
?>