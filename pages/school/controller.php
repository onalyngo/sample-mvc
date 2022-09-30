<?php

class School extends Controller {
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        // echo "hello";

        // $this->view->yourIP = $_SERVER["REMOTE_ADDR"];
        $this->view->name = "Onalyn";
        $this->view->page_title = "School page";
        $this->view->render("school/index_view");

        
    }


    public function kape(){
        echo "kape tayo";
    }




}