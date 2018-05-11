<?php
/*
►Base Controller
►Loads the models and views
*/

class Controller extends Core
{
    protected $Err;

    //Load models
    public function model($model)
    {
        // Require the model file from App/Models
        require_once '../app/models/' . $model . '.php';

        // Instantiate the model
        return new $model();
    }

    // Load views
    public function view($view, $data = [])
    {
        // Check for view files that exists in App/Views
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        } else {
            
            
            
            require_once '../app/views/error.php';
            $Err = function() {
                echo 'Error Message';
            };
        }
    }

    public function Err() {
        // Set the default error message
        $Err = 'You have set your view to ' . $this->view($view) . ' which does not exist in App/Views folder'; 
        $this->Err = $Err;
    }
}