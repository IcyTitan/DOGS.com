<?php
if($_POST['submit'] == 'Применить изменения')
{
$id = $_POST['id'];
$name = str_replace(' ','',$_POST['name']);
$cod = str_replace(' ','',$_POST['cod']);
R::exec('UPDATE `RB`.`CSS` SET `_name`= ? WHERE  `id`= ?', array(
$name,
$id
));
R::exec('UPDATE `RB`.`CSS` SET `_cod`= ? WHERE  `id`= ?', array(
$cod,
$id
));

$fp = fopen("style.css", "w+");
for($i = 1; $i<=R::Count('CSS');$i++)
{
$style = R::findOne('CSS', 'id = ?',[$i]);
fwrite($fp, $style->_name);
fwrite($fp, '\n{');
fwrite($fp, $style->_cod);
fwrite($fp, "}\n");
}
fclose($fp);
$Name = $_POST['name'];
}
elseif($_POST['submit'] == 'Обновить')
{
$Name = $_POST['name'];
}
?>
<?php
$style = R::findOne('CSS', '_name = ?',[$Name]);
?>
	<div class = "CSSEDIT">
	<h1 class='contact-title'>
		Изменение стиля: <?php echo $Name ?>
		</h1>
	


 <form action="http://pizdabol.loc/CssEdit" method="post">
              <table>
              <tbody><tr>
              <th class="lable">Имя:</th>
              <td class="input">
        <select name="name">
                <?php 
                for($i = 1; $i<=R::Count('CSS');$i++)
                {
                $name = R::findOne('CSS', 'id = ?',[$i]);
                if($name->_name==$Name) $selected='selected = "selected"';
                echo '<option value="' ,$name->_name, '"',$selected,'>' ,$name->_name, '</option>';
                $selected='';
                }
                ?>
            </select>
              </td>    
               </tr>
            <tr>
              <th class="lable">Параметры:</th>
              <td class="input" >
              <textarea name="cod" cols="40" rows="10" class="аааа" ><?php echo $style['_cod'] ?></textarea>
              </td>
            </tr> 
            <br><br>       
            <tr><th></th>
              <td align="center">
              <input type=hidden name=id value="<?php echo $style['id'] ?>" >
              <input name="submit" type="submit" class="button" value="Применить изменения">
            <input name="submit" type="submit" value="Обновить"> </form>   </td>
                                  
            </tr>
              </tbody></table>
</div>
