<?php
//favourite module
if (!isset($_SESSION)) session_start();
include_once('model/favourite.php');
class fav_controller
{
var $bil=2;
var $rows=0;
var $fav = array();
public function __construct()  {}

public function main()
{
	//class function
	
	$function = array();
	$function[0][0] = "getfavouritelist";  //name of the function
	$function[0][1] = "true";  //return of a function as a variable
	$function[1][0] = "get_fav_rows";  //name of the function
	$function[1][1] = "true";  //return of a function as a variable

	return $function;
}
public function get_num_func()
{	
	return $this->bil;
}
//user define view
public function view()
{
	//user define view file
	return "fav.php";
}
public function view_option()
{
	//include user define view or replace default view
	//option included, excluded
	return "included";
}
public function getfavouritelist()
{
	$this->favourite = new favourite();
	//$this->favourite ->create_list_stock();
	$lastrows = $this->favourite->get_row();
	$this->favourite->sum_rows($lastrows);
	$this->fav = $this->favourite->get_favourite($_SESSION['userid']);
	$this->rows = $this->favourite->get_favouriterow();
	//return $this->rows;
	return $this->fav;
}

public function get_fav_rows()
{
	return $this->rows;
}







}
?>