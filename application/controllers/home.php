<?php
class Home extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index(){
        $this->load->view('common/header');
        $this->load->view('index');
        $this->load->view('common/footer');
        
        
        
        
    }
    
}
