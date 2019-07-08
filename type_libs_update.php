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
	
$lib_types_name = $_POST['lib_types_name'];
$lib_types_description = $_POST['lib_types_description'];
?>
<div class="cd">
<?php 
	$query = mysql_query("UPDATE lib_types SET `lib_types`.`name` = '$lib_types_name', `lib_types`.`description` = '$lib_types_description' WHERE `lib_types`.`id` = '$l'"); 
?>
<div class="cl_upd"><?php if ($query == TRUE) {echo 'Ваши данные успешно добавленны!';} else {echo '!Ошибка!';}?></div>
</div>
<script>
someTimeout = 2000; // редирект через 2 секунду
window.setTimeout("document.location = '<?php echo "?l=".$row['lib_types_id'];?> '", someTimeout);
</script>