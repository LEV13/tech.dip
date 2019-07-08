<?php

$host = 'localhost';
$user = 'LEV13';
$pas = '123451';
$db = "mmi";

mysql_query("SET NAMES utf8");

$connect = mysql_connect($host,$user,$pas);
if(!connect || !mysql_select_db($db,$connect))
{
exit (mysql_error());
}


mysql_query ("set_client='utf8'");
mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_general_ci'");
mysql_query ("SET NAMES utf8");
?>