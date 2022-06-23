<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Anda harus login terlebih dahulu'); window.location = 'login'</script>";
}
else{
include "../config/koneksi.php";
include "config/fungsi_upload.php";
$id_login=$_SESSION['id_login'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.4/css/responsive.bootstrap4.min.css">
	
	
</head>

<body id="page-top">
    <div id="wrapper">

	<!-- posisi dari menu -->
	<?php include "menu.php";?>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
               <!-- untuk menu atas  -->
			   <?php include "menuatas.php";?>
			   
				<!-- untuk konten atau isi -->
				 <?php include "kontenadmin.php";?>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Brand 2021</span></div>
        </div>
    </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
	
	
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
	$(document).ready(function() {
		$('#dataTable1').DataTable();
	} );
	</script>
</body>



</html>

<?php
}
 ?>