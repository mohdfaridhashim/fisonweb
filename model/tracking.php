<?php
//tracking
include_once('liststock.php');
class tracking extends liststock
{
	var $trade_row;
	var $intra_row;
	public function get_trade_row()
	{
		return $this->trade_row;
	}
	
	public function get_intra_row()
	{
		return $this->intra_row;
	}
	//trade tracking
	public function get_trade_tracking($code)
	{
		//call db class
	require_once("db.php");
 	$i = 0;
	$db = new Database();
	$trade = array();
	$sql = "SELECT * FROM last_tracking WHERE code = '$code' and ( DATE(timestamp) > DATE_SUB(now(), INTERVAL 1 DAY))";
	//query the sql statement
	$db->query($sql);
	// return a single row of data
	while($db->nextRecord())
	{
	//value from db send to array as $$trade
	//last
	$trade[$i][0] = $db->Record[0];
	//time stamp
	 $trade[$i][1] = $db->Record[1];
	$i++;
	}
	$this->trade_row = $i;
	return $trade;
	}
	
	//high low tracking
	public function get_intraday($code)
	{
		//call db class
	require_once("db.php");
 	$i = 0;
	$db = new Database();
	$trade = array();
	
	$sql = "SELECT last,smtp,trade_id from stock_tracking where code= '$code'  UNION ALL SELECT last,smtp,trade_id from index_tracking where code='$code'";
	//query the sql statement
	$db->query($sql);
	$this->intra_row = $db->numRows();
	// return a single row of data
	while($db->nextRecord())
	{
	//value from db send to array as $$trade
	//last
	$trade[$i][0] = $db->Record[0];
	//timestamp
	 $trade[$i][1] = $db->Record[1];
	 /*
	//code
	 $trade[$i][2] = $db->Record[2];
	//high
	 $trade[$i][3] = $db->Record[3];
	//low
	 $trade[$i][4] = $db->Record[4];
	 	//low
	 $trade[$i][5] = $db->Record[5];
	 //prev
	 $trade[$i][6] = $db->Record[6];
	 */
	$i++;
	}
	
	return $trade;
	}
	
	//last tracking
	public function get_tracking($code)
	{
		//call db class
	require_once("db.php");
 	$i = 0;
	$db = new Database();
	$trade = array();
	$stock = $this->stock_info($code);
	$prev = $stock[2];
	//$sql = "SELECT l.timestamp,l.last,b.bcum,b.scum,b.buy,b.sell,l.high,l.low,l.qty,l.vol FROM tracking_lhlqv l,tracking_bbss b WHERE l.code = b.code and l.code = '$code' and b.code ='$code' order by l.trade_id desc LIMIT 150000,10";
		$sql = "SELECT smtp,last,bcum,scum,buy,sell,high,low,qty,vol,trade_id from stock_tracking where code= '$code'  UNION ALL SELECT smtp,last,bcum,scum,buy,sell,high,low,qty,vol,trade_id from index_tracking where code='$code' order by trade_id asc";
	//query the sql statement
	$db->query($sql);
	// return a single row of data
	while($db->nextRecord())
	{
	//value from db send to array as $$trade
	//time stamp
	$trade[$i][0] = $db->Record[0];
	//last
	 $trade[$i][1] = $db->Record[1];
	//bcum
	 $trade[$i][2] = $db->Record[2];
	//scum
	 $trade[$i][3] = $db->Record[3];
	//buy
	 $trade[$i][4] = $db->Record[4];
	//sell
	 $trade[$i][5] = $db->Record[5];
	//high
	 $trade[$i][6] = $db->Record[6];
	//low
	 $trade[$i][7] = $db->Record[7];
	 //qty
	 $trade[$i][8] = $db->Record[8];
	//vol
	 $trade[$i][9] = $db->Record[9];
	 //chg
	 $trade[$i][10] = round($db->Record[1] - $prev,3);
	 //prev
	 $trade[$i][11] = $prev;
	$i++;
	}
	$this->trade_row = $i;
	return $trade;
	}
	
