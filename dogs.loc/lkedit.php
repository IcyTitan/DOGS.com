<html>
	<head>
		<link href="resource\s.css" rel="stylesheet">

	</head>
	<body>
		<?php
if(!isset($_SESSION['logged_user'])) 
{
	redirect(login);
}
else
{
$data1=$_POST;

 $login = R::findOne('users', 'login = ?',[$_SESSION['login']]);
	if(isset($data1['do_save']))
	{
	R::exec('UPDATE users SET name= ?, about=? WHERE login= ?', array(
$data1['name'],
$data1['about'],
$login->login
));
	echo '<script language="JavaScript"> 
  window.location.href = "lk"
  </script>';
	echo "<div id='suc'>";
	echo "Изменения сохранены!";
	
	echo "<a href ='lk'>В личный кабинет</a>";
	echo "</div>";
	}






?>
		<div id="upper2">
			<form action="lkedit" method="POST">
	<p>
	<p>Имя:</p>
	<input type="text" name="name" value="<?php echo "$login->name"; ?>">
	</p>
	<p>
		<p>О себе:</p>
		<textarea class="tex" name="about" cols="40" rows="10" ><?php echo "$login->about"; ?></textarea>
	</p>
	
<p>
	<button id="button" type="submit" name="do_save">Сохранить!</button>
	
</p>
</form>
		</div>
		<?php } ?>
	</body>
</html>