<?php
class liststock
{
	public $liststock = array();
	public $list = array();
	public $row_stock;
	public $row_index;
	var $row;
	
	function __construct()
	{
		//it will read all allcounters and all index
		$this->create_list_stock();
		$this->create_list_allindex();
	}
	//create list stock this include all counter and index
	function create_list_stock()
	{
		$i=0;
		//file read
		 //$file_handle = fopen("c:\stock.txt", "r")or exit("Unable to open file!");
		 $file_handle = fopen("http://10.10.0.186/data/active20", "r") or exit("Unable to open file!");
		//$this->up = 0;
		//$this->down = 0;
		//$this->unchg = 0;
        while (!feof($file_handle) ) {
		
        //$line_of_text = fgetcsv($file_handle, 1024);
        $arr = fgetcsv($file_handle, 1024);
        //$counter[$arr[0]] = array($arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6],$arr[7],$arr[8],$arr[9],$arr[10],$arr[11],$arr[12],$arr[13]);
		if($arr == "")
		{
			break;
		}
		else
		{
 		$this->liststock[$i][0] = $arr[1]; //code
		 $this->list[$arr[1]] = $i;
		 $this->liststock[$i][1] = $arr[2]; //symbol
		 $this->liststock[$i][2] = $arr[9]; //prev
		 $this->liststock[$i][3] = $arr[7]; //last
		 $this->liststock[$i][4] = $arr[10]; //changes
		 if(isset($arr[5]))
		 {
		 $this->liststock[$i][5] = $arr[5]; //bcum
		 }
		 else
		 {
		 $this->liststock[$i][5] = "0"; //bcum
		 }
		 $this->liststock[$i][6] = $arr[3]; //buy
		 $this->liststock[$i][7] = $arr[4]; //sell
		 $this->liststock[$i][8] = $arr[6]; //scumm
		 $this->liststock[$i][9] = $arr[11]; //high
		 $this->liststock[$i][10] = $arr[12]; //low
		 $this->liststock[$i][11] = $arr[8]; //vol
		 $this->liststock[$i][12] = "0"; //qty
		 $this->liststock[$i][20] = "0"; //value
		 $this->liststock[$i][19] = "0"; //type 1 - index, 0 all counters
		 //color
		//last color
		if($this->liststock[$i][3] > $arr[9])
		{
			$this->liststock[$i][13] = "blue"; 
		}
		else if($this->liststock[$i][3] == $arr[9])
		{
			$this->liststock[$i][13] = "green"; 
		}
		else if($this->liststock[$i][3] < $arr[9])
		{
			$this->liststock[$i][13] = "red"; 
		}
		//buy color
			if($this->liststock[$i][6] > $arr[9])
		{
			$this->liststock[$i][14] = "blue"; 
		}
		else if($this->liststock[$i][6] == $arr[9])
		{
			$this->liststock[$i][14] = "green"; 
		}
		else if($this->liststock[$i][6] < $arr[9])
		{
			$this->liststock[$i][14] = "red"; 
		}
		//sell color
			if($this->liststock[$i][7] > $arr[9])
		{
			$this->liststock[$i][15] = "blue"; 
		}
		else if($this->liststock[$i][7] == $arr[9])
		{
			$this->liststock[$i][15] = "green"; 
		}
		else if($this->liststock[$i][7] < $arr[9])
		{
			$this->liststock[$i][15] = "red"; 
		}
		//chg color
		if($this->liststock[$i][4] > 0)
		{
			$this->liststock[$i][16] = "blue"; 
		}
		else if($this->liststock[$i][4] == 0)
		{
			$this->liststock[$i][16] = "green"; 
		}
		else if($this->liststock[$i][4] < 0)
		{
			$this->liststock[$i][16] = "red"; 
		}
		//low color
		if($this->liststock[$i][10] > $arr[9])
		{
			$this->liststock[$i][17] = "blue"; 
		}
		else if($this->liststock[$i][10] == $arr[9])
		{
			$this->liststock[$i][17] = "green"; 
		}
		else if($this->liststock[$i][10] < $arr[9])
		{
			$this->liststock[$i][17] = "red"; 
		}
		//high color
		if($this->liststock[$i][9] > $arr[9])
		{
			$this->liststock[$i][18] = "blue"; 
		}
		else if($this->liststock[$i][9] == $arr[9])
		{
			$this->liststock[$i][18] = "green"; 
		}
		else if($this->liststock[$i][9] < $arr[9])
		{
			$this->liststock[$i][18] = "red"; 
		}
		$i++;
		}
		
		}//end while
		fclose($file_handle);
		$this->row = $i;
	}
	
