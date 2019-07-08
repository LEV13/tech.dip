<?php
$query = mysql_query(
	"SELECT
	`libs`.`id` AS `lib_id`,
	`libs`.`name` AS `lib_name`,
	`libs`.`code` AS `lib_code`,
	`libs`.`lib_type_id` AS `lib_type_id`,
	`libs`.`description` AS `lib_description`,
	`lib_types`.`name` AS `type_name`
	FROM `libs`
	INNER JOIN `lib_types` ON `lib_types`.`id` = `libs`.`lib_type_id`
	WHERE
	`libs`.`id` = ".$l."
	");
	$row = mysql_fetch_array($query);
?>
<div class="cd">
<?php echo "<a href='?c=".$req1['client_id']."&s=".$req2['simulator_id']."&l=".$req3['lib_id']."&edit=1'><div class='cd_set'></div></a>"; ?>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="si12"><?php echo $row['lib_name'];?></div>
	</div>
	<div class="si10">
		<div class="si01">Код</div>
		<div class=""><?php echo $row['lib_code'];?></div>
	</div>
	<div class="si10">
		<div class="si01">Тип</div>
		<div class=""><?php echo $row['type_name'];?></div>
	</div>
	<div class="si10">
		<div class="si01">Описание</div>
		<div class="si03"><?php echo $row['lib_description'];?></div>
	</div>
</div>