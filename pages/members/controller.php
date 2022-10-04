<?php

class members extends Controller{

    public function __construct()
    {
        parent::__construct();
        
    }   
   
    //Login
    public function login(){
        $this->view->page_title = "Login";
        if(isset($_POST['submit'])):            
            $user = isset($_POST['username']) ? $_POST['username'] : NULL;
            $pass = isset($_POST['password']) ? $_POST['password'] : NULL;
            $this->model->loginMembers( $user, $pass );
        endif;
        $this->view->render("members/login_view");        
    }

    //view all members
    public function view_members(){
        $this->view->page_title = "View Members";
        $this->view->data = $this->model->getMembers();
      
        if(isset($_POST["del"])):            
            header("location:delete/".$_POST["id_member"]);
        endif;

        if(isset($_POST["edit"])):
            header("location:update_view/".$_POST["id_member"]);
        endif;

        $this->view->render("members/members_view");
    }

    //delete members
    public function delete( $del_id ){

        $this->model->delMember( $del_id );          
        

    }

    //view update member
    public function update_view( $edit_id ){
        $this->view->page_title = "Update Member";        
       
        if(!isset($_POST["update"])):            
            $this->view->data = $this->model->viewSelectMember( $edit_id );           
            $this->view->render("members/update_view");
        else:
            $data = [

                "fname" => isset($_POST['fname']) ? $_POST['fname'] : NULL,
                "lname" => isset($_POST['lname']) ? $_POST['lname'] : NULL,
                "username" => isset($_POST['username']) ? $_POST['username'] : NULL,
                "password" => isset($_POST['password1']) ? md5($_POST['password1']) : NULL,
                "remarks" => isset($_POST['remarks']) ? $_POST['remarks'] : NULL
            ];           

            $id = isset($_POST['id']) ? $_POST['id'] : NULL;
            $this->model->updateMember( $data, $id ); 
            header("location:../view_members");
        endif;        
    
    }

    //add member
    public function add_member(){
        $this->view->page_title = "Add Member";       
       
        if(isset($_POST["submit"])):
            $data = [

                "fname" => isset($_POST['fname']) ? $_POST['fname'] : NULL,
                "lname" => isset($_POST['lname']) ? $_POST['lname'] : NULL,
                "username" => isset($_POST['username']) ? $_POST['username'] : NULL,
                "password" => isset($_POST['password1']) ? md5($_POST['password1']) : NULL,
                "remarks" => isset($_POST['remarks']) ? $_POST['remarks'] : NULL
    
            ];         
    
            $this->model->addMember( $data );         
            header("location:view_members");
       
        endif;
        
        $this->view->render("members/add_member_view");
    
    }

}


