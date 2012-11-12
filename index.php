<?php 
	require_once("class/MySqlDatabaseClass.php"); 
	require_once("class/LoginClass.php");
	
	$query = "INSERT INTO `login` ( `id`,
								`username`,
							`password`,
							`userrole`,
							`activated`)
				VALUES	  ( Null, 
							'test@gmail.com',
							'geheim',
							'sjaak',
							'yes')";

	//$database->fire_query($query);
	
	
	//$login = new LoginClass();
	
/*	Methode 1
	$login = new LoginClass();
	$query = "SELECT * FROM `login` ";
	$result = $login->find_by_sql($query);
	foreach ( $result as $value )
	{
 echo   $value->id." | 
		".$value->username." |
		".$value->password." |
		".$value->userrole." |
		".$value->activated.
		"<br />";
	}
*/

/* Methode 2
foreach ( $login->find_all() as $value )
	{
 echo   $value->id." | 
		".$value->username." |
		".$value->password." |
		".$value->userrole." |
		".$value->activated.
		"<br />";
*/		
		
	//Methode 3	
	echo $LoginClass::find_all(); 

?>
Dit is een test voor de database class




