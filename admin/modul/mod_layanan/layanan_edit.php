<?php
# TOMBOL SIMPAN DIKLIK

if(isset($_POST['btnUpdate'])){
	
# BACA DATA DALAM FORM, masukkan datake variabel
$nama_layanan=$_POST['nama_layanan'];

	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	
$gambar_layanan	= $nama_file; 
$ket_layanan=$_POST['ket_layanan'];

$id_layanan=$_POST['id_layanan'];
if (!empty($lokasi_file))
	
	{
	UploadGambar1($gambar_layanan);
	$Sql="update layanan set nama_layanan='$nama_layanan',gambar_layanan='$gambar_layanan', ket_layanan='$ket_layanan' where id_layanan='$id_layanan'";
	$Myquery=mysqli_query($mysqli,$Sql) or die ("Gagal Query".mysqli_error());	
	
		if ($Myquery){
		echo "<meta http-equiv='refresh' content='0; url=layanan'>";
		}
		exit;
	}
	else
	{	
	$Sql="update layanan set nama_layanan='$nama_layanan', ket_layanan='$ket_layanan' where id_layanan='$id_layanan'";
	$Myquery=mysqli_query($mysqli,$Sql) or die ("Gagal Query".mysqli_error());	
	
		if ($Myquery){
		echo "<meta http-equiv='refresh' content='0; url=layanan'>";
		}
		exit;
	}

}
?>		

<?php
#menangkap id dan mengambil dari tabel berdasarkan ID td

$id_layanantangkap=$_GET['id'];

$Sql="SELECT * FROM layanan where id_layanan='$id_layanantangkap'";
$Myquery2=mysqli_query($mysqli,$Sql) or die ("Query salah".mysqli_error());
$Mydata=mysqli_fetch_array($Myquery2);

$id_layanan=$Mydata['id_layanan'];
$nama_layanan=$Mydata['nama_layanan'];
$gambar_layanan=$Mydata['gambar_layanan'];
$ket_layanan=$Mydata['ket_layanan'];

?>					


							<div class="card shadow">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Edit Layanan</p>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" name="form1" target="_self" enctype="multipart/form-data">
                                            <div class="form-group">
												<label for="address"><strong>Nama Layanan</strong></label>
												<input class="form-control" type="text"  name="nama_layanan" value="<?php echo $nama_layanan; ?>">
											</div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
													<label ><strong>Rubah Gambar Layanan</strong></label>
													<input class="form-control" type="file" placeholder="upload gambar layanan" name="fupload"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
													<label ><strong>Keterangan Layanan</strong></label>
													<input class="form-control" type="text"  name="ket_layanan" value="<?php echo $ket_layanan;?>"></div>
                                                </div>
                                            </div>
											<input class="form-control" type="hidden"  name="id_layanan" value="<?php echo $id_layanan;?>">
                                            <div class="form-group"><button class="btn btn-primary btn-sm" name="btnUpdate" type="submit">Update</button></div>
                                        </form>
                                    </div>
                                </div>