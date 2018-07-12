<?php if (!defined('IN_SITE')) { echo "Zugriff verweigert!"; die(); }

if($db->isUserLoggedIn()) {
    $entries = $db->getAllEntries("DESC");

    // Wenn -1 zurückgegen wurde, dann nichts anzeigen. Habe ich der einfachheithalber weggelassen
    // Ist eine einfache if-Abfrage :)

    echo "<table>";
    echo "<th>Datum</th>";
    echo "<th>Titel</th>";
    echo "<th>Autor</th>";
    echo "<th>Bearbeiten</th>";
    echo "<th>Löschen</th>";

    foreach($entries as $entry) {
        echo "<tr>";
        echo "<td>" . date('d.m.y H:i:s', strtotime($entry['Datum'])) . "</td>";
        echo "<td>" . $entry['Headline'] . "</td>";
        echo "<td>" . $entry['Vorname'] . " " . $entry['Nachname'] . "</td>";
        echo "<td><a href='index.php?section=edit_news&eintrag=" . $entry['Eintrag_ID'] . "'>X</a></td>";
        echo "<td><a href='index.php?section=delete_news&eintrag=" . $entry['Eintrag_ID'] . "'>X</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    header("Location: index.php");
}
?>