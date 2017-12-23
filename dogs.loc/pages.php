<head>
<link rel="stylesheet" type="text/css" href="recources\s.css">
</head>
<?php 
include "panel.php";
$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$URL_Parts = explode('/', trim($URL_Path, '/'));
 for($i = 1; $i<=R::Count('pages');$i++)
 {
 $page = R::findOne('pages', 'id = ?', [$i]);
 if($page->section_name == $URL_Parts[0])
 {
  if(isset($page->id))
    {
 ?>
 <a href="<?php echo "id".$page->id; ?>">
<div id="sections">
    <img style="align-content: center; margin-left: 7px; padding-right: 4px;" src="<?php echo $page->picture;?>" alt="Фото отсутствует" height="300px" width="300px" >
<br> <?php echo $page->name; ?>
</div>
</a>
 <?php 
 }
 }
 }
?>