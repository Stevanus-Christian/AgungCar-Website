
<script type="text/javascript" >
//parameter berupa string " bulan,tanggal,tahun "
function hitungSelisihHari(tgl1, tgl2){
    // varibel miliday sebagai pembagi untuk menghasilkan hari
    var miliday = 24 * 60 * 60 * 1000;
    //buat object Date
    var tanggal1 = new Date(tgl1);
    var tanggal2 = new Date(tgl2);
    // Date.parse akan menghasilkan nilai bernilai integer dalam bentuk milisecond
    var tglPertama = Date.parse(tanggal1);
    var tglKedua = Date.parse(tanggal2);
    var selisih = ((tglKedua - tglPertama) / miliday)+1;
    return selisih;
    }
function buat_tahun(nama){
    //ambil tahun ini
    var tgl = new Date();
    var th_ini = tgl.getFullYear();
    var pilih = "";
    //berikan pilihan untuk 1 th kebelakang dan 1 th kedepan
    document.write("<select name="+nama+" class='form-control combo' onchange='hitung_selisih()'>");
    for(var i = th_ini - 1; i <= th_ini + 1; i++){
    if( i == th_ini ) pilih = "selected";
    else pilih = "";
    document.write("<option "+pilih+" >"+i+"</option>");
    }
    document.write("</select>");
    }
