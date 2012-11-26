Dit is de Activatie pagina. <br />
Uw account is nu Actief.<br />
<?php
//echo "gebruikersnaam: ".$_GET['em']."<br />";
//echo "password: ".$_GET['pw']."<br />";
if (isset($_POST['submit']))
{
	if ( !strcmp($_POST['wachtwoord'], $_POST['wachtwoord-check']))
	{
		LoginClass::update_password($_POST['email'], $_POST['wachtwoord']);
		echo "Uw wachtwoord is succesvol veranderd <br /> U wordt doorgestuurd naar de startpagina";
		header("refresh:3;url=index.php");
	}
	else
	{
		echo "De ingevoerde wachtwoorden komen niet overeen <br />
		Probeer het opnieuw";
		header("refresh:3;url=activatie.php?em=".$_POST['email']);
	}
?>
Welkom op onze site.
<form action='' method=''>
	<table>
		<tr>
			<td>nieuw wachtwoord</td>
			<td><input type='password' name='wachtwoord' size=12 maxlength=12/></td>
		</tr>
		<tr>
			<td>herhaal nieuw wachtwoord</td>
			<td><input type='password' name='wachtwoord-check' size=12 maxlength=12/></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' name='submit' value='verstuur'/></td>
				<input type='hidden' name='email' value='<?php echo $_GET['em']; ?>' />
		</tr>
	</table>
</form>
<?php
}
?>