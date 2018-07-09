<?php if (!defined('IN_SITE')) { echo "Zugriff verweigert!"; die(); } ?>

<ul>
    <li><a href="startseite">Startseite</a></li>
    <li><a href="videos">Videos</a></li>
    <li><a href="ueber_mich">Über mich</a></li>
    <li><a href="impressum">Impressum</a></li>
    <li><a href="login">Login</a></li>
    <?php if($db->isUserLoggedIn()) { ?>
        <li><a href="write_news">News schreiben</a></li>
        <li><a href="show_news">News</a></li>
    <?php } ?>
</ul>