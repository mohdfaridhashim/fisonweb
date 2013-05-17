<?php
//user model
class user
{
//attribute
 var $username;
 var $password;
 var $userlevel;

public function set_user($username,$password)
{
	//set the user variable first
	$this->username = $username;
	$this->password = $password;
	
}

public function getlogin()
{	
	//call db class
	require_once("db.php");
 	
	$db = new Database();
	
	if(isset($_POST['username']) && isset($_POST['password']))
	{
	//initialize index to zero.
	//this index is important to define number of rows if the data exist
	$index = 0;
	$username = $_POST['username'];
	$password = $_POST['password'];
	//to make sure the string is valid
	//to avoid sql injection
	//$who = mysql_real_escape_string($username);
    //$pass = mysql_real_escape_string($password);
	$who = $username;
	$pass = $password;
	//sql query
	$sql = "SELECT userid from user where username='$who' and password = '$pass'";
	//query the sql statement
	$db->query($sql);
	$index = $db->numRows();
		//validate
		if($index == 1)
		{
			$db->singleRecord();
			return $db->Record['userid'];
		}
		else
		{
			return 'invalid';
		}
	
	}
	else
	{
		return 'undefined';
	}	
}

public function user_detail($userid)
{
	//CLIENT USER DETAIL
	//call db class
	require_once("db.php");
 	
	$db = new Database();
	$detail = array();
	//initialize index to zero.
	//this index is important to define number of rows if the data exist
	$index = 0;

	//sql query
	$sql = "SELECT username,email,fname,lname,address,phone,mobile,office,company from user where userid='$userid'";
	//query the sql statement
	$db->query($sql);
	$db->singleRecord();
	$detail[0] = $db->Record['username'];
	$detail[1] = $db->Record['email'];
	$detail[2] = $db->Record['fname'];
	$detail[3] = $db->Record['lname'];
	$detail[4] = $db->Record['address'];
	$detail[5] = $db->Record['phone'];
	$detail[6] = $db->Record['mobile'];
	$detail[7] = $db->Record['office'];
	$detail[8] = $db->Record['company'];
	
	return $detail;
	
}

public function last_login($userid)
{
	//CLIENT login trail
	//call db class
	require_once("db.php");
 	
	$db = new Database();
	$trail = array();
	$client = $_SERVER['REMOTE_ADDR'];
	//initialize index to zero.
	//this index is important to define number of rows if the data exist
	$index = 0;
	//sql query
	//$sql = "SELECT last_login from login_trail where userid='$userid' and detail='login' order by id desc limit 1";
		$sql = "SELECT last_login from login_trail where ip='$client' and detail='login' order by id desc limit 1";
	//query the sql statement
	$db->query($sql);
	$db->singleRecord();
	$trail[0] = $db->Record['last_login'];

	
	return $trail;
}

public function reg_login_trail()
{
	//CLIENT login trail
	//register new trail
	//call db class
	require_once("db.php");
 	
	$db = new Database();
	//sql query
	$client = $_SERVER['REMOTE_ADDR'];
	$clientsession  = session_id(); 
	$id = $_SESSION['userid'];
	$check = "set foreign_key_checks=0";
	$db->query($check);
	$sql = "insert into login_trail(userid,last_login,ip,user_session,detail) values('$id',NOW(),'$client','$clientsession','login')";
	//query the sql statement
	$db->query($sql);
}

public function reg_logout_trail()
{
	//CLIENT login trail
	//register new trail
	//call db class
	require_once("db.php");
 	
	$db = new Database();
	//sql query
	$client = $_SERVER['REMOTE_ADDR'];
	$clientsession  = session_id(); 
	$id = $_SESSION['userid'];
	$check = "set foreign_key_checks=0";
	$db->query($check);
	$sql = "insert into login_trail(userid,last_login,ip,user_session,detail) values('$id',NOW(),'$client','$clientsession','logout')";
	//query the sql statement
	$db->query($sql);
}

public function reg_currentsession()
{
	//CLIENT login trail
	//register new trail
	//call db class
	require_once("db.php");
 	
	$db = new Database();
	//sql query
	$client = $_SERVER['REMOTE_ADDR'];
	$clientsession  = session_id(); 
	$id = $_SESSION['userid'];
	$check = "set foreign_key_checks=0";
	$db->query($check);
	$sql = "insert into current_session(userid,session,tarikh) values('$id','$clientsession',NOW())";
	//query the sql statement
	$db->query($sql);
}

public function remove_currentsession()
{
	//CLIENT login trail
	//register new trail
	//call db class
	require_once("db.php");
 	
	$db = new Database();
	//sql query
	$client = $_SERVER['REMOTE_ADDR'];
	$clientsession  = session_id(); 
	$id = $_SESSION['userid'];
	$check = "set foreign_key_checks=0";
	$db->query($check);
	$sql = "delete from current_session where session = '$clientsession'";
	//query the sql statement
	$db->query($sql);
}
//end class
}
?>