	//last tracking
	public function get_tracking2($code)
	{
		//call db class
	require_once("db.php");
 	$i = 0;
	$db = new Database();
	$trade = array();
	$stock = $this->stock_info($code);
	$prev = $stock[2];
	//$sql = "SELECT l.timestamp,l.last,b.bcum,b.scum,b.buy,b.sell,l.high,l.low,l.qty,l.vol FROM tracking_lhlqv l,tracking_bbss b WHERE l.code = b.code and l.code = '$code' and b.code ='$code' order by l.trade_id desc LIMIT 150000,10";
		$sql = "SELECT smtp,last,bcum,scum,buy,sell,high,low,qty,vol,trade_id from stock_tracking where code= '$code'  UNION ALL SELECT smtp,last,bcum,scum,buy,sell,high,low,qty,vol,trade_id from index_tracking where code='$code' order by trade_id asc";
	//query the sql statement
	$db->query($sql);
	// return a single row of data
	while($db->nextRecord())
	{
	//value from db send to array as $$trade
	//time stamp
	$masa = explode(" ",$db->Record[0]);
	$tarikh = explode("/",$masa[1]);
	$milliseconds = 1000 * strtotime($tarikh[0]."-".$tarikh[1]."-".$tarikh[2]);
	$trade[$i][0] = $milliseconds;
	//last
	 $trade[$i][1] = $db->Record[1];
	//high
	 $trade[$i][2] = $db->Record[6];
	//low
	 $trade[$i][3] = $db->Record[7];
	//close
	 $trade[$i][4] = $prev;
	//qty
	 $trade[$i][5] = $db->Record[8];
	//high
	/*
	 $trade[$i][6] = $db->Record[6];
	//low
	 $trade[$i][7] = $db->Record[7];
	 //qty
	 $trade[$i][8] = $db->Record[8];
	//vol
	 $trade[$i][9] = $db->Record[9];
	 //chg
	 $trade[$i][10] = round($db->Record[1] - $prev,3);
	 //prev
	 $trade[$i][11] = $prev;
	 */
	$i++;
	}
	$this->trade_row = $i;
	return $trade;
	}
	
	//last tracking
	public function get_intra($code)
	{
		//call db class
	require_once("db.php");
 	$i = 0;
	$db = new Database();
	$trade = array();
	$stock = $this->stock_info($code);
	$prev = $stock[2];
	//$sql = "SELECT l.timestamp,l.last,b.bcum,b.scum,b.buy,b.sell,l.high,l.low,l.qty,l.vol FROM tracking_lhlqv l,tracking_bbss b WHERE l.code = b.code and l.code = '$code' and b.code ='$code' order by l.trade_id desc LIMIT 150000,10";
		//$sql = "SELECT smtp,last,bcum,scum,buy,sell,high,low,qty,vol,trade_id from stock_tracking where code= '$code' and smtp like '%10/06/2013%'  UNION ALL SELECT smtp,last,bcum,scum,buy,sell,high,low,qty,vol,trade_id from index_tracking where code='$code' and smtp like '%10/06/2013%' order by trade_id asc";
		$sql = "SELECT smtp,last,bcum,scum,buy,sell,high,low,qty,vol,trade_id from stock_tracking where code= '$code' and smtp like '%12/06/2013%'  UNION ALL SELECT smtp,last,bcum,scum,buy,sell,high,low,qty,vol,trade_id from index_tracking where code='$code' and smtp like '%12/06/2013%' order by trade_id asc";
	//query the sql statement
	$db->query($sql);
	// return a single row of data
	while($db->nextRecord())
	{
	//value from db send to array as $$trade
	//time stamp
	$masa = explode(" ",$db->Record[0]);
	$tarikh = explode("/",$masa[1]);
	$milliseconds = 1000 * strtotime($tarikh[0]."-".$tarikh[1]."-".$tarikh[2]." ".$masa[0]);
	$trade[$i][0] = $milliseconds;
	//last
	 $trade[$i][1] = floatval($db->Record[1]);
	//high
	// $trade[$i][2] = $db->Record[6];
	//low
	 //$trade[$i][3] = $db->Record[7];
	//close
	// $trade[$i][4] = $prev;
	//qty
	// $trade[$i][5] = $db->Record[8];
	//high
	/*
	 $trade[$i][6] = $db->Record[6];
	//low
	 $trade[$i][7] = $db->Record[7];
	 //qty
	 $trade[$i][8] = $db->Record[8];
	//vol
	 $trade[$i][9] = $db->Record[9];
	 //chg
	 $trade[$i][10] = round($db->Record[1] - $prev,3);
	 //prev
	 $trade[$i][11] = $prev;
	 */
	$i++;
	}
	$this->trade_row = $i;
	return $trade;
	}
}
?>