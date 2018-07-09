<?php if (!defined('IN_SITE')) { echo "Zugriff verweigert!"; die(); } ?>

<ul>
    <li><a href="index.php?section=startseite">Startseite</a></li>
    <li><a href="index.php?section=videos">Videos</a></li>
    <li><a href="index.php?section=ueber_mich">Über mich</a></li>
    <li><a href="index.php?section=impressum">Impressum</a></li>
    <li><a href="index.php?section=login">Login</a></li>
    <?php if($db->isUserLoggedIn()) { ?>
        <li><a href="index.php?section=write_news">News schreiben</a></li>
        <li><a href="index.php?section=show_news">News</a></li>
    <?php } ?>
</ul>