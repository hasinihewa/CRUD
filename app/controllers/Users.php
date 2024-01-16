<?php
class Users extends Controller{
    private $userModel;
    public function __construct(){
        $this->userModel=$this->model('M_Users');
    }
    
    public function login(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //form is submitting
            $_POST= filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                'email'=>trim($_POST['email']),
                'password'=>trim($_POST['password']),

                'email_err'=>'',
                'password_err'=>'',


            ];
            //validate the email
            if(empty($data['email'])) {
                $data['email_err']='Please enter the email';
            }
            else{
                //check already exist
                if($this->userModel->findUserByEmail($data['email'])){
                    // $data['email_err']='Email is already exist';

                }
                else{
                    $data['email_err']='User Not Found';

                }

            }
            //validate password
            if(empty($data['password'])){
                $data['password_err']="Password can not be empty";
            }
            //if no error found then log in the user
            if(empty($data['email_err'])&&empty($data['password_err'])){
                //log the user
                // $loggeduser=$this->userModel->login($data['email'],$data['password']);
                // if($loggeduser){
                //     //user is authendicated
                //     //create user session
                //     // die('Access granted');
                //     $this->view('users/v_dashboard',$data);


                // }
                // else{
                //     $data['password_err']='Password Incorrect';

                //     //load view errors
                //     $this->view('users/v_login',$data);

                // }
                $loggeduser = $this->userModel->login($data['email'], $data['password']);
                if ($loggeduser) {
                    $this->createUserSession($loggeduser);

                }
              
                else {
                $data['password_err'] = 'Password Incorrect';
                // Load view with errors
                $this->view('users/v_login', $data);
                }
                } 
                else {
                // $data['email_err'] = 'User Not Found';
                // Load view with errors
                $this->view('users/v_login', $data);
                }

            }
        


        
        else{
            $data=[
                'email'=>'',
                'password'=>'',

                'email_err'=>'',
                'password_err'=>'',


            ];
        //load view
        $this->view('users/v_login',$data);
        }
    }
    // public function profile(){
    //     $this->view('users/v_profile');


    // }
    public function profile(){
        $users= $this->userModel->getUsers();
        $data=[
            'users'=>$users
           
        ];
        $this->view('users/v_profile',$data);
}
    public function register(){
        
            if($_SERVER['REQUEST_METHOD']=='POST'){
                //form is submitting
                //validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
               
                //input data
                $data=[
                    'name'=>trim($_POST['name']),
                    'age'=>trim($_POST['age']),
                    'email'=>trim($_POST['email']),
                    'phonenumber'=>trim($_POST['phonenumber']),
                    'password'=>trim($_POST['password']),
                    'confirm_password'=>trim($_POST['confirm_password']),

                 

                    'name_err'=>'',
                    'age_err'=>'',
                    'email_err'=>'',
                    'phonenumber_err'=>'',
                    'password_err'=>'',
                    'confirm_password_err'=>''


                ];
                //validate each input
                //validate name
                if(empty($data['name'])) {
                    $data['name_err']='Please enter a name';
                }
                //validate age
                if(empty($data['age'])) {
                    $data['age_err']='Please enter a age';
                }
                //validate email
                if(empty($data['email'])) {
                    $data['email_err']='Please enter a email';
                }
                else{
                    //check already exist
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err']='Email is already exist';
 
                    }

                }
                //validate phonenumber
                if(empty($data['phonenumber'])) {
                    $data['phonenumber_err']='Please enter the phone number';
                }
                //validate password
                if(empty($data['password'])) {
                    $data['password_err']='Please enter a password ';
                }
                else if(empty($data['confirm_password'])) {
                    $data['confirm_password_err']='Please confirm the password ';
                }
                else{
                    if($data['password']!=$data['confirm_password']) {
                    $data['confirm_password_err']='Passwords are not matched';
                }}
               


//if all fields are valid then save user to database
if (empty($data['name_err']) && empty($data['age_err']) && empty($data['email_err']) && empty($data['phonenumber_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
    //hash password 
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

    // Check again if the email already exists
    if ($this->userModel->findUserByEmail($data['email'])) {
        $data['email_err'] = 'Email is already in use';
        // load the view again
        $this->view('users/v_register', $data);
    } else {
        //register the user
        if ($this->userModel->register($data)) {
            // die('User is registered');
            redirect('Users/login');

        } else {
            die('Something went wrong');
        }
    }
} else {
    //load the view again
    $this->view('users/v_register', $data);
}

                
            }
            else{
                $data=[
                    'name'=>'',
                    'age'=>'',
                    'email'=>'',
                    'phonenumber'=>'',
                    'password'=>'',
                    'confirm_password'=>'',

                    'name_err'=>'',
                    'age_err'=>'',
                    'email_err'=>'',
                    'phonenumber_err'=>'',
                    'password_err'=>'',
                    'confirm_password_err'=>''


                ];
                //load view
                $this->view('users/v_register',$data);
            }
    }   
    
    public function dashboard(){
        $data=[];
        $this->view('users/v_dashboard',$data);

        
    }
    // public function dashboard(){
    //     $posts=$this->postsModel->getPosts();
    //     $data=[
    //         'posts'=>$posts
    //     ];
    //     $this->view('users/v_dashboard',$data);

        
    // }
    public function createUserSession($user){
        $_SESSION['user_id']=$user->id;

        $_SESSION['user_email']=$user->email;
        $_SESSION['user_name']=$user->name;
        $_SESSION['user_age']=$user->age;
        $_SESSION['user_phonenumber']= $user->phonenumber;
        $_SESSION['user_date']= $user->creat_at;

        redirect('Posts/dashboard');       
             }
            //  public function createPostSession($post){
            //     $_SESSION['post_title']=$post->title;
        
            //     $_SESSION['post_body']=$post->body;
               
            //     redirect('Posts/dashboard');       
            //          }
    public function logout(){
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_age']);
        unset($_SESSION['user_phonenumber']);

        session_destroy();
        redirect('User/login');
    } 
    public function isLoggedIn(){
        if(isset($_SESSION['user_email'])){
            return true;
        }
        else{
            return false;
        }
    }

    
     public function edit(){
        $this->view('posts/v_edit');

     }
    //     if($_SERVER['REQUEST_METHOD']=='POST'){
    //         //form is submitting
    //         //validate the data
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
           
    //         //input data
    //         $data=[
    //             'name'=>trim($_POST['name']),
    //             'age'=>trim($_POST['age']),
    //             'email'=>trim($_POST['email']),
    //             'phonenumber'=>trim($_POST['phonenumber']),
               

    //             'name_err'=>'',
    //             'age_err'=>'',
    //             'email_err'=>'',
    //             'phonenumber_err'=>'',
                

    //         ];
    //         if(empty($data['name'])) {
    //             $data['name_err']='Please enter a name';
    //         }
    //         //validate age
    //         if(empty($data['age'])) {
    //             $data['age_err']='Please enter a age';
    //         }
    //         //validate email
    //         if(empty($data['email'])) {
    //             $data['email_err']='Please enter a email';
    //         }
    //         else{
    //             //check already exist
    //             if($this->userModel->findUserByEmail($data['email'])){
    //                 $data['email_err']='Email is already exist';

    //             }

    //         }
    //         //validate phonenumber
    //         if(empty($data['phonenumber'])) {
    //             $data['phonenumber_err']='Please enter the phone number';
    //         }
    //         if (empty($data['name_err']) && empty($data['age_err']) && empty($data['email_err']) && empty($data['phonenumber_err'])) {
                
    //             // Check again if the email already exists
    //             if ($this->userModel->edit($data)) {
    //                 // load the view again
    //                 $this->view('users/v_edit', $data);
    //             } 
    //             else {
    //                     die('Something went wrong');
    //                 }
                
    //         } 
    //         else {
    //             //load the view again
    //             $this->view('users/v_edit', $data);
    //         }
            
                            
    //                     }
    //                     else{
    //                         $data=[
    //                             'name'=>'',
    //                             'age'=>'',
    //                             'email'=>'',
    //                             'phonenumber'=>'',
                              
            
    //                             'name_err'=>'',
    //                             'age_err'=>'',
    //                             'email_err'=>'',
    //                             'phonenumber_err'=>'',
                               
            
            
    //                         ];
    //                         //load view
    //                         $this->view('users/v_edit',$data);
    //                     }
    //             }  
    }


?>