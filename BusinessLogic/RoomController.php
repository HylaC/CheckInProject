<?php
    include_once 'DataBaseConfig.php';
    
    class RoomController
    {
        protected $formData;
        
        public function __construct($formData)
        {
            $this->formData = $formData;  
        }

        public function seeRooms()
        {
            $query = $this->formData->query('SELECT * FROM rooms');

            return $query->fetchAll();
        }

        public function addRooms($request){
            $query = $this->formData->prepare('INSERT INTO rooms (name, size) VALUES (:name, :size)');
            $query->bindParam(':name', $request['name']);
            $query->bindParam(':size', $request['size']);
            $query->execute();

            return header('Location: ./Rooms.php');
        }

        public function editRooms($room_id){//e popullon formen me tdhana prej databazes
            $query = $this->formData->prepare('SELECT * FROM rooms WHERE room_id = :room_id');
            $query->bindParam(':name', $request['name']);
            $query->bindParam(':size', $request['size']);
            $query->execute(['room_id' => $room_id]);

            return $query->fetch();
        }

        public function updateRooms($room_id, $request)
        {

            $query = $this->formData->prepare('UPDATE rooms SET name = :name, size = :size WHERE room_id = :room_id');
            $query->execute([
                'name' => $request['name'],
                'size' => $request['size'],
                'room_id' => $room_id
            ]);

            return header('Location: ./Rooms.php');
        }
        
        public function deleteRoom($room_id){
                $query = $this->formData->prepare('DELETE FROM rooms WHERE room_id = :room_id');
                $query->execute(['room_id' => $room_id]);
        
                return header('Location: ./Rooms.php');
            
        }
    }
?>