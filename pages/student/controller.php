<?php

class Student extends Controller {
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view->title = "Welcome to Student System Sample";
        $this->view->description = 'Simple student system sample';
        $this->view->page_title = "Student page";
        $this->view->login="student/login";
        $this->view->render("student/index_view");
    }

    //Login
    public function login(){
        $this->view->page_title = "Login";
        if(isset($_POST['submit'])):            
            $username = isset($_POST['username']) ? $_POST['username'] : NULL;
            $password = isset($_POST['password']) ? $_POST['password'] : NULL;
            $this->model->loginMember( $username, $password);
        endif;
        $this->view->render("student/login_view");        
    }

    public function get_student( $id )
	{
		$this->view->page_title = "Display student";
		$this->view->data = $this->model->getStudent( $id );
		$this->view->render("student/student_view");
	}

    //view all students
    public function view_students(){
        $this->view->page_title = "View Students";
        $this->view->data = $this->model->getStudents();
        $this->view->addStudent="addStudent";
        $this->view->editStudent="editStudent";
        $this->view->viewStudent="";
        $this->view->render("student/students_view");
    }

    //add student
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

    //view update student
    public function editStudent( $id ){
        $this->view->page_title = "Edit Student";        
       
        if(!isset($_POST["save"])):            
            $sql = "SELECT * FROM ".TABLE_STUDENTS." WHERE id=:id";
            
            $this->model->db->select( $sql, $array = array(), $fetch_mode = PDO::FETCH_ASSOC );
            
            $this->view->render("student/editStudent_view");
        else:
            $data = [
                "fname" => isset($_POST['fname']) ? $_POST['fname'] : NULL,
                "lname" => isset($_POST['lname']) ? $_POST['lname'] : NULL,
                "gradeLevel" => isset($_POST['gradeLevel']) ? $_POST['gradeLevel'] : NULL,
            ];           

            $table = "students";
            $where =  "id=:id";
            $this->model->db->update( $table, $data, $where );
            
            header("location:view_students");
        endif;        
    
    }

    //delete student
    public function delete( $id ){
        $this->model->deleteStudent( $id );          
    }


}