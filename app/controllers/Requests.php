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
        //accept user function
        public function accept($id){
            
            $accept = $this->requestModel->getRequestById($id);

                $data=[

                    'user_id'=> $_SESSION['user_id'],
                    'friend_id' => $id,
                   
                ];

                if($this->requestModel->saveAccept($data)){
                    $this->requestModel->deleteRequest($id);
                    flash('post_message' , 'Invitation accepted');
                    redirect('requests');
                }
                $this->view('requests/', $data);
        }
        //decline
        public function decline($id){
            $this->requestModel->deleteRequest($id);
            flash('post_message' , 'Invitation declined');
            redirect('requests');
        }

        

    }