<?php

if ($_GET['module']==''){ include "modul/mod_home/home.php";}
elseif ($_GET['module']=='galery'){include "modul/mod_galery/galery.php";}
elseif ($_GET['module']=='rental'){include "modul/mod_rental/rental.php";}
elseif ($_GET['module']=='login'){include "login.php";}
elseif ($_GET['module']=='member'){include "modul/mod_member/member.php";}

else { include "modul/mod_home/home.php";}	
?>


