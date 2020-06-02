<?php

    class Pages extends Controller{
        public function __construct(){
        
        
        }

        public function index(){
            
            $data = [
                'title' => 'Invitations App',
                'description' => 'Welcome to invitations app. Feel free to invite anyone with you',
            ];

            

            $this->view('pages/index', $data);
        }
        public function about(){
            $data = [
                'title' => 'About',
            ];
            $this->view('pages/about', $data);
        }

        

    }