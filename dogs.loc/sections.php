
<head>
<link rel="stylesheet" type="text/css" href="recources\s.css">
</head>
<?php 
include "panel.php";
$i = 1; 
$id = 1;
 while($i<=R::Count('sections'))
 {
 $id++; 
 $page = R::findOne('sections', 'id = ?', [$id]);
 if(isset($page->id))
    {
    $i++;
 ?>
<a href="<?php echo $page->href; ?>">
<div id="sections">
    <img style="align-content: center; margin-left: 7px;" src="<?php echo $page['picture'];?>" alt="Фото отсутствует" height="300px" width="300px" >
<br><?php echo $page->name; ?>
</div></a>
 <?php 
 }
 }
?>