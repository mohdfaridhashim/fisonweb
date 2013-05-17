<?php
//class all index
//inherit from liststock.php
include_once('liststock.php');
class allindex extends liststock
{
//attribute
 public $allindex_data = array();
 public $row_index;

 public function set_index()
 {
 	$a = 0;
 	//$total = $this->row;
	for($i=0;$i<$this->row;$i++)
	{
		if($this->liststock[$i][19] == "1")
		{
		
		 $this->allindex_data[$a][0] = $this->liststock[$i][0] ; //code
		 $this->allindex_data[$a][1] = $this->liststock[$i][1] ; //symbol
		 $this->allindex_data[$a][2] = $this->liststock[$i][2] ; //prev
		 $this->allindex_data[$a][3] = $this->liststock[$i][3] ; //last
		 $this->allindex_data[$a][4] = round($this->liststock[$i][4], 2);//changes
		 $this->allindex_data[$a][5] =  $this->liststock[$i][5] ; //bcum
		 $this->allindex_data[$a][6] =  $this->liststock[$i][6] ; //buy
		 $this->allindex_data[$a][7] = $this->liststock[$i][7] ; //sell
		 $this->allindex_data[$a][8] = $this->liststock[$i][8] ; //scumm
		 $this->allindex_data[$a][9] = $this->liststock[$i][9] ; //low
		 $this->allindex_data[$a][10] = $this->liststock[$i][10] ; //vol
		 $this->allindex_data[$a][11] = $this->liststock[$i][11] ; //qty
		 $this->allindex_data[$a][12] = $this->liststock[$i][12] ; //volume
		 $this->allindex_data[$a][13] = $this->liststock[$i][13] ; //value
		 $this->allindex_data[$a][14] = $this->liststock[$i][14] ; //value
		 $this->allindex_data[$a][15] = $this->liststock[$i][15] ; //value
		 $this->allindex_data[$a][16] = $this->liststock[$i][16] ; //value
		 $this->allindex_data[$a][17] = $this->liststock[$i][17] ; //value
		 $this->allindex_data[$a][18] = $this->liststock[$i][18] ; //value
		  $this->allindex_data[$a][19] = $this->liststock[$i][19] ; //value
		  $this->allindex_data[$a][20] = $this->liststock[$i][20] ; //value
		 $a++;
		}
		
	}
	$this->row_index = $a;
 }
 
 public function get_index()
 {
 	return $this->allindex_data;
 }
  public function get_row_index()
 {
 	return $this->row_index;
 }
 
//end class
}
?>