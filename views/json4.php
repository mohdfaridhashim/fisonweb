<?php 
header("Content-type: application/json"); 
echo $_GET['callback']. '('. json_encode($views[0]) .')';
?>

