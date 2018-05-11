<?php
/*
    ► App Core Class
    ► Creates URL & Loads core controller
    ► URL FORMAT - /controller/method/params
*/

class Core 
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];
    



    public function __construct()
    {
        // print_r($this->getUrl());   -> Testing the getUrl function
        
        $this->urlFormat();
       
        
    }


    // Get URL -> Trim URL -> Filter URL -> Explode URL
    public function getUrl()
    {
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

    public function urlFormat()
    {
        $url = $this->getUrl();

        // Look in controllers for first value (Current path is in Public folder)
        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            // If exists, set as the current controller
            $this->currentController = ucwords($url[0]);

            // unset 0 Index
            unset($url[0]);
        }

        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate the controller class
        $this->currentController = new $this->currentController;

        // Look in current controller for method (Checking for second part of URL)
        if(isset($url[1])){
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // Get Params
        $this->params = $url ? array_values($url) : [];
        // Call a call back with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    
}