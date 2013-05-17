<?php
//this is the default class controller 
//it will auto run on 
//call the model
include_once 'model/scoreboard.php';
include_once 'model/ticker.php';
class home_controller
{
var $bil=2;
public $scoreboard;
public $ticker;
public function __construct()  {
	$this->scoreboard = new scoreboard();
	$this->ticker = new ticker();
	}

public function main()
{
	//class function

	$function = array();
	$function[0][0] = "getscoreboard";  //name of the function
	$function[0][1] = "true";  //return of a function as a variable
	$function[1][0] = "getfbmklci";
	$function[1][1] = "true";
	return $function;
}
public function get_num_func()
{	
	return $this->bil;
}
public function getscoreboard()
{
	$score = array();
	$this->scoreboard = new scoreboard();
	//$this->scoreboard->create_list_stock();
	$score[0] = $this->scoreboard->get_total_value();
	$score[1] = $this->scoreboard->get_total_volume();
	$score[2] = $this->scoreboard->get_up();
	$score[3] = $this->scoreboard->get_down();
	$score[4] = $this->scoreboard->get_unchg();
	$score[5] = $this->scoreboard->get_unchg();
	return $score;
}

public function getfbmklci()
{
	//$this->scoreboard->create_list_stock();
	return $this->scoreboard->get_fbmklci();
}

public function getallcounter()
{
	//$this->scoreboard->create_list_stock();
	return $this->scoreboard->get_liststock();
}

public function get_ticker()
{
	$this->ticker = new ticker();
	//$this->ticker->create_list_stock();
	return $this->ticker->get_top_actives();
}

public function get_gainer()
{
	//$this->ticker->create_list_stock();
	return $this->ticker->get_top_gainer();
}

public function get_loser()
{
	//$this->ticker->create_list_stock();
	return $this->ticker->get_top_loser();
}

















}



?>