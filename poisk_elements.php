<!doctype html>
<?php include('db.php');?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>LEV13</title>
        <?php include_once('link.php') ?>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>


    </head>
    <body>
<?php 
$edit = empty($_GET['edit'])?'':(int)$_GET['edit'];
$type = empty($_GET['type'])?'':(int)$_GET['type'];

include 'top.php' ?>
<div class="mid">
<?php include 'menu.php'; ?>

<div class="table">
<?php  

?>

<?php
$type_name = $_POST['select_name'];
$tags_name = $_POST['tags_name'];
$text_name = $_POST['text_name'];
$code_name = $_POST['code_name'];
$text = $_POST['text'];
//-------------------------------------
	$type_sql_add = mysql_query(
				"SELECT
					`element_types`.`id` AS `types_id`,
					`element_types`.`name` AS `types_name`
					FROM `element_types`
					WHERE `element_types`.`name` = '$type_name'
				");
				$type_add = mysql_fetch_array($type_sql_add);
				
				$type_add_id = $type_add['types_id'];
//-------------------------------------
	$tags_sql_add = mysql_query(
				"SELECT
					`tags`.`id` AS `tags_id`,
					`tags`.`name` AS `tags_name`
					FROM `tags`
					WHERE `tags`.`name` = '$tags_name'
				");
				$tags_add = mysql_fetch_array($tags_sql_add);
				
				$tags_add_id = $tags_add['tags_id'];
//-----
	$tags_elem_sql_add = mysql_query(
				"SELECT
					`tags_elements`.`element_id` AS `tags_element_id`,
					`tags_elements`.`tag_id` AS `tags_tag_id`
					FROM `tags_elements`
					WHERE `tags_elements`.`tag_id` = '$tags_add_id'
				");
				$tags_elem_add = mysql_fetch_array($tags_elem_sql_add);
				
				$tags_elem_add_id = $tags_elem_add['tags_tag_id'];
//------------------------------------
?>
<div class="cerch_elem">
	<div class='cerch_elem1'>Icon</div>
	<div class='cerch_elem2'>Название</div>
	<div class='cerch_elem3'>Код</div>
	<div class='cerch_elem4'>Тип</div>
	<div class='cerch_elem5'>Описание</div>

<?php

if ($type_name != NULL) {$type_name_sql = "`elements`.`type_id` = '$type_add_id'";} else {$type_name_sql = NULL;} // Тип элемента
//if ($tags_name != NULL) {$tags_name_sql = "`elements`.`id` = '$tags_elem_add_id'";} else {$tags_name_sql = NULL;}
if ($text_name != NULL) {$text_name_sql = "`elements`.`name` like '%$text_name%'";} else {$text_name_sql = NULL;} // Текст элемента
if ($code_name != NULL) {$code_name_sql = "`elements`.`code` = '$code_name'";} else {$code_name_sql = NULL;} // Код элемента
if ($tags_elem_add_id != NULL) {$tags_elem_add_id_sql = "`elements`.`id` = `tags_elements`.`element_id`"; $tags_elem_add_id_sql_inner = " INNER JOIN `tags_elements` ON `tags_elements`.`tag_id` = '$tags_elem_add_id'";} else {$tags_elem_add_id_sql = NULL; $tags_elem_add_id_sql_inner = NULL;} // Код элемента

if ($type_name != NULL and $text_name != NULL) {$and_1 = " AND ";} else {$and_1 = NULL;}// Если есть тип и текст
if ($text_name != NULL and $code_name != NULL) {$and_2 = " AND ";} else {$and_2 = NULL;}// Текст и код
if ($type_name != NULL and $code_name != NULL) {$and_3 = " AND ";} else {$and_3 = NULL;}// Тип и код
//if ($type_name != NULL and $code_name != NULL) {$and_4 = " AND ";} else {$and_3 = NULL;}// Тип и код

if ($and_3 != NULL) {$and_2 = " AND ";}

if ($type_name == NULL and $text_name == NULL and $code_name == NULL) {$dop_add = "`elements`.`type_id` = '$type_add_id'";} else {$dop_add = NULL;}
if ($type_name != NULL or $text_name != NULL or $code_name != NULL) {$and_0 = " AND "; } else {$and_0 = NULL;}

if ($tags_elem_add_id == NULL) {
$query = mysql_query(
	"SELECT
	`elements`.`id` AS `element_id`,
	`elements`.`name` AS `element_name`,
	`elements`.`code` AS `element_code`,
	`elements`.`description` AS `element_description`,
	`elements`.`icon` AS `element_icon`,
	`elements`.`type_id` AS `element_type_id`,
	`element_types`.`name` AS `element_types_name`
	FROM `elements`
	INNER JOIN  `element_types` ON  `element_types`.`id` =  `elements`.`type_id` 
	WHERE ".$dop_add."".$type_name_sql."".$and_1."".$text_name_sql."".$and_2."".$code_name_sql."
	");
	$row = mysql_fetch_array($query);
	} else {
	$query = mysql_query(
	"SELECT
	`elements`.`id` AS `element_id`,
	`elements`.`name` AS `element_name`,
	`elements`.`code` AS `element_code`,
	`elements`.`description` AS `element_description`,
	`elements`.`icon` AS `element_icon`,
	`elements`.`type_id` AS `element_type_id`,
	`element_types`.`name` AS `element_types_name`,
    `tags_elements`.`element_id` AS `tags_element_id`,
    `tags_elements`.`tag_id` AS `tags_tag_id`
	FROM `elements`
	INNER JOIN  `element_types` ON  `element_types`.`id` =  `elements`.`type_id`
	INNER JOIN `tags_elements` ON `tags_elements`.`tag_id` = ".$tags_elem_add_id."	
	WHERE `elements`.`id` = `tags_elements`.`element_id` ".$and_0." ".$type_name_sql."".$and_1."".$text_name_sql."".$and_2."".$code_name_sql."
	");
	$row = mysql_fetch_array($query);
	}
		
		
	do
	{
	
if ($row['element_id'] != NULL ) {
$query_s = mysql_query(
	"SELECT
	`elements`.`id` AS `element_id_s`,
	`elements`.`lib_id` AS `element_lib_id_s`,
	`libs`.`id` AS `lib_id_s`,
	`libs`.`simulator_id` AS `lib_simulator_id_s`,
	`simulators`.`id` AS `simulator_id_s`,
	`simulators`.`client_id` AS `simulator_client_id_s`
	FROM `elements`
	INNER JOIN `libs` ON `libs`.`id` = `elements`.`lib_id`
	INNER JOIN `simulators` ON `simulators`.`id` = `libs`.`simulator_id`
	WHERE `elements`.`id` = ".$row['element_id']."
	");
	$row_s = mysql_fetch_array($query_s);
				

	
	echo "
	<a href='/?c=".$row_s['lib_simulator_id_s']."&s=".$row_s['lib_simulator_id_s']."&l=".$row_s['element_lib_id_s']."&e=".$row_s['element_id_s']."'>
	<div class='cerch_elem_up'>
	<div class='cerch_elem1'><img height='25px' src='".$row['element_icon']."'/></div>
	<div class='cerch_elem2'>".$row['element_name']."</div>
	<div class='cerch_elem3'>".$row['element_code']."</div>
	<div class='cerch_elem4'>".$row['element_types_name']."</div>
	<div class='cerch_elem5'>".$row['element_description']."</div>
	</a>
	</div>
	";
}
	}

	while ($row = mysql_fetch_array($query));
	

?>

</div>
<form name="checkboxs"  method="post">
<div class="left">
<div class="left_menu">
<div class="left_menu_top" style="border-bottom: 1px solid #999">Критерии поиска</div>
<div class="left_menu_code">Код <input maxlength="2" size="4" name="code_name"></input></div>
<div class="left_menu_code">Текст <input size="21" name="text_name"></input></div>

<div class="left_menu_code">Тег <select name="tags_name">
			<option></option>
					 <?php
				$tags_sql = mysql_query(
					"SELECT
					`tags`.`id` AS `tags_id`,
					`tags`.`name` AS `tags_name`
					FROM `tags`
					");
					$tags_arr = mysql_fetch_array($tags_sql);
					do
					{
					echo "<option>".$tags_arr['tags_name']."</option>";
					}
				while ($tags_arr = mysql_fetch_array($tags_sql));
				  ?>		
		</select></div>
		
<div class="left_menu_code" style="border-bottom: 1px dashed #999">Тип <select name="select_name">
			<option></option>
						 <?php
				$type_sql = mysql_query(
					"SELECT
					`element_types`.`id` AS `types_id`,
					`element_types`.`name` AS `types_name`
					FROM `element_types`
					");
					$type_arr = mysql_fetch_array($type_sql);
					do
					{
					echo "<option>".$type_arr['types_name']."</option>";
					}
				while ($type_arr = mysql_fetch_array($type_sql));
				  ?>		
		</select></div>
<div class="left_menu_button"><button style="width: 70px;" value="Поиск по тегу">Поиск</button></div>
</div>
</div>
</form>
    </body>
</html>	