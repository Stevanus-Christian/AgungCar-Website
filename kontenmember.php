<?php


if ($_GET['module']=='berandamember'){ include "modul/mod_home/berandamember.php";}


elseif ($_GET['module']=='detailpesanan'){include "modul/mod_pesanan/detailpesanan.php";}
elseif ($_GET['module']=='rental'){include "modul/mod_rental/rental.php";}
elseif ($_GET['module']=='login'){include "login.php";}
elseif ($_GET['module']=='member'){include "modul/mod_member/member.php";}

else { include "modul/mod_home/home.php";}	
?>


