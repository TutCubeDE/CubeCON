<?php if (!defined('IN_SITE')) { echo "Zugriff verweigert!"; die(); } ?>
    <h1>Login</h1>

<?php
	if($db->isUserLoggedIn() === TRUE) {
		echo "Du bist bereits eingeloggt! :) - <a href='index.php?section=logout' alt='Ausloggen'>(ausloggen)</a>";
	} else {
		if(isset($_POST['einloggen'])) {
			$mail = $_POST['email'];
			$passwort = sha1($_POST['passwort']);
			
			if($db->login($mail, $passwort) === TRUE) {
				echo "Erfolgreich eingeloggt!";
			} else {
				echo "Einloggen fehlgeschlagen!";	
			}
		}
?>

<form action="index.php?section=login" method="POST">
    <table>
        <tr>
            <td>
                E-Mail:
            </td>
            <td>
                <input type="email" name="email" required />
            </td>
        </tr>
        <tr>
            <td>
                Passwort:
            </td>
            <td>
                <input type="password" name="passwort" required />
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="einloggen" value="Einloggen" />
            </td>
        </tr>
    </table>
</form>
<?php
	}
?>