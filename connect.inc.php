<?php
/*$mysql_host = 'mysql1.000webhost.com';
$mysql_user = 'a9995242_dream';
$mysql_pass = 'dreambooknfly123';
$mysql_db = 'a9995242_dream';
*/
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'iplfantasy';
if(!mysql_connect($mysql_host, $mysql_user, $mysql_pass) || !mysql_select_db($mysql_db))
{
	die(mysql_error());
	
}
mysql_query("SET NAMES 'utf8'");


?>

