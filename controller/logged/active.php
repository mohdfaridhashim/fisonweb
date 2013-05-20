<?php
//class active
include_once 'model/ticker.php';
class active_controller
{
var $bil = 2;
var $row;
public function __construct()  {$this->active = new ticker();}

public function main()
{
	//class function
	$function = array();
	$function[0][0] = "get_active";  //name of the function
	$function[0][1] = "true";  //return of a function as a variable
	$function[1][0] = "get_row";  //name of the function
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
	return "activesnew.php";
}
public function view_option()
{
	//include user define view or replace default view
	//option included, excluded
	return "excluded";
}

public function get_active()
{
	
	$this->active->set_allcounter();
	//$this->active->create_list_stock();
	$this->row=$this->active->get_row_allc();
	return $this->active->get_top_actives();

}
public function get_row()
{
	return $this->row;
}
}
?>