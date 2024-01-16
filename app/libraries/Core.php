<?php


class Core {
    // URL-FORMAT--> /controller/method/parameterlist
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
        // print_r($this->getURL());
        $url=$this->getURL();
        if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
            $this->currentController=ucwords($url[0]);//load if the controller exist.
            
            //remove controller-part from the url
            unset($url[0]);
            
            //call the controller
            require_once '../app/controllers/'.$this->currentController.'.php';
            
            //instantiate the controller class
            $this->currentController = new $this->currentController;
            
            if(isset($url[1])){
                if(method_exists($this->currentController,$url[1])){
                    $this->currentMethod = $url[1];
                    unset($url[1]);
               }
            //    echo $this->currentMethod;
               //get para list
               $this->params=$url ? array_values($url) : [];
            
               //call method and pass para list
               call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
            }
        
        }
    }
    public function getURL(){
        if (isset($_GET['url'])) {//if url is specified, triming the data from the coresponding controllers.
            $url = rtrim($_GET['url'],'/');//remove '/'.
            $url = filter_var($url,FILTER_SANITIZE_URL);//This  removes all un nessasary characters.
            $url = explode('/',$url);// It breaks the string into an array of substrings,that sep by '/'.

 
           return $url; 
        }    }
    
    
    }?>