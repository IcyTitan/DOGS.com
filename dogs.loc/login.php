<head>
	<link href="resource\s.css" rel="stylesheet">

</head>
<body>
	<?php
	$r=0;
if(isset($_SESSION['logged_user'])) 
{
	redirect(lk);
}
else
{
$data=$_POST;
if(isset($data['do_login']))
{
$errors = array();
$user= R::findOne('users', 'login = ?', array($data['login']));
if($user)
{
	if(password_verify($data['password'], $user->password))
{

	$_SESSION['logged_user'] = $user;
	$_SESSION['login'] = $user->login;
	$_SESSION['permission'] = $user->permission;
	
	$r=1;

}
else{
	$errors[]='Неверный пароль!';
}

}
else{
	$errors[]='Неверный логин!';
}
}
if(!empty($errors))
{
	echo array_shift($errors);
}

if($r==1)
{
redirect(main);
}
elseif(!isset($_SESSION['logged_user']))
{
?>

<div id="upper2">
<h1>Авторизация:</h1>
<form id="inputs" action="login" method="POST">
	<p>
	<p>Логин:</p>
	<input type="text" name="login" value="<?php echo $data['login']?>">
	</p>
	<p>
		<p>Пароль:</p>
		<input type="password" name="password">
	</p>
    <p><button type="submit" name="do_login">Войти</button></p>
	<br>
	<p>Ещё нет своего аккаунта? <p>
	<br><button><a href="register">Зарегестрируйтесь!</a></button>
	
	<button><a href="main">На главную</a></button>
</form>
</div>
<?php }
 elseif(isset($_SESSION['logged_user']))
 {
 ?>
 <сюда пиши>
 <?php
 }
 }?>
</body>

