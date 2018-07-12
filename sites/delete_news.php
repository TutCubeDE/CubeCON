<?php if (!defined('IN_SITE')) { echo "Zugriff verweigert!"; die(); }

if($db->isUserLoggedIn()) { ?>
    <h1>News löschen</h1>

    <?php
    if(isset($_GET['eintrag'])) {

        $entry_id = $_GET['eintrag'];

        if(isset($_POST['loeschen'])) {
            if($db->deleteEntry($entry_id)) {
                echo "<p>Artikel erfolgreich gelöscht!</p>";
            } else {
                echo "<p>Artikel konnte nicht gelöscht werden!</p>";
            }
        } else {
            $entry = $db->getEntryByID($entry_id);

            echo "<p>Soll der Artikel '" . $entry->Headline . "' wirklich gelöscht werden?</p>";

            echo "<form action='index.php?section=delete_news&eintrag=" . $entry_id . "' method='POST'>";
            echo "<input type='submit' value='Ja, löschen' name='loeschen'>";
            echo "</form>";
        }

    } else {
        echo "<p>Keine News ausgewählt!</p>";
    }
} else {
    header("Location: index.php");
}
?>