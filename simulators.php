<?php
$query = mysql_query(
	"SELECT
	`simulators`.`id` AS `simulator_id`,
	`simulators`.`name` AS `simulator_name`,
	`simulators`.`date` AS `simulator_date`,
	`simulators`.`description` AS `simulator_description`
	FROM `simulators`
	WHERE
	`client_id` = ".$c."
	");
	$row = mysql_fetch_array($query);
?>
<div class="mid_fon">
	<div class='s01'>Название</div>
	<div class='s02'>Год</div>
	<div class='s02'>Описание</div>
	<a href='/?c=<?php echo $c;?>&add=1'><div class='mid_fon_add'></div></a>
<?php
	do
	{
	echo "
	<div class='s'>
	<a href='/?c=".$c."&s=".$row['simulator_id']."'>
	<div class='s01'>".$row['simulator_name']."</div>
	<div class='s02'>".$row['simulator_date']."</div>
	<div class='s03'>".$row['simulator_description']."</div>
	</a>
	</div>
	";
	}

	while ($row = mysql_fetch_array($query));
?>
</div>
