<?php namespace Karnel;

use Controller\Home as Home;

class Url extends Parse
{
    /** @var Singleton Reference to singleton class instance. */
    private static $instance;
    
    protected $controller;
    protected $method;
    protected $args = [];
    
    /**
     * Private constructor ensures the class can be initialized only from
     * this Url class itself.
     */

    private function __construct() {
        
        $url = $this->parsingURL();
        
        $this->controller = $url[0];
        $this->method = $url[1];
        $this->args = $url[2];
        
        if(file_exists($this->controller)){
            
            $home = new Home;
            $home->$this->method($this->args);
            
            $this->args = $url? array_values($url): [];
        
            call_user_func_array([ucwords($this->controller), $this->method], $this->args);
            
        }
        
    }
    
    /**
     * Get a singleton class instance with lazy initialization only on first
     * call. Client code can therefore use only this accessor method to
     * manipulate the singleton.
     *
     * @return Singleton
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @throws Exception to prevent cloning object.
     */
    public function __clone()
    {
        throw new Exception('You cannot clone url object');
    }
}