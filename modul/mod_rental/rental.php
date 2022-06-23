    
	
	<main class="page projects-page">
        <section class="portfolio-block projects-cards">
            <div class="container">
                <div class="heading">
                    <h2>Layanan</h2>
                </div>
                <div class="row">
				<?php
					$sqlilayanan 	= "SELECT * FROM layanan order by id_layanan DESC";
					$myQrylayanan 	= mysqli_query($mysqli, $sqlilayanan)  or die ("Query ambil data layanan salah : ".mysqli_error());
					$jumlah=mysqli_num_rows($myQrylayanan);		  		  		  
					while($layananku = mysqli_fetch_array($myQrylayanan))
					{
				?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0"><a href="#"><img class="card-img-top scale-on-hover" src="assets/img/nature/<?php echo $layananku['gambar_layanan']; ?>" alt="Card Image"></a>
                            <div class="card-body">
                                <h6><a href="#"><?php echo $layananku['nama_layanan']; ?></a></h6>
                                <p class="text-muted card-text"><?php echo $layananku['ket_layanan']; ?></p>
								<label class="col-form-label" style="font-size: 14px;">Rp. <?php echo number_format($layananku['harga']) ; ?></label>
                            </div>
							<div class="row" >
								<div class="col-3" align="center"><a class="btn btn-primary"  href="login" style="font-size: 12px;">Booking</a></div>
                            </div>
                        </div>
                    </div>
					<?php
					}
					?>
                    
                </div>
            </div>
        </section>
    </main>