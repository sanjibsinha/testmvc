<?php namespace Controller;

use Karnel\Controller as Controller;

use Model\User as User;

class Home extends Controller
{
    public function index($name = '') {
        
        $name = $this->model($name);
        $header = $this->header();
        $footer = $this->footer();
        $index = $this->view('home/index', 
                ['name' => $name,
                'location' => 'Nabagram',
                    'header' => $this->header(),
                    'footer' => $this->footer()                    
        ]);
        
        
    }
}