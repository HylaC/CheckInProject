<?php
    include_once 'DataBaseConfig.php';
    
    class RoomController extends DatabasePDOConfiguration
    {
        private $conn;

        public function __construct()
        {
            $this->conn = $this->getConnection();
        }

        public function seeRooms()
        {
            $query = $this->conn->query('SELECT * FROM rooms');

            return $query->fetchAll();
        }

        public function addRooms($request){
            $query = $this->conn->prepare('INSERT INTO rooms (name, size) VALUES (:name, :size)');
            $query->bindParam(':name', $request['name']);
            $query->bindParam(':size', $request['size']);
            $query->execute();

            return header('Location: ./Rooms.php');
        }

        public function editRooms($room_id){//e popullon formen me tdhana prej databazes
            $query = $this->conn->prepare('SELECT * FROM rooms WHERE room_id = :room_id');
            $query->bindParam(':name', $request['name']);
            $query->bindParam(':size', $request['size']);
            $query->execute(['room_id' => $room_id]);

            return $query->fetch();
        }

        public function updateRooms($room_id, $request)
        {

            $query = $this->conn->prepare('UPDATE rooms SET name = :name, size = :size WHERE room_id = :room_id');
            $query->execute([
                'name' => $request['name'],
                'size' => $request['size'],
                'room_id' => $room_id
            ]);

            return header('Location: ./Rooms.php');
        }
        
        public function deleteRoom($room_id){
                $query = $this->conn->prepare('DELETE FROM rooms WHERE room_id = :room_id');
                $query->execute(['room_id' => $room_id]);
        
                return header('Location: ./Rooms.php');
        }

        //Reservations 
        public function addReservation($request){
            $query = $this->conn->prepare('INSERT INTO reservations (fromdate, until) VALUES (:fromdate, :until)');
            $query->bindParam(':fromdate', $request['fromdate']);
            $query->bindParam(':until', $request['until']);
            $query->execute();
    
            return header('Location: ./Reservations.php');
        }

        public function seeReservations()
        {
            $query = $this->conn->query('SELECT * FROM reservations');

            return $query->fetchAll();
        }

        public function deleteReservation($reservation_id){
            $query = $this->conn->prepare('DELETE FROM reservations WHERE reservation_id = :reservation_id');
            $query->execute(['reservation_id' => $reservation_id]);
    
            return header('Location: ./Dashboard.php');
        }
    }
?>