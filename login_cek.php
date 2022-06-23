<?php 
include "/config/koneksi.php";
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



	$sqlmember=mysqli_query($mysqli,"select * from member where email='$txtUsername' and password=sha1('$txtPassword')");
	$countmember=mysqli_num_rows($sqlmember);
	$ra=mysqli_fetch_array($sqlmember);
	
	if($countmember>0){
			session_start();
			$_SESSION['kdmember']	= $ra['kdmember'];
			$_SESSION['namamember']     = $ra['namamember'];
			$_SESSION['valid']     = $ra['status'];
			$_SESSION['passmember']     = $ra['password'];
			echo 'ok';
	}
	
	else if($countmember < 1) {
				echo "Maaf Username dan Password Member belum sesuai silahkan coba lagi!";
		}	



?>