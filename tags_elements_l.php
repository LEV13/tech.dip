<?php
$query = mysql_query(
	"SELECT
	`tags`.`id` AS `tags_id`,
	`tags`.`name` AS `tags_name`
	FROM `tags`
	WHERE
	`tags`.`id` = ".$l."
	");
	$row = mysql_fetch_array($query);
?>
<div class="cd">
<?php echo "<a href='?l=".$row['tags_id']."&edit=1'><div class='cd_set'></div></a>"; ?>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="si12"><?php echo $row['tags_name'];?></div>
	</div>
</div>