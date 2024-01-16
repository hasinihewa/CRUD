<?php
class Pages extends Controller{
    private $pagesModel;
    public function __construct(){
        $this->pagesModel=$this->model('M_Pages');
    }
    public function index(){
        
    }
    public function register(){
            $users= $this->pagesModel->getUsers();
            $data=[
                'users'=>$users
               
            ];
            $this->view('users/v_register',$data);
    }
}
?>