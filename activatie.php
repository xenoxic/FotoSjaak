Dit is de Activatie pagina. <br />
Uw account is nu Actief.<br />
<?php
echo "gebruikersnaam: ".$_GET['em']."<br />";
echo "password: ".$_GET['pw']."<br />";
?>
Welkom op onze site.
<form action='' method=''>
	<table>
		<tr>
			<td>nieuw wachtwoord</td>
			<td><input type='password' name='wachtwoord'/></td>
		</tr>
		<tr>
			<td>herhaal nieuw wachtwoord</td>
			<td><input type='password' name='wachtwoord'/></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' name='submit' value='verstuur'/></td>
		</tr>
	</table>
</form>
<?php

?>