<?php

function cetak($str){
 $hasil=htmlentities($str, ENT_QUOTES, 'UTF-8');
 return $hasil;
}