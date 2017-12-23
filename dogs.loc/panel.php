<html>
<head>
	<link href="resource\s.css" rel="stylesheet">
	</head>

<body> 
<nav>
  <ul class="topmenu">
  	 <li><a href="main">Home</a></li>
      <li><a href class="down">Меню</a>
      <ul class="submenu">
        <li > <a href="sections">разделы </a></li>
        <li><a style="display: inline-block;" href="AddSections">ред.</a></li>
        <li><?php if($_SESSION['permission'] == 1) { ?><a href="publicate">Публикация</a><?php } ?></li>
      
      </ul>
    </li>
    <li><?php

if(isset($_SESSION['logged_user']))
{
?> 
<a href="" class="down"><?php echo $_SESSION['login']; ?></a>
<ul class="submenu">
<li><a href="lk">Личный кабинет</a></li>
<li><a href="sessionclose">Выйти</a></li>
</ul>


<?php
}
else
{
	echo "<a href='login'>Авторизация</a></div>";
}
?>
 
</li>
</ul>
</nav>


 
</body>

</html>