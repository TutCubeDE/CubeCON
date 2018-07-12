<?php if (!defined('IN_SITE')) { echo "Zugriff verweigert!"; die(); }

$site = $db->getSiteByNameLink($section);

if(empty($site)) {
    include("sites/startseite.php");
} else {
    include("sites/" . $site['name_file'] . ".php");
}
?>