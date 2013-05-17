<?php
if (!isset($_SESSION)) session_start();
include_once('model/user.php');
//login controller
class login_controller
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
	$function[0][0] = "dologin";  //name of the function
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
	return "false";
}
public function view_option()
{
	//include user define view or replace default view
	//option included, excluded
	return "included";
}
public function dologin()
{
	$this->user = new user();
	$result = $this->user->getlogin();
	
	if($result == 'invalid')
	{
		return $message = "Invalid username and password";
	}
	else if($result == 'undefined')
	{
		return $message = "Please insert username and password";
	}
	else
	{
	$_SESSION['userid'] = $result;
	$this->user->reg_login_trail();
	$this->user->reg_currentsession();
	//return $_SESSION['userid'];
			?>
			<script language="javascript" type="text/javascript">
			window.location.href="index.php?watch=home";
			</script>
			<?php	
	}
}







}


?>