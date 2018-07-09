<?php if (!defined('IN_SITE')) { echo "Zugriff verweigert!"; die(); }
switch($section)
{
    case "videos":
        include("videos.php");
        break;

    case "ueber_mich":
        include("ueber_mich.php");
        break;

    case "impressum":
        include("impressum.php");
        break;

    case "login":
        include("login.php");
        break;

    case "logout":
        include("logout.php");
        break;

    case "write_news":
        include("write_news.php");
        break;

    case "show_news":
        include("show_news.php");
        break;

    case "edit_news":
        include("edit_news.php");
        break;

    case "delete_news":
        include("delete_news.php");
        break;

    default:
        include("startseite.php");
        break;
}
?>