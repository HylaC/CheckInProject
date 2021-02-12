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
    
        public function getUserByID($userId)
        {
            $query = "select * from users where userid=:: id";
            $statement = $this->conn->prepare($query);
            $statement->bindParam(":id", $userId);
            $statement->execute();
            return $result = $statement->fetch(PDO::FETCH_ASSOC);
        }
    
        public function getUserByName($name)
        {
            $query = "select * from users where name=:: name";
            $statement = $this->conn->prepare($query);
            $statement->bindParam(":name", $name);
            $statement->execute();
            return $result = $statement->fetch(PDO::FETCH_ASSOC);
        }
    
        public function getAllUsers()
        {
            $query = "select * from users";
            $statement = $this->conn->prepare($query);
            return $result = $statement->fetchAll();
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
            $passwordEncrypted = password_hash($password, PASSWORD_BCRYPT);

            $statement->bindParam(":name", $name);
            $statement->bindParam(":email", $email);
            $statement->bindParam(":password", $passwordEncrypted);
            $statement->bindParam(":role", $role);
            
            $statement->execute();
        }
    
        public function deleteUser($userId)
        {
        }
?>