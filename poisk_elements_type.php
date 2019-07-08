<?php
$type_name = $_POST['select_name'];
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
				
?>
<div class="cerch_elem">
	<div class='cerch_elem1'>Icon</div>
	<div class='cerch_elem2'>Название</div>
	<div class='cerch_elem3'>Код</div>
	<div class='cerch_elem4'>Тип</div>
	<div class='cerch_elem5'>Описание</div>

<?php
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
		JOIN  `element_types` ON  `element_types`.`id` =  `elements`.`type_id` 
	WHERE `elements`.`type_id` = '$type_add_id'
	");
	$row = mysql_fetch_array($query);

	do
	{
	echo "
	<a href='/?c=".$c."&s=".$s."&l=".$l."&e=".$row['element_id']."'>
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

	while ($row = mysql_fetch_array($query));

?>
</div>

<div class="table1">
<div class="table_one">
	<form name="checkboxs"  method="post">
	<div class="table_type">Выберитe тип
		<select name="select_name">
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
		</select>
		<div><button style="width: 70px;" value="Поиск по типу">Поиск</button></div>
	</div>
	</form>
	<div class="table_type table_color_1">Впишите код
		<input maxlength="2" size="2"></input>
		<div><button style="width: 70px;" value="Поиск по коду">Поиск</button></div>
	</div>
	<div class="table_type table_color_2">Введите текст
		<input size="21"></input>
		<div><button style="width: 70px;" value="Поиск по тексту">Поиск</button></div>
	</div>
	<div class="table_type table_color_3">Выберитe тег
		<input size="21"></input>
		<div><button style="width: 70px;" value="Поиск по тегу">Поиск</button></div>
	</div>
</div>
</div>
