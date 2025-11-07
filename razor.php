<?php 
$data = file_get_contents('php://input');
//$headers = getallheaders();
//$headers = 'his'. md5( 'his'. microtime() . uniqid() . 'teamps' );
$file1 = date('d-m-y')."body.txt";
//$file2 = date('d-m-y')."header.json";
file_put_contents("apilog/$file1",$data);
//file_put_contents("apilog/$file2",$headers);
?>