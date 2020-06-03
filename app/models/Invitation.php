<?php

    class Invitation {

        private $db;

        public function __construct(){
            $this->db = new Database;
        } 
        //Get user by ID
        public function getUserById($id){

            $this->db->query('SELECT * FROM users WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
        
            //check row
            return $row;
        }

        //Get all users
        public function getUsers(){

            $this->db->query('SELECT * FROM users');
        
            $row = $this->db->resultSet();
    
            //check row
            return $row;
        }
        //Insert request in database
        public function insertRequest($data){
            $this->db->query("INSERT INTO requests (user_to, user_from) VALUE(:user_to,:user_from) ");
            $this->db->bind(':user_to', $data['user_to']);
            $this->db->bind(':user_from', $data['user_from']);
        
            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
}