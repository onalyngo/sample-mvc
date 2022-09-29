<?php

class Main extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//$this->view->js = [ "main/js/default.js" ];
		$this->view->css = [ "main/css/styles.css" ];

		$this->view->name = "Chris";
		$this->view->page_title = "Main Page!";
		$this->view->render("main/index_view");
	}

	public function hello()
	{
		echo "hello world!";
	}

	public function get_member( $id )
	{
		$this->view->page_title = "Display member";
		$this->view->data = $this->model->getMembers( $id );
		$this->view->render("main/member_view");
	}

	public function get_id( $param )
	{
		$this->view->id = $param;
		$this->view->page_title = "Tahimik si JV";
		$this->view->render("main/parameter_view");
	}
}
