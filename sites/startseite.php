<?php if (!defined('IN_SITE')) { echo "Zugriff verweigert!"; die(); }

$site = $db->getSiteByNameLink($section);
echo "<h1>" . $site['title'] . "</h1>";

$entries = $db->getAllEntries("DESC");

// Wenn -1 zurückgegen wurde, dann nichts anzeigen. Habe ich der einfachheithalber weggelassen
// Ist eine einfache if-Abfrage :)

foreach($entries as $entry) {
    echo "<article>";
    echo "<h1>" . $entry['Headline'] . "</h1>";
    echo "<p>" . $entry['Eintrag'] . "</p>";
    echo "<footer>Geschrieben von <b>" . $entry['Vorname'] . " " . $entry['Nachname'] . "</b> am " . date('d.m.y', strtotime($entry['Datum'])) . " um " . date('H:i', strtotime($entry['Datum'])) . " Uhr ";
    if($db->isUserLoggedIn()) {
        echo "| <a href='index.php?section=edit_news&eintrag=" . $entry['Eintrag_ID'] . "'>Bearbeiten</a>";
    }
    echo "</footer></article>";
}

?>
