<?php 
function redirect ($page)
{
switch ($page) {
	case '':
         include"main.php";
    break;
    case 'main':
         include"main.php";
    break;
    case 'login':
         include"login.php"; 
    break;
    case 'register':
         include"register.php"; 
    break;
    case 'lk':
         include"lk.php";
    break;
    case 'sessionclose':
         include"sessionclose.php";
echo '<script language="JavaScript"> 
  window.location.href = "http://dogs.loc/"
</script>';
    break;
    case 'lkedit':
         include"lkedit.php";
    break;
    case 'publicate':
         include "publicate.php";
    break;
    case 'sections':
         include "sections.php";
    break;
    case 'CssEdit':
         include "adminpanel/CssEdit.php";
    break;
    case 'AddSections':
         include "adminpanel/AddSections.php";
    break;
default:
        $id = str_replace("id","",$page);
         if(R::count('sections',"href = ?", [$page]) != 0)
          {
              include "pages.php";
          }
         elseif(R::count('pages',"id = ?", [$id]) != 0)
          {
              include "pageID.php";
          }
         else {include"404.php";}
         
         
         
}

}


?>