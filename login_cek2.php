<?php 
include "config/koneksi.php";
	$txtUsername   = $_POST['username'];
	$txtPassword   = $_POST['password'];
	

	// Validasi data pada form
	$pesanError = array();
	if (trim($txtUsername)=="") {
		echo"<h5><b>--> Username</b> yang masih kosong</h5>";
	}
	if (trim($txtPassword)=="") {
		echo"<h5><b>--> Password</b> masih kosong</h5>";
	}

if ($kode=='1'){ 

	$sqlmember=mysqli_query($mysqli,"select * from member where username='$txtUsername' and password=sha1('$txtPassword')");
	$countmember=mysqli_num_rows($sqlmember);
	$ra=mysqli_fetch_array($sqlmember);
	
	if($countmember>0){
			session_start();
			$_SESSION['kdmember']	= $ra['kdmember'];
			$_SESSION['namamember']     = $ra['namamember'];
			$_SESSION['valid']     = $ra['status'];
			$_SESSION['passmember']     = $ra['password'];
			echo 'member';
	}
	
	else if($countmember < 1) {
				echo "Maaf Username dan Password Member belum sesuai silahkan coba lagi!";
		}	


}

	
else {
	$sql=mysqli_query($mysqli,"select * from t_marketing where username='$txtUsername' and password=sha1('$txtPassword')");
	$counta=mysqli_num_rows($sql);
	$ra=mysqli_fetch_array($sql);
	
	
		if($counta>0){
			session_start();
			$_SESSION['kdmarketing']	= $ra['kdmarketing'];
			$_SESSION['nama']     = $ra['nama'];
			$_SESSION['username']     = $ra['nama'];
			$_SESSION['password']     = $ra['password'];
			$_SESSION['level']    	= 'marketing';
			echo 'marketing';
		}
			
		else if($counta < 1) {
				echo "Maaf Username dan Password belum sesuai silahkan coba lagi!";
		}	
	}
	
	
	

?>