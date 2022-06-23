<?php 
# TOMBOL SIMPAN DIKLIK
if(isset($_POST['btnSimpan'])){
	$namamember =$_POST['namamember']; 
	$alamatmember =$_POST['alamatmember'];
	$email =$_POST['email'];
	$nohp =$_POST['nohp'];
	$username =$_POST['username'];
	$password =SHA1($_POST['password']);

			$Sql	= "INSERT INTO member set 
			 namamember='$namamember', alamatmember='$alamatmember',
			 email='$email', nohp='$nohp', username ='$username', 
			 password ='$password', status ='0'";
					
						
		$myQry	= mysqli_query($mysqli,$Sql) or die ("Gagal query Member".mysqli_error());
		
		
		ini_set( 'display_errors', 1 );   
		error_reporting( E_ALL );    
		$from = "info.mikedossoft.com";    
		$to = "esron.golan@gmail.com";    
		$subject = "Checking Data Member Baru";    
		$message = "Ada Pendaftaran Member baru, 
		Silahkan Cek Akun Admin Anda http://mikedosoft.com/login  
		Nama = $namamember 
		Alamat = $alamatmember 
		Email = $email 
		No HP = $nohp 
		";   
		$headers = "From:" . $from;    
		mail($to,$subject,$message, $headers);    
		echo "Pesan email sudah terkirim.";
		
		
		?>
		<script>  
			alert("Terima Kasih Sudah Mendaftar Menjadi Member, Silahkan Login");	
			window.location = "login";
		</script>
		
		<?php
		
} // Penutup POST

?>
    <script>
        function validate(){

            var a = document.getElementById("password").value;
            var b = document.getElementById("password2").value;
            if (a!=b) {
               alert("Password Tidak Sesuai");
               return false;
            }
        }
     </script>

  <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Registrasi member</h4>
                                    </div>
                                   
									<form onSubmit="return validate();" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmadd" enctype="multipart/form-data"> 

										<div class="form-group"><input class="form-control form-control-user" type="text" id="namamember"  placeholder="Masukkan nama Member" name="namamember" required></div>
										<div class="form-group"><input class="form-control form-control-user" type="text" id="alamatmember"  placeholder="Masukkan alamat Member" name="alamatmember" required></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="email" id="email" aria-describedby="emailHelp" placeholder="Masukkan Email Member..." name="email" required></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="text" id="nohp"  placeholder="Masukkan No HP Member" name="nohp" required></div>
										<div class="form-group"><input class="form-control form-control-user" type="text" id="username"  placeholder="Masukkan username Member" name="username" required></div>
										<div class="form-group"><input class="form-control form-control-user" type="password" id="password" placeholder="Masukkan Password" name="password" required></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="password2" placeholder="Ulangi masukkan password yang sama" name="password2" required></div>
										<div class="form-group">
                                   
                                        <button name="btnSimpan" class="btn btn-primary btn-block text-white btn-user" type="submit">Simpan Data</button>
                                       
                                    </form>
                                    <div class="text-center"><a class="small" href="login">sudah punya akun?</a></div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>

    