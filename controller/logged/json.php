<?php
//class active
include_once 'model/tracking.php';
class json_controller
{
var $bil =5;
var $row;
public function __construct()  {$this->detail = new tracking();}

public function main()
{
	//class function
	$function = array();
	$function[0][0] = "get_track";  //name of the function
	$function[0][1] = "true";  //return of a function as a variable
	$function[1][0] = "get_track_row";  //name of the function
	$function[1][1] = "true";  //return of a function as a variable
	$function[2][0] = "get_intraday";  //name of the function
	$function[2][1] = "true";  //return of a function as a variable
	$function[3][0] = "get_intra_row";  //name of the function
	$function[3][1] = "true";  //return of a function as a variable
	$function[4][0] = "get_stock_detail";  //name of the function
	$function[4][1] = "true";  //return of a function as a variable

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
	return "json4.php";
}
public function view_option()
{
	//include user define view or replace default view
	//option included, excluded
	return "excluded";
}

public function get_track()
{
	//if(isset($_GET['c']))
	//{
	$code = $_GET['c'];
	//}
	//$this->detail = new tracking();
	//return $this->detail->get_tracking2($code);
	return $this->detail->get_intra($code);
	//$this->row=$this->detail->get_trade_row();
	//return $this->detail->get_top_actives();

}
public function get_intraday()
{
	//if(isset($_GET['c']))
	//{
	$code = $_GET['c'];
	//}
	//$this->detail = new tracking();
	return $this->detail->get_intraday($code);
	//$this->row=$this->detail->get_trade_row();
	//return $this->detail->get_top_actives();

}

public function get_intra_row()
{
	//if(isset($_GET['c']))
	//{
	$code = $_GET['c'];
	//}
	//$this->detail = new tracking();
	return $this->detail->get_intra_row();
	//$this->row=$this->detail->get_trade_row();
	//return $this->detail->get_top_actives();

}
public function get_track_row()
{
	$code = $_GET['c'];
	//$this->detail = new tracking();
	//$this->detail->get_last_tracking($code);
	return $this->detail->get_trade_row();
}
public function get_stock_detail()
{
	$code = $_GET['c'];
	//$this->detail = new tracking();
	//$this->detail->create_list_stock();
	return $this->detail->stock_info($code);
}

//end class
}
?>