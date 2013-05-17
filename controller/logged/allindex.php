<?php
include_once 'model/allindex.php';
class allindex_controller
{

var $bil=2;
var $row;
public $allindex;
public function __construct()  { $this->allindex = new allindex();  }

public function main()
{
	//class function
	$function = array();
	$function[0][0] = "get_allindex";  //name of the function
	$function[0][1] = "true";  //return of a function as a variable
	$function[1][0] = "get_rows";  //name of the function
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
	return "allindex.php";
}
public function view_option()
{
	//include user define view or replace default view
	//option included, excluded
	return "included";
}
//user define method
public function get_allindex()
{
	
	$this->allindex->set_index();
	$this->row = $this->allindex->get_row_index();
	return $this->allindex->get_index();
}
public function get_rows()
{
	return $this->row;
}




}
?>