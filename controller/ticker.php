<?php
//this is the default class controller 
//it will auto run on 
//call the model
include_once 'model/ticker.php';
class ticker_controller
{
var $bil=1;
public $ticker;
public function __construct()  {$this->ticker = new ticker();}

public function main()
{
	//class function
	$this->ticker->set_allcounter();
	$function = array();
	$function[0][0] = "get_ticker";  //name of the function
	$function[0][1] = "true";  //return of a function as a variable

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
	return "ticker.php";
}
public function view_option()
{
	//include user define view or replace default view
	//option included, excluded
	return "excluded";
}

public function get_ticker()
{
	
	//$this->ticker->create_list_stock();
	
	
	if(isset($_GET['tick']))
	{
	if($_GET['tick'] == "active")
	{
	return $this->ticker->get_top_actives();
	}
	else if($_GET['tick'] == "gain")
	{
	return $this->ticker->get_top_gainer();
	}
	else if($_GET['tick'] == "lose")
	{
	return $this->ticker->get_top_loser();
	}
	else
	{
	return $this->ticker->get_top_actives();
	}
	}
	else
	{
	return $this->ticker->get_top_actives();
	}
}
//end clASS
}
?>