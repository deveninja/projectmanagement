<?php
/*
►Base Controller
►Loads the models and views
*/

class Controller extends Core
{
    protected $viewErr = '';
    protected $templateErr = '';
    

    //Load models
    public function model($model)
    {
        // Require the model file from App/Models
        require_once '../app/models/' . $model . '.php';

        // Instantiate the model
        return new $model();
    }

    // Load views
    public function view($view, $template, $data = [])
    {
        
        $viewMessage = '.php - Does not exist in App/Views/Pages folder';
        $templateMessage = '.php - Does not exist in App/Views/Templates folder';
        $errorPage = '../app/views/error.php';
        $templatesDIR = '../app/views/templates/';
        $viewsDIR = '../app/views/';
        $functionsDIR = '../app/views/inc/functions.php';
        
        
        // Checks and load the view & template files that exist in App/views folder
        if (!file_exists($templatesDIR . $template . '.php') && !file_exists($viewsDIR . $view . '.php')){
            $templateErr = $template;
            $viewErr = $view;
            $this->viewErr = $view . $viewMessage;
            $this->templateErr = $template . $templateMessage;
            
            require_once $errorPage;    

        } else {
            // Load the functions in App/Views/inc/functions.php
            require_once $functionsDIR;
            
            // Checks if the template file is available in App/Views/Templates
            if (!file_exists($templatesDIR . $template . '.php')){
                $templateErr = $template;
                $this->templateErr = $template . $templateMessage;
                require_once $errorPage;
            } else {
                require_once $templatesDIR . $template . '.php';
            }

            
            // Checks if the template file is available in App/Views/Pages
            if (!file_exists($viewsDIR . $view . '.php')){
                $viewErr = $view;
                $this->viewErr = $view . $viewMessage;
                require_once $errorPage;
            } else {
                require_once $viewsDIR . $view . '.php';
            }
            
        }   
    }

  

    
}