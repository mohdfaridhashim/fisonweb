<?php
//class active
include_once 'model/fullnews.php';
class fullnews_controller
{
var $bil =1;
var $row;
//constructor
public function __construct()  {$this->fullnews = new fullnews();}

public function main()
{
	//class function
	$function = array();
	$function[0][0] = "get_full_news";  //name of the function
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
	return "fullnews.php";
}
public function view_option()
{
	//include user define view or replace default view
	//option included, excluded
	return "excluded";
}

public function get_full_news()
{
	if(isset($_GET['newsid'])
	{
	$this->fullnews->set_news("http://10.10.0.100/Xml/Bernama.xml","Bernama","11");

	return $this->news->get_news();
}




//end class
}
?>