function buat_bulan(nama){
    var nama_bulan=new Array("Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
    //ambil bulan ini
    var tgl = new Date();
    var bln_ini = tgl.getMonth();
    var pilih = "";
    document.write("<select name="+nama+" class='form-control combo' onchange='hitung_selisih()'>");
    for(var i = 0; i < nama_bulan.length; i++ ){
    var j = i+1;
    if(i == bln_ini) pilih = "selected";
    else pilih="";
    document.write("<option "+pilih+" value="+j+">"+nama_bulan[i]+"</option>");
        }
    document.write("</select>");
    }
function buat_tanggal(nama){
    var batas = 31;
    //ambil tanggal sekarang
    var tgl = new Date();
    var tgl_ini = tgl.getDate();
    var pilih = "";
    document.write("<select name="+nama+" class='form-control combo ' onchange='hitung_selisih()'>");
    for(var i = 1; i <= batas; i++ ){
    if(i == tgl_ini) pilih = "selected";
    else pilih="";
    document.write("<option "+pilih+" >"+i+"</option>");
        }
    document.write("</select>");
    }
	//frmadd
function hitung_selisih(){
    //ambil tanggal berangkat dan kembali
    var berangkat = document.getElementsByName("berangkat");
    var kembali = document.getElementsByName("kembali");
	//var harga = document.getElementsByName("harga");
	harga = document.frmadd.harga.value;
	
    // bangun string untuk tanggal "tahun bulan tanggal"
    var tgl_berangkat = tgl_kembali ="";
    for(var i = 0; i < berangkat.length; i++){
        tgl_berangkat += berangkat[i].value+" ";
        tgl_kembali += kembali[i].value+" ";
        }
    var selisih = hitungSelisihHari(tgl_berangkat,tgl_kembali);

	var totalbay2=selisih +4;
	var totalbay=harga*selisih;
	var ppn=totalbay*0.1;
	var grand=totalbay+ppn;
    document.getElementById("hasil").value = selisih;document.getElementById("subtotal").value = totalbay;
	document.getElementById("ppn").value = ppn;
	document.getElementById("total").value = grand;
	document.getElementById("tgl_berangkat").value = tgl_berangkat;
	document.getElementById("tgl_kembali").value = tgl_kembali;
    }
</script>
<?php 
if(isset($_POST['btnSimpan'])){
include "config/koneksi.php";


		$query = "SELECT max(kdpesanan) as maxKode FROM pesanan";
		$hasil = mysqli_query($mysqli, $query);
		$data  = mysqli_fetch_array($hasil);
		$kodePesanan = $data['maxKode'];
		$noUrut = (int) substr($kodePesanan, 4, 4);
		$noUrut++;
		
		$char = "BOK";
		$newID = $char . sprintf("%04s", $noUrut);
		$kode2 = $newID;

	$lama   = $_POST['lama'];
	$total   = $_POST['total'];
	$tgl = date('Y-m-d');
	$kdpesanan =$kode2;
	$id_layanan =$_POST['id_layanan']; 
	$kdmember=$_SESSION['id_login'];
	$harga =$_POST['harga'];
	$lama =$_POST['lama'];
	$tglpakai =str_replace(" ", "-",$_POST['tgl_berangkat']);
	$mulaipenggunaan =$_POST['mulaipenggunaan'];
	$tglkembali =str_replace(" ", "-",$_POST['tgl_kembali']);
	$akhirpenggunaan =$_POST['akhirpenggunaan'];
	$metodebayar =$_POST['metodebayar'];
	$totbayar = $_POST['total'];
	

	$Sql	= "INSERT INTO pesanan set kdpesanan='$kdpesanan',tglpesanan='$tgl',
		  tglpakai='$tglpakai', mulaipenggunaan='$mulaipenggunaan',tglkembali='$tglkembali', akhirpenggunaan='$akhirpenggunaan',
		  metodebayar='$metodebayar', totbayar ='$totbayar',statusbayar ='1', kdmember='$kdmember', id_layanan='$id_layanan'";
					
						
		$myQry	= mysqli_query($mysqli,$Sql) or die ("Gagal query Member".mysqli_error());
		
	if ($myQry){
	echo "<meta http-equiv='refresh' content='0; url=berandamember'>";
	}
	exit;

		
	}

?>

<br>
<br>
<?php 
$kdmember=$_SESSION['id_login'];
?>
  <div class="container mb-5 mt-5">
        <h1 class="text-center mb-5">Detail Pesanan</h1>
        <form name="frmadd"  class="bayar-form" enctype="multipart/form-data" method="post" >
				
		<div class="card-body">
        <div class="row">
            
			<?php
			$id_layanan = $_GET['id'];
				
			$sqlilay	= "SELECT * FROM layanan where id_layanan='$id_layanan'";
			$myQrylay 	= mysqli_query($mysqli, $sqlilay)  or die ("Query ambil data salah 1: ".mysqli_error());
			$rlay=mysqli_fetch_array($myQrylay);
			$harga=$rlay['harga'];
			
			?>				
			
            <div class="col-md-12">
            <div class="form-group">
			<div class="row">
            <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4"><label class="col-form-label">Jenis Layanan</label></div>
            <div class="col-8 col-sm-12 col-md-8 col-lg-8 col-xl-8">
			<input value="<?php echo $rlay['id_layanan']; ?>" name="id_layanan" type="hidden" class="form-control" readonly>
								
			<input value="<?php echo $rlay['nama_layanan']; ?>" type="text" class="form-control" readonly></div>
            </div>
			
			<div class="row">
            <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4"><label class="col-form-label">Deskripsi Layanan</label></div>
            <div class="col-8 col-sm-12 col-md-8 col-lg-8 col-xl-8">
			
			
			<textarea  type="text" class="form-control" readonly><?php echo $rlay['ket_layanan']; ?></textarea></div>
            </div>
							
			<div class="row">
            <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4"><label class="col-form-label">Harga Harian</label></div>
            <div class="col-8 col-sm-12 col-md-8 col-lg-8 col-xl-8">
			<input name="harga" id="harga" value="<?php echo ($rlay['harga']); ?>" type="text" class="form-control" readonly></div>
            </div>
											
   	
            <div class="row">
            <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4"><label class="col-form-label">
			Tanggal Pemakaian </label></div>
            <div class="col-2 col-sm-12 col-md-2 col-lg-2 col-xl-2">
								
			<script>
			document.write("<input type='hidden' size='15' class='no_border' value='Tanggal Berangkat' />");
			buat_tahun("berangkat");
			</script>					
								
			</div>
			<div class="col-3 col-sm-12 col-md-3 col-lg-3 col-xl-3">
			<script>
			buat_bulan("berangkat");
			</script>					
								
			</div>
			
			<div class="col-3 col-sm-12 col-md-3 col-lg-3 col-xl-3">								
			<script>
			buat_tanggal("berangkat");
			document.write("</span>");
			</script>					
								
			</div>
            </div>	
			
			<div class="row">
            <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4"><label class="col-form-label">Mulai Penggunaan Pukul</label></div>
            <div class="col-8 col-sm-12 col-md-8 col-lg-8 col-xl-8"><input type="time" class="form-control col-4"  name="mulaipenggunaan" ></div>
            </div>		

            <div class="row">
            <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4"><label class="col-form-label">
			Tanggal Kembali </label></div>
            <div class="col-2 col-sm-12 col-md-2 col-lg-2 col-xl-2">
			
			<script>
			document.write("<input type='hidden' size='15' class='no_border' value='Tanggal Kembali' />");
			buat_tahun("kembali");
			</script>					
								
			</div>
			<div class="col-3 col-sm-12 col-md-3 col-lg-3 col-xl-3">
			<script>
			buat_bulan("kembali");
			</script>					
								
			</div>
			
			<div class="col-3 col-sm-12 col-md-3 col-lg-3 col-xl-3">								
			
			<script>
			buat_tanggal("kembali");
			document.write("</span>");
			</script>					
								
			</div>
            </div>
	
			<div class="row">
            <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4"><label class="col-form-label"> Akhir Penggunaan Pukul</label></div>
            <div class="col-8 col-sm-12 col-md-8 col-lg-8 col-xl-8"><input type="time" class="form-control  col-4" value="23:59" name="akhirpenggunaan" ></div>
            </div>
							
			<div class="row">
            <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4"><label class="col-form-label">
			Jumlah Hari</label></div>
            <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4">
			<input type='hidden' size='15' class='no_border' value='Lama pergi' />
			<input type="text" name="lama" id="hasil" size="2" class="form-control combo" style="text-align:right" readonly />
			</div>
			<div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4"><label class="col-form-label">Hari</label>
			</div>
								
            </div>
							
			<div class="row">
            <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4"><label class="col-form-label">
			Sub Total</label></div>
            <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4">
			<input type="text" id="subtotal" name="subtotal" size="2" class="form-control combo" style="text-align:right" readonly />
			</div>
			<div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4"><label class="col-form-label">Rupiah</label>
			</div>
			</div>
			
			<div class="row">
            <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4"><label class="col-form-label">
			PPN</label></div>
            <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4">
			<input type="text" id="ppn" name="ppn" size="2" class="form-control combo" style="text-align:right" readonly />
			</div>
			<div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4"><label class="col-form-label">Rupiah</label>
			</div>
			</div>
			
			<div class="row">
            <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4"><label class="col-form-label">
			Total</label></div>
            <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4">
			<input type="text" id="total" name="total" size="2" class="form-control combo" style="text-align:right" readonly />
			</div>
			<div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4"><label class="col-form-label">Rupiah</label>
			</div>
			</div>


							

							
        <div class="row">
            <div class="col-4 col-sm-12 col-md-4 col-lg-4 col-xl-4"><label class="col-form-label">Metode Pembayaran</label></div>
            <div class="col-8 col-sm-12 col-md-8 col-lg-8 col-xl-8"><select name="metodebayar" class="form-control">
            <option value="" selected="">Pilih</option>
			<option value="transfer1" >Transfer ke rek 123</option>
            <option value="transfer2">Transferke rek 456</option>
            </select></div>
        </div>
		<br>					
		<div class="row">
            <div class="col-12 text-center">
			<input type="hidden" name="kmem"  value=<?php echo $kdmember; ?>>
			
			<input type="hidden" class="form-control" name="tgl_berangkat" id="tgl_berangkat">
								 
			<input type="hidden" class="form-control" name="tgl_kembali" id="tgl_kembali">
			<button name="btnSimpan" class="btn btn-primary btn-block" type="submit">PROSES BOOKING</button>
		
			</div>
        </div>
		
        
		</div>
        </div>
        </div>
         </div>
       
		</form>
    </div>
	<script type="text/javascript" language="Javascript">
   hargasatuan = document.frmadd.total.value;
   document.frmadd.txtDisplay.value = hargasatuan;
   jumlah = document.frmadd.jumbar.value;
   document.frmadd.txtDisplay.value = jumlah;
   function OnChange(value){
     hargasatuan = document.frmadd.total.value;
     jumlah = document.frmadd.jumbar.value;
     total = hargasatuan - jumlah;
     document.frmadd.txtDisplay.value = total;
   }
 </script>
	
