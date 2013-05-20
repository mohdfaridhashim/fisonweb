<?php
//this is the default class controller 
//it will auto run on 
//call the model
include_once 'model/allcounters.php';
class allc_controller
{
var $bil=2;
public $scoreboard;
public $ticker;
public function __construct()  {
	//$this->scoreboard = new scoreboard();
	$this->all = new allcounters();
	$this->all->set_allcounter();
	}

public function main()
{
	//class function

	$function = array();
	$function[0][0] = "getallcounter";  //name of the function
	$function[0][1] = "true";  //return of a function as a variable
	$function[1][0] = "get_rows";  //name of the function
	$function[1][1] = "true";  //return of a function as a variable
	return $function;
}
public function get_num_func()
{	
	return $this->bil;
}
public function view_option()
{
	//include user define view or replace default view
	//option included, excluded
	return "excluded";
}
//user define view
public function view()
{
	//user define view file
	return "allc.php";
}
public function get_rows()
{
	//$this->scoreboard->create_list_stock();
	return $this->all->get_row_allc();
}

public function getallcounter()
{
	//$this->scoreboard->create_list_stock();
	
	return $this->all->get_allc();
}


















}



?>