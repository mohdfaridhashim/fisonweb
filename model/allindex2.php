<?php
//class all index
//inherit from liststock.php
require_once('liststock.php');
class allindex extends liststock
{
//attribute


 
 public function get_index()
 {
 	return $this->get_liststock();
 }

 
//end class
}
?>