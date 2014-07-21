<?php

//session_start();

require_once "libraries/constants.php";
require_once "libraries/dbconnections.php";
require_once "libraries/functions.php";
require_once "models/model.php";

@$page = $_GET['page'];

if(empty($page)){
	FUNCTIONS::get()->controller('get_app_list.php');
	//FUNCTIONS::get()->view('app_list_view.php');
}else{		
	FUNCTIONS::get()->controller($page.'.php');	
}
