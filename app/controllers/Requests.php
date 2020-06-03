<?php

    class Requests extends Controller{
        public function __construct(){
            //Checkif user is logged in
            if(!isLoggedIn()){
                redirect('users/login');
              }
            //calling models 
            
            $this->requestModel = $this->model('Request');
        }
        

        public function index(){

            $requests = $this->requestModel->getRequests();

            $data = [
                'title' => 'Welcome',
                'requests' => $requests,
                
            ];
            $this->view('requests/index', $data);

        }

        

    }