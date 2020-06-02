<?php

    class Invitations extends Controller{
        public function __construct(){
            //Checkif user is logged in
            if(!isLoggedIn()){
                redirect('users/login');
              }
            //calling models 
            
            $this->invitationModel = $this->model('Invitation');
        }
        

        public function index(){

            $users = $this->invitationModel->getUsers();

            $data = [
                'title' => 'Welcome',
                'users' => $users,
                
            ];
            $this->view('invitations/index', $data);
        }
    }