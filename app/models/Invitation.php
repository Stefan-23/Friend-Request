<?php

    class Invitation {

        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        //Get user by ID
        public function getUsers(){

            $this->db->query('SELECT * FROM users');
            
  
            $row = $this->db->resultSet();
        
            //check row
            return $row;
        }
    }