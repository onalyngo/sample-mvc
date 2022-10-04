<?php
class Main_Model extends Model{

	public function __construct(){
		parent::__construct();
	}

	public function getMembers( $id )
	{
		$query = $this->db->prepare("SELECT * FROM ".TABLE_MEMBERS." WHERE id=:id" );
		$query->execute(
			[
				"id" => $id
			]
		);

		if( $query->rowCount()>0 ):
			// echo $query;
			return $query->fetchAll();
		endif;
	}
}