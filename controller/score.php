<?php
//this is the default class controller 
//it will auto run on 
//call the model
include_once 'model/scoreboard.php';
class score_controller
{
var $bil=2;
public $scoreboard;
public $ticker;
var $rows;
public function __construct()  
	{
	$this->scoreboard = new scoreboard();
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
//user define view
public function view()
{
	//user define view file
	return "score.php";
}
public function view_option()
{
	//include user define view or replace default view
	return "excluded";
}
// model method
public function getscoreboard()
{
	$score = array();
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
	return $this->scoreboard->get_fbmklci();
}


















}



?>