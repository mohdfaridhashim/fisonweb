<?php
include_once 'model/allcounters.php';
class search_controller
{
var $bil=2;
public $scoreboard;
public $ticker;
public function __construct()  {
	//$this->scoreboard = new scoreboard();
	$this->all = new allcounters();
	$this->all->set_allcounter();
	}

public function main()
{
	//class function

	$function = array();
	$function[0][0] = "search";  //name of the function
	$function[0][1] = "true";  //return of a function as a variable
	$function[1][0] = "get_rows";  //name of the function
	$function[1][1] = "true";  //return of a function as a variable
	return $function;
}
public function get_num_func()
{	
	return $this->bil;
}
public function view_option()
{
	//include user define view or replace default view
	//option included, excluded
	return "excluded";
}
//user define view
public function view()
{
	//user define view file
	return "search.php";
}

public function search()
{
	//$this->scoreboard->create_list_stock();
$xmlDoc=new DOMDocument();
$xmlDoc->load("test.xml");

$x=$xmlDoc->getElementsByTagName('link');

//get the q parameter from URL
$q=$_GET["code"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0)
{
$hint="";
for($i=0; $i<($x->length); $i++)
  {
  $y=$x->item($i)->getElementsByTagName('title');
  $z=$x->item($i)->getElementsByTagName('url');
  if ($y->item(0)->nodeType==1)
    {
    //find a link matching the search text
    if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q))
      {
      if ($hint=="")
        {
        $hint="<a href='index.php?watch=detail&c=". 
        $z->item(0)->childNodes->item(0)->nodeValue . 
        "' >" . 
        $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      else
        {
        $hint=$hint . "<br /><a href='index.php?watch=detail&c=" . 
        $z->item(0)->childNodes->item(0)->nodeValue . 
        "' >" . 
        $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint=="")
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  }

//output the response
echo $response;

}

public function get_rows()
{
	//$this->scoreboard->create_list_stock();
	return $this->all->get_row_allc();
}

}

?>