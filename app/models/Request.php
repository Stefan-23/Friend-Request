<?php


    class Request {

        private $db;

        public function __construct(){
            $this->db = new Database;
        }
        

        public function getRequests(){
            

                $this->db->query('SELECT * FROM requests');
                
                $row = $this->db->resultSet();
            
                //check row
                return $row;
            
        }
        
    }