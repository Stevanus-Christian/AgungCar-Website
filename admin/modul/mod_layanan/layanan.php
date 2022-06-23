            <div class="container-fluid">
                <h3 class="text-dark mb-4" align="center">Layanan</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold"><a href="layananadd"><i class="fa fa-plus-square" aria-hidden="true"></i> Data Layanan</a> </p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                         
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable1">
                                <thead>
                                    <tr>
                                        <th>No</th>
										<th>Id Layanan</th>
                                        <th>Nama Layanan</th>
                                        <th>Gambar layanan</th>
                                        <th>Keterangan</th>
										<th>Tools</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								$Sql 	= "select * from layanan order by id_layanan DESC";
								$myQry 	= mysqli_query($mysqli, $Sql)  or die ("Query  salah : ".mysqli_error());
								$nomor  = 1; 
								while ($myData = mysqli_fetch_array($myQry)) {	
								$Kode = $myData['id_layanan'];						
								?>
                                    <tr>
                                        <td><?php echo $nomor++;?></td>
										<td><?php echo $myData['id_layanan'];?></td>
                                        <td><?php echo $myData['nama_layanan'];?></td>
                                        <td><img class="rounded-circle mr-2" width="70" height="70" src="assets/img/nature/<?php echo $myData['gambar_layanan'];?>"></td>
                                        <td><?php echo $myData['ket_layanan'];?></td>
										 <td> <a href="layananedit-<?php echo $Kode;?>" target="_self"><i class="fa fa-edit" aria-hidden="true"></i><a> 
										 <a href="layanandel-<?php echo $Kode;?>" target="_self" onclick=" return confirm('Apakah Anda Mau Hapus Data Layanan?')"><i class="fa fa-trash" aria-hidden="true"></i><a></td>
                                        
                                    </tr>
								<?php
								}
								mysqli_free_result($myQry);
								?>
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>No</strong></td>
										<td><strong>Id Layanan</strong></td>
                                        <td><strong>Nama Layanan</strong></td>
                                        <td><strong>Gambar layanan</strong></td>
                                        <td><strong>Keterangan</strong></td>
										<td><strong>Tools</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                   
                    </div>
                </div>
            </div>