<head>
</head>
<?php 
include "panel.php";
$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$URL_Parts = explode('/', trim($URL_Path, '/'));
$id = str_replace("id","",$URL_Parts[0]);
$page = R::findOne('pages', 'id = ?', [$id]);
?>
<body>
<div id="upper2">
	<h1 style="text-align: center;"><?php echo $page->name; ?></h1>
<img style="padding-bottom: 10px;" src="<?php echo $page->picture; ?>">
<div style="word-wrap: break-word; text-align: left;">
<?php

$e=$page->text;
$r=count($e);

var_dump($r);
for($i=0; $i<count($page->text); $i++)
{
	if($page->text[$i]=='\n')
	{
		echo"<br>";
	}
 elseif(($i%20)==0)
 {

 	echo"<br>";
 	echo $page->text[$i];
 }
else
{
	echo $page->text[$i];
}
}


?>
</div>
</div>
</body>