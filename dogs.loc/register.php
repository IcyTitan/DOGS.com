<?php
 /* include "libs/recaptchalib.php"
  // ваш секретный ключ
$secret = "6Lcl2jwUAAAAAFJkWHl1CF43ijnOWYyQ1EJw5YU3";
 
// пустой ответ
$response = null;
 
// проверка секретного ключа
$reCaptcha = new ReCaptcha($secret);

if ($_POST["g-recaptcha-response"]) {
$response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}    
if( isset( $data['do_register'] ) )
{
     if ($response != null && $response->success) {
        echo '<center><sup><b><font color="Green">Спасибо, что ввели капчу!</font></b></sup><center>';
        }
        else
        {
        $errors[] = "Капча не введена!";
        }
}*/
?>

<head>
	<link href="resource\s.css" rel="stylesheet">
	<script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>
	<?php
	if(isset($_SESSION['logged_user'])) 
{
	redirect(lk);
}
else
{
	$data=$_POST;
	if(isset($data['do_register']))
	{
$errors=array();
if(trim($data['login'] == ''))
{
	$errors[] = "Введите логин!";
}
elseif($data['password'] == '')
{
$errors[] = "Введите пароль!";
}
elseif($data['password'] != $data['password2'])
{
	$errors[] = "Пароли не совпадают!";
}
elseif(R::count('users',"login = ?", array(trim($data['login']))) > 0)
    {
    $errors[] = "Пользователь с таким логином уже существует";
    }
       elseif(!preg_match("/^[a-zA-Z0-9 ]+$/",$data['login']))

    {
        $error[] = "Логин может состоять только из букв английского алфавита и цифр";
    }
if(empty($errors))
{
	$user = R::dispense('users');
	$user -> login = trim($data['login']);
	$user -> password = password_hash($data['password'], PASSWORD_DEFAULT);
	R::store($user);
	echo "Вы успешно зарегестрированы!";
	echo "<a href='index'>На главную</a>";
	$_SESSION['logged_user'] = user;
	$_SESSION['login'] = $user -> login;
echo '<script language="JavaScript"> 
  window.location.href = "http://dogs.loc/main"
  </script>';
}
else 
{
	echo array_shift($errors);
}
	}
	?>
	<div id="upper2">
	<h2>Регистрация:</h2>
<form action="register" method="POST">
	<p>
	<p>Введите лоин:</p>
	<input type="text" name="login" value="<?php echo $data['login']?>">
	</p>
	<p>
		<p>Введите пароль:</p>
		<input type="password" name="password" value="<?php echo $data['password']?>">
	</p>
	<p>
		<p>Подтвердите пароль:</p>
		<input type="password" name="password2" value="<?php echo $data['password2']?>">
	</p>
	<!--<center><div class="g-recaptcha" data-sitekey="6Lcl2jwUAAAAAPPXX3EB2eX5HfGuYIikmtE2pyOd"></div></center>-->
<p >
	<button type="submit" name="do_register">Зарегестрироваться!</button>
	<button><a href="main">На главную</a></button>
</p>
</form>
</div>
<?php } ?>
</body>