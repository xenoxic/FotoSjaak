<?php
 $database = 0;
 
 switch ($database)
{
	case 0:
		define('SERVERNAME', 'localhost');
		define('USERNAME', 'root');
		define('PASSWORD', ''); 
		define('DATABASE', 'websitefotosjaak');
		break;
	case 1:
		define('SERVERNAME', '');
		define('USERNAME', '');
		define('PASSWORD', ''); 
		define('DATABASE', '');
		break;
	case 2:
		define('SERVERNAME', '');
		define('USERNAME', '');
		define('PASSWORD', ''); 
		define('DATABASE', '');
		break;
	default:
		break;
}

?>