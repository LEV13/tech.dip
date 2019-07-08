<?php
$query = mysql_query(
	"SELECT
	`element_types`.`id` AS `elem_types_id`,
	`element_types`.`name` AS `elem_types_name`
	FROM `element_types`
	WHERE
	`element_types`.`id` = ".$l."
	");
	$row = mysql_fetch_array($query);
?>
<div class="cd">
<?php echo "<a href='?l=".$row['elem_types_id']."&edit=1'><div class='cd_set'></div></a>"; ?>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="si12"><?php echo $row['elem_types_name'];?></div>
	</div>
</div>