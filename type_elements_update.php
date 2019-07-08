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
	
$elem_types_name = $_POST['elem_types_name'];
?>
<div class="cd">
<?php 
	$query = mysql_query("UPDATE element_types SET `element_types`.`name` = '$elem_types_name' WHERE `element_types`.`id` = '$l'"); 
?>
<div class="cl_upd"><?php if ($query == TRUE) {echo 'Ваши данные успешно добавленны!';} else {echo '!Ошибка!';}?></div>
</div>
<script>
someTimeout = 2000; // редирект через 2 секунду
window.setTimeout("document.location = '<?php echo "?l=".$row['elem_types_id'];?> '", someTimeout);
</script>