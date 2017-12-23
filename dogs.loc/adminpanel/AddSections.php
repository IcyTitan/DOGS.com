<?php
if($_SESSION['permission']==1)
{
$data=$_POST;
	if(isset($data['do_save']))
	{
	$section = R::dispense('sections');
	$section->href = $data['href'];
	$section->name = $data['name'];
	$section->picture = $data['picture'];
	R::store($section);
    }
?>

<html>
	<head>
		<link href="resource\s.css" rel="stylesheet">

	</head>
	<body>


		<div id="upper2">
			<form action="AddSections" method="POST">
	<p>
	<p>Имя раздела:</p>
	<input type="text" name="name">
	</p>
		<p>
	<p>Ссылка на раздел:</p>
	<input type="text" name="href">
	</p>
		<p>
	<p>Картинка:</p>
	<input type="text" name="picture">
	</p>
	
<p>
	<button id="button" type="submit" name="do_save">Сохранить!</button>
	
</p>
</form>
<button><a href="main">На главную</a></button>
		</div>
	</body>
</html>
<?php }
else 
{
	redirect(main);
}?>