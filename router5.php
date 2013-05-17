<?php

//mark 2 routing system
//this system will routing the url into spesific url,controller,model,view
//trying to setup the view include/use default view/or external view
if (!isset($_SESSION)) session_start();

define('SERVER_ROOT' , dirname(__FILE__));
define('SITE_ROOT' , 'http://localhost:8080/nmvc/');

//request
if(isset($_GET['watch']))
{

//if the user is already log in, the user will be able to access the logged controller
if(isset($_SESSION['userid']))
{

		$page = $_GET['watch'];
		$functions = array();
		//model view
		$views = array();
		//compute the path to the file
		$target = SERVER_ROOT . '/controller/logged/' . $page . '.php';
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
					$default = SERVER_ROOT . '/controller/logged/home.php';
					include_once($default);
					$defaulter = new $class;
					$scoreboard = array();
					$scoreboard = $defaulter->getscoreboard();
					$activeticker = $defaulter->get_ticker();
					$gainerticker = $defaulter->get_gainer();
					$loserticker = $defaulter->get_loser();
					$fbmklci = array();
					$fbmklci = $defaulter->getfbmklci();
					$allc = array();
					$allc = $defaulter->getallcounter();
					$allc_rows = $defaulter->get_rows();
					$home_option = $defaulter->view_option();
					$filename = $defaulter->view();
					//default view option
					$view_option = "included";
					//routing the view
					//this will include the table inside the view
					
				} 
				else
				{
					//this will load all default
					$default = SERVER_ROOT . '/controller/logged/home.php';
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
				//view option --> included or excluded
				$view_option = $controller->view_option();
				//user define view
				$user_view = $controller->view();
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
				if($view_option == "included")
				{
				//display the model view in view
				include('views/main.php');
				}
				else
				{
				include('views/'.$user_view);
				}
				
			}
			else
			{
			//did we name our class correctly?
			$message = 'class'.$class.'does not exist';
			?>
			<script language="javascript" type="text/javascript">
			window.location.href="index.php?watch=home&message=<?php echo $message ?>&line=1.1";
			</script>
			<?php	
			}
		}
		else
		{
			//can't find the file in 'controllers'! 
			$message = 'file'.$target.'not found';
			?>
			<script language="javascript" type="text/javascript">
			window.location.href="index.php?watch=home&message=<?php echo $message ?>&line=1.2";
			</script>
			<?php	
		}
	
	
	}
	else
	{
	//if not logged yet
	//echo "test";
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
					$view_option = "included";
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
				//view option --> included or excluded
				$view_option = $controller->view_option();
				//user define view
				$user_view = $controller->view();	
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
				if($view_option == "included")
				{
				//display the model view in view
				include('views/home.php');
				}
				else
				{
				include('views/'.$user_view);
				}
				
			}
			else
			{
			//did we name our class correctly?
			$message = 'class '.$class.' does not exist';
			?>
			<script language="javascript" type="text/javascript">
			window.location.href="index.php?watch=home&message=<?php echo $message ?>&line=2.1";
			</script>
			<?php	

			}
		}
		else
		{
			//can't find the file in 'controllers'! 
			$message = 'file'.$target.'not found';
			?>
			<script language="javascript" type="text/javascript">
			window.location.href="index.php?watch=home&message=<?php echo $message ?>&line=2.2";
			</script>
			<?php	
		}
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

?>
