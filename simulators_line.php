<?php
$query = mysql_query(
	"SELECT
	`simulators`.`id` AS `simulator_id`,
	`simulators`.`name` AS `simulator_name`,
	`simulators`.`date` AS `simulator_date`,
	`simulators`.`description` AS `simulator_description`,
	`simulators`.`client_id` AS `client_id`
	FROM `simulators`
	WHERE
	`simulators`.`id` = ".$s."
	");
	$row = mysql_fetch_array($query);
?>
<div class="cd">
<?php echo "<a href='?c=".$row['client_id']."&s=".$row['simulator_id']."&edit=1'><div class='cd_set'></div></a>"; ?>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="si12"><?php echo $row['simulator_name'];?></div>
	</div>
	<div class="si10">
		<div class="si01">Дата</div>
		<div class=""><?php echo $row['simulator_date'];?></div>
	</div>
	<div class="si10">
		<div class="si01">Описание</div>
		<div class="si02"><?php echo $row['simulator_description'];?></div>
	</div>
</div>