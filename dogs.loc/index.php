<?php
require("db.php");
require('libs\redirect.php');
?>
<html>
<head>
<link href="resource/style.css" rel="stylesheet">
</head>

<?php
$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$URL_Parts = explode('/', trim($URL_Path, '/'));
 if(count($URL_Parts)>1)
{include"404.php";}
else
{         
redirect($URL_Parts[0]);       
}
?>
