<?php
include_once('liststock.php');
class allcounters extends liststock
{
	public $allcounter_data = array();
	var $row_allc;

public function set_allcounter()
{
 	$a = 0;
 	//$total = $this->row;
	for($i=0;$i< $this->row;$i++)
	{
		if($this->liststock[$i][19] == "0")
		{
		 $this->allcounter_data[$a][0] = $this->liststock[$i][0] ; //code
		 $this->allcounter_data[$a][1] = $this->liststock[$i][1] ; //symbol
		 $this->allcounter_data[$a][2] = $this->liststock[$i][2] ; //prev
		 $this->allcounter_data[$a][3] = $this->liststock[$i][3] ; //last
		 $this->allcounter_data[$a][4] = $this->liststock[$i][4] ;//changes
		 $this->allcounter_data[$a][5] =  $this->liststock[$i][5] ; //bcum
		 $this->allcounter_data[$a][6] =  $this->liststock[$i][6] ; //buy
		 $this->allcounter_data[$a][7] = $this->liststock[$i][7] ; //sell
		 $this->allcounter_data[$a][8] = $this->liststock[$i][8] ; //scumm
		 $this->allcounter_data[$a][9] = $this->liststock[$i][9] ; //low
		 $this->allcounter_data[$a][10] = $this->liststock[$i][10] ; //vol
		 $this->allcounter_data[$a][11] = $this->liststock[$i][11] ; //qty
		 $this->allcounter_data[$a][12] = $this->liststock[$i][12] ; //volume
		 $this->allcounter_data[$a][13] = $this->liststock[$i][13] ; //value
		 $this->allcounter_data[$a][14] = $this->liststock[$i][14] ; //value
		 $this->allcounter_data[$a][15] = $this->liststock[$i][15] ; //value
		 $this->allcounter_data[$a][16] = $this->liststock[$i][16] ; //value
		 $this->allcounter_data[$a][17] = $this->liststock[$i][17] ; //value
		 $this->allcounter_data[$a][18] = $this->liststock[$i][18] ; //value
		 $this->allcounter_data[$a][19] = $this->liststock[$i][19] ; //value
		 $a++;
		}
		
	}
	$this->row_allc = $a;
}

public function get_allc()
 {
 	return $this->allcounter_data;
 }
public function get_row_allc()
 {
 	return $this->row_allc;
 }
 
 
}
?>