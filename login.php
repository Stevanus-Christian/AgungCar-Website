
<?php 

# TOMBOL SIMPAN DIKLIK
if(isset($_POST['btnLogin'])){
	include "config/koneksi.php";
	$txtUsername   = $_POST['username'];
	$txtPassword   = $_POST['password'];
	
	// Validasi data pada form
	$pesanError = array();
	if (trim($txtUsername)==""and trim($txtPassword)=="") {
		echo "<script>alert('Username/Password masih kosong'); window.location = 'login'</script>";
	}
	


	$sql=mysqli_query($mysqli,"select * from member where email='$txtUsername' and password=sha1('$txtPassword')");
	$counta=mysqli_num_rows($sql);
	$ra=mysqli_fetch_array($sql);
	
	
		if($counta>0){
			session_start();
			$_SESSION['id_login']	= $ra['id_member'];
			$_SESSION['username']     = $ra['email'];
			$_SESSION['passuser']     = $ra['password'];
			
			header('location:berandamember');
		}
		else if($counta < 1) {
				echo "<script>alert('Maaf Username/ Password belum sesuai silahkan coba lagi!'); window.location = 'login'</script>";
		}	
	
	
}
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Silahkan Masuk</h4>
                                    </div>
                                    <form  method="post">
                                        <div class="form-group"><input class="form-control form-control-user" type="email" id="username" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="username"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password"></div>
                                        <div class="form-group">
                                   
                                        <button name="btnLogin" class="btn btn-primary btn-block text-white btn-user" type="submit">Login</button>
                                      
                                    </form>
                                    <div class="text-center"><a class="small" href="member">Belum punya akun?</a></div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 