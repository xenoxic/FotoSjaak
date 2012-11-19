<?php
if ( isset($_POST['submit'] ))
{
	//geef het pad op naar het bestand LoginClass
	require_once('class/LoginClass.php');
	
	//Code om de gegevens op te slaan
	if ( LoginClass::emailaddress_exits($_POST['email']) )
	{
		//meldt dat email al in gebruik is
		//er moet ander email gekozen worden	
		echo "Het ingevulde emailadres is al in gebruik. <br />
			  Kies een ander emailadres.";
		header("refresh:4;url=register.php");
	}
	else
	{
		//schrijf alle gegevens naar database 
		LoginClass::insert_into_login($_POST);
		//verstuur een e-mail met activatie mail
		echo "Uw Activatie email is verzonden.";
	}
	
}
else
{
?>

<form action='register.php' method='post'>
	<table>
		<tr>
			<td>firstname</td>
			<td><input type='text' name='firstname' /></td>
		</tr>
		<tr>
			<td>infix</td>
			<td><input type='text' name='infix' /></td>
		</tr>
		<tr>
			<td>surname</td>
			<td><input type='text' name='surname' /></td>
		</tr>
		<tr>
			<td>address</td>
			<td><input type='text' name='address' /></td>
		</tr>
		<tr>
			<td>addressnumber</td>
			<td><input type='text' name='addressnumber' /></td>
		</tr>
		<tr>
			<td>zipcode</td>
			<td><input type='text' name='zipcode' /></td>
		</tr>
				<tr>
			<td>city</td>
			<td><input type='text' name='city' /></td>
		</tr>
		<tr>
			<td>country</td>
			<td><input type='text' name='country' /></td>
		</tr>
		<tr>
			<td>phonenumber</td>
			<td><input type='text' name='phonenumber' /></td>
		</tr>
		<tr>
			<td>mobilenumber</td>
			<td><input type='text' name='mobilenumber' /></td>
		</tr>		
		<tr>
			<td>e-mail</td>
			<td><input type='text' name='email' /></td>
		</tr>		
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' name='submit' value='verstuur' /></td>
		</tr>		
	</table>
</form>
<?php
}
?>