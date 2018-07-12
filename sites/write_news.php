<?php if (!defined('IN_SITE')) { echo "Zugriff verweigert!"; die(); }

if($db->isUserLoggedIn()) { ?>
    <h1>News schreiben</h1>

    <?php
    if(isset($_POST['eintragen'])) {
        $titel = $_POST['titel'];
        $news = $_POST['news'];

        if($db->createNewNews($titel, $news)) {
            echo "Erfolgreich hinzugefügt!";
        } else {
            echo "News konnte nicht hinzugefügt werden!";
        }
    }
    ?>
    <form action="index.php?section=write_news" method="POST">
        <table border="0">
            <tr>
                <td>Datum:</td>
                <td><?php echo date('d.m.y H:i', time()); ?></td>
            </tr>
            <tr>
                <td>Titel:</td>
                <td><input type="text" name="titel" placeholder="Titel" required /></td>
            </tr>
            <tr>
                <td>News:</td>
                <td><textarea name="news" cols="80" rows="20"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Eintragen" name="eintragen" /></td>
            </tr>
        </table>
    </form>
<?php
} else {
    header("Location: index.php");
}
?>