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

        //Invitation function
        public function invite($id){

            
            $users = $this->invitationModel->getUserById($id);

                
                $data=[

                    'user_from'=> $_SESSION['user_name'],
                    'user_to' => $users->name,
                   
                ];

                if($this->invitationModel->insertRequest($data)){
                    flash('post_message' , 'Invitation sent');
                    redirect('invitations');
                }

                $this->view('invitations/invite', $data);
            
        
    }


    }