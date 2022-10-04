<?php

class members_Model extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function loginMembers($user, $pass)
	{
		$query = $this->db->prepare("SELECT * FROM ".TABLE_MEMBERS." WHERE username = :username AND password = :password");
		$query->execute( 
            [
                "username" => $user,
                "password" => $pass        
            ]
        );

		if( $query->rowCount()>0 ):
            $query->fetchAll();
            session_start();
            
            header("location:view_members");            			           
        else:
              echo "<div class='alert alert-danger px-5'>
                        <strong>Incorrect! username or password</strong>
                    </div>";
		endif;     
	}

    //view all members
    public function getMembers()
	{
		$query = $this->db->prepare("SELECT * FROM ".TABLE_MEMBERS);
		$query->execute();
        return $query->fetchAll();
	}

    //delete action
    public function delMember( $del )
	{
		$query = $this->db->prepare("DELETE FROM ".TABLE_MEMBERS." WHERE member_id = ".$del);
		$query->execute();
        header("location:../view_members");       
	}

    //update view action
    public function viewSelectMember($id)
	{
        $query = $this->db->prepare("SELECT * FROM ".TABLE_MEMBERS." WHERE member_id = :id");
		$query->execute(
            [
                "id" => $id
            ]
        );        
        
        if( $query->rowCount()>0 ):
            return $query->fetch();
        endif;
       
	}

    //update action
    public function updateMember($data, $id)
	{
        $sqlUpdate = "UPDATE ".TABLE_MEMBERS." SET ";
        $counter = 0;

        foreach($data as $key => $value):
            $counter++;

            if($counter == count($data)):               
           
                $sqlUpdate .= $key. " = '" .$value. "' WHERE member_id = ".$id;
                break;
            endif;

			$sqlUpdate .= $key. " = '" .$value. "', ";            
            
		endforeach;
        
        //echo $sqlUpdate;

		$query = $this->db->prepare($sqlUpdate);        
		$query->execute();       
       
	}

    //insert action
    public function addMember($data)
	{
        $sqlInsert = "INSERT INTO ".TABLE_MEMBERS;
        $col = " (";
        $val = "";
        $counter = 0;

        foreach($data as $key => $value):
            $counter++;
            

            if($counter == count($data)):               
           
                $col .= $key.")";             
                $val .= "'".$value."'";
                $sqlInsert .= $col. " VALUES (".$val.")";
                break;
            endif;

            $col .= $key.", ";             
            $val .= "'".$value."',";			
            
		endforeach;
        
        echo $sqlInsert;

		$query = $this->db->prepare($sqlInsert);        
		$query->execute();       
       
	}

}