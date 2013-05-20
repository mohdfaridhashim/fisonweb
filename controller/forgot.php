<?php
if (!isset($_SESSION)) session_start();
include_once('model/user.php');
class forgot_controller
{
//number of method
var $bil=1;
public $user;

public function __construct()  {
	$this->user = new user();
	}

public function main()
{
	//class function
	
	$function = array();
	$function[0][0] = "getdetail";  //name of the function
	$function[0][1] = "true";  //return of a function as a variable
	return $function;
}
//get number of function
public function get_num_func()
{	
	return $this->bil;
}
//user define view
public function view()
{
	//user define view file
	return "forgot.php";
}
public function view_option()
{
	//include user define view or replace default view
	//option included, excluded
	return "excluded";
}
//display user detail
public function getdetail()
{
		$detail = array();
		if(isset($_SESSION['userid']))
		{
		$userid = $_SESSION['userid'];
		$detail = $this->user->user_detail($userid);
		array_push($detail,$this->user->last_login($userid));
		}
		return $detail;
		//include('view/detail.php');
}

}

?>