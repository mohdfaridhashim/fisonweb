<?php
//tickers
include('allcounters.php');
class ticker extends allcounters
{
//has been sorted as actives by default


public function get_top_actives()
{
	//return $this->allcounter_data;
	 	$top = array();
 
	foreach ($this->allcounter_data as $list =>$row) {
    	$top[$list] = $row[11];
	}
	
 	array_multisort($top,SORT_DESC,$this->allcounter_data);
	return $this->allcounter_data;
}

//function that will sort array based on loser (lowest chg)
public function get_top_loser()
{
 	$top = array();
 
	foreach ($this->allcounter_data as $list =>$row) {
    	$top[$list] = $row[4];
	}
	
 	array_multisort($top,SORT_ASC,$this->allcounter_data);
	return $this->allcounter_data;
}
//function that will sort array based on gainer (higher chg)
public function get_top_gainer()
{
	$top = array();
 
	foreach ($this->allcounter_data as $list =>$row) {
    	$top[$list] = $row[4];
	}
	
 	array_multisort($top,SORT_DESC,$this->allcounter_data);
	return $this->allcounter_data;
}


//end class
}
?>
