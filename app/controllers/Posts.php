<?php
class Posts extends Controller{
    private $postsModel;
    public function __construct(){
        $this->postsModel=$this->model('M_Posts');

    }
   
    public function create(){
         if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
           
            //input data
            $data=[
                'title'=>trim($_POST['title']),
                'body'=>trim($_POST['body']),
                

             

                'title_err'=>'',
                'body_err'=>''

            ];
            
            if(empty($data['title'])) {
                $data['title_err']='Please enter the title';
            }
            
            if(empty($data['body'])) {
                $data['body_err']='Please enter the description';
            }
            if(empty($data['title_err'])&&empty($data['body_err'])){
                if($this->postsModel->create($data)){
                    // flash('post_created');
                    redirect('Posts/dashboard');
                }
                else{
                    die('Somthing went wrong');
                }
            }
            else{
                //load view
                $this->view('posts/v_create',$data);
                       
            }
          }
          else{
                      $data=[
                          'title'=>'',
                          'body'=>'',
                            
            
                             'title_err'=>'',
                             'body_err'=>''
                            
            
                         ];
                         //load view
                         $this->view('posts/v_create',$data);
                       
                     }}
    public function edit($postId){
                        if($_SERVER['REQUEST_METHOD']=='POST'){
                           $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                          
                           //input data
                           $data=[
                               'post_id'=>$postId,
                               'title'=>trim($_POST['title']),
                               'body'=>trim($_POST['body']),
                               
               
                            
               
                               'title_err'=>'',
                               'body_err'=>''
               
                           ];
                           
                           if(empty($data['title'])) {
                               $data['title_err']='Please enter the title';
                           }
                           
                           if(empty($data['body'])) {
                               $data['body_err']='Please enter the description';
                           }
                           if(empty($data['title_err'])&&empty($data['body_err'])){
                               if($this->postsModel->edit($data)){
                                   // flash('post_created');
                                   redirect('Posts/dashboard');
                               }
                               else{
                                   die('Somthing went wrong');
                               }
                           }
                           else{
                               //load view
                               $this->view('posts/v_edit',$data);
                                      
                           }
                         }
                         else{
                            $post=$this->postsModel->getPostById($postId);
                            if($post->user_id != $_SESSION['user_id']){
                                redirect('Posts/v_dashboard');
                            }
                                     $data=[
                                         'post_id'=>$postId,
                                         'title'=>$post->title,
                                         'body'=>$post->body,
                                           
                           
                                            'title_err'=>'',
                                            'body_err'=>''
                                           
                           
                                        ];
                                        //load view
                                        $this->view('posts/v_edit',$data);
                                      
                                    }}
           public function retrive(){
                        $users= $this->postsModel->getUsers();
                        $data=[
                            'users'=>$users
                           
                        ];
                        $this->view('users/v_retrive',$data);
                } 
                
                
                public function dashboard(){
                    $posts=$this->postsModel->getPosts();
                    $data=[
                        'posts'=>$posts
                    ];
                    $this->view('users/v_dashboard',$data);
            
                    
                }
             public function delete($postId){
                    $post=$this->postsModel->getPostById($postId);
                    if($post->user_id != $_SESSION['user_id']){
                        redirect('Posts/dashboard');
                    }else{
                    if($this->postsModel->delete($postId)){
                        redirect('Posts/dashboard');

                    }
                    else{
                        die('somthing wrong');
                    }}

              

             }

    
}
?>