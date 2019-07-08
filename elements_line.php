<?php
$query = mysql_query(
	"SELECT
	`elements`.`id` AS `element_id`,
	`elements`.`name` AS `element_name`,
	`elements`.`code` AS `element_code`,
	`elements`.`type_id` AS `type_id`,
	`elements`.`icon` AS `element_icon`,
	`elements`.`description` AS `element_description`,
	`element_types`.`name` AS `type_name`
	FROM `elements`
	INNER JOIN `element_types` ON `element_types`.`id` = `elements`.`type_id`
	WHERE
	`elements`.`id` = ".$e."
	");
	$row = mysql_fetch_array($query);
	
	$element_states_sql = mysql_query(
		"SELECT 
		`element_states`.`id` AS `element_states_id`,
		`element_states`.`name` AS `element_states_name`,
		`element_states`.`element_id` AS `element_states_element_id`,
		`element_states`.`image` AS `element_states_element_image`
		FROM `element_states`
		WHERE `element_states`.`element_id` = ".$e."
		");
	$element_states = mysql_fetch_array($element_states_sql);
?>
<div class="elem_table1">
<div class="elem_table2">
<div class="cd">
<?php echo "<a href='?c=$c&s=$s&l=$l&e=$e&edit=1'><div class='cd_set'></div></a>"; ?>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="si12"><?php echo $row['element_name'];?></div>
	</div>
	<div class="si10">
		<div class="si01">Код</div>
		<div class=""><?php echo $req3['lib_code'].$row['element_code'];?></div>
	</div>
		<div class="si10">
		<div class="si01">Тип</div>
		<div class=""><?php echo $row['type_name'];?></div>
	</div>
	<div class="si10">
		<div class="si01">Описание</div>
		<div class="si03"><?php echo $row['element_description'];?></div>
	</div>
</div>
<div class="ele3">
	<div class="ele21">Картинка</div>
	<?php echo "<div class='c01' style='padding-left: 170px;'/><img class='c011' src='". $row['element_icon']."'/></div>"; ?>
</div>
<div id="parentId">
<?php 
do
	{ ?>
<div class='add_div'>
	<div class='add_div_img'>
		<img height='100px' src='<?php echo $element_states['element_states_element_image'];?>'/>
	</div>
		<div class='add_div_text'>
			<div><?php echo $element_states['element_states_name'];?></div>
		</div>
</div>
<?php 
	}
	while ($element_states = mysql_fetch_array($element_states_sql));
	?>
</div>
</div>
<div class="ele_add">
	<div class="ele1">Теги</div>
	<div class="ele11">
	<?php
	$tags_sql = mysql_query(
	"SELECT
	`tags_elements`.`element_id` AS `element_id`,
	`tags_elements`.`tag_id` AS `tag_id`,
	`tags`.`id` AS `tags_id`,
	`tags`.`name` AS `tags_name`
	FROM `tags_elements`
	INNER JOIN `tags` ON `tags`.`id` = `tags_elements`.`tag_id`
	WHERE
	`tags_elements`.`element_id` = $e
	");
	$tag1 = mysql_fetch_array($tags_sql);
		
	do
	{
	echo $tag1['tags_name']." ,";
	if ($tag1 = mysql_fetch_array($tags_sql)) {echo $tag1['tags_name']." .";} 
	}

	while ($tag1 = mysql_fetch_array($tags_sql));
	?>
	</div>
</div>
</div>


