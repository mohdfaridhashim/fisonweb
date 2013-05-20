<?php
//add and delete to favourite
//favourite module
if (!isset($_SESSION)) session_start();
include_once('model/favourite.php');
class andfav_controller
{
var $bil=1;
var $rows;
public function __construct()  {
	$this->favourite = new favourite();
	}

public function main()
{
	//class function
	
	$function = array();
	$function[0][0] = "adtofav";  //name of the function
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
	return "addtofav.php";
}
public function view_option()
{
	//include user define view or replace default view
	//option included, excluded
	return "excluded";
}

public function adtofav()
{
	 $kira = $this->favourite->count_favourite($_SESSION['userid']);
	 if($kira < 20)
	 {
	 	$no = $this->favourite->searchfavourite($_SESSION['userid'],$_GET['com']);
	 	if($no >= 1)
		{
		$message = $_GET['com']." has already in your favourite list";
		}
		else
		{
		$message = $this->favourite->addtofavourite($_SESSION['userid'],$_GET['com']);
		}
	 }
	 else
	 {
	 $message = "You have exceed maximum number of favourites.";
	 }
	 return $message;
}

}
?>