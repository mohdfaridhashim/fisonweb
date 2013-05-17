<?php
//logout
if (!isset($_SESSION)) session_start();
include_once('model/user.php');
class logout_controller
{
var $bil = 1;

public function __construct()  {
	$this->user = new user();
	}
	
public function main()
{
	//class function
	$function = array();
	$function[0][0] = "dologout";  //name of the function
	$function[0][1] = "false";  //return of a function as a variable

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
	return "false";
}
public function view_option()
{
	//include user define view or replace default view
	//option included, excluded
	return "excluded";
}
public function dologout()
{
	$this->user->reg_logout_trail();
	$this->user->remove_currentsession();
	session_destroy();
	?>
	<script language="javascript" type="text/javascript">
	window.location.href="index.php?watch=home";
	</script>
	<?php
}
}