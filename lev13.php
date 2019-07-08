<?php $host = 'localhost';
$user = 'lev13';
$pas = '123451';
$db = 'mmi';

mysql_query("SET NAMES utf8");

$connect = mysql_connect($host,$user,$pas);
if(!connect || !mysql_select_db($db,$connect))
{
exit (mysql_error());
}



$query = mysql_query("SELECT simulators.name AS sname, simulators.date, lib_types.name AS tname ,clients.name AS cname, simulators.client_id FROM simulators INNER JOIN clients ON simulators.client_id = clients.id INNER JOIN lib_types ON simulators.type_id = lib_types.id");
	$row = mysql_fetch_array($query);

	do
	{
	echo $row['sname'];
	echo '</br>';
	echo $row['tname'];
	echo '</br>';
	echo $row['cname'];
	echo '</br>';
	echo $row['client_id'];
	echo '</br>';

}
	while ($row = mysql_fetch_array($query)) ;
?>