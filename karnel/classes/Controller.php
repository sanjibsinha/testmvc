<?php namespace Karnel;

use Model\User as User;
use Karnel\View as View;
use Layout\Header as Header;
use Layout\Footer as Footer;


class Controller
{
    protected $user;
    protected $name;
    protected $data = [];

    protected function model($user) {
        $this->user = $user;
        $model = new User();
        //$user = $model->connect($id);
        $model->name = $user;
        return $user;
    }
    
    protected function view($name, $data = []) {
        $this->name = $name;
        $this->data = $data;
        require_once '../karnel/views/' . $name . '.php';
    }
    
    protected function header() {
        $header = new Header;
        return $header->header;
    }
    
    protected function footer() {
        $footer = new Footer;
        return $footer->footer;        
    }
    
}
