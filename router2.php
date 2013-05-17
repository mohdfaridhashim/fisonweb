<?php
if (!isset($_SESSION)) session_start();

define('SERVER_ROOT' , dirname(__FILE__));
define('SITE_ROOT' , 'http://localhost:8080/nmvc/');

if(isset($_SESSION['userid']))
{
	if(isset($_GET['watch']))
	{
		$page = $_GET['watch'];
		$functions = array();
		//model view
		$views = array();
		//compute the path to the file
		$target = SERVER_ROOT . '/controller/' . $page . '.php';
		if (file_exists($target))
		{
			//include controller
			include_once($target);
	
			//modify page to fit naming convention
			$class = $page . '_controller';
	
			//instantiate the appropriate class
			if (class_exists($class))
			{
				
				if($class == "home_controller")
				{
					//this will load all default
					$default = SERVER_ROOT . '/controller/home.php';
					include_once($default);
					$defaulter = new $class;
					$scoreboard = array();
					$scoreboard = $defaulter->getscoreboard();
					$activeticker = $defaulter->get_ticker();
					$gainerticker = $defaulter->get_gainer();
					$loserticker = $defaulter->get_loser();
					$fbmklci = array();
					$fbmklci = $defaulter->getfbmklci();
				} 
				else
				{
					//this will load all default
					$default = SERVER_ROOT . '/controller/home.php';
					include_once($default);
					$defaulter = new home_controller();
					$scoreboard = array();
					$scoreboard = $defaulter->getscoreboard();
					$activeticker = $defaulter->get_ticker();
					$gainerticker = $defaulter->get_gainer();
					$loserticker = $defaulter->get_loser();
					$fbmklci = array();
					$fbmklci = $defaulter->getfbmklci();
					
				//this will create a class
				$controller = new $class;
				//get the class numbers of function
				$function_qty = $controller->get_num_func();
				//execute main function of that class and return an array of function
				$functions = $controller->main();
				//looping until number of method executed in that class
				for($i = 0; $i < $function_qty; $i++)
				{
					if($functions[$i][1] == "true")
					{
						//view model get return value from a method of that class
						$views[$i] = $controller->$functions[$i][0]();
					}
					else
					{
						$controller->$functions[$i][0]();
					}
				}
				
				}
				//display the model view in view
				include('views/main.php');
			}
			else
			{
			//did we name our class correctly?
			$message = 'class'.$class.'does not exist';

			}
		}
		else
		{
			//can't find the file in 'controllers'! 
			echo 'file'.$target.'not found';
		}
	}
	else
	{
	//if no watch
			?>
			<script language="javascript" type="text/javascript">
			window.location.href="index.php?watch=home";
			</script>
			<?php		
	}
}
else
{
//if not logged yet
echo "test";

}

?>
