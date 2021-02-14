<?php
    include_once "DataBaseConfig.php";
    include_once "SimpleUserClass.php";
    include_once "AdminUserClass.php";

    class UserMapper extends DatabasePDOConfiguration
    {
    
        private $conn;
        private $query;
    
        public function __construct()
        {
            $this->conn = $this->getConnection();
        }
    
        public function getUserByEmail($email)
        {
            $this->$query = "select * from users where email=:email";
            $statement = $this->conn->prepare($this->$query);
            $statement->bindParam(":email", $email);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    
        public function insertUser(\SimpleUser $user)
        {
            $query = "insert into users (name, email, password, role) values (:name, :email, :password, :role)";
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
    
        //listimi i te gjithe usereve nga databaza
        public function getAllUsers()
        {
            $this->$query = "select * from users";
            $statement = $this->conn->prepare($this->$query);
            $statement->execute();
            $users = $statement->fetchAll();
            return $users;
        }

        public function getUserByID($userId)
        {
            $this->$query = "select * from users where userId=:userid";
            $statement = $this->conn->prepare($this->$query);
            $statement->bindParam(":userid", $userId);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        public function deleteUser($userId)
        {
            $this->query = "delete from users where userId=:userid";
            $statement = $this->conn->prepare($this->query);
            $statement->bindParam(":userid", $userId);
            $statement->execute();
        }

        public function editUser(\SimpleUser $user, $userId)
        {
            $this->$query = "update users set name=:name, email=:email where userId=:userid";
            //var_dump($user);
            $statement = $this->conn->prepare($this->$query);
            $name = $user->getName();
            $email = $user->getEmail();
            $statement->bindParam(":name", $name);
            $statement->bindParam(":email", $email);
            $statement->bindParam(":userid", $userId);
            $statement->execute();
            $statement = $statement->fetch();
            return $statement;
        }

        //function update user
    }
?>