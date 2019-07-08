<?php

$query = mysql_query(
	"SELECT
	`elements`.`id` AS `element_id`,
	`elements`.`name` AS `element_name`,
	`elements`.`code` AS `element_code`,
	`elements`.`description` AS `element_description`,
	`libs`.`code` AS `lib_code`
	FROM `elements`
	JOIN  `libs` ON  `libs`.`id` =  `elements`.`lib_id` 
	WHERE
	`lib_id` = ".$l."
	");
	$row = mysql_fetch_array($query);
?>
<div class="mid_fon">
	<div class='s01'>Название</div>
	<div class='s02'>Код</div>
	<div class='s02'>Описание</div>
	<a href='/?c=<?php echo $c;?>&s=<?php echo $s;?>&l=<?php echo $l;?>&add=1'><div class='mid_fon_add'></div></a>
<?php
	do
	{
	echo "
	<a href='/?c=".$c."&s=".$s."&l=".$l."&e=".$row['element_id']."'>
	<div class='s'>
	<div class='s01'>".$row['element_name']."</div>
	<div class='s02'>".$row['element_code']."".$row['lib_code']."</div>
	<div class='s03'>".$row['element_description']."</div>	
	</a>
	</div>
	";
	}

	while ($row = mysql_fetch_array($query));

?>
</div>