<?php
//class scoreboard
include_once('liststock.php');
class scoreboard extends liststock
{

public function get_total_value()
{
	//$value= array();
	$totalvalue =0;
 	/*
	foreach ($this->liststock as $list =>$row) {
    	//$value[$list] = $row[4];
		$totalvalue = $totalvalue + $row[13];
	}
	*/
	require_once("db.php");
 	$i = 0;
	$db = new Database();
	$sql = "select last,qty from stock_tracking";
	//query the sql statement
	$db->query($sql);
	// return a single row of data
	while($db->nextRecord())
	{
		$totalvalue = $totalvalue + ($db->Record['last'] * $db->Record['qty']);
	}
	return $totalvalue;
}
public function get_total_volume()
{
	//$value= array();
	$totalvolume =0;
 
	foreach ($this->liststock as $list =>$row) {
    	//$value[$list] = $row[4];
		$totalvolume = $totalvolume + $row[11];
	}
	
	return $totalvolume;
}
public function get_up()
{
	$up =0;
 
	foreach ($this->liststock as $list =>$row) {
    	//$value[$list] = $row[4];
		
		if($row[4] > 0)
		{
		$up++;
		}
	}
	
	return $up;
}

public function get_down()
{
	$down =0;
 
	foreach ($this->liststock as $list =>$row) {
    	//$value[$list] = $row[4];
		
		if($row[4] < 0)
		{
		$down++;
		}
	}
	
	return $down;
}

public function get_unchg()
{
	$unchg =0;
 
	foreach ($this->liststock as $list =>$row) {
    	//$value[$list] = $row[4];
		
		if($row[4] == 0)
		{
		$unchg++;
		}
	}
	
	return $unchg;
}

public function get_fbmklci()
{
		$index = "200";
		//$info = array();
		$info = $this->stock_info($index);
		//$info[0] = $this->liststock[$index][0]; //code
		//$info[1] = $this->liststock[$index][1]; //sym
		//$info[2] = $this->liststock[$index][2]; //prev
		//$info[3] = $this->liststock[$index][3]; //last
		//$info[4] = $this->liststock[$index][4]; //chg
		//$info[9] = $this->liststock[$index][9]; //high
		//$info[10] = $this->liststock[$index][10]; //low
		//$info[11] = $this->liststock[$index][11]; //vol
		//$info[12] = $this->liststock[$index][12]; //qty
		//$info[13] = $this->liststock[$index][13]; //value
		return $info;
}
//end class
}
?>
