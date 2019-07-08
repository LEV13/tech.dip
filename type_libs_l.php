<?php
$query = mysql_query(
	"SELECT
	`lib_types`.`id` AS `lib_types_id`,
	`lib_types`.`name` AS `lib_types_name`,
	`lib_types`.`description` AS `lib_types_description`
	FROM `lib_types`
	WHERE
	`lib_types`.`id` = ".$l."
	");
	$row = mysql_fetch_array($query);
?>
<div class="cd">
<?php echo "<a href='?l=".$row['lib_types_id']."&edit=1'><div class='cd_set'></div></a>"; ?>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="si12"><?php echo $row['lib_types_name'];?></div>
	</div>
	<div class="si10">
		<div class="si01">Описание</div>
		<div class="si02"><?php echo $row['lib_types_description'];?></div>
	</div>
</div>