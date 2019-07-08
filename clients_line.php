<?php
	$query = mysql_query(
	"SELECT
	`clients`.`id` AS `client_id`,
	`clients`.`name` AS `client_name`,
	`clients`.`image` AS `client_image`,
	`clients`.`address` AS `client_address`
	FROM `clients` 
	WHERE `clients`.`id` = ".$c."");
	$row = mysql_fetch_array($query);
?>
<div class="cd">
<?php echo "<a href='?c=".$row['client_id']."&edit=1'><div class='cd_set'></div></a>"; ?>
	<div class="cd_img"><div class="cd_img1"><img height="100px" src="<?php echo $row['client_image'];?>"/></div></div>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="cd02"><?php echo $row['client_name'];?></div>
	</div>
	<div class="cd10">
		<div class="cd01">Адрес</div>
		<div class="cd02"><?php echo $row['client_address'];?></div>
	</div>
</div>
