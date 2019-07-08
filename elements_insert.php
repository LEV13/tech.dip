<?php
$element_name = $_POST['element_name'];
$element_code = $_POST['element_code'];
$element_type = $_POST['element_type'];
$elem_tag = $_POST['tag'];
$element_description = $_POST['element_description'];
$image = $_FILES['image']['name'];
$images = $_FILES['images']['name'];
$time = time();

$all_elements_sql =  mysql_query(
	"SELECT
	`elements`.`id` AS `element_id`,
	`elements`.`name` AS `element_name`,
	`elements`.`lib_id` AS `element_lib_id`
	FROM `elements`
	WHERE
	`elements`.`name` = '$element_name'
	AND
	`elements`.`lib_id` = '$l'
	");
	$all_elements = mysql_fetch_array($all_elements_sql);
	
$all_elements_code_sql =  mysql_query(
	"SELECT
	`elements`.`id` AS `element_id`,
	`elements`.`name` AS `element_name`,
	`elements`.`code` AS `element_code`,
	`elements`.`lib_id` AS `element_lib_id`
	FROM `elements`
	WHERE
	`elements`.`code` = '$element_code'
	AND
	`elements`.`lib_id` = '$l'
	");
	$all_elements_code = mysql_fetch_array($all_elements_code_sql);

if ($element_name != $all_elements['element_name']) {
if ($element_code != $all_elements_code['element_code']) {


$type_id_sql = mysql_query(
	"SELECT
	`element_types`.`id` AS `element_types_id`,
	`element_types`.`name` AS `element_types_name`
	FROM `element_types`
	WHERE
	`element_types`.`name` = '$element_type'
	");
	$type_id = mysql_fetch_array($type_id_sql);
	$element_type_id = $type_id['element_types_id'];

$query = mysql_query("INSERT INTO elements (name,code,lib_id,type_id,description,icon) 
									VALUES('$element_name','$element_code','$l','$element_type_id','$element_description','$time')");
	$name_id_sql = mysql_query(
	"SELECT
	`elements`.`id` AS `element_id`,
	`elements`.`name` AS `element_name`
	FROM `elements`
	WHERE
	`elements`.`name` = '$element_name'
	");
	$name_id = mysql_fetch_array($name_id_sql);
	$element_id = $name_id['element_id'];

 foreach ($elem_tag as $tag) {
	$tags_sql = mysql_query(
	"SELECT
	`tags`.`id` AS `tag_id`,
	`tags`.`name` AS `tag_name`
	FROM `tags`
	WHERE
	`tags`.`name` = '$tag'
	");
	$tag1 = mysql_fetch_array($tags_sql);
	$tag_id = $tag1['tag_id'];
	$tags_add = mysql_query("INSERT INTO tags_elements (element_id,tag_id) 
											VALUES('$element_id','$tag_id')");
	
	}
	
	$query1 = mysql_query("SELECT `id` FROM `elements` WHERE `icon` = '$time'");
	$query11 = mysql_fetch_array($query1);
	
	if ($images == NULL) {} else {
foreach ($_FILES["images"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
	$time_image = time();
	$image_text = $_POST['text'][$key];
	
	$image_text_add_insert_sql = mysql_query("INSERT INTO element_states (name,element_id,image) 
											VALUES('$image_text','$element_id','$time_image$key')");
											
	$image_text_add_select_sql = mysql_query("SELECT `id` FROM `element_states` WHERE `image` = '$time_image$key'");
	$image_text_add_fetch_sql = mysql_fetch_array($image_text_add_select_sql);
	
$path = 'images/elements/position/'; // директория для загрузки
$ext = array_pop(explode('.',$_FILES["images"]['name'][$key])); // расширение
$new_name = $image_text_add_fetch_sql['id'].'.'.$ext;  // новое имя с расширением
$tmp_name = $_FILES["images"]["tmp_name"][$key];
if($_FILES["images"]['error'][$key] == 0){
$full_path = $path.$new_name; // полный путь с новым именем и расширением
    if(move_uploaded_file($tmp_name, $full_path)){
        // все добавилось
    }
}
	$image_upadte_sql = mysql_query("UPDATE element_states SET `image` = '$full_path' WHERE `image` = '$time_image$key'");
	
}
}
}







	
$path = 'images/elements/icon/'; // директория для загрузки
$ext = array_pop(explode('.',$_FILES['image']['name'])); // расширение
$new_name = $query11['id'].'.'.$ext;  // новое имя с расширением
if($_FILES['image']['error'] == 0){
$full_path = $path.$new_name; // полный путь с новым именем и расширением
    if(move_uploaded_file($_FILES['image']['tmp_name'], $full_path)){
        // Можно сохранить $full_path (полный путь) или просто имя файла - $new_name
    }
}
$query2 = mysql_query("UPDATE elements SET `icon` = '$full_path' WHERE `id` = ".$query11['id']);
	
	}
	else {$error_sql = "Номер элемента занят";}
	}
	else {$error_sql = "Название элемента занято";}
	?>
<div class="cd">
<div class="cl_upd"><?php 	if ($query == TRUE) {echo "Ваши данные добавленны";} else {echo $error_sql;}?></div>
</div>
<script>
someTimeout = 200000; // редирект через 2 секунду
window.setTimeout("document.location = '<?php echo "?c=$c&s=$s&l=$l";?> '", someTimeout);
</script>