<?php
    //Core Controller
    //Loads Models and Views

    class Controller {

        //Load model
        public function model($model){
            //req model file
            require_once '../app/models/' . $model . '.php';

            //Instantiate model
            return new $model();

        }

        //Load View
        public function view($view, $data=[]){
            //check for view file
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            }else {
                die('View does not exists');
            }
        }
        
    }