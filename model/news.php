<?php 
//model
class news
{
//format news is in xml
/*
<DowJones>  
<News>
<E_TIME>11:50:00 AM</E_TIME>
<E_DATE>13-JUN-2013</E_DATE>
<NEWS_ID>20130612DN014521</NEWS_ID>
<SOURCE_ID>12</SOURCE_ID>
<CATEGORY_ID>6</CATEGORY_ID>
<NEWS_HEADLINE>
DJ UPDATE: Asian Shares Fall; Nikkei Enters Bear Territory
</NEWS_HEADLINE>
</News>
</DowJones>
*/
public $source =array();
public $news = array();
public $i = 0;
//url, source name, user defined source id if in xml not provided
function set_news($link,$sourcename,$sid)
{
	//read news from news feed
	$xml=simplexml_load_file($link);
	array_push($this->source, $sourcename);
	foreach($xml as $berita)
	{
		$this->news[$this->i][0] = $sourcename;
		$this->news[$this->i][1] = $berita->E_TIME;
		$this->news[$this->i][2] = $berita->E_DATE;
		if(isset($berita->SOURCE_ID))
		{
		$this->news[$this->i][3] = $berita->SOURCE_ID;
		}
		else
		{
		$this->news[$this->i][3] = $sid;
		}
		$this->news[$this->i][4] = $berita->CATEGORY_ID;
		$this->news[$this->i][5] = $berita->NEWS_HEADLINE;
		$this->news[$this->i][6] = $berita->NEWS_ID;
		$this->i++;
	}
	//array_push($this->xml, simplexml_load_file("http://10.10.0.100/Xml/Bernama.xml"));
	//$this->xml=simplexml_load_file("http://10.10.0.100/Xml/Bernama.xml");
}
function get_total()
{
	return $this->i;
}
function get_source()
{
	return $this->source;
}
function get_news()
{
	return $this->news;
}


function filter_news($sourcename)
{
	$filternews = array();
	foreach($this->news as $berita)
	{
 		if($sourcename == $berita[0])
		{
			$filternews[0] = $berita[0];
			$filternews[1] = $berita[1];
			$filternews[2] = $berita[2];
			$filternews[3] = $berita[3];
			$filternews[4] = $berita[4];
			$filternews[5] = $berita[5];
			$filternews[6] = $berita[6];
		}
	}
	return $filternews;
}

//end class
}
?>