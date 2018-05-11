<?php

class Pages extends Controller
{
    public function __construct()
    {
    //   $this->pageTemplateFunction('page1');
    }


    public function index()
    {
        $data = array (
            'title' => 'Home Page'
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