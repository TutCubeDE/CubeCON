<?php
	session_start();
    define('IN_SITE', true);
	
    if(isset($_GET["section"]))
    {
        $section = $_GET["section"];
    }
    else
    {
        $section = "";
    }
	
	require_once 'mysql.php';
	$db = new DB();
?>
<html>
    <head>
        <title> Mein Grundgerüst </title>
        <meta charset="UTF-8"> 
        <link rel="stylesheet" type="text/css" href="style.css">

        <!--[if gte IE 9]>
        <style type="text/css">
        .gradient {
        filter: none;
        }
        </style>
            <![endif]-->
    </head>
    <body>
        <div id="wrapper" class="shadow">
            <header>

            </header>

            <nav>
                    <?php include("menu.php"); ?>
            </nav>

            <main>
                    <?php include("sites.php"); ?>
            </main>
        </div>
        <footer>
                <?php include("footer.php"); ?>
        </footer>
        
	<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	<script>
            tinymce.init({selector:'textarea'});
    </script>
    
    </body>
</html>
