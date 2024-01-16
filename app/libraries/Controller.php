<?php
   class Controller{
    //to load the model
    public function model($model){
         require_once '../app/models/'.$model.'.php';
         return new $model();//instanttiate the model and pass it to controller variable.
        }
    //to load the view(entire content)
    public function view($view,$data=[]){
        if(file_exists('../app/views/'.$view.'.php')){
        require_once '../app/views/'.$view.'.php';
        //  return new $view();//instanttiate the view and pass it to controller variable.
      
        }
        else{
            die ('not existing corresponding view');
        }
    } 
   }
?>