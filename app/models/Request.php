<?php

        class Request {

            private $db;
    
            public function __construct(){
                $this->db = new Database;
            }
            
        //get all requests
        public function getRequests(){
                
            $this->db->query('SELECT * FROM requests');
            $row = $this->db->resultSet();
            
            //check row
            return $row;
                
        }
        //Get request by id
        public function getRequestById($id){

            $this->db->query('SELECT * FROM requests WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
        
            //check row
            return $row;
        }
       
        //Save accept data
        public function saveAccept($data){
            $this->db->query("INSERT INTO friends (user_id, friend_id) VALUE(:user_id,:friend_id) ");
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':friend_id', $data['friend_id']);
            
            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        //Delete request 
        public function deleteRequest($id){
            $this->db->query('DELETE FROM requests WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $id);
      
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }
        
    }