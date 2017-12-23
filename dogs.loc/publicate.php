<html>
<head>
	<link href="resource\s.css" rel="stylesheet">
	
</head>
<body>

<?php

 if((!isset($_SESSION['logged_user'])) or ($_SESSION['permission']==0))
	{
redirect(main);
}
 else
 {

	$data = $_POST;
	$login = R::findOne('users', 'login=?', [$_SESSION['login']] );
include "panel.php";
if(isset($data['do_publish']))
{
	if((trim($data['name']) == "") or (trim($data['category']) == "") or (trim($data['text']) == ""))
	{
		?>
		<div>
			<p>Вы ввели не все данные!</p>
		</div>
		<?php
	}
else
{
	$text = R::dispense('pages');
	$text -> name = $data['name'];
	$text -> section_name = $data['category'];
	$text -> text = $data['text'];
	$text -> picture = $data['picture'];
	$text -> author = $login -> login;
	R::store($text);
}
}
?>
<div id="upper2">
	<form action="publicate" method="POST">

		<table id="pub">
			<tr>
				<td>Название:</td>
				<td><input type="text" placeholder="Название" name="name" value="<?php echo $data['name']; ?>"></td>
			</tr>
			<tr>
				<td>Фото:</td>
				<td><input type="text" placeholder="ссылка" name="picture" value="<?php echo $data['picture']; ?>"></td>
			</tr>
			<tr>
				<td>Категория:</td>
				<td>        
                <select name="category">
                <?php 
                for($i = 1; $i<=R::Count('sections');$id++)
                {
                $name = R::findOne('sections', 'id = ?',[$id]);
                if(isset($name->id))
                {
                $i++;
                if($name->name==$Name) $selected='selected = "selected"';
                echo '<option value="' ,$name->name, '"',$selected,'>' ,$name->name, '</option>';
                $selected='';
                }
                }
                ?>
                </select>
                </td>
			</tr>
			<tr>
				<td>Текст:</td>
				<td><textarea name="text" placeholder="Текст статьи.." cols="80" rows="60" ><?php echo $data['text']; ?></textarea></td>
			</tr>
			<tr>
				<td>
					<td>
			<button type="submit" name="do_publish">Опубликовать</button>
							</td></td>
			</tr>
		</table>
	</form>
	
		</div
		<?php } ?>
</body>
</html>