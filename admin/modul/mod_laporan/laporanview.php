<?php 

// Mengenalkan variabel teks
$SqlPeriode = ""; 
$awalTgl	= ""; 
$akhirTgl	= ""; 
$tglAwal	= ""; 
$tglAkhir	= "";

if(isset($_POST['btnTampil'])) {
	$tglAwal 	= isset($_POST['txtTglAwal']) ? $_POST['txtTglAwal'] : "01-".date('m-Y');
	$tglAkhir 	= isset($_POST['txtTglAkhir']) ? $_POST['txtTglAkhir'] : date('d-m-Y');
	$SqlPeriode = " where A.tglpesanan BETWEEN '".$tglAwal."' AND '".$tglAkhir."'";
}
else {
	$awalTgl 	= "01-".date('m-Y');
	$akhirTgl 	= date('d-m-Y'); 

	$SqlPeriode = " where A.tglpesanan BETWEEN '".$awalTgl."' AND '".$akhirTgl."'";
}

?>

<main class="page shopping-cart-page">
    <div class="container-fluid">
                <h3 class="text-dark mb-4">Data Pemesanan</h3>
				<h4>Periode Tanggal <b><?php echo ($tglAwal); ?></b> s/d <b><?php echo ($tglAkhir); ?></b></h4>
                <div class="card shadow">
                    <div class="card-header py-3">
                        
                    </div>
                    <div class="card-body">
					<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form10" target="_self">					
											

						  <div class="row">
						  <div class="col-lg-3">
								  <input name="txtTglAwal" type="date" class="form-control" value="<?php echo $awalTgl; ?>" size="10" /> 
							</div>
							<div class="col-lg-3">
								  <input name="txtTglAkhir" type="date" class="form-control" value="<?php echo $akhirTgl; ?>" size="10" />
							</div>

							<div class="col-lg-3">			
								  <input name="btnTampil" class="btn btn-success" type="submit" value="Tampilkan" />
							</div>	  
						  </div>
						 

					</form>
                        
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Pesanan</th>
                                        <th>Tgl Pesanan</th>
										<th>Nama Member</th>
                                        <th>Metode Bayar</th>
                                        <th>Status Bayar</th>
                                        <th>Total Bayar</th>
								
                                    </tr>
                                </thead>
                                <tbody>
								
								
									<?php
									
									$Sql 	= "SELECT A.*, B.namamember FROM pesanan A, member B  $SqlPeriode and A.kdmember=B.kdmember";								
									$myQry 	= mysqli_query($mysqli, $Sql)  or die ("Query  salah : ".mysqli_error());
								$nomor  = 0; 
								while ($myData = mysqli_fetch_array($myQry)) {		
										$nomor++;
								?>
								
                                    <tr>						
									    <td><?php echo $nomor;?></td>
										<td><?php echo $myData['kdpesanan'];?></td>
                                        <td><?php echo $myData['tglpesanan'];?></td> 
										<td><?php echo $myData['namamember'];?></td>										
                                        <td><?php echo $myData['metodebayar'];?></td>
										<td><?php echo $myData['statusbayar'];?></td>
										<td>Rp. <?php  echo  number_format($myData['totbayar']);?></td> 
                                    </tr>
									<?php
								} $nomor++;
									?>
                                </tbody>
                                
                            </table>
                        </div>
						
	<div class="row">
		  <div class="col-lg-3">
		  <a href="../admin/modul/mod_laporan/cetak.php?awal=<?php echo $tglAwal; ?>&&akhir=<?php echo $tglAkhir; ?>" target="_blank" alt="Edit Data" class="btn btn-primary">Cetak Laporan</a>
		  </div>
	 </div> 
                        
                    </div>
                </div>
            </div>                  
    </main>