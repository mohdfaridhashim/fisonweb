<?php
//create the xml document
$xmlDoc = new DOMDocument();

//create the root element
$root = $xmlDoc->appendChild(
          $xmlDoc->createElement("pages"));
       

for($i = 0; $i < $views[1] ; $i++) { if($views[0][$i][19] != "1")
{
  //create a tutorial element
  $tutTag = $root->appendChild(
              $xmlDoc->createElement("link"));
           

   
  //create the title element
  $tutTag->appendChild(
    $xmlDoc->createElement("title", htmlentities($views[0][$i][0]." ".$views[0][$i][1])));
   
  //create the date element
  $tutTag->appendChild(
    $xmlDoc->createElement("url", htmlentities($views[0][$i][0])));


}
}
header("Content-Type: text/plain");

//make the output pretty
$xmlDoc->formatOutput = true;

echo $xmlDoc->saveXML();
?>