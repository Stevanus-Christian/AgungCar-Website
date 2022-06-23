<?php

// Kode di URL harus ada
if(empty($_GET['id'])){
	echo "<b>Data yang dihapus tidak ada</b>";
}
else {
	// Membaca Kode dari URL
	$Kode	= $_GET['id'];
	
	// Menghapus data sesuai Kode yang didapat di URL

	$sql 	= "DELETE FROM layanan  WHERE id_layanan ='$Kode'";
	
	$myQry 	= mysqli_query($mysqli,$sql) or die ("Eror hapus data".mysqli_error());
	if($myQry){
	
		// Refresh halaman
		echo "<meta http-equiv='refresh' content='0; url=layanan'>";
	}
}
?>