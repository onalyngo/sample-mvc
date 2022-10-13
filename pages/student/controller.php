<?php
class Student extends Controller {
    public function __construct(){
        parent::__construct();
        session_start();
        $this->csrf();
    }

    // index view
    public function index(){
        $this->view->title = "Welcome to Student System Sample";
        $this->view->description = 'Simple student system sample';
        $this->view->page_title = "Student page";
        $this->view->login="student/login";
        $this->view->render("student/index_view");
    }

    // login
    public function login(){
        $this->view->page_title = "Login";
        if(isset($_POST['submit'])):            
            $username = isset($_POST['username']) ? $_POST['username'] : NULL;
            $password = isset($_POST['password']) ? $_POST['password'] : NULL;
            $this->model->loginMember( $username, $password);
        endif;
        $this->view->render("student/login_view");       
    }
   
    //logout
    public function logout_page(){ 
       $this->model->logout();        
       header("location:login");        
    }

    // view all students
    public function view_students(){
        $this->view->page_title = "View Students";
        $this->view->data = $this->model->getStudents();

        if(isset($_POST["del"])):
            header("location: deleteStudent/".$_POST["id"]);
        endif;

        if(isset($_POST["edit"])):
            header("location: editStudent/".$_POST["id"]);
        endif;    

        $this->view->render("student/students_view");
    }

    public function addStudent(){
        $this->view->page_title = "Add Student";       
        
        if(isset($_POST["submit"])):
            $data = [
                "fname" => isset($_POST['fname']) ? $_POST['fname'] : NULL,
                "lname" => isset($_POST['lname']) ? $_POST['lname'] : NULL,
                "gradeLevel" => isset($_POST['gradeLevel']) ? $_POST['gradeLevel'] : NULL,
            ];         
            $table = "students";
            $this->model->db->insert( $table, $data );
            header("location:view_students");
        endif;
        $this->view->render("student/addStudent_view");
    }

    
    public function editStudent( $id ){
        $this->view->page_title = "Edit Student";        
       
        if(!isset($_POST["save"])):
            $this->view->data = $this->model->getStudent($id);
            $this->view->render("student/editStudent_view");
        else:
            $data = [
                "fname" => isset($_POST['fname']) ? $_POST['fname'] : NULL,
                "lname" => isset($_POST['lname']) ? $_POST['lname'] : NULL,
                "gradeLevel" => isset($_POST['gradeLevel']) ? $_POST['gradeLevel'] : NULL
            ];           

            $table = "students";
            $where =  "id = ". $id;

            $this->model->db->update( $table, $data, $where );
            header("location:../view_students");
        endif;        
    }

    public function deleteStudent($id){
        $table = "students";
        $delID = "id = ". $id;
        $this->model->db->delete($table, $delID);
        header("location:../view_students"); 
    }

    //csrf validation
    public function csrf(){
        $url = $_SERVER['REQUEST_URI'];
        if(!isset($_SESSION["CSRF_TOKEN"]) && $url != "/mvc/student/login"):
           header("location:../login");
        else:
            if(isset($_POST["csrf"])):
                if($_SESSION["CSRF_TOKEN"] != $_POST["csrf"]):
                   header("HTTP/1.0 404 Not Found"); 
                   exit;                  
                endif;
            endif;
        endif;
    }
}