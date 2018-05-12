<?php

/*
    ► Load view Params = VIEW, TEMPLATE, DATA = array []
*/

class Pages extends Controller
{
    public function __construct()
    {
        
    }


    public function index()
    {
        $data = array (
            'title' => 'Home Page',
            'footer' => 'Footer notes'
        );

        $this->view('pages/index', 'page', $data);
    }


    public function about()
    {   
        $data = array (
            'title' => 'About Page Nasad'
        );
        
        $this->view('pages/about', 'page', $data);
    }
}