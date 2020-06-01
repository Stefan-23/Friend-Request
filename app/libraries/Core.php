<?php

    //Main Core app class
    //Creates URL and loads core controller
    //URL FORMAT - /controller/method/params

    // Core class
    class Core{

        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){
            //print_r($this->getUrl());

            $url = $this->getUrl();

            //Find controller for first value

            if(file_exists('../app/controllers/' . $url[0] . '.php')){
                //if exists set as controllers
                $this->currentController = ucwords($url[0]);
                //unset 0 index
                unset($url[0]);
            }

            //Require controller
            require_once '../app/controllers/' . $this->currentController . '.php';

            //Instantiate 
            $this->currentController = new $this->currentController;

            //check for method
            if(isset($url[1])){
                //check if method exists in controller
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];
                    //unset 1 index
                    unset($url[1]);
                }
            }

            //echo $this->currentMethod;

            //Get params

            $this->params = $url ? array_values($url) : [];

            //callback array of params

            call_user_func_array([$this->currentController, 
            $this->currentMethod], $this->params);
        }

        public function getUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }



    }