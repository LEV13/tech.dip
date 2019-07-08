<?php

$query = mysql_query(
	"SELECT
	`clients`.`id` AS `client_id`,
	`clients`.`name` AS `client_name`,
	`clients`.`image` AS `client_image`,
	`clients`.`address` AS `client_address`
	FROM `clients` ");
	$row = mysql_fetch_array($query);
	do
	{
	echo "
	<div class='cl'>
	<a href='?c=".$row['client_id']."'><div class='c'>
	<div class='c01'><img class='c010' src='". $row['client_image']."'/></div>
	<div class='c1'>
	<div class='c02'>".$row['client_name']."</div>
	<div class='c03'>".$row['client_address']."</div>
	
	</div>
	</a>
	</div>
	</div>
	
	
	";
	}

	while ($row = mysql_fetch_array($query));
?>
