<?php
//this is the default class controller 
//it will auto run on 
//call the model
include_once 'model/scoreboard.php';

class home_controller
{
var $bil=1;
public $scoreboard;
public $ticker;
public function __construct()  {
	$this->scoreboard = new scoreboard();
	}

public function main()
{
	//class function

	$function = array();
	$function[0][0] = "getallcounter";  //name of the function
	$function[0][1] = "true";  //return of a function as a variable

	return $function;
}
public function get_num_func()
{	
	return $this->bil;
}
public function getallcounter()
{
	//$this->scoreboard->create_list_stock();
	return $this->scoreboard->get_liststock();
}
//user define view
public function view()
{
	//user define view file
	return "table.php";
}
public function view_option()
{
	//include user define view or replace default view
	//option included, excluded
	return "excluded";
}
















}



?>