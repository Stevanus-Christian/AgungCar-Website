
<?php
error_reporting(0);


if ($_GET['module']=='home'){ include "modul/mod_home/home.php";}
elseif ($_GET['module']=='mobil'){include "modul/mod_mobil/mobil.php";}
elseif ($_GET['module']=='profil'){include "modul/mod_profile/profile.php";}
elseif ($_GET['module']=='layanan'){include "modul/mod_layanan/layanan.php";}
elseif ($_GET['module']=='layananadd'){include "modul/mod_layanan/layanan_add.php";}
elseif ($_GET['module']=='layananedit'){include "modul/mod_layanan/layanan_edit.php";}
elseif ($_GET['module']=='layanandel'){include "modul/mod_layanan/layanan_delete.php";}

elseif ($_GET['module']=='laporanpesanan'){include "modul/mod_laporan/laporanview.php";}


elseif ($_GET['module']=='login'){include "login.php";}
elseif ($_GET['module']=='logout'){include "logout.php";}

else { include "modul/mod_home/home.php";}	

?>


