<?php namespace Karnel;

use Contracts\ParsingUrlInterface as ParsingUrlInterface;

class Parse implements ParsingUrlInterface
{
    use \Behave\CheckingBehaviours;
    
    public function parsingURL() {
        
        if(isset($_GET['url'])){
            /* 
             * we want to get a combination of controller/method in array
             * we can also pass any number of arguments through that method
             */
            $combination = filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);
            $splitURL = explode('/', $combination);
            return $splitURL;
        }
        
    }
}