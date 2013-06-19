<?php
//class active
include_once 'model/news.php';
class news_controller
{
var $bil =3;
var $row;
//constructor
public function __construct()  {
$this->news = new news();
}

public function main()
{
	//class function
	$function = array();
	$function[0][0] = "get_news";  //name of the function
	$function[0][1] = "true";  //return of a function as a variable
	$function[1][0] = "get_total_news";  //name of the function
	$function[1][1] = "true";  //return of a function as a variable
	$function[2][0] = "get_source_name";  //name of the function
	$function[2][1] = "true";  //return of a function as a variable

	return $function;
}
public function get_num_func()
{	
	return $this->bil;
}
//user define view
public function view()
{
	//user define view file(OUTPUT)
	return "news3.php";
}
public function view_option()
{
	//include user define view or replace default view
	//option included, excluded
	return "excluded";
}

public function get_news()
{
	if(isset($_GET['sourcename']))
	{
		$source = $_GET['sourcename'];
		if($source == "Bernama")
		{
		$this->news->set_news("http://10.10.0.47/Xml/Bernama.xml","Bernama","11");
		}
		else
		{
		$this->news->set_news("http://10.10.0.47/Xml/DowJones.xml","DowJones","0");
		}
	}
	else
	{
	$this->news->set_news("http://10.10.0.47/Xml/DowJones.xml","DowJones","0");
	$this->news->set_news("http://10.10.0.47/Xml/Bernama.xml","Bernama","11");
	}
	return $this->news->get_news();
}

public function get_total_news()
{
	return $this->news->get_total();
}

public function get_source_name()
{
	return $this->news->get_source();
}



//end class
}
?>