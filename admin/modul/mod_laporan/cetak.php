<?php 
session_start();

include_once "../../config/koneksi.php";
include_once "../../config/library.php";

$awal	= $_GET['awal']; 
$tawal=InggrisTgl($awal);

$akhir	= $_GET['akhir'];
$takhir=InggrisTgl($akhir);

	$tglAwal 	= isset($_GET['awal']) ? $_GET['awal'] : "01-".date('m-Y');
	$tglAkhir 	= isset($_POST['akhir']) ? $_GET['akhir'] : date('d-m-Y');
	$SqlPeriode = "where A.tglpesanan BETWEEN '$awal' AND '$akhir'";
?>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-all.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.4/css/responsive.bootstrap4.min.css">
</head>
<body onload="print()">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmedit">

<?php if (!empty($tglAwal)){ ?>
<center><h2>DAFTAR LAPORAN TRANSAKSI PEMESANAN</h2> <hr> <br></h4>PERIODE PEMESANAN <b><?php echo IndonesiaTgl($awal); ?> s/d <?php echo IndonesiaTgl($akhir); ?></b>
<br /> 
</h4></center>
<?php } else { ?>
<center><h2>DAFTAR LAPORAN TRANSAKSI PEMESANAN
</h2></center>
<hr>
<?php } ?>




   <table class="table my-0">
                                <thead>
                                    <th>No</th>
                                        <th>No Pesanan</th>
                                        <th>Tgl Pesanan</th>
										<th>Nama Member</th>
                                        <th>Metode Bayar</th>
                                        <th>Status Bayar</th>
                                        <th>Total Bayar</th>
                                </thead>
                                <tbody>
								
								<?php
									$Sql 	= "SELECT A.*, B.namamember FROM pesanan A, member B  $SqlPeriode and A.kdmember=B.kdmember";								
									$myQry 	= mysqli_query($mysqli, $Sql)  or die ("Query  salah : ".mysqli_error());
									$nomor  = 0; 
									$jumlahbayar=0;
									while ($myData = mysqli_fetch_array($myQry)) {	
									$jumlahbayar+=$myData['totbayar'];									
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
								} ;
									?>
                                </tbody>
								
								  <tr>
		<th align="center" ><strong></strong></th>
		<th  ><strong></strong></th>
		<th  ><strong></strong></th>
		<th  ><strong></strong></th>
		<th  ><strong></strong></th>
		<th  ><strong> Total transaksi</strong></th>
	   
        <th style="background-color:whitesmoke;" align="right" ><strong>Rp. <?php echo number_format($jumlahbayar); ?>,-</strong></th>
		
		

  </tr>
                                
                            </table>
                       
                        
        


    
  

</form>
</body>

<script src="assets/js/jquery.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/js/chart.min.js"></script>
    <script src="../../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="../../assets/js/theme.js"></script>
	
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

