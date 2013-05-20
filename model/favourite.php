<?php
require_once('liststock.php');
class favourite extends liststock
{
	public $folio = array();
	public $totalrows = 0;
	public $favrows = 0;
	
	//public function sum_rows()
	//{
		// $this->totalrows = $this->row_stock + $this->row_index;
	//}
	
	public function sum_rows($rows)
	{
		 $this->totalrows = $rows;
	}
	public function get_favourite($userid)
	{
		require_once('db.php');
		$db = new Database();
		$sql = "select code from user_favourite where userid = '$userid'";
		$db->query($sql);
		$a = 0;
		$this->favrows = $db->numRows();
		if($this->favrows <= 0 )
		{
		return 0;
		}
		else
		{
		while($db->nextRecord())
		{
			
			//match the db record with 1st load array
			for($i = 0; $i < $this->totalrows; $i++)
			{
				if($this->liststock[$i][1] == $db->Record['code'])
				{
					$this->folio[$a][0] = $this->liststock[$i][0];
					$this->folio[$a][1] = $this->liststock[$i][1];
					$this->folio[$a][2] = $this->liststock[$i][2];
					$this->folio[$a][3] = $this->liststock[$i][3];
					$this->folio[$a][4] = $this->liststock[$i][4];
					$this->folio[$a][5] = $this->liststock[$i][5];
					$this->folio[$a][6] = $this->liststock[$i][6];
					$this->folio[$a][7] = $this->liststock[$i][7];
					$this->folio[$a][8] = $this->liststock[$i][8];
					$this->folio[$a][9] = $this->liststock[$i][9];
					$this->folio[$a][10] = $this->liststock[$i][10];
					$this->folio[$a][11] = $this->liststock[$i][11];
					$this->folio[$a][12] = $this->liststock[$i][12];
					$this->folio[$a][13] = $this->liststock[$i][13];
					$this->folio[$a][14] = $this->liststock[$i][14];
					$this->folio[$a][15] = $this->liststock[$i][15];
					$this->folio[$a][16] = $this->liststock[$i][16];
					$this->folio[$a][17] = $this->liststock[$i][17];
					$this->folio[$a][18] = $this->liststock[$i][18];
					break;
				}
			}
			$a++;

		}
		return $this->folio;
		}
		
	}
	
	public function get_favouriterow()
	{
		return $this->favrows;
	}
	public function searchfavourite($userid,$code)
	{
		require_once('db.php');
		$db = new Database();
		$sql = "SELECT code FROM user_favourite WHERE userid= '$userid' AND code= '$code'";
		$db->query($sql);
		$count = $db->numRows();
		return $count;
	}
	public function addtofavourite($userid,$code)
	{
		require_once('db.php');
		$db = new Database();
		$sql = "INSERT INTO user_favourite(userid,code) VALUES ('$userid','$code')";
		$db->query($sql);
		return $notify = $code." has been added to your favourite list";
	}
	
	public function deletefavourite($userid,$code)
	{
		require_once('db.php');
		$db = new Database();
		$sql = "DELETE FROM user_favourite WHERE userid= '$userid' AND code= '$code'";
		$db->query($sql);
		return $notify = $code." has been delete from your favourite list";
	}
	
	public function count_favourite($userid)
	{
		require_once('db.php');
		$db = new Database();
		$sql = "SELECT count('userid') as total from user_favourite where userid= '$userid'";
		$db->query($sql);
		$db->singleRecord();
		$qty = $db->Record['total'];
		/*
		if($qty >= 20)
		{
		return $notify = "You have exceed maximum number of favourites.";
		}
		else if($qty < 20)
		{
		return 0;
		}*/
		return $qty;
	}
}
?>