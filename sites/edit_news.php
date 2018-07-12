<?php if (!defined('IN_SITE')) { echo "Zugriff verweigert!"; die(); }

if($db->isUserLoggedIn()) { ?>
    <h1>News bearbeiten</h1>

    <?php
        if(isset($_POST['eintragen'])) {
            $titel = $_POST['titel'];
            $news = $_POST['news'];
            $date = $_POST['datum'];
            $eintragID = $_POST['eintrag'];

            if($db->editEntry($titel, $news, $date, $eintragID)) {
                echo "Erfolgreich bearbeitet!";
            } else {
                echo "News konnte nicht bearbeitet werden!";
            }
        }

        if(isset($_GET['eintrag'])) {
            $entry_id = $_GET['eintrag'];
        } else if(isset($_POST['eintrag'])) {
            $entry_id = $_POST['eintrag'];
        } else {
            $entry_id = false;
        }

        $entry = $db->getEntryByID($entry_id);

        if($entry == false) {
            echo "<p>Falscher oder nicht vorhandener Eintrag ausgewählt</p>";
        } else {
            ?>
            <form action="../../index.php?section=edit_news" method="POST">
                <table border="0">
                    <tr>
                        <td>Autor:</td>
                        <td><?php echo $entry->Vorname . " " . $entry->Nachname; ?></td>
                    </tr>
                    <tr>
                        <td>Datum:</td>
                        <td><input type="text" name="datum" value="<?php echo date('d.m.Y H:i:s', strtotime($entry->Datum)); ?>" required /></td>
                    </tr>
                    <tr>
                        <td>Titel:</td>
                        <td><input type="text" name="titel" value="<?php echo $entry->Headline; ?>" required /></td>
                    </tr>
                    <tr>
                        <td>News:</td>
                        <td><textarea name="news" cols="80" rows="20"><?php echo $entry->Eintrag; ?></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Eintragen" name="eintragen" /> <a href='../../index.php?section=delete_news&eintrag=<?php echo $entry->Eintrag_ID; ?>'><input type="button" value="Löschen" /></a></td>
                    </tr>
                </table>
                <input type="hidden" value="<?php echo $entry->Eintrag_ID; ?>" name="eintrag" />
            </form>
            <?php
        }
} else {
    header("Location: index.php");
}
?>