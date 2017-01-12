<?php 
session_start();
$dbhost = 'localhost';
//$dbuser = 'maf16_rexello123';
$dbuser = 'root';
//$dbpass = 'cu0UMy3NxSRm';
$dbpass = '';

//$dbuser = 'maf16_ARci';
//$dbpass = 'cu0UMy3NxSRm';


$link = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
//$dbname = 'arcil';
$dbname = 'rexello';
mysql_select_db($dbname);

$path="../../up_images/";
$path0="up_images/";
$rand1=rand(1, 100);


function clean($str) {
$str = @trim($str);
if(get_magic_quotes_gpc()) {
$str = stripslashes($str);
}
return mysql_real_escape_string($str);
}

?>