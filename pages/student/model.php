<?php

class Student_Model extends Model{
    public function __construct(){
        parent::__construct();

    }
    
    public function loginMember($username, $password){
		$query = $this->db->prepare("SELECT * FROM ".TABLE_MEMBERS." WHERE username = :username AND password = :password");
		$query->execute( 
            [
                "username" => $username,
                "password" => $password        
            ]
        );
		if( $query->rowCount()>0 ):
            $query->fetchAll();	
            session_start();
                $_SESSION["CSRF_TOKEN"] = md5(uniqid().date("Y-m-d H:i:s"));
                header("location:view_students");
        else:
            echo "<div class='alert alert-danger px-5 text-center'>
                    Incorrect username or password. Please input the correct username and password.
                </div>";
		endif;     
	}

    public function getStudent( $id ){
		$query = $this->db->prepare("SELECT * FROM ".TABLE_STUDENTS." WHERE id=:id" );
		$query->execute(
			[
				"id" => $id
			]
		);

		if( $query->rowCount()>0 ):
			return $query->fetch(PDO::FETCH_ASSOC);
		endif;
	}

    public function getStudents(){
		$query = $this->db->prepare("SELECT * FROM ".TABLE_STUDENTS );
		$query->execute();
		if( $query->rowCount()>0 ):
			return $query->fetchAll();
		endif;
	}

    public function selectStudent($id){
        $query = $this->db->prepare("SELECT * FROM ".TABLE_STUDENTS." WHERE member_id = :id");
		$query->execute(
            [
                "id" => $id
            ]
        );        
        if( $query->rowCount()>0 ):
            return $query->fetch();
        endif;
	}
    
    public function deleteStudent( $del ){
		$query = $this->db->prepare("DELETE FROM ".TABLE_STUDENTS." WHERE id = ".$del);
		$query->execute();
        header("location:view_students");       
	}
}