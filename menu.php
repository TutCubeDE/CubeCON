<?php if (!defined('IN_SITE')) { echo "Zugriff verweigert!"; die(); }

//$sites = $db->getAllSites();
$sites = $db->getMenuWithSitesByID(1);
?>

<ul>
    <?php

    foreach($sites as $site) {
        if(!empty($site['title_in_menu'])) {
            $title = $site['title_in_menu'];
        } else {
            $title = $site['title'];
        }
        $list_entry = '<li><a href="' . $site['name_link'] . '">' . $title . '</a></li>';

        if($site['permission'] >= 3) {
            if($db->isUserLoggedIn()) {
                echo $list_entry;
            }
        } else {
            echo $list_entry;
        }
    }
?>
</ul>