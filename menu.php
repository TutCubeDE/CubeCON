<?php if (!defined('IN_SITE')) { echo "Zugriff verweigert!"; die(); }

$sites = $db->getAllSites();
?>

<ul>
    <?php
    foreach($sites as $site) {
        echo '<li><a href="' . $site['name_link'] . '">' . $site['title'] . '</a></li>';
    }
    if($db->isUserLoggedIn()) { ?>
        <li><a href="write_news">News schreiben</a></li>
        <li><a href="show_news">News</a></li>
    <?php } ?>
</ul>