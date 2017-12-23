<html>
<head>
	<link href="resource\s.css" rel="stylesheet">
</head>
<body>
<?php
include "panel.php";
if(!isset($_SESSION['logged_user'])) 
{
	redirect(login);
}

else
{
?>
		<div id="upper3">
		<h1 align="center">
		<?php		
$login = R::findOne('users', 'login = ?',[$_SESSION['login']]);
if(trim($login->name)=="")
{
	echo $login->login;
	echo "</h1>";
}
else
{
echo $login->name."</h1>";

echo "<p style = 'text-align: center'>";
echo "(".$login->login.")";
echo "</p>";
}
		?>

		<br>
	</h1>
		<div class="xep">
			
		<?php
		$xep=$login->about;

		echo "<h3 align='left'>О себе: <br></h3>";
	
for($i=0; $i<=strlen($xep); $i++) 
{

if($xep[$i]=="\n")
{
echo "<br><br>".$xep[$i];

}
else
{
echo $xep[$i];
}

}
?>
	</div>
		<br>
		<div align="center">
		<button  ><a  href="lkedit">Редактировать</a></button> 
	</div>


</div>
<?php } ?>
</body>
</html>