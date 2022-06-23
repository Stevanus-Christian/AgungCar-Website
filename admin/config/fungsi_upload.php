<?php
function UploadGambar1($fupload_name){
	$vdir_upload = "assets/img/nature";
	$vfile_upload = $vdir_upload . $fupload_name;
	
	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}


function UploadGambar2($fupload_name){
	//direktori gambar
	$vdir_upload = "assets/img/galeri/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
	
	//identitas file asli
	$im_src = imagecreatefromjpeg($vfile_upload);
	$src_width = imageSX($im_src);
	$src_height = imageSY($im_src);
	
	//Simpan dalam versi small 110 pixel
	//Set ukuran gambar hasil perubahan
	$dst_width = 640;
	$dst_height = 426;
	
	//proses perubahan ukuran
	$im = imagecreatetruecolor($dst_width,$dst_height);
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
	
	//Simpan gambar
	imagejpeg($im,$vdir_upload . "G" . $fupload_name);
	
	//Hapus gambar di memori komputer
	imagedestroy($im_src);
	imagedestroy($im);
	$remove_small = unlink("$vfile_upload");
}




?>
