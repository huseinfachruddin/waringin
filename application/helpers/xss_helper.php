<?php

function cetak($str){
 $hasil=htmlentities($str, ENT_QUOTES, 'UTF-8');
 return $hasil;
}
function uang($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}