	//create list stock this include all counter and index
	function create_list_allindex()
	{
		$i=$this->row;
		//file read
		 //$file_handle = fopen("c:\stock.txt", "r")or exit("Unable to open file!");
		 $file_handle = fopen("http://10.10.0.186/data/allindex", "r") or exit("Unable to open file!");
		//$this->up = 0;
		//$this->down = 0;
		//$this->unchg = 0;
        while (!feof($file_handle) ) {
		
        //$line_of_text = fgetcsv($file_handle, 1024);
        $arr = fgetcsv($file_handle, 1024);
        //$counter[$arr[0]] = array($arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6],$arr[7],$arr[8],$arr[9],$arr[10],$arr[11],$arr[12],$arr[13]);
		if($arr == "")
		{
			break;
		}
		else
		{
 		//format code,sym,prev,last,chg,low
 		 $this->liststock[$i][0] = $arr[1]; //code
		 $this->list[$arr[1]] = $i;
		 $this->liststock[$i][1] = $arr[2]; //symbol
		 $this->liststock[$i][2] = $arr[6]; //prev
		 $this->liststock[$i][3] = $arr[3]; //last
		 $this->liststock[$i][4] = $arr[3] - $arr[6];//changes
		 $this->liststock[$i][5] = "0"; //bcum
		 $this->liststock[$i][6] = "0"; //buy
		 $this->liststock[$i][7] = "0"; //sell
		 $this->liststock[$i][8] = "0"; //scum
		 $this->liststock[$i][9] = $arr[4]; //high
		 $this->liststock[$i][10] = $arr[5]; //low
		 $this->liststock[$i][11] = 0; //vol
		 $this->liststock[$i][12] = 0; //qty
		 $this->liststock[$i][20] = 0; //value
		 $this->liststock[$i][19] = "1"; //type 1 - index, 0 all counters
		 //color
		//last color
		if($this->liststock[$i][3] > $arr[6])
		{
			$this->liststock[$i][13] = "blue"; 
		}
		else if($this->liststock[$i][3] == $arr[6])
		{
			$this->liststock[$i][13] = "green"; 
		}
		else if($this->liststock[$i][3] < $arr[6])
		{
			$this->liststock[$i][13] = "red"; 
		}
		//buy color
			if($this->liststock[$i][6] > $arr[6])
		{
			$this->liststock[$i][14] = "blue"; 
		}
		else if($this->liststock[$i][6] == $arr[6])
		{
			$this->liststock[$i][14] = "green"; 
		}
		else if($this->liststock[$i][6] < $arr[6])
		{
			$this->liststock[$i][14] = "red"; 
		}
		//sell color
			if($this->liststock[$i][7] > $arr[6])
		{
			$this->liststock[$i][15] = "blue"; 
		}
		else if($this->liststock[$i][7] == $arr[6])
		{
			$this->liststock[$i][15] = "green"; 
		}
		else if($this->liststock[$i][7] < $arr[6])
		{
			$this->liststock[$i][15] = "red"; 
		}
		//chg color
		if($this->liststock[$i][4] > 0)
		{
			$this->liststock[$i][16] = "blue"; 
		}
		else if($this->liststock[$i][4] == 0)
		{
			$this->liststock[$i][16] = "green"; 
		}
		else if($this->liststock[$i][4] < 0)
		{
			$this->liststock[$i][16] = "red"; 
		}
		//low color
		if($this->liststock[$i][10] > $arr[6])
		{
			$this->liststock[$i][17] = "blue"; 
		}
		else if($this->liststock[$i][10] == $arr[6])
		{
			$this->liststock[$i][17] = "green"; 
		}
		else if($this->liststock[$i][10] < $arr[6])
		{
			$this->liststock[$i][17] = "red"; 
		}
		//high color
		if($this->liststock[$i][9] > $arr[6])
		{
			$this->liststock[$i][18] = "blue"; 
		}
		else if($this->liststock[$i][9] == $arr[6])
		{
			$this->liststock[$i][18] = "green"; 
		}
		else if($this->liststock[$i][9] < $arr[6])
		{
			$this->liststock[$i][18] = "red"; 
		}
		$i++;
		}
		
		}//end while
		fclose($file_handle);
		$this->row = $i;
	}
	//total number of rows
	function get_row()
	{
		return $this->row;
	}
	//list all stock
	function get_liststock()
	{
		return $this->liststock;
	}
	//search particular stock
	function stock_info($code)
	{
		$index = $this->list[$code];
		$info = array();
		$info[0] = $this->liststock[$index][0]; //code
		$info[1] = $this->liststock[$index][1]; //sym
		$info[2] = $this->liststock[$index][2]; //prev
		$info[3] = $this->liststock[$index][3]; //last
		$info[4] = $this->liststock[$index][4]; //chg
		$info[5] = $this->liststock[$index][5]; //bcum
		$info[6] = $this->liststock[$index][6]; //buy
		$info[7] = $this->liststock[$index][7]; //sell
		$info[8] = $this->liststock[$index][8]; //scum
		$info[9] = $this->liststock[$index][9]; //high
		$info[10] = $this->liststock[$index][10]; //low
		$info[11] = $this->liststock[$index][11]; //vol
		$info[12] = $this->liststock[$index][12]; //qty
		$info[20] = $this->liststock[$index][20]; //value
		$info[19] = $this->liststock[$index][19]; //value
		//color
		$info[13] = $this->liststock[$index][13]; //value
		$info[14] = $this->liststock[$index][14]; //value
		$info[15] = $this->liststock[$index][15]; //value
		$info[16] = $this->liststock[$index][16]; //value
		$info[17] = $this->liststock[$index][17]; //value
		$info[18] = $this->liststock[$index][18]; //value
		
		return $info;
	}
}
?>