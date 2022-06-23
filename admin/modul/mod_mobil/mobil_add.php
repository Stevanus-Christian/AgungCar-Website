<?php
# TOMBOL SIMPAN DIKLIK

if(isset($_POST['btnSimpan'])){
	
# BACA DATA DALAM FORM, masukkan datake variabel
$nama_layanan=$_POST['nama_layanan'];

	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	
$gambar_layanan	= $nama_file; 
$ket_layanan=$_POST['ket_layanan'];

UploadGambar1($gambar_layanan);
$Sql="insert into layanan (id_layanan,nama_layanan,gambar_layanan,ket_layanan)
		values ('','$nama_layanan','$gambar_layanan','$ket_layanan')";
$Myquery=mysqli_query($mysqli,$Sql) or die ("Gagal Query".mysqli_error());

if ($Myquery){
	echo "<meta http-equiv='refresh' content='0; url=layanan'>";
}
exit;


}
?>							


							<div class="card shadow">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Tambah Layanan</p>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" name="form1" target="_self" enctype="multipart/form-data">
                                            <div class="form-group">
												<label for="address"><strong>Nama Layanan</strong></label>
												<input class="form-control" type="text" placeholder="Isi Nama Layanan" name="nama_layanan">
											</div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
													<label ><strong>Gambar Layanan</strong></label>
													<input class="form-control" type="file" placeholder="upload gambar layanan" name="fupload"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
													<label ><strong>Keterangan Layanan</strong></label>
													<input class="form-control" type="text" placeholder="Keterangan" name="ket_layanan"></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><button class="btn btn-primary btn-sm" name="btnSimpan" type="submit">Simpan</button></div>
                                        </form>
                                    </div>
                                </div>